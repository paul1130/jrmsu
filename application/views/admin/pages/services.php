<body class="theme-cyan">
     <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <ol class="breadcrumb breadcrumb-col-cyan">
                    <li><a href="javascript:void(0);">Services</a></li>
                </ol>
            </div>
            
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                               Services Table
                            </h2>
                        </div>
                        <div class="body table-responsive">
                                <button type="button" data-toggle="modal" href="#addService" class="btn bg-blue waves-effect">Add Service</button>
                            <table id="services-table" class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr style="font-size: 12px">
                                        <th>Service Code</th>
                                        <th>Service</th>
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
<?php $this->load->view('admin/modals/addService'); ?>
<?php $this->load->view('admin/modals/updateService'); ?>

<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function () {
        
    services.fetch_services();
    
    var sidemenu = $('#menu-services').removeClass().addClass('active');
});
</script>
