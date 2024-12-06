<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('M_user');
    }

    public function index() {
        if (!$this->session->userdata('logged_in')) {
            redirect('login');
        }
        
        $data['title'] = 'User Dashboard';
        $data['active_page'] = 'user_dashboard';
        $data['content'] = 'user/index';

        $this->load->view('templates/main', $data);
    }
    

}