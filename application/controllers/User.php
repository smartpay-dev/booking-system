<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Memuat helper dan library yang diperlukan
        $this->load->helper('url');
        // $this->load->library('session');
        $this->load->model('M_User');  // Pastikan model M_User ada di folder models
    }

    // Fungsi untuk menampilkan dashboard user
    public function index() {
        
        // Mengatur data lainnya jika diperlukan
        $data['title'] = 'User Dashboard';  // Misalnya menambahkan title untuk halaman
        $data['active_page'] = 'user_dashboard';  // Misalnya untuk menandai halaman aktif di navbar
        $data['content'] = 'user/index';

        // Memuat view dengan data yang telah disiapkan
        $this->load->view('templates/main', $data);
    }
    

}