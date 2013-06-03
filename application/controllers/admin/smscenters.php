<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Smscenters extends CI_Controller {

    private $limit = 20;
    private $DB1;
    private $ussi;

    function __construct() {
        parent::__construct();
        $this->load->library('gammu');
        $this->session->userdata('logged_in') == true ? '' : redirect('admin/users/sign_in');
    }

    function inbox() {
        $inbox = new Gaminbox();
        $ussi_tab = new Ussitabungan();

        $uri_segment = 3;
        $offset = $this->uri->segment($uri_segment);

        $config = array(
            'base_url' => site_url() . 'admin/smscenters/inbox/',
            'total_rows' => $inbox->count(),
            'per_page' => 5,
            'uri_segment' => 3
        );
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();
        $data['get_inbox'] = $inbox->get($this->limit, $this->uri->segment(4))->all;
        $this->load->view('admin/smscenter/inbox', $data);
    }

    function outbox() {
        $outbox = new Gamoutbox();
        $config = array(
            'base_url' => site_url() . 'admin/smscenters/outbox/',
            'total_rows' => $outbox->count(),
            'per_page' => 5,
            'uri_segment' => 3
        );
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();
        $data['get_sentitems'] = $outbox->get($this->limit, $this->uri->segment(3))->all;


        $this->load->view('admin/smscenter/outbox', $data);
    }

    function send_messages() {
        redirect('admin/smscenters/inbox/');
    }

    function config() {
        $gammuurc = read_file('.\Gammu-1.32.0\bin\gammurc');
        $gammusmsdrc = read_file('.\Gammu-1.32.0\bin\smsdrc');
        $data['services_gammu'] = $this->gammu->checking_gammu_service();
//        $data['install_gammu'] = $this->Smscenter->run_gammu_service('stop');
        $data['gammu_identify'] = $this->gammu->run_gammu_service('identify');

        $data['gammuurc'] = array('name' => 'gammuurc', 'value' => $gammuurc, 'class' => 'input-block-level', 'rows' => '15');
        $data['gammusmsdrc'] = array('name' => 'gammusmsdrc', 'value' => $gammusmsdrc, 'class' => 'input-block-level', 'rows' => '15');

        $this->load->view('admin/smscenter/setup_gammu', $data);
    }

    function save_gammu_config() {
        $gammuurc = $this->input->post('gammuurc');
        $gammusmsdrc = $this->input->post('gammusmsdrc');
        $msg_gammu = $this->gammu->save_gammu_config($gammuurc, $gammusmsdrc);
        $msg = '<div class="alert alert-success">' . $msg_gammu . '</div>';
        $this->session->set_flashdata('message', $msg);
        redirect('admin/smscenters/config/');
    }

    function replay($id) {
        $query = $this->DB1->query('SELECT * FROM inbox WHERE ID = ' . $id);
        $row = $query->row();

        $data['sender_number'] = array('name' => 'sender_number', 'class' => 'input-block-level', 'value' => $row->SenderNumber);
        $data['sender_msg'] = array('name' => 'sender_msg', 'class' => 'input-block-level', 'rows' => 3, 'value' => $row->TextDecoded);
        $data['re_msg'] = array('name' => 're_msg', 'class' => 'input-block-level', 'rows' => 3);
        $this->load->view('admin/smscenter/replay', $data);
    }

    function delete($id) {
        $smscenter = new Smscenter();
        $smscenter->_delete($id, 'inbox');
        redirect('admin/smscenters/inbox');
    }

    function get_queue_messages() {
        $inbox = new Gaminbox();
        sleep(1);
        echo $inbox->count();
    }

    function get_queue_inbox() {
        $outbox = new Gamoutbox();
        sleep(1);
        $data['get_inbox'] = $outbox->order_by('ID DESC')->get('5')->all;
        $this->load->view('admin/smscenter/js_inbox', $data);
    }

    function service_gammu($status) {
        $result = $this->gammu->run_gammu_service($status);
        echo $result;
    }

}

?>
