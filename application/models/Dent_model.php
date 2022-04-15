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
class Dent_model extends MY_Model{
    public function __construct() {
        parent::__construct();
    }
    
    public function get_sign_in_data($username,$pass)
    {
        $this->db->select('*')
                ->from(account_tbl)
                ->where('username', $username)
                ->where('password', md5($pass));
        $query = $this->db->get();
        
        return $query->row_array();
    }
    
    public function check_username($username)
    {
        $this->db->select('*')
                ->from(user_tbl)
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
    
    public function get_service() 
    {
        $this->db->select("*")
                ->from(services_tbl)
                ->order_by("createddate","DESC");
                
        $query = $this->db->get();
        
        return $query->result_array();
    }
    
    public function check_service($service)
    {
        $this->db->select("*")
                ->from(services_tbl)
                ->where("description",$service);
        $query = $this->db->get();
        
        return ($query->num_rows()!== 0) ? TRUE : FALSE;
    }
    
    public function check_service_up($service,$scode)
    {
        $this->db->select("*")
                ->from(services_tbl)
                ->where("scode <>",$scode)
                ->where("description",$service);
        $query = $this->db->get();
        
        return ($query->num_rows() !== 0) ? TRUE : FALSE;
    }
    
    public function insert_feedback($email,$message)
    {
        $data = array(
            'email' => $email,
            'message' => $message,
            'createddate' => $this->get_current_date()
        );
        
        return $this->db->insert(feedback_tbl,$data);
    }
    
    public function get_feedbacks()
    {
        $this->db->select("*")
                ->from(feedback_tbl)
                ->order_by("createddate","DESC");
        
        $query = $this->db->get();
        
        return $query->result_array();
    }
    
    public function insert_appointment()
    {
        $date = new DateTime($this->input->post("xdate"));
        $bdate = new DateTime($this->input->post("bdate"));


        $data = array(
            'name' => $this->input->post("name"),
            'bday' => $bdate->format("Y-m-d"),
            'address' => $this->input->post("address"),
            'email' => $this->input->post("emailadd"),
            'gender' => $this->input->post("gender"),
            'contact_no' => $this->input->post("contactno"),
            'appointment_no' => $this->generate_appno(),
            'appointmentdate' => $date->format("Y-m-d"),
            'queue' => $this->input->post("xqueue"),
            'status' => 2,
            'createddate' => $this->get_current_date()
        );
        
        return $this->db->insert(appointment_tbl, $data);
    }

    public function get_appointments() 
    {
        $this->db->select("*")
                ->from(appointment_tbl)
                ->order_by("createddate","DESC");
        
        $query = $this->db->get();
        
        return $query->result_array();
    }

    public function get_app_details($code)
    {
        $this->db->select("*")
                ->from(appointment_tbl)
                ->where("appointment_no",$code);
        
        $query = $this->db->get();
        
        return $query->result_array();
    }
    
    public function approve_appointment($code)
    {
        $data = array(
            'status' => 1
        );

        $this->db->where('appointment_no', $code);
        
        return $this->db->update(appointment_tbl, $data);
    }


    public function check_app_availability($details)
    {
        $this->db->select("*")
                ->from(appointment_tbl)
                ->where("appointmentdate",$details[0]["appointmentdate"])
                ->where("queue",$details[0]["queue"])
                ->where("status",1);

        $query = $this->db->get();
        
        return ($query->num_rows() !== 0) ? FALSE : TRUE;
    }
    
    
    public function cancel_appointment($code)
    {
         $data = array(
            'status' => 0
        );
        $this->db->where('appointment_no', $code);
        
        return $this->db->update(appointment_tbl, $data);
    }
    
    public function delete_appointment($code)
    {
        $this->db->where('appointment_no', $code);
        return $this->db->delete(appointment_tbl);
    }
    
    public function insert_patient()
    {
        $data = array(
            'appointment_id' => $this->input->post("id"),
            'status' => 0,
            'createddate' => $this->get_current_date()
        );
        
        return $this->db->insert(pat_tbl, $data);
    }
    
    public function insert_pat_medicine()
    {
        $data = array(
            'pat_id' => $this->input->post("id"),
            'mcode' => $this->input->post("mcode"),
            'quantity' => $this->input->post("qty"),
            'dose' => $this->input->post("dose"),
            'remarks' => $this->input->post("remarks"),
            'createddate' => $this->get_current_date()
        );
        
        return $this->db->insert(pat_medicine_tbl, $data);
    }
    
    public function insert_pat_services()
    {
        $data = array(
            'pat_id' => $this->input->post("id"),
            'scode' => $this->input->post("scode"),
            'createddate' => $this->get_current_date()
        );
        
        return $this->db->insert(pat_medicine_tbl, $data);
    }
    
    
    public function get_medicines() 
    {
        $this->db->select("*")
                ->from(medicine_tbl)
                ->order_by("createddate","DESC");
        
        $query = $this->db->get();
        
        return $query->result_array();
    }

    public function get_medicine_price($code)
    {
        $this->db->select("*")
                ->from(medicine_tbl)
                ->where("mcode",$code);
        
        $query = $this->db->get();
        
        return $query->row_array();
    }

    public function get_service_price($code)
    {
        $this->db->select("*")
                ->from(services_tbl)
                ->where("scode",$code);
        
        $query = $this->db->get();
        
        return $query->row_array();
    }
    
    public function insert_medicine()
    {
        $data = array(
            'mcode' => $this->generate_mcode(),
            'description' => $this->input->post("description"),
            'price' => $this->input->post("price"),
            'createddate' => $this->get_current_date()
        );
        
        return $this->db->insert(medicine_tbl, $data);
    }
    
    public function modify_medicine($code)
    {
        $data = array(
            'description' => $this->input->post("description"),
            'price' => $this->input->post("price"),
            'createddate' => $this->get_current_date()
        );
        $this->db->where('mcode', $code);
        
        return $this->db->update(medicine_tbl, $data);
    }
    
    public function delete_medicine($code)
    {
        $this->db->where('mcode', $code);
        return $this->db->delete(medicine_tbl);
    }
    
    public function check_medicine($medicine)
    {
        $this->db->select("*")
                ->from(medicine_tbl)
                ->where("description",$medicine);
        $query = $this->db->get();
        
        return ($query->num_rows()!== 0) ? TRUE : FALSE;
    }
    
    public function check_medicine_up($desc,$scode)
    {
        $this->db->select("*")
                ->from(medicine_tbl)
                ->where("mcode <>",$scode)
                ->where("description",$desc);
        $query = $this->db->get();
        
        return ($query->num_rows()!== 0) ? TRUE : FALSE;
    }


    public function insert_service()
    {
        $data = array(
            'scode' => $this->generate_scode(),
            'description' => $this->input->post("service"),
            'price' => $this->input->post("price"),
            'createddate' => $this->get_current_date()
        );
        
        return $this->db->insert(services_tbl, $data);
    }
    
    public function delete_service($code)
    {
        $this->db->where('scode', $code);
        return $this->db->delete(services_tbl);
    }
    
    public function modify_service($code)
    {
        $data = array(
            'description' => $this->input->post("service"),
            'price' => $this->input->post("price"),
        );
        $this->db->where('scode', $code);
        
        return $this->db->update(services_tbl, $data);
    }
    
    
    public function generate_scode()
    {
        $now = new DateTime();
        $this->db->select("id")->from(services_tbl)->limit(1)->order_by("createddate","DESC");
        $query = $this->db->get();
        $id = $query->row_array();
        return "SC".$now->format("Ymd").str_pad(intval($id["id"])+1, 5, "0", STR_PAD_LEFT);
    }
    
    public function generate_mcode()
    {
        $now = new DateTime();
        $this->db->select("id")->from(medicine_tbl)->limit(1)->order_by("createddate","DESC");
        $query = $this->db->get();
        $id = $query->row_array();
        return "MD".$now->format("Ymd").str_pad(intval($id["id"])+1, 5, "0", STR_PAD_LEFT);
    }

    public function generate_appno()
    {
        $now = new DateTime();
        $this->db->select("id")->from(appointment_tbl)->limit(1)->order_by("createddate","DESC");
        $query = $this->db->get();
        $id = $query->row_array();
        return "AP".$now->format("Ymd").str_pad(intval($id["id"])+1, 5, "0", STR_PAD_LEFT);
    }


    
    
    public function check_availability()
    {
//        $this->db->select("appointmentdate,queue,status")
//                ->form(appointment_tbl)
//                ->where("appointmentdate",)
    }
    
    public function get_date_available($date)
    {
        $myDate = new DateTime($date);
        $this->db->select("*")
                ->from(appointment_tbl)
                ->where("appointmentdate",$myDate->format("Y-m-d"))
                ->where("status",1);
        
        $query = $this->db->get();
        
        return $query->result_array();
    }


    public function insert_medicines($data)
    {
        $this->db->insert_batch(pat_medicine_tbl, $data);
    }

    public function insert_services($data)
    {
        $this->db->insert_batch(pat_services_tbl, $data);
    }

    public function done_appointment($id)
    {
        $data = array(
            'status' => 3
        );
        $this->db->where('id', $id);
        
        return $this->db->update(appointment_tbl, $data);
    }

    public function process_app()
    {
        $done = false;
        $app_code = $this->input->post("code");
        $meds = $this->input->post("med");
        $sers = $this->input->post("ser");
        $id = $this->get_app_id($app_code);

        $all_meds = array();
        $all_sers = array();

        for ($i=0; $i < count($meds); $i++) { 
            array_push($all_meds,array(
                    'appointment_id' => $id,
                    'mcode' => $meds[$i][0],
                    'quantity' => $meds[$i][3],
                    'remarks' => $meds[$i][5],
                    'dose' => $meds[$i][2]
            ));
        }

        for ($i=0; $i < count($sers); $i++) { 
            array_push($all_sers,array(
                    'appointment_id' => $id,
                    'scode' => $sers[$i][0]
            ));
        }

        $data = array(
            'appointment_id' => $id,
            'bill' => $this->input->post("bill"),
            'prepared_by' => $this->input->post("pr"),
            'examined_by' => $this->input->post("ex"),
            'createddate' => $this->get_current_date(), 
            'status' => 1
        );

        if ($this->db->insert(pat_tbl, $data)) {
            if ($this->done_appointment($id)) {
                $this->insert_medicines($all_meds);
                $this->insert_services($all_sers);
                $done = true;
            }
        }
        
        return $done;
    }

    public function get_app_id($code)
    {
        $this->db->select("id")->from(appointment_tbl)->where("appointment_no",$code);
        $query = $this->db->get();
        $id = $query->row_array();

        return intval($id["id"]);
    }

    public function get_patients()
    {
        $this->db->select("*")
                ->from(pat_tbl)
                ->join(appointment_tbl,appointment_tbl.".id = ".pat_tbl.".appointment_id")
                ->order_by(pat_tbl.".createddate","desc");
        
        $query = $this->db->get();
        
        return $query->result_array();
    }

    public function get_patients_details($code)
    {
        $id = $this->get_app_id($code);
        $this->db->select("*")
                ->from(pat_tbl)
                ->where("appointment_id",$id)
                ->order_by("createddate","desc");
        
        $query = $this->db->get();
        
        return $query->row_array();
    }

    public function get_patients_medicines($code)
    {
        $id = $this->get_app_id($code);
        $this->db->select("*")
                ->from(pat_medicine_tbl)
                ->join(medicine_tbl,medicine_tbl.".mcode = ".pat_medicine_tbl.".mcode")
                ->where("appointment_id",$id)
                ->order_by("createddate","desc");
        
        $query = $this->db->get();
        
        return $query->result_array();
    }

    public function get_patients_services($code)
    {
        $id = $this->get_app_id($code);
        $this->db->select("*")
                ->from(services_tbl)
                ->join(pat_services_tbl,pat_services_tbl.".scode = ".services_tbl.".scode")
                ->where("appointment_id",$id)
                ->order_by("createddate","desc");
        
        $query = $this->db->get();
        
        return $query->result_array();
    }
}
