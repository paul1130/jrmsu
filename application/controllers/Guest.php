<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Guest
 *
 * @author DRAINWIZ-pc
 */
class Guest extends MY_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->model("dent_model");
    }
    
    public function index()
    {
        $data["page_title"] = "Home";
        $data["css"] = array(
            'assets/vendors/plugins/bootstrap/css/bootstrap.css',
            'assets/vendors/plugins/node-waves/waves.css',
            'assets/vendors/plugins/animate-css/animate.css',
            'assets/vendors/bower/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css',
            'assets/vendors/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css',
            'assets/vendors/plugins/sweetalert/sweetalert.css',
            'assets/vendors/css/style.css',
//                'assets/css/rowreorder.css',
            'assets/vendors/css/responsive.css',
            'assets/vendors/css/themes/all-themes.css',
            'assets/css/myStyle.css');

        $data["js"] = array(
            'assets/vendors/plugins/jquery/jquery.min.js',
            'assets/vendors/plugins/bootstrap/js/bootstrap.js',
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
            'assets/vendors/js/demo.js',
            'assets/js/dental.js',
            'assets/vendors/js/jquery.redirect.js',
            'assets/vendors/js/responsive.js');
        
        $this->guest_page("home", $data);
            
    }
    
    public function pictures()
    {
        $data["page_title"] = "Pictures";
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
        
        $this->guest_page("pictures", $data);
    }
    
    public function feedbacks()
    {
        $data["page_title"] = "Feedbacks";
        $data["feedbacks"] = $this->dent_model->get_feedbacks();
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
            'assets/vendors/plugins/bootstrap-select/js/bootstrap-select.js',
            'assets/vendors/plugins/jquery-slimscroll/jquery.slimscroll.js',
            'assets/vendors/plugins/bootstrap-notify/bootstrap-notify.js',
            'assets/vendors/plugins/node-waves/waves.js',
            'assets/vendors/plugins/momentjs/moment.js',
            'assets/vendors/plugins/sweetalert/sweetalert.min.js',
            'assets/vendors/js/admin.js',
            'assets/vendors/js/demo.js',
            'assets/js/guestfeedback.js');
        
        $this->guest_page("feedbacks", $data);
    }
    
    public function appointment() {
        $data["page_title"] = "Appointment";
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
            'assets/js/guestappointment.js'
            );
        
        $this->guest_page("appointment", $data);
    }
    
    public function dentist()
    {
        $data["page_title"] = "Dentist";
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
            'assets/vendors/plugins/bootstrap-select/js/bootstrap-select.js',
            'assets/vendors/plugins/jquery-slimscroll/jquery.slimscroll.js',
            'assets/vendors/plugins/bootstrap-notify/bootstrap-notify.js',
            'assets/vendors/plugins/node-waves/waves.js',
            'assets/vendors/plugins/momentjs/moment.js',
            'assets/vendors/plugins/sweetalert/sweetalert.min.js',
            'assets/vendors/js/admin.js',
            'assets/vendors/js/demo.js');
        
        $this->guest_page("dentist", $data);
    }
    
    public function about()
    {
        $data["page_title"] = "About Us";
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
            'assets/vendors/plugins/bootstrap-select/js/bootstrap-select.js',
            'assets/vendors/plugins/jquery-slimscroll/jquery.slimscroll.js',
            'assets/vendors/plugins/bootstrap-notify/bootstrap-notify.js',
            'assets/vendors/plugins/node-waves/waves.js',
            'assets/vendors/plugins/momentjs/moment.js',
            'assets/vendors/plugins/sweetalert/sweetalert.min.js',
            'assets/vendors/js/admin.js',
            'assets/vendors/js/demo.js');
        
        $this->guest_page("about", $data);
    }
    
    public function services()
    {
        $data["page_title"] = "Services";
        $data["services"] = $this->dent_model->get_service();
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
            'assets/vendors/plugins/bootstrap-select/js/bootstrap-select.js',
            'assets/vendors/plugins/jquery-slimscroll/jquery.slimscroll.js',
            'assets/vendors/plugins/bootstrap-notify/bootstrap-notify.js',
            'assets/vendors/plugins/node-waves/waves.js',
            'assets/vendors/plugins/momentjs/moment.js',
            'assets/vendors/plugins/sweetalert/sweetalert.min.js',
            'assets/vendors/js/admin.js',
            'assets/vendors/js/demo.js');
        
        $this->guest_page("services", $data);
    }
    
    public function test()
    {
        echo 'tessst';
    }
    
    public function get_available()
    {
        $result = array('status' => false);
        $date = $this->input->post("myDate");
        
        $available= $this->dent_model->get_date_available($date); 
        $timex = array("<option value='0' style='display: none'></option>",
                                "<option value='1'>10 am - 11 am</option>",
                                "<option value='2'>11 am - 12 pm</option>",
                                "<option value='3'>1 pm - 2 pm</option>",
                                "<option value='4'>2 pm - 3 pm</option>",
                                "<option value='5'>3 pm - 4 pm</option>",
                                "<option value='6'>4 pm - 5 pm</option>",
                                "<option value='7'>5 pm - 6 pm</option>");
        
        for ($i = 0; $i < count($available); $i++) {
            $index = intval($available[$i]["queue"]);
            unset($timex[$index]);
        }
        $result["timex"] = array();
        
        foreach ($timex as $value) {
            array_push($result["timex"], $value);
        }
        
        $result['status'] = true;
        
        echo json_encode($result);
    }


    public function add_appointment()
    {
        $result = array('status' => false);
        $config = array(
                array(
                    'field' => 'name',
                    'label' => 'Full Name',
                    'rules' => 'required'
                ),array(
                    'field' => 'contactno',
                    'label' => 'Contact No.',
                    'rules' => 'required'
                ),array(
                    'field' => 'emailadd',
                    'label' => 'Email Address',
                    'rules' => 'required|valid_email'
                ),array(
                    'field' => 'bdate',
                    'label' => 'Birth Date',
                    'rules' => 'required'
                ),array(
                    'field' => 'address',
                    'label' => 'Address',
                    'rules' => 'required'
                ),array(
                    'field' => 'gender',
                    'label' => 'Gender',
                    'rules' => 'required'
                )
            );
        
        $this->form_validation->set_rules($config);
        if ($this->form_validation->run() === FALSE){
            $result['error_name'] = form_error('name');
            $result['error_contactno'] = form_error('contactno');
            $result['error_emailadd'] = form_error('emailadd');
            $result['error_bdate'] = form_error('bdate');
            $result['error_address'] = form_error('address');
            $result['error_gender'] = form_error('gender');
        }else{
            if ($this->dent_model->insert_appointment()) {
                $result['status'] = true;
            }
        }
        $result['g'] = $this->input->post("gender");
        echo json_encode($result);
    }
}
