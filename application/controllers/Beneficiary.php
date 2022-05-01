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
class Beneficiary extends MY_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->model('beneficiary_model');
        $this->load->model('program_model');
    }
    
    
    public function index()
    {
        if ($this->has_log_in()) {
            $data["page_title"] = "Beneficiaries";
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
                'assets/js/beneficiary.js');
            
            $this->admin_page('beneficiary', $data);
        }else{
            $this->login_page();
        }
    }

    public function new_beneficiary()
    {
        if ($this->has_log_in()) {
            $data["page_title"] = "Add Program";
            $data["css"] = array(
                'assets/vendors/plugins/bootstrap/css/bootstrap.css',
                'assets/vendors/plugins/node-waves/waves.css',
                'assets/vendors/plugins/animate-css/animate.css',
                'assets/vendors/plugins/bootstrap-select/css/bootstrap-select.css',
                'assets/vendors/plugins/sweetalert/sweetalert.css',
                'assets/vendors/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css',
                'assets/vendors/css/style.css',
                'assets/vendors/css/themes/all-themes.css',
                'assets/css/myStyle.css');

            $data["js"] = array(
                'assets/vendors/plugins/jquery/jquery.min.js',
                'assets/vendors/plugins/bootstrap/js/bootstrap.js',
                'assets/vendors/plugins/bootstrap-select/js/bootstrap-select.js',
                'assets/vendors/plugins/jquery-slimscroll/jquery.slimscroll.js',
                'assets/vendors/plugins/bootstrap-notify/bootstrap-notify.js',
                'assets/vendors/plugins/node-waves/waves.js',
                'assets/vendors/plugins/momentjs/moment.js',
                'assets/vendors/plugins/sweetalert/sweetalert.min.js',
                'assets/vendors/plugins/autosize/autosize.js',
                'assets/vendors/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js',
                'assets/vendors/js/admin.js',
                'assets/vendors/js/demo.js',
                'assets/vendors/js/webcam.min.js',
                'assets/js/beneficiary.js'
                );
            
            $data["programs"] = $this->program_model->get_programs();

            $this->admin_page("addBeneficiary", $data);
        } else {
            $this->login_page();
        }
    }

    public function add_beneficiary()
    {
        $result = array('status' => false);
        $this->form_validation->set_rules('first_name','First Name','trim|required');
        $this->form_validation->set_rules('middle_name','Middle Name','trim|required');
        $this->form_validation->set_rules('last_name','Last Name','trim|required');
        $this->form_validation->set_rules('dob','Birthdate','trim|required');
        $this->form_validation->set_rules('contact', 'Contact No.', 'trim|required');
        $this->form_validation->set_rules('address', 'Address', 'trim|required');
        $this->form_validation->set_rules('civil_status','Civil Status','trim|required');
        $this->form_validation->set_rules('program_id','Program','trim|required');
        
        if ($this->form_validation->run() === FALSE){
            $result['error_first_name'] = form_error('first_name');
            $result['error_middle_name'] = form_error('middle_name');
            $result['error_last_name'] = form_error('last_name');
            $result['error_dob'] = form_error('dob');
            $result['error_contact'] = form_error('contact');
            $result['error_address'] = form_error('address');
            $result['error_civil_status'] = form_error('civil_status');
            $result['error_program_id'] = form_error('program_id');
        }else{
            $data = array(
                'first_name' => $this->input->post("first_name"),
                'middle_name' => $this->input->post("middle_name"),
                'last_name' => $this->input->post("last_name"),
                'birth_date' => $this->input->post("dob"),
                'contact_no' => $this->input->post("contact"),
                'address' => $this->input->post("address"),
                'civil_status' => $this->input->post("civil_status"),
                'program_id' => $this->input->post("program_id"),
                'created_date' => $this->beneficiary_model->get_current_date(),
                'created_by' =>  $this->session->userdata('user_data')['id'] 
            );

            $record_id = $this->beneficiary_model->insert_beneficiary($data);

            if ($record_id) {
                $result['status'] = true;
                $result['id'] = $record_id;
            }
        }
        echo json_encode($result);
    }

    public function update_beneficiary()
    {
        $result = array('status' => false);
        $this->form_validation->set_rules('first_name','First Name','trim|required');
        $this->form_validation->set_rules('middle_name','Middle Name','trim|required');
        $this->form_validation->set_rules('last_name','Last Name','trim|required');
        $this->form_validation->set_rules('dob','Birthdate','trim|required');
        $this->form_validation->set_rules('contact', 'Contact No.', 'trim|required');
        $this->form_validation->set_rules('address', 'Address', 'trim|required');
        $this->form_validation->set_rules('civil_status','Civil Status','trim|required');
        $this->form_validation->set_rules('program_id','Program','trim|required');
        $this->form_validation->set_rules('beneficiary_id','Beneficary','trim|required');
        
        if ($this->form_validation->run() === FALSE){
            $result['error_first_name'] = form_error('first_name');
            $result['error_middle_name'] = form_error('middle_name');
            $result['error_last_name'] = form_error('last_name');
            $result['error_dob'] = form_error('dob');
            $result['error_contact'] = form_error('contact');
            $result['error_address'] = form_error('address');
            $result['error_civil_status'] = form_error('civil_status');
            $result['error_program_id'] = form_error('program_id');
            $result['error_beneficiary_id'] = form_error('beneficiary_id');
        }else{
            $updated_data = array(
                'first_name' => $this->input->post("first_name"),
                'middle_name' => $this->input->post("middle_name"),
                'last_name' => $this->input->post("last_name"),
                'birth_date' => $this->input->post("dob"),
                'contact_no' => $this->input->post("contact"),
                'address' => $this->input->post("address"),
                'civil_status' => $this->input->post("civil_status"),
                'program_id' => $this->input->post("program_id"),
                'modified_date' => $this->beneficiary_model->get_current_date(),
                'modified_by' =>  $this->session->userdata('user_data')['id'] 
            );
            $beneficiary_id = $this->input->post("beneficiary_id");

            $this->beneficiary_model->update_beneficiary(
                array(
                    "beneficiary_id" => $beneficiary_id,
                    "updated_data" => $updated_data
                )
            );
            
            $result['status'] = true;
        }
        echo json_encode($result);
    }


    public function upload_profile_pic() { 
   
        $data = [];
        $result = array('status' => false);
     
        $count = count($_FILES['profile_pic']['name']);
      
        for($i=0;$i<$count;$i++){
      
          if(!empty($_FILES['profile_pic']['name'][$i])){
      
            $_FILES['file']['name'] = $_FILES['profile_pic']['name'][$i];
            $_FILES['file']['type'] = $_FILES['profile_pic']['type'][$i];
            $_FILES['file']['tmp_name'] = $_FILES['profile_pic']['tmp_name'][$i];
            $_FILES['file']['error'] = $_FILES['profile_pic']['error'][$i];
            $_FILES['file']['size'] = $_FILES['profile_pic']['size'][$i];
    
            $config['upload_path'] = 'uploads/profile/'; 
            $config['allowed_types'] = 'jpg|jpeg|png|pdf';
            $config['max_size'] = '5000';
            $config['file_name'] = $_FILES['profile_pic']['name'][$i];
            $config['encrypt_name'] = TRUE;
     
            $this->load->library('upload',$config); 
      
            if($this->upload->do_upload('file')){
                $uploadData = $this->upload->data();

                $data = array(
                    'record_id' => $this->input->post("record_id"),
                    'type' => 'Profile Picture',
                    'path' => '',
                    'file_name' => $uploadData["file_name"],
                    'original_file_name' => $uploadData["client_name"],
                    'created_date' => $this->beneficiary_model->get_current_date(),
                    'created_by' =>  $this->session->userdata('user_data')['id'] 
                );
    
                $this->beneficiary_model->insert_attachment($data);
            } 
          }
     
        }
        $result["error"] = $this->upload->display_errors();
        $result["status"] = $result["error"] == "" ? TRUE : $result["status"];

        echo json_encode($result);
    }

    public function update_profile_pic() { 
   
        $data = [];
        $result = array('status' => false);
     
        $count = count($_FILES['profile_pic']['name']);
      
        for($i=0;$i<$count;$i++){
      
          if(!empty($_FILES['profile_pic']['name'][$i])){
      
            $_FILES['file']['name'] = $_FILES['profile_pic']['name'][$i];
            $_FILES['file']['type'] = $_FILES['profile_pic']['type'][$i];
            $_FILES['file']['tmp_name'] = $_FILES['profile_pic']['tmp_name'][$i];
            $_FILES['file']['error'] = $_FILES['profile_pic']['error'][$i];
            $_FILES['file']['size'] = $_FILES['profile_pic']['size'][$i];
    
            $config['upload_path'] = 'uploads/profile/'; 
            $config['allowed_types'] = 'jpg|jpeg|png|pdf';
            $config['max_size'] = '5000';
            $config['file_name'] = $_FILES['profile_pic']['name'][$i];
            $config['encrypt_name'] = TRUE;
     
            $this->load->library('upload',$config); 
      
            if($this->upload->do_upload('file')){
                $uploadData = $this->upload->data();

                $data = array(
                    'record_id' => $this->input->post("record_id"),
                    'type' => 'Profile Picture',
                    'path' => '',
                    'file_name' => $uploadData["file_name"],
                    'original_file_name' => $uploadData["client_name"],
                    'created_date' => $this->beneficiary_model->get_current_date(),
                    'created_by' =>  $this->session->userdata('user_data')['id'] 
                );

                $this->beneficiary_model->delete_beneficiary_pic($this->input->post("record_id"));
    
                $this->beneficiary_model->insert_attachment($data);
            } 
          }
     
        }
        $result["error"] = $this->upload->display_errors();
        $result["status"] = $result["error"] == "" ? TRUE : $result["status"];

        echo json_encode($result);
    }

    public function fetch_beneficiaries()
    {
        $result = array('status' => false);
        $result["beneficiaries"] = $this->beneficiary_model->get_beneficiaries(); 
        $result["status"] = true;
        
        echo json_encode($result);
    }

    public function beneficiary_details() 
    {
        if ($this->has_log_in()) {
            $data["page_title"] = "Beneficiary - Details";
            $data["css"] = array(
                'assets/vendors/plugins/bootstrap/css/bootstrap.css',
                'assets/vendors/plugins/node-waves/waves.css',
                'assets/vendors/plugins/animate-css/animate.css',
                'assets/vendors/plugins/bootstrap-select/css/bootstrap-select.css',
                'assets/vendors/plugins/sweetalert/sweetalert.css',
                'assets/vendors/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css',
                'assets/vendors/css/style.css',
                'assets/vendors/css/themes/all-themes.css',
                'assets/css/myStyle.css');

            $data["js"] = array(
                'assets/vendors/plugins/jquery/jquery.min.js',
                'assets/vendors/plugins/bootstrap/js/bootstrap.js',
                'assets/vendors/plugins/bootstrap-select/js/bootstrap-select.js',
                'assets/vendors/plugins/jquery-slimscroll/jquery.slimscroll.js',
                'assets/vendors/plugins/bootstrap-notify/bootstrap-notify.js',
                'assets/vendors/plugins/node-waves/waves.js',
                'assets/vendors/plugins/momentjs/moment.js',
                'assets/vendors/plugins/sweetalert/sweetalert.min.js',
                'assets/vendors/plugins/autosize/autosize.js',
                'assets/vendors/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js',
                'assets/vendors/js/admin.js',
                'assets/vendors/js/demo.js',
                'assets/js/beneficiary.js'
                );

            $beneficiary_id = $this->input->get('id');
            $data["beneficiary"] = $this->beneficiary_model->get_beneficiaries($beneficiary_id);  
            $data["profile_pic"] = $this->beneficiary_model->get_attachments($beneficiary_id);
            $data["programs"] = $this->program_model->get_programs();
            $this->admin_page("viewBeneficiary", $data);
        } else {
            $this->login_page();
        }
    }

}
