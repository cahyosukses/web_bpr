<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class News extends CI_Controller {

    private $limit = 10;

    function __construct() {
        parent::__construct();
        $this->session->userdata('logged_in') == true ? '' : redirect('admin/users/sign_in');
    }

    public function index() {
        $news = new Post();
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
        $data['q'] = $this->input->get('q');
        if ($data['q']) {
            $total_rows = $news->like('title', $data['q'])->count();
            $news->like('title', $data['q'])->order_by($data['col'], $data['dir']);
        } else {
            $total_rows = $news->count();
            $news->order_by($data['col'], $data['dir']);
        }

        $data['news'] = $news->get($this->limit, $offset)->all;

        $config['base_url'] = site_url("admin/news/index/");
        $config['total_rows'] = $total_rows;
        $config['per_page'] = $this->limit;
        $config['uri_segment'] = $uri_segment;
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();

        $this->load->view('admin/news/index', $data);
    }

    function add() {
        $data['form_action'] = site_url('admin/news/save');
        $data['id'] = '';
        $data['image_edit'] = '';
        $data['title_news'] = array('name' => 'title_news', 'class' => 'span7');
        $data['image'] = '';
        $data['content'] = array('name' => 'content', 'class' => 'ckeditor');

        $this->load->view('admin/news/frm_news', $data);
    }

    function save() {
        $news = new Post();
        $this->form_validation->set_rules('title_news', 'Name', 'required');
        $this->form_validation->set_rules('content', 'Content', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('message', '<div class="alert alert-error"><a data-dismiss = "alert" class = "close">&times;</a>' . validation_errors() . '</div>');
            redirect('admin/news/add');
        } else {
            if ($news->exists_record('title', $this->input->post('title_news')) == TRUE) {
                $this->session->set_flashdata('message', '<div class="alert alert-error">Record Exists, please change another name.</div>');
                redirect('admin/products/add');
            } else {
                $news->title = strip_tags($this->input->post('title_news'));
                $news->slug = preg_replace("![^a-z0-9]+!i", "-", $this->input->post('title_news'));
                $news->content = $this->input->post('content');
                $news->created_at = date('c');
                $news->update_at = date('c');
                // upload photo
                $config['upload_path'] = 'assets/upload/news';
                $config['allowed_types'] = 'gif|jpg|png|bmp|jpeg';
                $this->load->library("upload", $config);
                if ($this->upload->do_upload("image")) {
                    $data = $this->upload->data();
                    print_r($data);
                    $news->images = $data["file_name"];
                } else {
                    //$this->staff_photo = "";
                    print_r($this->upload->display_errors());
                }

                if ($news->save()) {
                    $msg = '<div class="alert alert-success">Created successfuly.</div>';
                    $this->session->set_flashdata('message', $msg);
                    redirect('admin/news/');
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