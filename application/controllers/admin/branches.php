<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Branches extends CI_Controller {

    private $limit = 20;

    function __construct() {
        parent::__construct();
        $this->session->userdata('logged_in') == true ? '' : redirect('admin/users/sign_in');
    }

    public function index() {
        $setting = new Setting();
        $data['title'] = $setting->get_val('TITLE');

        $branchs = new Branch();
        switch ($this->input->get('c')) {
            case "1":
                $data['col'] = "name";
                break;
            case "2":
                $data['col'] = "phone";
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
            $total_rows = $branchs->like('name', $data['q'])->count();
            $branchs->like('name', $data['q'])->order_by($data['col'], $data['dir']);
        } else {
            $total_rows = $branchs->count();
            $branchs->order_by($data['col'], $data['dir']);
        }

        $data['branchs'] = $branchs->get($this->limit, $offset)->all;

        $config['base_url'] = site_url("admin/branches/index/");
        $config['total_rows'] = $total_rows;
        $config['per_page'] = $this->limit;
        $config['uri_segment'] = $uri_segment;
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();

        $this->load->view('admin/branchs/index', $data);
    }

    function add() {
        $setting = new Setting();
        $data['title'] = $setting->get_val('TITLE');

        $data['form_action'] = site_url('admin/branches/save');
        $data['id'] = '';
        $data['name'] = array('name' => 'name', 'class' => 'span5');
        $data['phone'] = array('name' => 'phone', 'class' => 'span5');
        $data['address'] = array('name' => 'address', 'rows' => 5, 'class' => 'span5');

        $this->load->view('admin/branchs/frm_branchs', $data);
    }

    function save() {
        $branchs = new Branch();
        $branchs->name = $this->input->post('name');
        $branchs->phone = slug($this->input->post('phone'));
        $branchs->address = $this->input->post('address');
        if ($branchs->save()) {
            $msg = notice('Create successfuly.', 'success');
            $this->session->set_flashdata('message', $msg);
            redirect('admin/branches/');
        }
    }

    function edit($id) {
        $setting = new Setting();
        $data['title'] = $setting->get_val('TITLE');
        $branchs = new Branch();

        $data['form_action'] = site_url("admin/branches/update");

        $rs = $branchs->where('id', $id)->get();
        $data['id'] = $rs->id;
        $data['name'] = array('name' => 'name', 'value' => $rs->name, 'class' => 'span5');
        $data['phone'] = array('name' => 'phone', 'value' => $rs->phone, 'class' => 'span5');
        $data['address'] = array('name' => 'address', 'value' => $rs->address, 'rows' => 5, 'class' => 'span5');

        $this->load->view('admin/branchs/frm_branchs', $data);
    }

    function update() {
        $branchs = new Branch();

        $branchs->where('id', $this->input->post('id'))
                ->update(
                        array(
                            'name' => $this->input->post('name'),
                            'phone' => slug($this->input->post('phone')),
                            'address' => $this->input->post('address')
                        )
        );
        $msg = notice('Update successfuly.', 'success');
        $this->session->set_flashdata('message', $msg);
        redirect('admin/branches/');
    }

    public function delete($id) {
        $branchs = new Branch();
        $branchs->_delete($id);

        redirect('admin/branches');
    }

}