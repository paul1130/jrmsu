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
class Program_model extends MY_Model{
    public function __construct() {
        parent::__construct();
    }
    
    public function get_programs($program_id = null)
    {
        $this->db->select('*');

        if ($program_id) {
            $this->db->where("id", $program_id);
        }
        
        $this->db->from(program_tbl);
        $query = $this->db->get();
        
        return $query->result_array();
    }

    public function insert_program($data)
    {
        $this->db->insert(program_tbl, $data);
        return $this->db->insert_id();

    }

    public function add_implementor($data) {
        return $this->db->insert(implementor_tbl, $data);
    }


    public function update_user($user_id)
    {
        $data = array(
            'asdf' => 1
        );

        $this->db->where('id', $user_id);

        return $this->db->update(user_tbl, $data);
    }

    public function insert_attachment($data)
    {
        return $this->db->insert(attachment_tbl, $data);
    }

    public function get_courses() {
        $this->db->select('*');
        $this->db->from(course_tbl);
        $query = $this->db->get();
        
        return $query->result_array();
    }

    public function insert_implementor($data)
    {
        return $this->db->insert_batch(implementor_tbl, $data);
    }
}
