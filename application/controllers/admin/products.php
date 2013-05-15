<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Products extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->session->userdata('logged_in') == true ? '' : redirect('admin/users/sign_in');
    }

    public function index() {
        $this->load->view('admin/tree_products/index');
    }

    public function add() {
        $data['form_action'] = site_url('admin/products/save/');
        $data['id'] = "";
        $data['image_edit'] = '';
        $data['name'] = array('name' => 'name', 'class' => 'span6');
        $data['content'] = array('name' => 'content', 'class' => 'ckeditor');
        $data['btn_back'] = site_url('admin/products/');
        $this->load->view('admin/tree_products/products', $data);
    }

    function save() {
        $category = new Category();
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('content', 'Content', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('message', '<div class="alert alert-error"><a data-dismiss = "alert" class = "close">&times;</a>' . validation_errors() . '</div>');
            redirect('admin/products/add');
        } else {

            if ($category->exists_record('name', $this->input->post('name')) == TRUE) {
                $this->session->set_flashdata('message', '<div class="alert alert-error">Record Exists, please change another name.</div>');
                redirect('admin/products/add');
            } else {
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
                $category->name = $this->input->post('name');
                $category->slug = slug($this->input->post('name'));
                $category->content = $this->input->post('content');

                if ($category->save()) {
                    $msg = '<div class="alert alert-success">Created successfuly.</div>';
                    $this->session->set_flashdata('message', $msg);

                    redirect('admin/products/');
                }
            }
        }
    }

    function edit($id) {
        $category = new Category();
        $data['form_action'] = site_url("admin/products/update");

        $rs = $category->where('id', $id)->get();
        $data['id'] = $rs->id;
        $data['image_edit'] = $rs->images;
        $data['name'] = array('name' => 'name', 'value' => $rs->name);
        $data['content'] = array('name' => 'content', 'class' => 'ckeditor', 'value' => $rs->content);
        $data['btn_back'] = site_url('admin/products/');
        $this->load->view('admin/tree_products/products', $data);
    }

    function update() {
        $category = new Category();
        $this->form_validation->set_rules('id', 'ID Record', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('message', '<div class="error">' . validation_errors() . '</div>');
            redirect('admin/products/');
        } else {
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
                                'name' => $this->input->post('name'),
                                'content' => $this->input->post('content'),                                
                                'images' => $data["file_name"] == '' ? $this->input->post('image_edit') : $data["file_name"],
                                'slug' => strtolower(str_replace(' ', '-', $this->input->post('name')))
                            )
            );
            $msg = '<div class="alert alert-success">Update successfuly.</div>';
            $this->session->set_flashdata('message', $msg);
            redirect('admin/products/');
        }
    }

    public function sub($id='') {
        $data['form_action'] = site_url("admin/products/save");
        $data['id'] = $id;
        $data['name'] = array('name' => 'name');
        $data['content'] = array('name' => 'content', 'rows' => '6', 'id' => 'content', 'class' => 'ckeditor');
        $data['btn_back'] = site_url('admin/products/');
        $this->load->view('admin/tree_products/products', $data);
    }

    public function delete($id) {
        $category = new Category();
        $category->_delete($id);

        redirect('admin/products');
    }

}