<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Welcome extends CI_Controller {
	function __construct(){
	    parent::__construct();
	    $this->session->userdata('logged_in') == true ? '' : redirect('admin/users/sign_in');
	}

    public function index() {
        $data['title'] = "PD BPR KAB BANDUNG";
        $this->load->view('admin/welcome', $data);
    }

}