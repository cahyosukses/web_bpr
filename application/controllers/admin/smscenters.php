<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Smscenters extends CI_Controller {

    private $limit = 20;

    function __construct() {
        parent::__construct();
        $this->load->model('Smscenter');
        $this->session->userdata('logged_in') == true ? '' : redirect('admin/users/sign_in');
    }

    function inbox() {
        $config = array(
            'base_url' => site_url() . 'admin/smscenters/inbox/',
            'total_rows' => $this->db->count_all('inbox'),
            'per_page' => 5,
            'uri_segment' => 3
        );
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();
        $data['get_inbox'] = $smscenter->read_inbox($config['per_page'], $this->uri->segment(4));
        $this->load->view('admin/smscenter/inbox', $data);
    }

    function outbox() {
        $config = array(
            'base_url' => site_url() . 'admin/smscenters/outbox/',
            'total_rows' => $this->db->count_all('sentitems'),
            'per_page' => 5,
            'uri_segment' => 3
        );
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();
        $data['get_'] = $smscenter->read_inbox($config['per_page'], $this->uri->segment(4));

        $this->load->view('admin/smscenter/outbox', $data);
    }

    function send_messages() {
        $this->Smscenter->send_message();
        redirect('admin/smscenters/inbox/');
    }

}

?>
