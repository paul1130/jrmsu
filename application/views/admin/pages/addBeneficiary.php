<body class="theme-cyan">
     <section class="content">
        <div class="container-fluid">
            <div class="block-header">
            <ol class="breadcrumb breadcrumb-col-cyan">
                <li><a href="<?= base_url('program') ?>">Beneficiary</a></li>
                <li><a href="javascript:void(0);" style="color: #333 !important;">Add Beneficiary</a></li>
            </ol>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Details
                            </h2>
                        </div>
                        <div class="body">
                            <div class="row clearfix">
                                <form id="add-program-form">
                                    <div class="col-sm-8">
                                        <div class="col-sm-4">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <input type="text" name="title" class="form-control" required="required">
                                                    <label class="form-label">First Name</label>
                                                </div>
                                                <small style="color:red"></small>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <input type="text" name="title" class="form-control" required="required">
                                            <label class="form-label">Middle Name</label>
                                                </div>
                                                <small style="color:red"></small>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <input type="text" name="title" class="form-control" required="required">
                                                    <label class="form-label">Last Name</label>
                                                </div>
                                                <small style="color:red"></small>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <!-- <span class="input-group-addon">    
                                                    <i class="material-icons">perm_contact_calendar</i>
                                                </span> -->
                                                <div class="form-line">
                                                    <input type="text" name="date" class="datepicker form-control" placeholder="Birth Date">
                                                </div>
                                                <small style="color:red"></small>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <input type="text" name="partner" class="form-control" required="required">
                                                    <label class="form-label">Contact No</label>
                                                </div>
                                                <small style="color:red"></small>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <input type="text" name="conducted" class="form-control" required="required">
                                                    <label class="form-label">Address</label>
                                                </div>
                                                <small style="color:red"></small>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <select name="civil_status" class="form-control implementor" placeholder="Civil Status" >
                                                        <option value='' style='display: none'></option>
                                                        <option value='1'>Single</option>
                                                        <option value='2'>Married</option>
                                                    </select>
                                                </div>
                                                <small style="color:red"></small>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <select name="civil_status" class="form-control implementor" placeholder="Program" >
                                                        <option value='' style='display: none'></option>
                                                        <option value='1'>Single</option>
                                                        <option value='2'>Married</option>
                                                    </select>
                                                </div>
                                                <small style="color:red"></small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4 text-center card">
                                        <div class="col-md-6">
                                            <div id="my_camera" >
                                            </div>
                                            <input type="hidden" name="image" class="image-tag">
                                        </div>
                                        <div class="col-sm-6">
                                            <div id="results">
                                                Your captured image will appear here...
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <button type="button" class="btn bg-orange waves-effect">Upload</button>
                                            <button type="button" class="btn bg-pink waves-effect" onClick="take_snapshot()">Take Picture</button>
                                        </div>
                                    </div>
                                </form>
                                <div class="col-sm-12">
                                    <button id="sign-up" style="float: right; margin-right: 50px" type="button" onclick="programs.add_program()" class="btn bg-green waves-effect">Save</button>
                                </div>
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
    var sidemenu = $('#menu-beneficiary').addClass('active');

    $('.datetimepicker').bootstrapMaterialDatePicker({
        format: 'dddd DD MMMM YYYY - HH:mm',
        clearButton: true,
        shortTime: true
    });

    $('.datepicker').bootstrapMaterialDatePicker({
        format: 'YYYY-MM-DD',
        clearButton: true,
        time: false
    });
    
    $('.datepicker-started').bootstrapMaterialDatePicker({
        format: 'YYYY-MM-DD - HH:mm',
        clearButton: true,
        shortTime: true
    });

    $('.datepicker-ended').bootstrapMaterialDatePicker({
        format: 'YYYY-MM-DD - HH:mm',
        clearButton: true,
        shortTime: true
    });

    $('.timepicker').bootstrapMaterialDatePicker({
        format: 'HH:mm',
        clearButton: true,
        date: false
    });

    Webcam.set({
        height: 200,
        width: 300,
        // crop_width:300,
        // crop_height:200,
        image_format: 'jpeg',
        jpeg_quality: 90
    });

    Webcam.attach('#my_camera');

});

function take_snapshot() {
    Webcam.snap( function(data_uri) {
        $(".image-tag").val(data_uri);
        document.getElementById('results').innerHTML = '<img src="'+data_uri+'"/>';
    } );
}

</script>
