<body class="theme-cyan">
     <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <ol class="breadcrumb breadcrumb-col-cyan">
                    <li><a href="javascript:void(0);">System User</a></li>
                </ol>
            </div>
            
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                               Users Table
                            </h2>
                        </div>
                        <div class="body table-responsive">
                                <button type="button" data-toggle="modal" href="#addUser" class="btn bg-blue waves-effect">Add User</button>
                            <table id="users-table" class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr style="font-size: 12px">
                                        <th>Name</th>
                                        <th>Access Type</th>
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
<?php $this->load->view('admin/modals/addUser'); ?>
<?php $this->load->view('admin/modals/updateUser'); ?>

<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function () {
        
    users.fetch_users();
    
    var sidemenu = $('#menu-user').removeClass().addClass('active');
});
</script>
