<body class="theme-cyan">
     <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <ol class="breadcrumb breadcrumb-col-cyan">
                    <li><a href="javascript:void(0);">Extension Programs</a></li>
                </ol>
            </div>
            
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                               Programs Table
                            </h2>
                        </div>
                        <div class="body table-responsive">
                                <a href="<?= base_url('program/new') ?>" class="btn bg-blue waves-effect" role="button">Add Program</a>
                            <table id="programs-table" class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr style="font-size: 12px">
                                        <th>Title</th>
                                        <th>Conducted Date</th>
                                        <th>Implementor</th>
                                        <th>Remarks</th>
                                        <th>Moa Status</th>
                                        <th>Created</th>
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
<?php //$this->load->view('admin/modals/addProgram'); ?>
<?php //$this->load->view('admin/modals/updateprogram'); ?>

<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function () {

        var programs_table = $('#programs-table').DataTable({
        dom: 'frtip',
        responsive: true,
        order: [[ 5, "desc" ]],
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
    //            className: 'select-checkbox',
                targets:   5
    //            width: "3%"
            }
        ],
        "columns": [
            null,
            { "width": "12%" },
            null,
            { "width": "5%" },
            { "width": "8%" },
            { "width": "13%" },
            { "width": "8%" }
        ]
});
        
    programs.fetch_programs();
    
    var sidemenu = $('#menu-programs').removeClass().addClass('active');
});
</script>
