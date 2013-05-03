<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Contacts extends CI_Controller {

    public function index() {
        $captcha_result = "";
        $data['cap_img'] = $this->make_captcha();
        $data['title'] = "PD BPR KAB BANDUNG";
        $data['class'] = "Contacts";
        $this->load->view('contacts', $data);
    }

    function make_captcha() {
        $this->load->helper('captcha');
        $vals = array(
            'word' => 'BPR',
            'img_path' => './assets/captcha',
            'img_url' => base_url('/assets/captcha'),
            'img_width' => 140,
            'img_height' => 30,
            'border' => 3,
            'expiration' => 7200
        );
        $cap = create_captcha($vals);

        if ($cap) {
            $data = array(
                'captcha_id' => '',
                'captcha_time' => $cap['time'],
                'ip_address' => $this->input->ip_address(),
                'word' => $cap['word']
            );
            $query = $this->db->insert_string('captcha', $data);
            $this->db->query($query);
        } else {
            return "not working!!";
        }
        $this->session->set_userdata('word', $cap['word']);
        return $cap['image'];
    }

    function check_captcha() {
        $expiration = time() - 7200;
        $this->db->query("DELETE FROM captcha WHERE captcha_time < " . $expiration);

        // Then see if a captcha exists:
        $sql = "SELECT COUNT(*) AS count FROM captcha WHERE word = ? AND ip_address = ? AND captcha_time > ?";
        $binds = array($this->input->post('captcha'), $this->input->ip_address(), $expiration);
        $query = $this->db->query($sql, $binds);
        $row = $query->row();
        if ($row->count == 0) {
            return true;
        }
        return false;
    }

    function save() {
        $contact = new Contact();
        $contact->name = $this->input->post('name');
        $contact->no_rek = $this->input->post('no_rek');
        $contact->email = $this->input->post('email');
        $contact->address = $this->input->post('address');
        $contact->phone = $this->input->post('phone');
        $contact->subject = $this->input->post('subject');
        $contact->comment = $this->input->post('comment');


        if ($this->input->post('submit')) {
            if ($this->input->post('captcha') == $this->session->userdata('word')) {
                if ($contact->save()) {
                    //$this->session->sess_destroy('word');
                    $this->session->set_flashdata('message', '<div class="msg_alert_success">Permintaan anda sudah terkirim!</div>');
                    redirect('contacts/');
                } else {
                    // Failed
                    $contact->error_message('custom', 'Contact Name required');
                    $msg = $contact->error->custom;
                    $this->session->set_flashdata('message', $msg);
                    redirect('contacts');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="msg_alert">Periksa kode konfirmasi anda, dan kolom yang diberi tanda bintang harus di isi</div>');
                redirect('contacts/');
            }
        }
    }

}