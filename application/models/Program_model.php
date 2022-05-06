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
        $this->db->where("is_deleted", 0);
        $this->db->order_by('created_date', 'desc');
        $query = $this->db->get();
        
        return $query->result_array();
    }

    public function get_programs_dean($department)
    {
        $query = $this->db->query('SELECT a.*, group_concat(acronym SEPARATOR ", ") as implementor
                            FROM program_tbl a 
                            inner join implementor_tbl b on a.id = b.program_id
                            inner join course_tbl c on b.course_id = c.id
                            where a.id in (
                                SELECT program_tbl.id
                                FROM `program_tbl` 
                                inner join implementor_tbl on program_tbl.id = implementor_tbl.program_id
                                inner join course_tbl on implementor_tbl.course_id = course_tbl.id
                                where 
                                    implementor_tbl.is_active = 1 and 
                                    course_tbl.department = "'.$department.'"
                            ) and b.is_active = 1 and a.is_deleted = 0
                            group by a.id');

        return $query->result_array();
    }

    public function insert_program($data)
    {
        $this->db->insert(program_tbl, $data);
        return $this->db->insert_id();

    }

    public function update_program($data) {

        $program_id = $data["program_id"];
        $update_data = $data["updated_data"];
        
        $this->db->where('id', $program_id);
        return $this->db->update(program_tbl, $update_data);
    }

    public function add_implementor($data) {
        return $this->db->insert(implementor_tbl, $data);
    }

    public function get_implementor($program_id) {
        $this->db->select('group_concat(acronym SEPARATOR ", ") as implementor');
        $this->db->from(implementor_tbl);
        $this->db->join(course_tbl, implementor_tbl.'.course_id = '.course_tbl.'.id');
        $this->db->where('program_id', $program_id);
        $this->db->group_by('program_id');
        $this->db->where('is_active', 1);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function get_all_implementor($program_id) {
        $this->db->select('*');
        $this->db->from(implementor_tbl);
        $this->db->join(course_tbl, implementor_tbl.'.course_id = '.course_tbl.'.id');
        $this->db->where('program_id', $program_id);
        $this->db->where('is_active', 1);
        $query = $this->db->get();
        return $query->result_array();
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

    public function get_attachments($program_id) {
        $this->db->select('*');
        $this->db->from(attachment_tbl);
        $this->db->where('record_id', $program_id);
        $this->db->where('is_deleted', 0);
        $query = $this->db->get();
        
        return $query->result_array();
    }

    public function insert_implementor($data)
    {
        return $this->db->insert_batch(implementor_tbl, $data);
    }

    public function delete_implementor($data) {
        $update_data = array(
            'is_active' => 0,
        );
        
        $this->db->where('course_id', $data["course_id"]);
        $this->db->where('program_id', $data["program_id"]);
        return $this->db->update(implementor_tbl, $update_data);
    }

    public function delete_attachment($att_id) {
        $data = array(
            'is_deleted' => 1,
        );
        
        $this->db->where('id', $att_id);
        return $this->db->update(attachment_tbl, $data);
    }

    public function delete_program($program_id) {
        $data = array(
            'is_deleted' => 1,
        );
        
        $this->db->where('id', $program_id);
        return $this->db->update(program_tbl, $data);
    }
}
