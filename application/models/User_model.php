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
                ->from(account_tbl)
                ->where('username', $username)
                ->where('password', $this->encrypt_pass($pass));
        $query = $this->db->get();
        
        return $query->row_array();
    }
    
    public function check_username($username)
    {
        $this->db->select('*')
                ->from(account_tbl)
                ->where('username', $username);
        $query = $this->db->get();
        
        return $query->row_array();
    }
    
    public function check_pass($username,$pass)
    {
        $this->db->select('*')
                ->from(account_tbl)
                ->where('username', $username)
                ->where('password', md5($pass));
        $query = $this->db->get();
        
        return (count($query->row_array()) !== 0) ? TRUE : FALSE;
    }
    
    
}
