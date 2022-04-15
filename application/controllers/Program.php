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
class Program extends MY_Controller{
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
                'assets/js/medicines.js');
            
            $this->admin_page('program', $data);
        }else{
            $this->login_page();
        }
    }
    
    public function fetch_medicines()
    {
        $result = array('status' => false);
        $result['medicines']= $this->dent_model->get_medicines(); 
        $result['status'] = true;
        
        echo json_encode($result);
    }
    
    public function add_medicine()
    {
        $result = array('status' => false);
        
        $desc = $this->input->post("description");
        $price = $this->input->post("price");
        $error = 0;
        
        if (empty($desc)) {
           $error++;
           $result["error_desc"] = "Please enter medicine description.";
        }else{
            if ($this->dent_model->check_medicine($desc)) {
                $error++;
                $result["error_exist"] = "This medicine already exist.";
            }
        }
        
        if (empty($price) || !is_numeric($price)) {
            $error++;
            $result["error_price"] = "Price invalid.";
        }
        
        
        
        if ($error === 0) {
            if ($this->dent_model->insert_medicine()) {
                $result['medicines']= $this->dent_model->get_medicines(); 
                $result['status'] = true;
            }
        }
        
        echo json_encode($result);
    }
    
    public function remove_medicine()
    {
        $result = array('status' => false);
        $code = $this->input->post("code");
        if ($this->dent_model->delete_medicine($code)) {
            $result['medicines']= $this->dent_model->get_medicines(); 
            $result['status'] = true;
        }
        
        echo json_encode($result);
    }
    
    public function updt_medicine()
    {
        $result = array('status' => false);
        
        $desc = $this->input->post("description");
        $price = $this->input->post("price");
        $code = $this->input->post("mcode");
        $error = 0;
        
        if (empty($desc)) {
           $error++;
           $result["error_desc"] = "Please enter medicine description.";
        }else{
            if ($this->dent_model->check_medicine_up($desc,$code)) {
                $error++;
                $result["error_exist"] = "This medicine already exist.";
            }
        }
        
        if (empty($price) || !is_numeric($price)) {
            $error++;
            $result["error_price"] = "Price invalid.";
        }
        
        
        
        if ($error === 0) {
            if ($this->dent_model->modify_medicine($code)) {
                $result['medicines']= $this->dent_model->get_medicines(); 
                $result['status'] = true;
            }
        }
        
        echo json_encode($result);
    }
    
}
