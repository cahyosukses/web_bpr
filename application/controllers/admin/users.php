<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Users extends CI_Controller {

    private $limit = 10;

    function __construct() {
        parent::__construct();
    }

    public function index() {
        $user = new User();
        switch ($this->input->get('c')) {
            case "1":
                $data['col'] = "full_name";
                break;
            case "2":
                $data['col'] = "username";
                break;
            case "3":
                $data['col'] = "email";
                break;
            case "4":
                $data['col'] = "created_at";
                break;
            case "5":
                $data['col'] = "id";
                break;
            default:
                $data['col'] = "id";
        }

        if ($this->input->get('d') == "1") {
            $data['dir'] = "DESC";
        } else {
            $data['dir'] = "ASC";
        }

        $uri_segment = 3;
        $offset = $this->uri->segment($uri_segment);
        $data['q'] = $this->input->get('q');
        if ($data['q']) {
            $total_rows = $user->like('username', $data['q'])->count();
            $user->like('username', $data['q'])->order_by($data['col'], $data['dir']);
        } else {
            $total_rows = $user->count();
            $user->order_by($data['col'], $data['dir']);
        }

        $data['users'] = $user->get($this->limit, $offset)->all;

        $config['base_url'] = site_url("admin/users/index/");
        $config['total_rows'] = $total_rows;
        $config['per_page'] = $this->limit;
        $config['uri_segment'] = $uri_segment;
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();

        $this->load->view('admin/users/index', $data);
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