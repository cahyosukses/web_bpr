<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Welcome extends CI_Controller {
	function __construct(){
	    parent::__construct();
	    $this->session->userdata('logged_in') == true ? '' : redirect('admin/users/sign_in');
	}

    public function index() {
        $news = new Post();
        $inbox = new MInbox();
        $data['news'] = $news->get('3')->all;
//        $data['get_inbox'] = $this->db->get('inbox', 3);
        $data['get_inbox'] = $inbox->order_by('ID DESC')->get('5')->all;
        $this->load->view('admin/welcome', $data);
    }

}