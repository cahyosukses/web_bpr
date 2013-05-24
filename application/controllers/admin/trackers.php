<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Trackers extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->session->userdata('logged_in') == true ? '' : redirect('admin/users/sign_in');
    }

    function index(){
        $this->load->view('admin/trackers/index');
    }

}

?>
