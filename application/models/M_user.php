<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_user extends CI_Model {

    public function getUserByUsername($username) {
        $query = $this->db->get_where('tb_user', ['username' => $username]);
        return $query->row_array();
    }
}
