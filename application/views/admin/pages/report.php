<body class="theme-cyan">
     <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <ol class="breadcrumb breadcrumb-col-cyan">
                    <li><a href="javascript:void(0);">Reports</a></li>
                </ol>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Active Partnership with LGUs, Industries, NGOs, NGAs, SMEs AND Other Stake Holders As Result of Extension Activities
                            </h2>
                        </div>
                        <div class="body table-responsive">
                            <table id="report-table-1" class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr style="font-size: 12px">
                                        <th>No.</th>
                                        <th>Title of Extension Program</th>
                                        <th>Partner</th>
                                        <th>No. of Beneficiaries</th>
                                        <th>Implementing College</th>
                                        <th>Remarks</th>
                                        <th>Moa Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card">
                        <div class="header">
                            <h2>
                                Persons Trained Weighted By The Length Of Training
                            </h2>
                        </div>
                        <div class="body table-responsive">
                            <table id="report-table-2" class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr style="font-size: 12px">
                                        <th>No.</th>
                                        <th>Title of Extension Programs</th>
                                        <th>Beneficiaries Served</th>
                                        <th>No. Of Persons Trained Weighted</th>
                                        <th>Date Started</th>
                                        <th>Date Ended</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card">
                        <div class="header">
                            <h2>
                                Extension Programs Organized And Supported Consistent With The SUCs Mandated And Priority Program
                            </h2>
                        </div>
                        <div class="body table-responsive">
                            <table id="report-table-3" class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr style="font-size: 12px">
                                        <th>No.</th>
                                        <th>Title of Extension Program</th>
                                        <th>Place Conducted</th>
                                        <th>No. Of Trainees</th>
                                        <th>Remarks</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card">
                        <div class="header">
                            <h2>
                                Beneficiaries Who Rated The Program As Satisfactory
                            </h2>
                        </div>
                        <div class="body table-responsive">
                            <table id="report-table-4" class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr style="font-size: 12px">
                                        <th>No.</th>
                                        <th>Title of Extension Programs</th>
                                        <th>Beneficiaries Served</th>
                                        <th>Numerical Rating</th>
                                        <th>Descriptive Rating</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
<?php //$this->load->view('admin/modals/addMedicine'); ?>
<?php //$this->load->view('admin/modals/updateMedicine'); ?>

<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function () {
    
        var report_table_1 = $('#report-table-1').DataTable({
            dom: 'Bfrtip',
            responsive: true,
            buttons: [
                {
                    extend: 'csv',
                    title: 'Active Partnership',
                    text: 'Download CSV',
                    className: 'btn-success'
                }
            ],
            "columns": [
                { "width": "5%" },
                null,
                null,
                null,
                null,
                null,
                null
            ]
        });

        var report_table_2 = $('#report-table-2').DataTable({
            dom: 'Bfrtip',
            responsive: true,
            buttons: [
                {
                    extend: 'csv',
                    title: 'Persons Trained',
                    text: 'Download CSV',
                    className: 'btn-success'
                }
            ],
            "columns": [
                { "width": "5%" },
                null,
                null,
                null,
                { "width": "13%" },
                { "width": "13%" }
            ]
        });

        var report_table_3 = $('#report-table-3').DataTable({
            dom: 'Bfrtip',
            responsive: true,
            order: [[ 0, "desc" ]],
            buttons: [
                {
                    extend: 'csv',
                    title: 'Organized Program',
                    text: 'Download CSV',
                    className: 'btn-success'
                }
            ],
            columnDefs: [ 
                {
                    orderable: false,
                    targets:   4
                }
            ],
            "columns": [
                { "width": "5%" },
                null,
                null,
                null,
                null
            ]
        });

        var report_table_4 = $('#report-table-4').DataTable({
            dom: 'Bfrtip',
            responsive: true,
            order: [[ 0, "desc" ]],
            buttons: [
                {
                    extend: 'csv',
                    title: 'Beneficiaries Rated',
                    text: 'Download CSV',
                    className: 'btn-success'
                }
            ],
            columnDefs: [ 
                {
                    orderable: false,
                    targets:   4
                }
            ],
            "columns": [
                { "width": "5%" },
                null,
                null,
                null,
                null
            ]
        });

        reports.fetch_reports();
        
        var sidemenu = $('#menu-report').removeClass().addClass('active');
});
</script>
