<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Peoples extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('html');
    }

    public function show($name) {
        $people = new People();
        $rs = $people->where('slug', $name)->get();
        $data['name'] = $rs->name;
        $data['about_me'] = $rs->about_me;
        $data['profile_pic'] = img('./assets/upload/peoples/' . $rs->profile_pic);
        $data['background'] = img('./assets/upload/peoples/' . $rs->photo_bg);
        $this->load->view('peoples', $data);
    }

}