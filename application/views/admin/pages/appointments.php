<body class="theme-cyan">
     <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <ol class="breadcrumb breadcrumb-col-cyan">
                    <li><a href="javascript:void(0);">Appointments</a></li>
                </ol>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Appointments Records
                                <!--<small>You can use different animation class. We used Animation.css which link is <a href="https://daneden.github.io/animate.css/" target="_blank">https://daneden.github.io/animate.css/</a></small>-->
                            </h2>
                        </div>
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <!-- Nav tabs -->
                                    <ul class="nav nav-tabs tab-nav-right" role="tablist">
                                        <li id="day1-tab" role="presentation" class="active"><a href="#home_animation_1" data-toggle="tab">Request</a></li>
                                        <li id="day2-tab" role="presentation"><a href="#profile_animation_1" data-toggle="tab">Approved</a></li>
                                    </ul>

                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                        <div role="tabpanel" class="tab-pane animated active" id="home_animation_1">
                                            <div class="table-responsive">
                                                <table id="appointment-table" class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                                    <thead>
                                                        <tr>
                                                            <th>Code</th>
                                                            <th>Name</th>
                                                            <th>Contact no</th>
                                                            <th>Date</th>
                                                            <th>Queue</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                </table>
                                            </div>
                                        </div>
                                        <div role="tabpanel" class="tab-pane animated" id="profile_animation_1">
                                            <div class="table-responsive">
                                                <table id="approved-appointment-table" class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                                    <thead>
                                                        <tr>
                                                            <th>Code</th>
                                                            <th>Name</th>
                                                            <th>Contact no</th>
                                                            <th>Date</th>
                                                            <th>Queue</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                </table>
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row clearfix">
            </div>
        </div>
    </section>
</body>
<?php $this->load->view('admin/modals/proccessApp.php'); ?>
<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function () {
    
    var sidemenu = $('#menu-appointment').removeClass().addClass('active');

    appointment.fetch_apps();
    appointment.get_medicines();
    appointment.get_services();
});
</script>