<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MY_Model
 *
 * @author Paul's Hardware
 */
class MY_Model extends CI_Model{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function decrypt_pass($pass)
    {   
        $password = "";
        for ($i = 0; $i < strlen($pass); $i++) {
            $password .= ($i % 2 === 0) ? chr(ord($pass[$i])-2) : chr(ord($pass[$i])-3);
        }
        return $password;
    }
    
    public function encrypt_pass($pass)
    {   
        $password = "";
        for ($i = 0; $i < strlen($pass); $i++) {
            $password .= ($i % 2 === 0) ? chr(ord($pass[$i])+2) : chr(ord($pass[$i])+3);
        }
        return $password;
    }
    
    public function get_current_date()
    {
        $now = new DateTime();
        return $now->format("Y-m-d H:i:s");
    }
    
     public function get_current_datex()
    {
        $now = new DateTime();
        return $now->format("Y-m-d");
    }
    
    public function get_yearmonth($date)
    {
        $now = new DateTime($date);
        return $now->format("Y-m-d");
    }
    
     public function get_yearmonths($date)
    {
        $now = new DateTime($date);
        return $now->format("Y-m");
    }
}
