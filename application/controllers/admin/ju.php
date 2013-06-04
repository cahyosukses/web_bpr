<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Ju extends CI_Controller {
    public $DB1;
    function __construct() {
        parent::__construct();
        $this->DB1 = $this->load->database('gammu', TRUE);
        $this->session->userdata('logged_in') == true ? '' : redirect('admin/users/sign_in');
    }

    function index() {        
        $this->load->view("admin/ju/index");
    }

    function get_all_for_options() {
        $result = $this->DB1->get("inbox");
        $options = array();
        foreach ($result->result_array() as $row) {
            $options[$row["SenderNumber"]] = $row["SenderNumber"];
        }
        return $options;
    }

}

?>