<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('M_user');
    }

    public function index() {
        if ($this->session->userdata('logged_in')) {
            redirect('complaint');
        }
        $this->load->view('auth/v_login');
    }

    public function login() {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->M_user->getUserByUsername($username);

        if ($user && password_verify($password, $user['password'])) {
            $user_data = [
                'id' => $user['id'],
                'username' => $user['username'],
                'user_level' => $user['user_level'],
                'logged_in' => TRUE
            ];
            $this->session->set_userdata($user_data);
            redirect('complaint');
        } else {
            $this->session->set_flashdata('error', 'Invalid username or password');
            redirect('auth');
        }
    }

    public function logout() {
        $this->session->unset_userdata(['id', 'username', 'user_level', 'logged_in']);
        redirect('auth');
    }
}
