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
class Beneficiary_model extends MY_Model{
    public function __construct() {
        parent::__construct();
    }
    
    public function get_beneficiaries($beneficiary_id = null)
    {
        $this->db->select(beneficiary_tbl.'.*, program_tbl.title');

        if ($beneficiary_id) {
            $this->db->where(beneficiary_tbl.".id", $beneficiary_id);
        }
        
        $this->db->from(beneficiary_tbl);
        $this->db->join(program_tbl, beneficiary_tbl.'.program_id = '.program_tbl.'.id');
        $this->db->where(beneficiary_tbl.".is_deleted", 0);
        $this->db->where(program_tbl.".is_deleted", 0);
        $this->db->order_by('created_date', 'desc');
        $query = $this->db->get();
        
        return $query->result_array();
    }

    public function insert_beneficiary($data)
    {
        $this->db->insert(beneficiary_tbl, $data);
        return $this->db->insert_id();

    }

    public function update_beneficiary($data) {

        $beneficiary_id = $data["beneficiary_id"];
        $update_data = $data["updated_data"];
        
        $this->db->where('id', $beneficiary_id);
        return $this->db->update(beneficiary_tbl, $update_data);
    }

    public function add_implementor($data) {
        return $this->db->insert(implementor_tbl, $data);
    }

    public function get_implementor($beneficiary_id) {
        $this->db->select('group_concat(acronym SEPARATOR ", ") as implementor');
        $this->db->from(implementor_tbl);
        $this->db->join(course_tbl, implementor_tbl.'.course_id = '.course_tbl.'.id');
        $this->db->where('beneficiary_id', $beneficiary_id);
        $this->db->group_by('beneficiary_id');
        $this->db->where('is_active', 1);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function get_all_implementor($beneficiary_id) {
        $this->db->select('*');
        $this->db->from(implementor_tbl);
        $this->db->join(course_tbl, implementor_tbl.'.course_id = '.course_tbl.'.id');
        $this->db->where('beneficiary_id', $beneficiary_id);
        $this->db->where('is_active', 1);
        $query = $this->db->get();
        return $query->result_array();
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

    public function get_attachments($beneficiary_id) {
        $this->db->select('*');
        $this->db->from(attachment_tbl);
        $this->db->where('record_id', $beneficiary_id);
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
        $this->db->where('beneficiary_id', $data["beneficiary_id"]);
        return $this->db->update(implementor_tbl, $update_data);
    }

    public function delete_attachment($att_id) {
        $data = array(
            'is_deleted' => 1,
        );
        
        $this->db->where('id', $att_id);
        return $this->db->update(attachment_tbl, $data);
    }

    public function delete_beneficiary($beneficiary_id) {
        $data = array(
            'is_deleted' => 1,
        );
        
        $this->db->where('id', $beneficiary_id);
        return $this->db->update(beneficiary_tbl, $data);
    }

    public function delete_beneficiary_pic($beneficiary_id) {
        $data = array(
            'is_deleted' => 1,
        );
        
        $this->db->where('record_id', $beneficiary_id);
        return $this->db->update(attachment_tbl, $data);
    }
}
