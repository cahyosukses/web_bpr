<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Peoples extends CI_Controller {

    private $limit = 10;

    function __construct() {
        parent::__construct();
        $this->session->userdata('logged_in') == true ? '' : redirect('admin/users/sign_in');
    }

    public function index() {
        $people = new People();
        switch ($this->input->get('c')) {
            case "1":
                $data['col'] = "name";
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
        $data['q'] = $this->input->get('q');
        if ($data['q']) {
            $total_rows = $people->like('name', $data['q'])->count();
            $people->like('name', $data['q'])->order_by($data['col'], $data['dir']);
        } else {
            $total_rows = $people->count();
            $people->order_by($data['col'], $data['dir']);
        }

        $data['peoples'] = $people->get($this->limit, $offset)->all;

        $config['base_url'] = site_url("admin/peopples/index/");
        $config['total_rows'] = $total_rows;
        $config['per_page'] = $this->limit;
        $config['uri_segment'] = $uri_segment;
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();

        $this->load->view('admin/peoples/index', $data);
    }

    function add() {
        $data['form_action'] = site_url('admin/peoples/save');
        $data['id'] = '';
        $data['image_edit'] = '';
        $data['name'] = array('name' => 'name', 'class' => 'span7');
        $data['image'] = '';
        $data['about_me'] = array('name' => 'about_me', 'class' => 'ckeditor');

        $this->load->view('admin/peoples/frm_people', $data);
    }

    function save() {
        $people = new People();
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('about_me', 'About me', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('message', '<div class="alert alert-error"><a data-dismiss = "alert" class = "close">&times;</a>' . validation_errors() . '</div>');
            redirect('admin/peoples/add');
        } else {
            if ($people->exists_record('name', $this->input->post('name')) == TRUE) {
                $this->session->set_flashdata('message', '<div class="alert alert-error">Record Exists, please change another name.</div>');
                redirect('admin/peoples/add');
            } else {
                $people->name = strip_tags($this->input->post('name'));
                $people->slug = preg_replace("![^a-z0-9]+!i", "-", slug($this->input->post('name')));
                $people->about_me = $this->input->post('about_me');
                // upload photo
                $config['upload_path'] = 'assets/upload/peoples';
                $config['allowed_types'] = 'gif|jpg|png|bmp|jpeg';
                $this->load->library("upload", $config);
                if ($this->upload->do_upload("image")) {
                    $data = $this->upload->data();
                    print_r($data);
                    $people->photo_bg = $data["file_name"];
                } else {
                    //$this->staff_photo = "";
                    print_r($this->upload->display_errors());
                }

                if ($people->save()) {
                    $msg = '<div class="alert alert-success">Created successfuly.</div>';
                    $this->session->set_flashdata('message', $msg);
                    redirect('admin/peoples/');
                }
            }
        }
    }

    function edit($id) {
        $news = new Post();
        $data['form_action'] = site_url("admin/news/update");
        $rs = $news->where('id', $id)->get();
        $data['id'] = $rs->id;
        $data['image_edit'] = $rs->images;
        $data['title_news'] = array('name' => 'title_news', 'value' => $rs->title, 'class' => 'span7');
        $data['image'] = $rs->images;
        $data['content'] = array('name' => 'content', 'value' => $rs->content, 'class' => 'ckeditor');

        $this->load->view('admin/news/frm_news', $data);
    }

    function update() {
        $news = new Post();
        // upload photo
        $config['upload_path'] = 'assets/upload/news';
        $config['allowed_types'] = 'gif|jpg|png|bmp|jpeg';
        $this->load->library("upload", $config);
        if ($this->upload->do_upload("image")) {
            $data = $this->upload->data();
        } else {
            //print_r($this->upload->display_errors());
        }

        $news->where('id', $this->input->post('id'))
                ->update(
                        array(
                            'title' => $this->input->post('title_news'),
                            'slug' => preg_replace("![^a-z0-9]+!i", "-", $this->input->post('title_news')),
                            'content' => $this->input->post('content'),
                            'images' => $data["file_name"] == '' ? $this->input->post('image_edit') : $data["file_name"],
                            'updated_at' => date('c')
                        )
        );
        $msg = '<div class="alert alert-success">Update successfuly.</div>';
        $this->session->set_flashdata('message', $msg);
        redirect('admin/news/');
    }

    public function view($id){
        $news = new Post();
        $rs = $news->where('id', $id)->get();
        $data['title_news'] = $rs->title;
        $data['images_news'] = $rs->images;
        $data['content_news'] = $rs->content;
        $this->load->view('admin/news/views', $data);
    }

    public function delete($id) {
        $news = new Post();
        $news->_delete($id);

        redirect('admin/news');
    }

}