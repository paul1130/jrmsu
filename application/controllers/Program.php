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
        $this->load->model('program_model');
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
                'assets/js/program.js');
            
            $this->admin_page('program', $data);
        }else{
            $this->login_page();
        }
    }
    
    public function fetch_programs()
    {
        $result = array('status' => false);
        $result["programs"] = $this->program_model->get_programs(); 

        foreach($result["programs"] as $key => $value) {
            $implementor = $this->program_model->get_implementor($value["id"]);
            $result["programs"][$key]["implementor"] =  $implementor != null ? $implementor["implementor"] : '';
        }

        $result["status"] = true;
        
        echo json_encode($result);
    }

    public function valid_implementor($data) 
    {
        if($data == "") {
            $this->form_validation->set_message('valid_implementor', 'The {field} field is required!');
            return FALSE;
        }

        return TRUE;
    }

    public function add_program()
    {
        $result = array('status' => false);
        $this->form_validation->set_rules('title','Title','trim|required|alpha_numeric');
        $this->form_validation->set_rules('date','Program Date','trim|required');
        $this->form_validation->set_rules('partner','Partner LGUs/NGAs/SMEs/Industries','trim|required|alpha_numeric');
        $this->form_validation->set_rules('remarks','Remarks','trim|required|alpha_numeric');
        $this->form_validation->set_rules('moa_status', 'Moa Status', 'trim|required|alpha_numeric');
        $this->form_validation->set_rules('implementor[]','Implementing College','callback_valid_implementor');
        $this->form_validation->set_rules('beneficiary','Number of Beneficiary','trim|required|integer');
        $this->form_validation->set_rules('trained', 'No. Of Persons Trained', 'trim|required|integer');
        $this->form_validation->set_rules('conducted', 'Place conducted', 'trim|required');
        $this->form_validation->set_rules('started', 'Started', 'trim|required');
        $this->form_validation->set_rules('ended', 'Ended', 'trim|required');
        $this->form_validation->set_rules('numerical_rating', 'Numerical rating', 'trim|required|numeric');
        $this->form_validation->set_rules('descriptive_rating', 'Descriptive rating', 'trim|required|alpha_numeric');
        
        if ($this->form_validation->run() === FALSE){
            $result['error_title'] = form_error('title');
            $result['error_date'] = form_error('date');
            $result['error_partner'] = form_error('partner');
            $result['error_beneficiary'] = form_error('beneficiary');
            $result['error_remarks'] = form_error('remarks');
            $result['error_moa_status'] = form_error('moa_status');
            $result['error_implementor'] = form_error('implementor[]');
            $result['error_trained'] = form_error('trained');
            $result['error_conducted'] = form_error('conducted');
            $result['error_started'] = form_error('started');
            $result['error_ended'] = form_error('ended');
            $result['error_numerical_rating'] = form_error('numerical_rating');
            $result['error_descriptive_rating'] = form_error('descriptive_rating');
        }else{
            $started_date = date_create_from_format('Y-m-d - H:i', $this->input->post("started"));
            $ended_date = date_create_from_format('Y-m-d - H:i', $this->input->post("started"));
            $data = array(
                'title' => $this->input->post("title"),
                'date' => $this->input->post("date"),
                'partner' => $this->input->post("partner"),
                'beneficiary' => $this->input->post("beneficiary"),
                'remarks' => $this->input->post("remarks"),
                'moa_status' => $this->input->post("moa_status"),
                'trained' => $this->input->post("trained"),
                'conducted' => $this->input->post("conducted"),
                'started' => date_format($started_date, 'Y-m-d H:i:s'),
                'ended' =>  date_format($ended_date, 'Y-m-d H:i:s'),
                'numerical_rating' => $this->input->post("numerical_rating"),
                'descriptive_rating' => $this->input->post("descriptive_rating"),
                'created_date' => $this->program_model->get_current_date(),
                'created_by' =>  $this->session->userdata('user_data')['id'] 
            );

            $record_id = $this->program_model->insert_program($data);

            $implementor_data = [];
            foreach($this->input->post("implementor") as $implementor) {
                array_push($implementor_data, array(
                    'program_id' => $record_id,
                    'course_id' => $implementor,
                    'created_date' => $this->program_model->get_current_date(),
                    'created_by' =>  $this->session->userdata('user_data')['id'] 
                ));
            }

            $this->program_model->insert_implementor($implementor_data);

            if ($record_id) {
                $result['status'] = true;
                $result['id'] = $record_id;
            }
        }
        // var_dump($this->input->post());
        echo json_encode($result);
    }

    public function upload_file() { 
   
        $data = [];
        $result = array('status' => false);
     
        $count = count($_FILES['files']['name']);
      
        for($i=0;$i<$count;$i++){
      
          if(!empty($_FILES['files']['name'][$i])){
      
            $_FILES['file']['name'] = $_FILES['files']['name'][$i];
            $_FILES['file']['type'] = $_FILES['files']['type'][$i];
            $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i];
            $_FILES['file']['error'] = $_FILES['files']['error'][$i];
            $_FILES['file']['size'] = $_FILES['files']['size'][$i];
    
            $config['upload_path'] = 'uploads/'; 
            $config['allowed_types'] = 'jpg|jpeg|png|pdf';
            $config['max_size'] = '5000';
            $config['file_name'] = $_FILES['files']['name'][$i];
            $config['encrypt_name'] = TRUE;
     
            $this->load->library('upload',$config); 
      
            if($this->upload->do_upload('file')){
                $uploadData = $this->upload->data();

                $data = array(
                    'record_id' => $this->input->post("record_id"),
                    'type' => 'Program Attachment',
                    'path' => '',
                    'file_name' => $uploadData["file_name"],
                    'original_file_name' => $uploadData["orig_name"],
                    'created_date' => $this->program_model->get_current_date(),
                    'created_by' =>  $this->session->userdata('user_data')['id'] 
                );
    
                $this->program_model->insert_attachment($data);
            } 
          }
     
        }
        $result["error"] = $this->upload->display_errors();
        $result["status"] = $result["error"] == "" ? TRUE : $result["status"];

        echo json_encode($result);
     }

    public function new_program()
    {
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
            'assets/js/program.js'
            );
        
        $data["courses"] = $this->program_model->get_courses();    
        
        $this->admin_page("addProgram", $data);
    }

    public function fetch_cources() {
        $result = array("status" => true);
        $result["courses"] = $this->program_model->get_courses();
        echo json_encode($result);
    }
    
}
