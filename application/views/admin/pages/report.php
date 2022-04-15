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
                                <button type="button" data-toggle="modal" href="#addMedicine" class="btn bg-blue waves-effect">Add Medicine</button>
                            <table id="medicines-table" class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr style="font-size: 12px">
                                        <th>Medicine Code</th>
                                        <th>Description</th>
                                        <th>Price</th>
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
<?php $this->load->view('admin/modals/addMedicine'); ?>
<?php $this->load->view('admin/modals/updateMedicine'); ?>

<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function () {
        
    medicines.fetch_medicines();
    
    var sidemenu = $('#menu-programs').removeClass().addClass('active');
});
</script>
