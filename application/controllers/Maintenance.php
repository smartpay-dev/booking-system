<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Maintenance extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('M_maintenance');
    }

    public function index() {
        if (!$this->session->userdata('logged_in')) {
            redirect('login');
        }
        
        $data['title'] = 'Maintenance Dashboard';
        $data['active_page'] = 'maintenance_dashboard';
        $data['content'] = 'maintenance/index';

        $this->load->view('templates/main', $data);
    }
    

}