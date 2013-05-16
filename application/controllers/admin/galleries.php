<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Galleries extends CI_Controller {

    private $limit = 10;

    function __construct() {
        parent::__construct();
        $this->session->userdata('logged_in') == true ? '' : redirect('admin/users/sign_in');
    }

    public function index() {
        $gallery = new Gallery();
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
            $total_rows = $gallery->like('title', $data['q'])->count();
            $gallery->like('title', $data['q'])->order_by($data['col'], $data['dir']);
        } else {
            $total_rows = $gallery->count();
            $gallery->order_by($data['col'], $data['dir']);
        }

        $data['galleries'] = $gallery->get($this->limit, $offset)->all;

        $config['base_url'] = site_url("admin/galleries/index/");
        $config['total_rows'] = $total_rows;
        $config['per_page'] = $this->limit;
        $config['uri_segment'] = $uri_segment;
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();

        $this->load->view('admin/galleries/index', $data);
    }

    function add($parent) {
        $data['form_action'] = site_url('admin/galleries/save');
        $data['id'] = '';
        $data['image_edit'] = '';
        $data['parent'] = $parent;
        $data['title_gallery'] = array('name' => 'title_gallery', 'class' => 'span7');
        $data['image'] = '';
        $data['btn_back'] = site_url('admin/galleries/albums/');
        $data['content'] = array('name' => 'content', 'class' => 'span7', 'rows' => 11);

        $this->load->view('admin/galleries/frm_galleries', $data);
    }

    function save() {
        $gallery = new Gallery();
        $this->form_validation->set_rules('title_gallery', 'Title', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('message', '<div class="alert alert-error"><a data-dismiss = "alert" class = "close">&times;</a>' . validation_errors() . '</div>');
            redirect('admin/galleries/add/' . $this->input->post('parent'));
        } else {
            $gallery->title = $this->input->post('title_gallery');
            $gallery->slug = preg_replace("![^a-z0-9]+!i", "-", slug($this->input->post('title_gallery')));
            $gallery->content = $this->input->post('content');
            $gallery->parent = $this->input->post('parent');
            $gallery->created_at = date('c');
            $gallery->update_at = date('c');
            // upload photo
            $config['upload_path'] = 'assets/upload/galleries';
            $config['allowed_types'] = 'gif|jpg|png|bmp|jpeg';
            $this->load->library("upload", $config);
            if ($this->upload->do_upload("image")) {
                $data = $this->upload->data();
                print_r($data);
                $gallery->images = $data["file_name"];
            } else {
                //$this->staff_photo = "";
                print_r($this->upload->display_errors());
            }

            if ($gallery->save()) {
                $msg = notice('Create successfuly.', 'success');
                $this->session->set_flashdata('message', $msg);
                if ($this->input->post('parent') == '') {
                    $msg = '<div class="alert alert-success">Create successfuly.</div>';
                    $this->session->set_flashdata('message', $msg);
                    redirect('admin/galleries/albums');
                } else {
                    $msg = '<div class="alert alert-success">Create successfuly.</div>';
                    $this->session->set_flashdata('message', $msg);
                    redirect('admin/galleries/photos/' . $this->input->post('parent'));
                }
            }
        }
    }

    function edit($id) {
        $gallery = new Gallery();
        $data['form_action'] = site_url("admin/galleries/update");
        $rs = $gallery->where('id', $id)->get();
        $data['id'] = $rs->id;
        $data['parent'] = $rs->parent;
        $data['image_edit'] = $rs->images;
        $data['title_gallery'] = array('name' => 'title_gallery', 'value' => $rs->title, 'class' => 'span7');
        $data['image'] = $rs->images;
        $data['btn_back'] = $data['btn_back'] = site_url('admin/galleries/albums/');

        $data['content'] = array('name' => 'content', 'value' => $rs->content, 'class' => 'span6');

        $this->load->view('admin/galleries/frm_galleries', $data);
    }

    function update() {
        $gallery = new Gallery();
        // upload photo
        $config['upload_path'] = 'assets/upload/galleries';
        $config['allowed_types'] = 'gif|jpg|png|bmp|jpeg';
        $this->load->library("upload", $config);
        if ($this->upload->do_upload("image")) {
            $data = $this->upload->data();
        } else {
            //print_r($this->upload->display_errors());
        }

        $gallery->where('id', $this->input->post('id'))
                ->update(
                        array(
                            'title' => $this->input->post('title_gallery'),
                            'slug' => preg_replace("![^a-z0-9]+!i", "-", slug($this->input->post('title_gallery'))),
                            'content' => $this->input->post('content'),
                            'images' => $data["file_name"] == '' ? $this->input->post('image_edit') : $data["file_name"],
                            'parent' => $this->input->post('parent'),
                            'updated_at' => date('c')
                        )
        );
        $msg = '<div class="alert alert-success">Update successfuly.</div>';
        $this->session->set_flashdata('message', $msg);
        redirect('admin/galleries/photos/'.$this->input->post('parent'));
    }

    public function delete($id) {
        $gallery = new Gallery();
        $gallery->_delete($id);

        redirect('admin/galleries');
    }

    function albums() {
        $gallery = new Gallery();
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
            $total_rows = $gallery->where('parent', 0)->like('title', $data['q'])->count();
            $gallery->where('parent', 0)->like('title', $data['q'])->order_by($data['col'], $data['dir']);
        } else {
            $total_rows = $gallery->count();
            $gallery->where('parent', 0)->order_by($data['col'], $data['dir']);
        }

        $data['galleries'] = $gallery->get($this->limit, $offset)->all;

        $config['base_url'] = site_url("admin/galleries/albums/");
        $config['total_rows'] = $total_rows;
        $config['per_page'] = $this->limit;
        $config['uri_segment'] = $uri_segment;
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();

        $this->load->view('admin/albums/index', $data);
    }

    function add_album() {
        $data['form_action'] = site_url('admin/galleries/albums/save');
        $data['id'] = '';
        $data['title_gallery'] = array('name' => 'title_gallery', 'class' => 'span7');
        $data['content'] = array('name' => 'content', 'class' => 'ckeditor');

        $this->load->view('admin/albums/frm_albums', $data);
    }

    function edit_album($id) {
        $gallery = new Gallery();
        $data['form_action'] = site_url("admin/galleries/albums/update");

        $rs = $gallery->where('id', $id)->get();
        $data['id'] = $rs->id;
        $data['title_gallery'] = array('name' => 'title_gallery', 'value' => $rs->title, 'class' => 'span7');
        $data['content'] = array('name' => 'content', 'value' => $rs->content, 'class' => 'ckeditor');

        $this->load->view('admin/albums/frm_albums', $data);
    }

    function save_albums() {
        $gallery = new Gallery();
        $this->form_validation->set_rules('title_gallery', 'Title', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('message', '<div class="alert alert-error"><a data-dismiss = "alert" class = "close">&times;</a>' . validation_errors() . '</div>');
            redirect('admin/galleries/albums/add/');
        } else {
            $gallery->title = $this->input->post('title_gallery');
            $gallery->slug = preg_replace("![^a-z0-9]+!i", "-", slug($this->input->post('title_gallery')));
            $gallery->content = $this->input->post('content');
            $gallery->created_at = date('c');
            $gallery->update_at = date('c');

            if ($gallery->save()) {
                $msg = '<div class="alert alert-success">Created successfuly.</div>';
                $this->session->set_flashdata('message', $msg);
                redirect('admin/galleries/albums');
            }
        }
    }

    function update_albums() {
        $gallery = new Gallery();
        $gallery->where('id', $this->input->post('id'))
                ->update(
                        array(
                            'title' => $this->input->post('title_gallery'),
                            'slug' => preg_replace("![^a-z0-9]+!i", "-", slug($this->input->post('title_gallery'))),
                            'content' => $this->input->post('content'),
                            'updated_at' => date('c')
                        )
        );
        $msg = notice('Update successfuly.', 'success');
        $this->session->set_flashdata('message', $msg);
        redirect('admin/galleries/albums/');
    }

    function photos($parent) {
        $gallery = new Gallery();
        $data['btn_add'] = site_url('admin/galleries/add/' . $parent);
        $data['galleries'] = $gallery->where('parent', $parent)->get();
        $this->load->view('admin/galleries/index', $data);
    }

}