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
class Admin extends MY_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->model('user_model');
    }
    
    public function index()
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
            'assets/js/dental.js');
        $this->admin_page(NULL, $data);
    }

    public function sign_out()
    {
            $userdata = array('username','logged_in');
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
    
    public function dashboard()
    {
        if ($this->has_log_in()) {
            $data["page_title"] = "Dashboard";
            $data["css"] = array(
                'assets/vendors/plugins/bootstrap/css/bootstrap.css',
                'assets/vendors/plugins/node-waves/waves.css',
                'assets/vendors/plugins/animate-css/animate.css',
                'assets/vendors/bower/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css',
                'assets/vendors/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css',
                'assets/vendors/plugins/sweetalert/sweetalert.css',
                'assets/vendors/css/style.css',
                'assets/vendors/css/responsive.css',
                'assets/vendors/css/themes/all-themes.css',
                'assets/css/myStyle.css');

            $data["js"] = array(
                'assets/vendors/plugins/jquery/jquery.min.js',
                'assets/vendors/plugins/bootstrap/js/bootstrap.js',
                'assets/vendors/plugins/jquery-inputmask/jquery.inputmask.bundle.js',
                'assets/vendors/plugins/bootstrap-select/js/bootstrap-select.js',
                'assets/vendors/plugins/jquery-slimscroll/jquery.slimscroll.js',
                'assets/vendors/plugins/jquery-countto/jquery.countTo.js',
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
                'assets/vendors/js/pages/forms/advanced-form-elements.js',
                'assets/vendors/js/demo.js');
            
            $this->admin_page('dashboard', $data);
        }else{
            $this->index();
        }
    }
    
    public function patrecords()
    {
        if ($this->has_log_in()) {
            $data["page_title"] = "Patient Records";
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
                'assets/js/history.js');
            
            $this->admin_page('patRecords', $data);
        }else{
            $this->index();
        }
    }

    
    
    public function appointments()
    {
        if ($this->has_log_in()) {
            $data["page_title"] = "Appointments";
            $data["css"] = array(
                'assets/vendors/plugins/bootstrap/css/bootstrap.css',
                'assets/vendors/plugins/node-waves/waves.css',
                'assets/vendors/plugins/animate-css/animate.css',
                'assets/vendors/bower/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css',
                'assets/vendors/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css',
                'assets/vendors/plugins/sweetalert/sweetalert.css',
                'assets/vendors/plugins/bootstrap-select/css/bootstrap-select.css',
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
                'assets/js/services.js',
                'assets/js/appointment.js');
            
            $this->admin_page('appointments', $data);
        }else{
            $this->index();
        }
    }
    
    public function othercases()
    {
        if ($this->has_log_in()) {
            $data["page_title"] = "Other Cases";
            $data["css"] = array(
                'assets/vendors/plugins/bootstrap/css/bootstrap.css',
                'assets/vendors/plugins/node-waves/waves.css',
                'assets/vendors/plugins/animate-css/animate.css',
                'assets/vendors/plugins/sweetalert/sweetalert.css',
                'assets/vendors/plugins/light-gallery/css/lightgallery.css',
                'assets/vendors/css/style.css',
                'assets/vendors/css/themes/all-themes.css',
                'assets/css/myStyle.css');

            $data["js"] = array(
                'assets/vendors/plugins/jquery/jquery.min.js',
                'assets/vendors/plugins/bootstrap/js/bootstrap.js',
                'assets/vendors/plugins/bootstrap-select/js/bootstrap-select.js',
                'assets/vendors/plugins/jquery-slimscroll/jquery.slimscroll.js',
                'assets/vendors/plugins/node-waves/waves.js',
                'assets/vendors/plugins/light-gallery/js/lightgallery-all.js',
                'assets/vendors/js/pages/medias/image-gallery.js',
                'assets/vendors/plugins/momentjs/moment.js',
                'assets/vendors/plugins/sweetalert/sweetalert.min.js',
                'assets/vendors/js/admin.js',
                'assets/vendors/js/demo.js',
                'assets/js/dental.js',
                'assets/vendors/js/jquery.redirect.js');
            
            $this->admin_page('othercases', $data);
        }else{
            $this->index();
        }
    }
    
    public function feedback()
    {
        if ($this->has_log_in()) {
            $data["page_title"] = "Feedback";
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
                'assets/js/feedback.js');
            
            $this->admin_page('feedback', $data);
        }else{
            $this->index();
        }
    }
    
    public function medicines()
    {
        if ($this->has_log_in()) {
            $data["page_title"] = "Medicines";
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
            
            $this->admin_page('medicines', $data);
        }else{
            $this->index();
        }
    }
    
    public function services()
    {
        if ($this->has_log_in()) {
            $data["page_title"] = "Services";
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
                'assets/js/services.js');
            
            $this->admin_page('services', $data);
        }else{
            $this->index();
        }
    }
    
    public function fetch_services()
    {
        $result = array('status' => false);
        $result["services"]= $this->dent_model->get_service(); 
        $result['status'] = true;
        
        echo json_encode($result);
    }

    public function fetch_appointments()
    {
        $result = array('status' => false);
        $result["appointments"]= $this->dent_model->get_appointments(); 
        $result['status'] = true;
        
        echo json_encode($result);
    }
    
    public function remove_services()
    {
        $result = array('status' => false);
        $code = $this->input->post("code");
        if ($this->dent_model->delete_service($code)) {
            $result['services']= $this->dent_model->get_service(); 
            $result['status'] = true;
        }
        
        echo json_encode($result);
    }
    
    public function add_service()
    {
        $result = array('status' => false);
        $service = $this->input->post("service");
        $price = $this->input->post("price");
        if (empty($service) || empty($price)) {

            if (empty($service)) {
                $result["error_service"] = "Please enter service description.";
            }

            if (empty($price)) {
                $result["error_price"] = "Please enter service description.";
            }
            
        }else{
            if ($this->dent_model->check_service($service)) {
                $result["error_exist"] = "Service Already exist.";
            }else{
                if ($this->dent_model->insert_service()) {
                    $result['services']= $this->dent_model->get_service();
                    $result['status'] = true;
                }
            }
        }
        
        echo json_encode($result);
    }
    
    
    public function updt_service()
    {
        $result = array('status' => false);
        $service = $this->input->post("service");
        $code = $this->input->post("scode");
        
        if (empty($service)) {
            $result["error_service"] = "Please enter service description.";
        }else{
            if ($this->dent_model->check_service_up($service,$code)) {
                $result["error_exist"] = "Service Already exist.";
            }else{
                if ($this->dent_model->modify_service($code)) {
                    $result["services"]= $this->dent_model->get_service();
                    $result['status'] = true;
                }
            }
        }
        
        echo json_encode($result);
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
    
    public function add_feedback()
    {
        $result = array('status' => false);
        $email = $this->input->post("emailad");
        $message = $this->input->post("message");
        
        $config = array(
                array(
                    'field' => 'emailad',
                    'label' => 'Email Address',
                    'rules' => 'required|valid_email'
                ),
                array(
                    'field' => 'message',
                    'label' => 'Message',
                    'rules' => 'required'
                )
            );
        
        $this->form_validation->set_rules($config);
        if ($this->form_validation->run() === FALSE){
            $result['error_email'] = form_error('emailad');
            $result['error_message'] = form_error('message');
        }else{
            if ($this->dent_model->insert_feedback($email,$message)) {
                $result["feedbacks"] = $this->dent_model->get_feedbacks();
                $result['status'] = true;
            }
        }
        
        echo json_encode($result);
    }
    
    public function get_feedback()
    {
        $result = array('status' => false);
        $result["feedbacks"] = $this->dent_model->get_feedbacks();
        $result['status'] = true; 
        echo json_encode($result);    
    }

    public function approve_app($code)
    {
        $result = array('status' => false);

        $result["myData"] = $this->dent_model->get_app_details($code);

        if ($this->dent_model->check_app_availability($result["myData"])) {
            if ($this->dent_model->approve_appointment($code)) {
                $result["appointments"]= $this->dent_model->get_appointments(); 
                $result['status'] = true; 
            }
        }else{
            $this->dent_model->cancel_appointment($code);
            $result["appointments"]= $this->dent_model->get_appointments(); 
            $result['not_available'] = true; 
        }
        
        
        echo json_encode($result);  
    }
    
    public function delete_app($code)
    {
        $result = array('status' => false);

        if ($this->dent_model->delete_appointment($code)) {
            $result["appointments"]= $this->dent_model->get_appointments(); 
            $result['status'] = true; 
        }
        
        echo json_encode($result);  
    }

    public function cancel_app($code)
    {
        $result = array('status' => false);
        
        if ($this->dent_model->cancel_appointment($code)) {
            $result["appointments"]= $this->dent_model->get_appointments(); 
            $result['status'] = true; 
        }
        echo json_encode($result);  
    }

    public function get_price($code)
    {
        $result = array('status' => false);
        $result['med'] = $this->dent_model->get_medicine_price($code);
        $result['status'] = true; 
        echo json_encode($result); 
    }

    public function get_ser_price($code)
    {
        $result = array('status' => false);
        $result['ser'] = $this->dent_model->get_service_price($code);
        $result['status'] = true; 
        echo json_encode($result); 
    }

    public function proccess_pat()
    {
        $result = array('status' => false);
        if ($this->dent_model->process_app()) {
            
            $result["appointments"]= $this->dent_model->get_appointments(); 
            $result['status'] = true; 
        }
        echo json_encode($result); 
    }

    public function fetch_patients()
    {
        $result = array('status' => false);
        $result['pats'] = $this->dent_model->get_patients();
        $result['status'] = true; 
        echo json_encode($result); 
    }

    public function fetch_pat_details($code)
    {
        $result = array('status' => false);
        $result['pat'] = $this->dent_model->get_patients_details($code);
        $result['meds'] = $this->dent_model->get_patients_medicines($code);
        $result['sers'] = $this->dent_model->get_patients_services($code);
        $result['status'] = true; 
        echo json_encode($result); 
    }
    
    

    // public function fetch_feedbacks()
    // {
    //     $result = array('status' => false);
    //     $result['pat'] = $this->dent_model->get_patients_details($code);
    //     $result['meds'] = $this->dent_model->get_patients_medicines($code);
    //     $result['sers'] = $this->dent_model->get_patients_services($code);
    //     $result['status'] = true; 
    //     echo json_encode($result); 
    // }
}
