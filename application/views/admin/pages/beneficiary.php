<body class="theme-cyan">
     <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <ol class="breadcrumb breadcrumb-col-cyan">
                    <li><a href="javascript:void(0);">Beneficiary</a></li>
                </ol>
            </div>
            
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                               Beneficiaries Table
                            </h2>
                        </div>
                        <div class="body table-responsive">
                            <a href="<?= base_url('beneficiary/new') ?>" class="btn bg-blue waves-effect" role="button">Add Beneficiary</a>
                            <table id="beneficiaries-table" class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr style="font-size: 12px">
                                        <th>Full Name</th>
                                        <th>Program</th>
                                        <th>Birthdate</th>
                                        <th>Contact No</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
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
        
        var programs_table = $('#beneficiaries-table').DataTable({
            dom: 'frtip',
            responsive: true,
            order: [[ 0, "desc" ]],
            // buttons: [
            //     {
            //         extend: 'pdf',
            //         title: 'Proofsheet Summary'
            //     }
            // ],
            buttons: [
                'copy', 'excel', 'pdf'
            ],
            columnDefs: [ 
                {
                    orderable: false,
                    targets:   4
                }
            ],
            // "columns": [
            //     null,
            //     { "width": "12%" },
            //     null,
            //     { "width": "5%" },
            //     { "width": "8%" },
            //     { "width": "13%" },
            //     { "width": "8%" }
            // ]
    });
        
    // programs.fetch_programs();
    
    var sidemenu = $('#menu-beneficiary').removeClass().addClass('active');
});
</script>
