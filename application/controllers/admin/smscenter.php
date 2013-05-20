<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Smscenter extends CI_Controller {

    private $limit = 20;

    function __construct() {
        parent::__construct();
        $this->session->userdata('logged_in') == true ? '' : redirect('admin/users/sign_in');
    }
    
    function inbox(){
        $this->load->view('admin/smscenter/inbox');
    }
    
    function outbox(){
        $this->load->view('admin/smscenter/outbox');
    }
    
    function auto_replay(){
        
    }
    

}

?>
