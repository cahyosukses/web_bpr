<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Smscenters extends CI_Controller {

    private $limit = 20;

    function __construct() {
        parent::__construct();
        $this->load->helper('file');
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
        $data['get_inbox'] = $this->Smscenter->read_inbox($config['per_page'], $this->uri->segment(4));
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
        $data['get_sentitems'] = $this->Smscenter->read_sentitems($config['per_page'], $this->uri->segment(4));

        $this->load->view('admin/smscenter/outbox', $data);
    }

    function send_messages() {
        $this->Smscenter->send_message();
        redirect('admin/smscenters/inbox/');
    }

    function config() {
        $gammuurc = read_file('./Gammu-1.32.0/bin/gammurc');
        $gammusmsdrc = read_file('./Gammu-1.32.0/bin/smsdrc');
        $data['services_gammu'] = $this->Smscenter->checking_gammu_service();
//        $data['install_gammu'] = $this->Smscenter->run_gammu_service('stop');
        $data['gammu_identify'] = $this->Smscenter->run_gammu_service('identify');

        $data['gammuurc'] = array('name' => 'gammuurc', 'value' => $gammuurc, 'class' => 'input-block-level', 'rows' => '15');
        $data['gammusmsdrc'] = array('name' => 'gammusmsdrc', 'value' => $gammusmsdrc, 'class' => 'input-block-level', 'rows' => '15');

        $this->load->view('admin/smscenter/config_gammu', $data);
    }

    function save_gammu_config() {
        if ($this->input->post('gammuurc')) {
            if (!write_file('./Gammu-1.32.0/bin/gammurc', $this->input->post('gammuurc'))) {
                $msg_gammu = 'Unable to write the file gammuurc';
            } else {
                $msg_gammu = 'File written!';
            }
        }
        if ($this->input->post('gammusmsdrc')) {
            if (!write_file('./Gammu-1.32.0/bin/smsdrc', $this->input->post('gammusmsdrc'))) {
                $msg_gammu = 'Unable to write the file smsdrc';
            } else {
                $msg_gammu = 'File written!';
            }
        }

        $msg = '<div class="alert alert-success">' . $msg_gammu . '</div>';
        $this->session->set_flashdata('message', $msg);
        redirect('admin/smscenters/config/');
    }

    function replay($id) {
        $inbox = new MInbox();
        $rs = $inbox->where('ID', $id)->get();

        $data['sender_number'] = array('name' => 'sender_number', 'class' => 'input-block-level', 'value' => $rs->SenderNumber);
        $data['sender_msg'] = array('name' => 'sender_msg', 'class' => 'input-block-level', 'rows' => 3, 'value' => $rs->TextDecoded);
        $data['re_msg'] = array('name' => 're_msg', 'class' => 'input-block-level', 'rows' => 3);
        $this->load->view('admin/smscenter/replay', $data);
    }

    function delete($id) {
        $smscenter = new Smscenter();
        $smscenter->_delete($id, 'inbox');
        redirect('admin/smscenters/inbox');
    }

    function get_queue_messages() {
        sleep(1);
        echo $this->Smscenter->get_count_outbox();
    }

    function get_queue_inbox() {
        sleep(1);
        $inbox = new MInbox();                
        $data['get_inbox'] = $inbox->order_by('ID DESC')->get('5')->all;
        $this->load->view('admin/smscenter/js_inbox', $data);
    }

    function service_gammu($status) {
        $result = $this->Smscenter->run_gammu_service($status);
        echo $result;
    }

    function install_service_gammu($status) {
        $result = $this->Smscenter->run_gammu_service($status);
        echo $result;
    }

}

?>
