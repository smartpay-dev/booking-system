<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_assigment extends CI_Model {

    public function get_dashboard_data_teams() {
        $user_teams = $this->session->userdata('user_teams');
        $sql = "
            SELECT *
            FROM `tb_complaint`
            WHERE (`status` NOT IN ('resolved', 'cancelled') OR `status` IS NULL)
            AND `category` = ?
        ";
        $query = $this->db->query($sql, array($user_teams));    
        return $query->result_array();
    }
    
    

    public function get_user_statistics_teams() {
        $username = $this->session->userdata('username');
        $this->db->select('user_teams');
        $this->db->from('tb_user');
        $this->db->where('username', $username);
        $query = $this->db->get();
        return $query->row(); // Ganti ke row() karena hanya ada satu user berdasarkan username
    }

    public function get_ticket_closed_statistics_teams() {
        $user_teams = $this->session->userdata('user_teams');
        $this->db->select('*');
        $this->db->from('tb_complaint');
        $this->db->where('status', 'resolved');
        $this->db->where('category', $user_teams);
        $query = $this->db->get();
        return $query->result();
    }

    public function getAllTickets_teams() {
        $user_teams = $this->session->userdata('user_teams');
    
        // Raw SQL query to fetch all tickets based on category
        $sql = "
            SELECT *
            FROM `tb_complaint`
            WHERE `category` = ?
        ";
    
        // Execute the query with the user_teams value as a parameter to prevent SQL injection
        $query = $this->db->query($sql, array($user_teams));
    
        return $query->result();
    }
    

    public function getTicketsInProgress_teams() {
        $user_teams = $this->session->userdata('user_teams');
    
        // Raw SQL query to fetch tickets where status is not resolved and status is NULL
        $sql = "
            SELECT *
            FROM `tb_complaint`
            WHERE (`status` NOT IN ('resolved', 'cancelled') OR `status` IS NULL)
            AND `category` = ?
        ";
    
        // Execute the query with the user_teams value as a parameter to prevent SQL injection
        $query = $this->db->query($sql, array($user_teams));
    
        return $query->result();
    }
    

    public function getClosedTickets_teams() {
        $user_teams = $this->session->userdata('user_teams');
    
        // Raw SQL query to fetch closed tickets based on category
        $sql = "
            SELECT *
            FROM `tb_complaint`
            WHERE `status` = 'resolved'
            AND `category` = ?
        ";
    
        // Execute the query with the user_teams value as a parameter to prevent SQL injection
        $query = $this->db->query($sql, array($user_teams));
    
        return $query->result();
    }
    

    public function getCancelledTickets_teams() {
        $user_teams = $this->session->userdata('user_teams');
    
        // Raw SQL query to fetch cancelled tickets based on category
        $sql = "
            SELECT *
            FROM `tb_complaint`
            WHERE `status` = 'cancelled'
            AND `category` = ?
        ";
    
        // Execute the query with the user_teams value as a parameter to prevent SQL injection
        $query = $this->db->query($sql, array($user_teams));
    
        return $query->result();
    }
    
}
