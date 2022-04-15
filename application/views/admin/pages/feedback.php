<body class="theme-cyan">
     <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <ol class="breadcrumb breadcrumb-col-cyan">
                    <li><a href="javascript:void(0);">Feedbacks</a></li>
                </ol>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Costumers Feedback
                            </h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table id="feed-table" class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>Email</th>
                                            <th>Message</th>
                                            <th>Date/Time</th>
                                        </tr>
                                    </thead>
                                    </tbody>
                                </table>
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

<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function () {
    
    var sidemenu = $('#menu-feedback').removeClass().addClass('active');
    myFeed.get_feedback();
});
</script>