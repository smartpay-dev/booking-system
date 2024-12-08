<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('M_dashboard');
    }

    public function index() {
        if (!$this->session->userdata('logged_in')) {
            redirect('login');
        }

        $data['title'] = 'Dashboard';
        $data['active_page'] = 'dashboard';
        $data['dashboard_data'] = $this->M_dashboard->get_dashboard_data();
        $data['count_all_data'] = $this->M_dashboard->getAllTickets();
        $data['count_data_progress'] = $this->M_dashboard->getTicketsInProgress();
        $data['count_data_closed'] = $this->M_dashboard->getClosedTickets();
        $data['count_data_cancelled'] = $this->M_dashboard->getCancelledTickets();
        $data['content'] = 'dashboard/index';

        $this->load->view('templates/main', $data);
        $this->load->view('templates/v_footer');
        $this->load->view('templates/v_header');
        // $this->load->view('templates/v_footer');
    }

}
