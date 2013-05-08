<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Welcome extends CI_Controller {

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
        $this->load->view('detail_public', $data);
    }

    public function promos($slug) {
        $banners = new Banner();
        $rs = $banners->where('slug', $slug)->get();
        $data['class'] = "Home";
        $data['title_news'] = $rs->title;
        $data['image_news'] = $rs->images;
        $data['content_news'] = $rs->content;
        $this->load->view('detail_public', $data);
    }

}