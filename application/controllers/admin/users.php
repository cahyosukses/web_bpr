<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Users extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->load->view('admin/users', $data);
    }

    function sign_in() {
        $data['title'] = "Users Sign in";
        $data['form_action'] = site_url('admin/users/process_login');

        $this->load->view('admin/users/sign_in', $data);
    }

    function sign_up() {
        $data['title'] = "Users Sign Up";
        $data['form_action'] = site_url('admin/users/save');
        $this->load->view('admin/users/sign_up', $data);
    }

    function save() {
        $user = new User();
        $user->username = $this->input->post('username');
        $user->password = md5($this->input->post('password'));
        if ($user->save()) {
            $msg = '<div class="notice notice-error">User sudah dibuat silahkan login!</div>';
            $this->session->set_flashdata('message', $msg);

            redirect('admin/users/sign_in/');
        } else {
            $msg = '<div class="alert alert-error">Periksa Username dan Password!</div>';
            $this->session->set_flashdata('message', $msg);
            redirect('admin/users/sign_up/');
        }
    }

    function sign_out() {
        $this->session->sess_destroy();
        redirect('admin/users/sign_in');
    }

    function process_login() {
        $user = new User();
        $username = $this->input->post('username', TRUE);
        $password = $this->input->post('password', TRUE);

        $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');


        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('message', '<div class="alert alert-error">' . validation_errors() . '</div>');
            redirect('admin/users/sign_in/');
        } else {
            # Periksa Login Untuk Administrator #
            if ($user->check_user($username, $password) == TRUE) {
                $userdata = array(
                    'username' => $username,
                    'logged_in' => TRUE
                );
                $this->session->set_userdata($userdata);
                redirect('admin/welcome');
            } else {
                # jika login username dan pass tidak sama #
                //$msg = '<div class="error_login"></div>';
                $msg = '<div class="alert alert-error">Periksa Username dan Password!</div>';
                $this->session->set_flashdata('message', $msg);
                redirect('admin/users/sign_in/');
            }
        }
    }

}