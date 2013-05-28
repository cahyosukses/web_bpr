<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Welcome extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('html');
    }

    public function index() {
        $setting = new Setting();
        $post = new Post();
        $banners = new Banner();

        $data['news'] = $post->get('3')->all;
        $data['banners'] = $banners->get('5')->all;

        $data["class"] = "Home";
        $data['moto'] = $setting->get_val("MOTO");

        $this->load->view('welcome_message', $data);
    }

    public function news($slug) {
        $posts = new Post();
        $rs = $posts->where('slug', $slug)->get();
        $data['class'] = "Home";
        $data['title_news'] = $rs->title;
        $data['image_news'] = $rs->images;
        $data['content_news'] = $rs->content;
        $data['dir'] = 'news';
        $data['width'] = '300';
        $data['height'] = '400';

        $this->load->view('detail_public', $data);
    }

    public function promos($slug) {
        $banners = new Banner();
        $rs = $banners->where('slug', $slug)->get();
        $data['class'] = "Home";
        $data['title_news'] = $rs->title;
        $data['image_news'] = $rs->images;
        $data['content_news'] = $rs->content;
        $data['dir'] = 'banners';
        $data['width'] = '350';
        $data['height'] = '250';
        $this->load->view('detail_public', $data);
    }

    public function people($name) {
        $people = new People();
        $rs = $people->where('slug', $name)->get();

        $image_properties_pic = array(
            'src' => 'assets/upload/peoples/' . $rs->profile_pic,
            'alt' => $rs->name,
            'id' => 'full-screen-background-image'
        );
        $image_properties_bg = array(
            'src' => 'assets/upload/peoples/' . $rs->photo_bg,
            'alt' => $rs->name,
            'id' => 'full-screen-background-image'
        );

        $data['name'] = $rs->name;
        $data['about_me'] = $rs->about_me;
        $data['profile_pic'] = img($image_properties_pic);
        $data['background'] = img($image_properties_bg);
        $this->load->view('peoples', $data);
    }

    public function get_time_server() {
        echo date('H:i:s');
    }

    public function leader_of_the_month() {
        $data['class'] = "Pinca";
        $this->load->view('leader_of_the_month', $data);
    }

    public function technical_support() {
        $data['class'] = "Support";
        $this->load->view('technical_support', $data);
    }

}
