<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of dent_model
 *
 * @author DRAINWIZ-pc
 */
class User_model extends MY_Model{
    public function __construct() {
        parent::__construct();
    }
    
    public function get_sign_in_data($username,$pass)
    {
        $this->db->select('*')
                ->from(user_tbl)
                ->where('username', $username)
                ->where('password', md5($pass))
                ->where('is_active', 1);
        $query = $this->db->get();
        
        return $query->row_array();
    }
    
    public function check_username($username)
    {
        $this->db->select('*')
                ->from(user_tbl)
                ->where('username', $username)
                ->where('is_active', 1);
        $query = $this->db->get();
        
        return is_null($query->row_array()) ? [] : $query->row_array();
    }
    
    public function check_pass($username,$pass)
    {
        $this->db->select('*')
                ->from(user_tbl)
                ->where('username', $username)
                ->where('password', md5($pass))
                ->where('is_active', 1);
        $query = $this->db->get();
        
        return (count($query->row_array()) !== 0) ? TRUE : FALSE;
    }
    
    public function get_users($user_id = null)
    {
        if ($user_id) {
            $this->db->select(
                'id,
                first_name,
                middle_name,
                last_name,
                username,
                type,
                is_active,
                created_by,
                created_date,
                modified_by,
                modified_date'
            )->where("id", $user_id);

        } else {
            $this->db->select(
                'id,
                concat(first_name," ",last_name) as full_name,
                username,
                type,
                is_active,
                created_by,
                created_date,
                modified_by,
                modified_date'
            );
        }
        
        $this->db->from(user_tbl);
        $query = $this->db->get();
        
        return $query->result_array();
    }

    public function insert_user()
    {
        $data = array(
            'first_name' => $this->input->post("first_name"),
            'middle_name' => $this->input->post("middle_name"),
            'last_name' => $this->input->post("last_name"),
            'username' => $this->input->post("username"),
            'password' => $this->input->post("password"),
            'type' => $this->input->post("type"),
            'is_active' => 1,
            'created_date' => $this->get_current_date(),
            'created_by' =>  $this->session->userdata('user_data')['id'] 
        );
        
        return $this->db->insert(user_tbl, $data);
    }


    public function get_college() {
        $this->db->select('distinct(department) as colleges')
                ->from(course_tbl);
        $query = $this->db->get();
        
        return $query->result_array();
    }
}
