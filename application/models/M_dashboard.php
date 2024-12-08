<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_dashboard extends CI_Model {

    public function get_dashboard_data() {
        $this->db->select('*');
        $this->db->from('tb_complaint');
        $this->db->where('status !=', 'resolved');
        $this->db->or_where('status IS NULL');
        $this->db->order_by('created_at', 'ASC'); 
        $query = $this->db->get();
        return $query->result();
    }

    public function get_user_statistics() {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_ticket_closed_statistics() {
        $this->db->select('*');
        $this->db->from('tb_complaint');
        $this->db->where('status =', 'resolved');
        // $this->db->order_by('id', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }

    public function getAllTickets() {
        $query = "SELECT * FROM tb_complaint ";
        return $this->db->query($query)->result_array();
    }

    public function getTicketsInProgress() {
        $query = "SELECT * FROM tb_complaint WHERE status != 'resolved' OR status IS NULL ";
        return $this->db->query($query)->result_array();
    }
    

    public function getClosedTickets() {
        $query = "SELECT * FROM tb_complaint WHERE status = 'resolved'";
        return $this->db->query($query)->result_array();
    }

    public function getCancelledTickets() {
        $query = "SELECT * FROM tb_complaint WHERE status = 'cancelled'";
        return $this->db->query($query)->result_array();
    }

}
