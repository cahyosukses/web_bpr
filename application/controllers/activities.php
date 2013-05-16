<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Activities extends CI_Controller {

    public function index() {
        $gallery = new Gallery();        
        $data['class'] = 'Activities';
        $this->load->view('activities', $data);
    }

}