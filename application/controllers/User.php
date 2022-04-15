<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Admin
 *
 * @author HoneyDee
 */
class User extends MY_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->model('user_model');
    }
    
    public function index()
    {
        if ($this->has_log_in()) {
            $data["page_title"] = "Programs";
            $data["css"] = array(
                'assets/vendors/plugins/bootstrap/css/bootstrap.css',
                'assets/vendors/plugins/node-waves/waves.css',
                'assets/vendors/plugins/animate-css/animate.css',
                'assets/vendors/plugins/bootstrap-select/css/bootstrap-select.css',
                'assets/vendors/bower/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css',
                'assets/vendors/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css',
                'assets/vendors/plugins/sweetalert/sweetalert.css',
                'assets/vendors/css/style.css',
                'assets/vendors/css/checkboxes.css',
                'assets/vendors/css/themes/all-themes.css',
                'assets/css/myStyle.css');

            $data["js"] = array(
                'assets/vendors/plugins/jquery/jquery.min.js',
                'assets/vendors/plugins/bootstrap/js/bootstrap.js',
                'assets/vendors/plugins/jquery-inputmask/jquery.inputmask.bundle.js',
                'assets/vendors/plugins/bootstrap-select/js/bootstrap-select.js',
                'assets/vendors/plugins/jquery-slimscroll/jquery.slimscroll.js',
                'assets/vendors/plugins/node-waves/waves.js',
                'assets/vendors/plugins/momentjs/moment.js',
                'assets/vendors/bower/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js',
                'assets/vendors/plugins/jquery-datatable/jquery.dataTables.js',
                'assets/vendors/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js',
                'assets/vendors/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js',
                'assets/vendors/plugins/jquery-datatable/extensions/export/buttons.flash.min.js',
                'assets/vendors/plugins/jquery-datatable/extensions/export/jszip.min.js',
                'assets/vendors/plugins/jquery-datatable/extensions/export/pdfmake.min.js',
                'assets/vendors/plugins/jquery-datatable/extensions/export/vfs_fonts.js',
                'assets/vendors/plugins/jquery-datatable/extensions/export/buttons.html5.min.js',
                'assets/vendors/plugins/jquery-datatable/extensions/export/buttons.print.min.js',
                'assets/vendors/plugins/sweetalert/sweetalert.min.js',
                'assets/vendors/js/admin.js',
                'assets/vendors/js/checkbox.js',
                'assets/vendors/js/pages/forms/advanced-form-elements.js',
                'assets/vendors/js/demo.js',
                'assets/js/user.js');
            
            $this->admin_page('user', $data);
        }else{
            $this->login_page();
        }
    }

    public function sign_out()
    {
            $userdata = array('username','logged_in','user_data');
            $this->session->unset_userdata($userdata);
            $this->index();
    }
    
    public function sign_in()
    {
        $result = array('status' => false,'error_acct' => false,'error_pass' => false);
        $result['error'] = '';
        $uname = $this->input->post('username');
        $pass = $this->input->post('password');
        $valid = $this->user_model->check_username($uname);
        
        if (count($valid) > 0) {
            if ($this->user_model->check_pass($uname,$pass)) {

                $data['user'] = $this->user_model->get_sign_in_data($uname,$pass);
                $this->set_session_data($data['user']);
                $result['status'] = true;

            }else{
                $result['error_pass'] = true;
            }
        }else{
            $result['error_acct'] = true;
        }
        
        echo json_encode($result);
    }

    public function fetch_users()
    {
        $result = array('status' => false);
        $result["users"]= $this->user_model->get_users(); 
        // var_dump($result["users"]);
        $result['status'] = true;
        
        echo json_encode($result);
    }

    public function add_user()
    {
        $result = array('status' => false);
        $this->form_validation->set_rules('first_name','First Name','trim|required');
        $this->form_validation->set_rules('middle_name','Middle Name','trim|required');
        $this->form_validation->set_rules('last_name','Last Name','trim|required');
        $this->form_validation->set_rules('type','User Type','trim|required');
        // $this->form_validation->set_rules('email','Email','trim|required|valid_email');
        $this->form_validation->set_rules('username','Username','trim|required|min_length[3]');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]');
        
        if ($this->form_validation->run() === FALSE){
            $result['error_first_name'] = form_error('first_name');
            $result['error_middle_name'] = form_error('middle_name');
            $result['error_last_name'] = form_error('last_name');
            $result['error_type'] = form_error('type');
            $result['error_username'] = form_error('username');
            $result['error_password'] = form_error('password');
            $result['error_confirm_password'] = form_error('confirm_password');
        }else{
            if ($this->user_model->insert_user()) {
                $result['status'] = true;
            }
        }
        echo json_encode($result);
    }
}
