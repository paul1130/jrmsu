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
                                Customer's Feedbacks
                                <!-- <small>The images or other media can be aligned top, middle, or bottom. The default is top aligned.</small> -->
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="bs-example" id="feedbacks" data-example-id="media-alignment">
                                
                            </div>
                            <div class="media">
                                <button style="float: right; margin-right: 50px" type="button" data-toggle="modal" href="#addFeedback" class="btn bg-green waves-effect">Add Feedback</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Media Alignment -->
        </div>
    </section>
</body>

<?php $this->load->view('pages/modals/addFeedback'); ?>

<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function () {
    feedback.get_feedbacks();
    var sidemenu = $('#menu-feedback').addClass('active');
});
</script>
