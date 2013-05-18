<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Abouts extends CI_Controller {

    public function index() {
        $data['class'] = 'Abouts';
        $this->load->view('abouts', $data);
    }

}