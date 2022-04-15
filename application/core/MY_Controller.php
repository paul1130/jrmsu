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

    public function login_page()
    {
        $data["page_title"] = "Sign in";
        $data["css"] = array(
            'assets/vendors/plugins/bootstrap/css/bootstrap.css',
            'assets/vendors/plugins/node-waves/waves.css',
            'assets/vendors/plugins/animate-css/animate.css',
            'assets/vendors/plugins/sweetalert/sweetalert.css',
            'assets/vendors/css/style.css',
            'assets/vendors/css/themes/all-themes.css',
            'assets/css/myStyle.css');

        $data["js"] = array(
            'assets/vendors/plugins/jquery/jquery.min.js',
            'assets/vendors/plugins/bootstrap/js/bootstrap.js',
            'assets/vendors/plugins/node-waves/waves.js',
            'assets/vendors/plugins/jquery-validation/jquery.validate.js',
            'assets/vendors/js/admin.js',
            'assets/vendors/js/pages/examples/sign-in.js',
            'assets/vendors/plugins/sweetalert/sweetalert.min.js',
            'assets/js/user.js');
        $this->admin_page(NULL, $data);
    }
    
    public function admin_page($page = NULL, $data = NULL)
    {
        $this->load->view('admin/templates/header',$data);
        
        if ($page === NULL) {
            if ($this->has_log_in()) {
                redirect('admin/program','refresh');
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
                    'username'      => $data['username'],
                    'logged_in'     => TRUE,
                    'user_data'     => $data
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
