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
class Dashboard_model extends MY_Model{
    public function __construct() {
        parent::__construct();
    }
    
    public function get_summary()
    {
        $this->db->select('count(*) as program, sum(beneficiary) as beneficiary');
        $this->db->from(program_tbl);
        $this->db->where("is_deleted", 0);
        $this->db->order_by('created_date', 'desc');
        $query = $this->db->get();
        
        return $query->row_array();
    }

    public function get_year_data() {
        $query = $this->db->query('SELECT count(*) as programs, c.department, year(a.date) as year
                                    FROM program_tbl a 
                                    inner join implementor_tbl b on a.id = b.program_id
                                    inner join course_tbl c on b.course_id = c.id
                                    where a.is_deleted = 0
                                    group by c.department, year(a.date)');

        return $query->result_array();
    }

    public function get_years() {
        $query = $this->db->query('SELECT distinct(year(date)) as years
                                    FROM program_tbl');

        return $query->result_array();
    }

    public function get_courses() {
        $query = $this->db->query('SELECT distinct(c.acronym) as courses
                                    FROM program_tbl a 
                                    inner join implementor_tbl b on a.id = b.program_id
                                    inner join course_tbl c on b.course_id = c.id
                                    where a.is_deleted = 0');

        return $query->result_array();
    }

}
