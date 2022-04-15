<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MY_Controller
 *
 * @author Paul's Hardware
 */
class MY_Controller extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function user_page($page = NULL, $data = NULL)
    {
        $data["cur_date"] = $this->get_current_date("lain");
        $data["hosp_name"] = $this->user_model->get_hospital();
        $this->load->view('templates/header',$data);
        
        if ($page === NULL) {
            if ($this->has_log_in()) {
                redirect('user/appointments','refresh');
            }else{
                $this->load->view('pages/login',$data);
            }
        }else{
            if ($page === 'lockscreen') {
                $this->load->view('pages/'.$page,$data);
            }else{
                $this->load->view('templates/navbar',$data);
                $this->load->view('templates/sidebar',$data);
    //            $this->load->view('templates/right_sidebar',$data);
                $this->load->view('pages/'.$page,$data);
            }
        }
        $this->load->view('templates/footer',$data);
    }
    
    public function guest_page($page = NULL, $data = NULL)
    {
        $this->load->view('templates/header',$data);
        
        if ($page === NULL) {
            if ($this->has_log_in()) {
                redirect('user/dashboard','refresh');
            }else{
                $this->load->view('pages/login',$data);
            }
        }else{
            $this->load->view('templates/navbar',$data);
            $this->load->view('templates/sidebar',$data);
            $this->load->view('pages/'.$page,$data);
        }
        $this->load->view('templates/footer',$data);
    }
    
    public function admin_page($page = NULL, $data = NULL)
    {
        $this->load->view('admin/templates/header',$data);
        
        if ($page === NULL) {
            if ($this->has_log_in()) {
                redirect('admin/appointments','refresh');
            }else{
                $this->load->view('admin/pages/login',$data);
            }
        }else{
            $this->load->view('admin/templates/navbar',$data);
            $this->load->view('admin/templates/sidebar',$data);
            $this->load->view('admin/pages/'.$page,$data);
        }
        $this->load->view('admin/templates/footer',$data);
    }
    
    
    public function has_log_in()
    {
        if ($this->session->userdata('logged_in')) {
            return TRUE;
        }else{
            return FALSE;
        }
    }
    
    public function validate_log_in()
    {
        if ($this->has_log_in()) {
            return TRUE;
        }else{
            show_404();
        }
    }
    
    /**
     * 
     * 
     * @param type $data array
     */
    public function set_session_data($data)
    {
        $newdata = array(
                    'username'       => $data['username'],
                    'logged_in'    => TRUE
            );

            $this->session->set_userdata($newdata);
    }
    
    public function format_money($money)
    {
        $m = number_format($money,2);
        return '&#8369;'.$m;
    }
    
    public function get_current_date($type = "server")
    {
        $now = new DateTime();
        return ($type === "server") ? $now->format('Y-m-d h:i:s') : $now->format('Y-m-d');
    }
    
    public function format_date($date)
    {
          $now = new DateTime($date);
        return $now->format('m-d-Y ');
    }
    
}
