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
        $setting = new Setting();
        $data['title'] = $setting->get_val('TITLE');
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

        if ($this->input->get('search_by')) {
            $total_rows = $news->like($_GET['search_by'], $_GET['q'])->count();
            $news->like($_GET['search_by'], $_GET['q'])->order_by($data['col'], $data['dir']);
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
        $setting = new Setting();
        $data['title'] = $setting->get_val('TITLE');

        $data['form_action'] = site_url('admin/news/save');
        $data['id'] = '';
        $data['title_news'] = array('name' => 'title_news', 'class' => 'span7');
        $data['image'] = '';
        $data['content'] = array('name' => 'content', 'class' => 'ckeditor');

        $this->load->view('admin/news/frm_news', $data);
    }

    function save() {
        $news = new Post();
        $news->title = $this->input->post('title_news');
        $news->slug = slug($this->input->post('title_news'));
        $news->content = $this->input->post('content');
        // upload photo
        $config['upload_path'] = 'assets/upload';
        $config['allowed_types'] = 'gif|jpg|png|bmp';
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
            $msg = notice('Create successfuly.', 'success');
            $this->session->set_flashdata('message', $msg);
            redirect('admin/news/');
        }
    }

    function edit($id) {
        $setting = new Setting();
        $data['title'] = $setting->get_val('TITLE');
        $news = new Post();

        $data['form_action'] = site_url("admin/news/update");

        $rs = $news->where('id', $id)->get();
        $data['id'] = $rs->id;
        $data['title_news'] = array('name' => 'title_news', 'value' => $rs->title, 'class' => 'span7');
        $data['image'] = $rs->images;
        $data['content'] = array('name' => 'content', 'value' => $rs->content, 'class' => 'ckeditor');

        $this->load->view('admin/news/frm_news', $data);
    }

    function update() {
        $news = new Post();
        // upload photo
        $config['upload_path'] = 'assets/upload';
        $config['allowed_types'] = 'gif|jpg|png|bmp';
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
                            'slug' => slug($this->input->post('title_news')),
                            'content' => $this->input->post('content'),
                            'images' => $data["file_name"],
                        )
        );
        $msg = notice('Update successfuly.', 'success');
        $this->session->set_flashdata('message', $msg);
        redirect('admin/news/');
    }

    public function delete($id) {
        $news = new Post();
        $news->_delete($id);

        redirect('admin/news');
    }

}