<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Banners extends CI_Controller {

    private $limit = 10;

    function __construct() {
        parent::__construct();
        $this->session->userdata('logged_in') == true ? '' : redirect('admin/users/sign_in');
    }

    public function index() {
        $banners = new Banner();
        switch ($this->input->get('c')) {
            case "1":
                $data['col'] = "title";
                break;
            case "2":
                $data['col'] = "content";
                break;
            case "2":
                $data['col'] = "id";
                break;
            default:
                $data['col'] = "id";
        }

        if ($this->input->get('d') == "1") {
            $data['dir'] = "DESC";
        } else {
            $data['dir'] = "ASC";
        }

        $uri_segment = 3;
        $offset = $this->uri->segment($uri_segment);

        if ($this->input->get('search_by')) {
            $total_rows = $banners->like($_GET['search_by'], $_GET['q'])->count();
            $banners->like($_GET['search_by'], $_GET['q'])->order_by($data['col'], $data['dir']);
        } else {
            $total_rows = $banners->count();
            $banners->order_by($data['col'], $data['dir']);
        }

        $data['banners'] = $banners->get($this->limit, $offset)->all;

        $config['base_url'] = site_url("admin/banners/index/");
        $config['total_rows'] = $total_rows;
        $config['per_page'] = $this->limit;
        $config['uri_segment'] = $uri_segment;
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();

        $this->load->view('admin/banners/index', $data);
    }

    function add() {
        $data['form_action'] = site_url('admin/banners/save');
        $data['id'] = '';
        $data['title_banners'] = array('name' => 'title_banners', 'class' => 'span7');
        $data['image'] = '';
        $data['image_edit'] = '';
        $data['content'] = array('name' => 'content', 'class' => 'ckeditor');

        $this->load->view('admin/banners/frm_banner', $data);
    }

    function save() {
        $banners = new Banner();
        $this->form_validation->set_rules('title_banners', 'Title', 'required');
        $this->form_validation->set_rules('content', 'Content', 'required');        

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('message', '<div class="alert alert-error"><a data-dismiss = "alert" class = "close">&times;</a>' . validation_errors() . '</div>');
            redirect('admin/banners/add');
        } else {
            if ($banners->exists_record('title', $this->input->post('title_banners')) == TRUE) {
                $this->session->set_flashdata('message', '<div class="alert alert-error">Record Exists, please change another name.</div>');
                redirect('admin/banners/add');
            } else {
                $banners->title = $this->input->post('title_banners');
                $banners->slug = preg_replace("![^a-z0-9]+!i", "-", $this->input->post('title_banners'));
                $banners->content = $this->input->post('content');
                // upload photo
                $config['upload_path'] = 'assets/upload/banners';
                $config['allowed_types'] = 'gif|jpg|png|bmp|jpeg';
                $this->load->library("upload", $config);
                if ($this->upload->do_upload("image")) {
                    $data = $this->upload->data();
                    print_r($data);
                    $banners->images = $data["file_name"];
                } else {
                    //$this->staff_photo = "";
                    print_r($this->upload->display_errors());
                }

                if ($banners->save()) {
                    $msg = '<div class="alert alert-success">Create successfuly.</div>';
                    $this->session->set_flashdata('message', $msg);
                    redirect('admin/banners/');
                }
            }
        }
    }

    function edit($id) {
        $banners = new Banner();
        $data['form_action'] = site_url("admin/banners/update");
        $rs = $banners->where('id', $id)->get();
        $data['id'] = $rs->id;
        $data['title_banners'] = array('name' => 'title_banners', 'value' => $rs->title, 'class' => 'span7');
        $data['image'] = $rs->images;
        $data['image_edit'] = $rs->images;
        $data['content'] = array('name' => 'content', 'value' => $rs->content, 'class' => 'ckeditor');

        $this->load->view('admin/banners/frm_banner', $data);
    }

    function update() {
        $banners = new Banner();
        // upload photo
        $config['upload_path'] = 'assets/upload/banners';
        $config['allowed_types'] = 'gif|jpg|png|bmp|jpeg';
        $this->load->library("upload", $config);
        if ($this->upload->do_upload("image")) {
            $data = $this->upload->data();
        } else {
            //print_r($this->upload->display_errors());
        }

        $banners->where('id', $this->input->post('id'))
                ->update(
                        array(
                            'title' => $this->input->post('title_banners'),
                            'slug' => preg_replace("![^a-z0-9]+!i", "-", $this->input->post('title_banners')),
                            'content' => $this->input->post('content'),
                            'images' => $data["file_name"] == '' ? $this->input->post('image_edit') : $data["file_name"],
                        )
        );
        $msg = '<div class="alert alert-success">Update successfuly.</div>';
        $this->session->set_flashdata('message', $msg);
        redirect('admin/banners/');
    }

    public function delete($id) {
        $banners = new Banner();
        $banners->_delete($id);

        redirect('admin/banners');
    }

}