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
class Report_model extends MY_Model{
    public function __construct() {
        parent::__construct();
    }
    
    public function get_report_1()
    {
        $this->db->select('*, 
                            (
                                select group_concat(acronym SEPARATOR ", ") 
                                from implementor_tbl a 
                                left join course_tbl b on a.course_id = b.id
                                where a.program_id = main.id
                            ) as implementor');
        $this->db->from(program_tbl.' as main');
        $this->db->where("is_deleted", 0);
        $this->db->order_by('created_date', 'desc');
        $query = $this->db->get();
        
        return $query->result_array();
    }
}
