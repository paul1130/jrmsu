<body class="theme-cyan">
     <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <ol class="breadcrumb breadcrumb-col-cyan">
                    <li><a href="javascript:void(0);">Appointment</a></li>
                </ol>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Application Form
                            </h2>
                        </div>
                        <div class="body">
                            <div class="row clearfix">
                                <form id="sched">
                                    <div class="col-sm-6">
                                        <div class="input-group">
                                            <span class="input-group-addon">    
                                                <i class="material-icons">perm_contact_calendar</i>
                                            </span>
                                            <div class="form-line">
                                                <input type="text" name="myDate" class="datepicker form-control" placeholder="Appointment date...">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">av_timer</i>
                                            </span>
                                            <div class="form-line">
                                                <select name="myTime" class="form-control show-tick" data-live-search="true" placeholder="asdf">
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                
                                <div class="col-sm-6">
                                    <button style=" margin-left: 250px" onclick="app.fetch_avail()" type="button" class="btn bg-blue waves-effect">Check Availability</button>
                                    <button id="sign-up" style="float: right; margin-right: 50px" type="button" onclick="app.sign_up()" class="btn disabled bg-green waves-effect">Sign Up</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

<?php $this->load->view('pages/modals/addAppointment'); ?>

<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function () {
    var sidemenu = $('#menu-appointment').addClass('active');
});
</script>
