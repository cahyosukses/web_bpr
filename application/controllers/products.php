<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Products extends CI_Controller {

    public function index($name='') {
        $data['title'] = "PD BPR KAB BANDUNG";
        $data['class'] = 'Products';
        $data['content_product'] = '';
        $this->load->view('products', $data);
    }

    public function get_detail($slug) {
        $product = new Category();
        $rs = $product->where('slug', $slug)->get();
        $data['class'] = 'Products';
        $data['content_product'] = $rs->content;
        $this->load->view('products', $data);
    }

    public function simulasi_kredit(){
        $data['class'] = 'Simulator';
        $data['pinjaman'] = $this->input->post('pinjaman');
        $data['suku_bunga'] = $this->input->post('suku_bunga');
        $data['jangka_waktu'] = $this->input->post('jangka_waktu');
        $data['jenis_bunga'] = $this->input->post('jenis_bunga');

        switch($data['jenis_bunga']){
            case 'flat':
                $template = 'simulasi_kredit_flat';
                break;
            case 'efektif':
                $template = 'simulasi_kredit_efektif';
                break;
            case 'anuitas':
                $template = 'simulasi_kredit_anuitas';
                break;
            default:
                $template = 'simulasi_kredit';
        }

        $this->load->view($template, $data);
    }

}