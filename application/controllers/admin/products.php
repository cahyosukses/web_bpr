<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Products extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->session->userdata('logged_in') == true ? '' : redirect('admin/users/sign_in');
    }

    public function index() {
        $data['title'] = "PD BPR KAB BANDUNG";
        $this->load->view('admin/tree_products/index', $data);
    }

    public function add() {
        $data['title'] = "PD BPR KAB BANDUNG";
        $data['form_action'] = site_url('admin/products/save/');

        $data['id'] = "";
        $data['nama'] = array('name' => 'nama', 'class' => 'span6');
        $data['content'] = array('name' => 'content', 'class' => 'ckeditor');
        $this->load->view('admin/tree_products/products', $data);
    }

    function save() {
        $category = new Category();

        // upload photo
        $config['upload_path'] = 'assets/upload/products';
        $config['allowed_types'] = 'gif|jpg|png|bmp';
        $this->load->library("upload", $config);
        if ($this->upload->do_upload("image")) {
            $data = $this->upload->data();
            $category->images = $data["file_name"];
        } else {
            print_r($this->upload->display_errors());
        }

        $category->parent = $this->input->post('id');
        $category->nama = $this->input->post('nama');
        $category->slug = slug($this->input->post('nama'));
        $category->content = $this->input->post('content');

        if ($category->save()) {
            redirect('admin/products/');
        }
    }

    function edit($id) {
        $data['title'] = "PD BPR KAB BANDUNG";
        $category = new Category();
        $data['form_action'] = site_url("admin/products/update");

        $rs = $category->where('id', $id)->get();
        $data['id'] = $rs->id;
        $data['nama'] = array('name' => 'nama', 'value' => $rs->nama);
        $data['content'] = array('name' => 'content', 'class' => 'ckeditor', 'value' => $rs->content);

        $this->load->view('admin/tree_products/products', $data);
    }

    function update() {
        $category = new Category();
        // upload photo
        $config['upload_path'] = 'assets/upload/products';
        $config['allowed_types'] = 'gif|jpg|png|bmp';
        $this->load->library("upload", $config);
        if ($this->upload->do_upload("image")) {
            $data = $this->upload->data();
        } else {
            //print_r($this->upload->display_errors());
        }

        $category->where('id', $this->input->post('id'))
                ->update(
                        array(
                            'nama' => $this->input->post('nama'),
                            'content' => $this->input->post('content'),
                            'images' => $data["file_name"],
                            'slug' => strtolower(str_replace(' ', '-', $this->input->post('nama')))
                        )
        );

        $this->session->set_flashdata('message', 'Nav Update successfuly.');
        redirect('admin/products/');
    }

    public function sub($id='') {
        $data['title'] = "";
        $data['form_action'] = site_url("admin/products/save");
        $data['id'] = $id;
        $data['nama'] = array('name' => 'nama');
        $data['content'] = array('name' => 'content', 'rows' => '6', 'id' => 'content', 'class' => 'ckeditor');
        $this->load->view('admin/tree_products/products', $data);
    }

    public function delete($id) {
        $category = new Category();
        $category->_delete($id);

        redirect('admin/products');
    }

}