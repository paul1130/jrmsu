<body class="theme-cyan">
     <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Services</h2>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                <small>250 php for regular consultation fee but this is indicated and may vary. You may contact us or visitour clinic for more information about the service fee.</small>
                            </h2>
                        </div>
                        <div class="body">
                            <div class="list-group">
                                <?php for ($i = 0; $i < count($services); $i++) { ?>
                                    <button type="button" class="list-group-item"><?= $services[$i]["description"] ?></button>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function () {
    var sidemenu = $('#menu-services').addClass('active');
});
</script>
