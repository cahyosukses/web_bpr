<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Suggestions extends CI_Controller {

    private $limit = 20;

    function __construct() {
        parent::__construct();
        $this->session->userdata('logged_in') == true ? '' : redirect('admin/users/sign_in');
    }

    public function index() {
        $setting = new Setting();
        $data['title'] = $setting->get_val('TITLE');

        $contact = new Contact();
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

        if ($this->input->get('search_by')) {
            $total_rows = $contact->like($_GET['search_by'], $_GET['q'])->count();
            $contact->like($_GET['search_by'], $_GET['q'])->order_by($data['col'], $data['dir']);
        } else {
            $total_rows = $contact->count();
            $contact->order_by($data['col'], $data['dir']);
        }

        $data['contacts'] = $contact->get($this->limit, $offset)->all;

        $config['base_url'] = site_url("admin/suggestions/index/");
        $config['total_rows'] = $total_rows;
        $config['per_page'] = $this->limit;
        $config['uri_segment'] = $uri_segment;
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();

        $this->load->view('admin/suggestions/index', $data);
    }

    function add() {
        $setting = new Setting();
        $data['title'] = $setting->get_val('TITLE');

        $data['form_action'] = site_url('admin/suggestions/save');
        $data['id'] = '';
        $data['name'] = array('name' => 'name', 'class' => 'span5');
        $data['no_rek'] = array('name' => 'no_rek', 'class' => 'span5');
        $data['phone'] = array('name' => 'phone', 'class' => 'span5');
        $data['email'] = array('name' => 'email', 'class' => 'span5');
        $data['subject'] = array('name' => 'subject', 'class' => 'span5');
        $data['comment'] = array('name' => 'comment', 'class' => 'span5');
        $data['address'] = array('name' => 'address', 'rows' => 5, 'class' => 'span5');

        $this->load->view('admin/suggestions/frm_suggestion', $data);
    }

    function save() {
        $contact = new Contact();

        $branchs->name = $this->input->post('name');
        $branchs->no_rek = $this->input->post('no_rek');
        $branchs->phone = $this->input->post('phone');
        $branchs->email = $this->input->post('email');
        $branchs->subject = $this->input->post('subject');
        $branchs->comment = $this->input->post('comment');
        $branchs->address = $this->input->post('address');
        if ($branchs->save()) {
            $msg = notice('Create successfuly.', 'success');
            $this->session->set_flashdata('message', $msg);
            redirect('admin/suggestions/');
        }
    }

    function edit($id) {
        $setting = new Setting();
        $data['title'] = $setting->get_val('TITLE');

        $contact = new Contact();

        $data['form_action'] = site_url("admin/suggestions/update");

        $rs = $branchs->where('id', $id)->get();
        $data['id'] = $rs->id;
        $data['name'] = array('name' => 'name', 'value' => $rs->name, 'class' => 'span5');
        $data['no_rek'] = array('name' => 'no_rek', 'value' => $rs->no_rek, 'class' => 'span5');
        $data['phone'] = array('name' => 'phone', 'value' => $rs->phone, 'class' => 'span5');
        $data['email'] = array('name' => 'email', 'value' => $rs->email, 'class' => 'span5');
        $data['subject'] = array('name' => 'subject', 'value' => $rs->subject, 'class' => 'span5');
        $data['comment'] = array('name' => 'comment', 'value' => $rs->comment, 'class' => 'span5');
        $data['address'] = array('name' => 'address', 'value' => $rs->address, 'rows' => 5, 'class' => 'span5');

        $this->load->view('admin/suggestions/frm_suggestion', $data);
    }

    function update() {
        $contact = new Contact();

        $contact->where('id', $this->input->post('id'))
                ->update(
                        array(
                            'name' => $this->input->post('name'),
                            'no_rek' => $this->input->post('no_rek'),
                            'phone' => $this->input->post('phone'),
                            'email' => $this->input->post('email'),
                            'address' => $this->input->post('address'),
                            'subject' => $this->input->post('subject'),
                            'comment' => $this->input->post('comment')
                        )
        );
        $msg = notice('Update successfuly.', 'success');
        $this->session->set_flashdata('message', $msg);
        redirect('admin/suggestions/');
    }

    public function delete($id) {
        $contact = new Contact();
        $contact->_delete($id);

        redirect('admin/suggestions');
    }

}