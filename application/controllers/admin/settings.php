<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Settings extends CI_Controller {

    private $limit = 100;

    function __construct() {
        parent::__construct();
        $this->load->model("Setting");
        $this->load->database('gammu', TRUE);
        $this->session->userdata('logged_in') == true ? '' : redirect('admin/users/sign_in');
    }

    public function index($offset = 0) {
        $setting = new Setting();

        switch ($this->input->get('c')) {
            case "1":
                $data['col'] = "name";
                break;
            case "2":
                $data['col'] = "value";
                break;
            case "3":
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

        $data['btn_home'] = anchor(base_url(), 'Home', "class='btn btn-home'");

        $uri_segment = 4;
        $offset = $this->uri->segment($uri_segment);
        $data['q'] = $this->input->get('q');
        if ($data['q']) {
            $total_rows = $setting->like('name', $data['q'])->count();
            $setting->like('name', $data['q'])->order_by($data['col'], $data['dir']);
        } else {
            $total_rows = $setting->count();
            $setting->order_by($data['col'], $data['dir']);
        }

        $data['settings'] = $setting->get($this->limit, $offset)->all;

        $config['base_url'] = site_url("admin/settings/index");
        $config['total_rows'] = $total_rows;
        $config['per_page'] = $this->limit;
        $config['uri_segment'] = $uri_segment;
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();

        $this->load->view('admin/setting/index', $data);
    }

    function add() {
        $data['form_action'] = site_url('admin/settings/save');
        $data['id'] = '';
        $data['status'] = '';
        $data['name'] = array('name' => 'name', 'placeholder' => 'Name for Key', 'class' => 'span4');
        $data['content'] = array('name' => 'content');
        $data['btn_back'] = site_url('admin/settings/');
        $this->load->view('admin/setting/frm_setting', $data);
    }

    function edit($id) {
        $setting = new Setting();
        $rs = $setting->where('id', $id)->get();
        $data['form_action'] = site_url('admin/settings/update');

        $data['id'] = $id;
        $data['status'] = $rs->type;
        $data['name'] = array('name' => 'name', 'placeholder' => 'Name for Key', 'class' => 'span4', 'value' => $rs->name);
        $data['content'] = array('name' => 'content', 'value' => $rs->value);
        $data['btn_back'] = site_url('admin/settings/');
        $this->load->view('admin/setting/frm_setting', $data);
    }

    function save() {
        $setting = new Setting();

        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('status', 'Type for content', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('message', '<div class="alert alert-error"><a data-dismiss = "alert" class = "close">&times;</a>' . validation_errors() . '</div>');
            redirect('admin/settings/add');
        } else {
            if ($setting->exists_record('name', $this->input->post('name')) == TRUE) {
                $this->session->set_flashdata('message', '<div class="alert alert-error">Record Exists, please change another name.</div>');
                redirect('admin/settings/add');
            } else {
                $setting->name = $this->input->post('name');
                $setting->created_at = date('c');

                if ($this->input->post('status') == 'images') {
                    // upload photo
                    $config['upload_path'] = 'assets/upload/settings';
                    $config['allowed_types'] = 'gif|jpg|png|bmp';
                    $this->load->library("upload", $config);
                    if ($this->upload->do_upload("content")) {
                        $data = $this->upload->data();
                        $setting->value = $data["file_name"];
                    } else {
                        print_r($this->upload->display_errors());
                    }
                    $setting->type = "images";
                } else {
                    $setting->type = "text";
                    $setting->value = $this->input->post('content');
                }

                if ($setting->save()) {
                    $msg = '<div class="alert alert-success">Created successfuly.</div>';
                    $this->session->set_flashdata('message', $msg);

                    redirect('admin/settings/');
                }
            }
        }
    }

    function update() {
        $setting = new Setting();
        // upload photo
        $config['upload_path'] = 'assets/upload/settings';
        $config['allowed_types'] = 'gif|jpg|png|bmp';
        $this->load->library("upload", $config);
        if ($this->upload->do_upload("content")) {
            $data = $this->upload->data();
        } else {
            //print_r($this->upload->display_errors());
        }

        $setting->where('id', $this->input->post('id'))
                ->update(array(
                    'name' => $this->input->post('name'),
                    'value' => $data["file_name"] == '' ? $this->input->post('content') : $data["file_name"],
                    'updated_at' => date('c')
                        )
        );

        $msg = '<div class="alert alert-success">Update successfuly.</div>';
        $this->session->set_flashdata('message', $msg);
        redirect('admin/settings/');
    }

    function delete($id) {
        $setting = new Setting();
        $setting->_delete($id);
        redirect('admin/settings/');
    }

}