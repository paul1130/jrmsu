<body class="theme-cyan">
     <section class="content">
        <div class="container-fluid">
            <div class="block-header">
            <ol class="breadcrumb breadcrumb-col-cyan">
                <li><a href="<?= base_url('beneficiary') ?>">Beneficiary</a></li>
                <li><a href="javascript:void(0);" style="color: #333 !important;">View Beneficiary</a></li>
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
                                <form id="update-beneficiary-form">
                                <input type="hidden" name="beneficiary_id" value="<?= $beneficiary[0]["id"] ?>">
                                    <div class="col-sm-8">
                                        <div class="col-sm-4">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <input type="text" name="first_name" class="form-control" required="required" value="<?= $beneficiary[0]["first_name"] ?>">
                                                    <label class="form-label">First Name</label>
                                                </div>
                                                <small style="color:red"></small>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <input type="text" name="middle_name" class="form-control" required="required" value="<?= $beneficiary[0]["middle_name"] ?>">
                                            <label class="form-label">Middle Name</label>
                                                </div>
                                                <small style="color:red"></small>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <input type="text" name="last_name" class="form-control" required="required" value="<?= $beneficiary[0]["last_name"] ?>">
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
                                                    <input type="text" name="dob" class="datepicker form-control" placeholder="Birth Date" value="<?= $beneficiary[0]["birth_date"] ?>">
                                                </div>
                                                <small style="color:red"></small>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <input type="text" name="contact" class="form-control" required="required" value="<?= $beneficiary[0]["contact_no"] ?>">
                                                    <label class="form-label">Contact No</label>
                                                </div>
                                                <small style="color:red"></small>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <input type="text" name="address" class="form-control" required="required" value="<?= $beneficiary[0]["address"] ?>">
                                                    <label class="form-label">Address</label>
                                                </div>
                                                <small style="color:red"></small>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <select name="civil_status" class="form-control" placeholder="Civil Status" >
                                                        <option value='' style='display: none'></option>
                                                        <option value='single' <?= $beneficiary[0]["civil_status"] == "single" ? "selected" : '' ?>>Single</option>
                                                        <option value='married'<?= $beneficiary[0]["civil_status"] == "married" ? "selected" : '' ?>>Married</option>
                                                    </select>
                                                </div>
                                                <small style="color:red"></small>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <select name="program_id" class="form-control implementor" placeholder="Program" >
                                                        <option value='' style='display: none'></option>
                                                        <?php foreach($programs as $program) { ?>
                                                            <option value='<?= $program["id"] ?>' <?= $program["id"] == $beneficiary[0]["program_id"] ? "selected" : '' ?>><?= $program["title"] ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <small style="color:red"></small>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <form id="update-pic-form" enctype="multipart/form-data">
                                    <input type="hidden" name="record_id" value="<?= $beneficiary[0]["id"] ?>">
                                    <div class="col-sm-4 text-center">
                                        <div class="col-sm-12"> 
                                            <img src="<?= $profile_pic ? base_url("uploads/profile/".$profile_pic[0]["file_name"]) : base_url("assets/img/profile-pic.jpg") ?>" id="preview-pic" class="img-rounded" alt="Cinque Terre" height="303">
                                        </div>
                                        <div class="col-sm-12">
                                            <label for="profile-pic" type="button" class="btn bg-orange waves-effect">Browse</label>
                                            <input type="file" name="profile_pic[]" id="profile-pic" style="display: none" onchange="beneficiary.update_pic(this)"/>
                                            <button type="button" class="btn bg-pink waves-effect" onclick="beneficiary.update_profile_pic()">Update Picture</button>
                                        </div>
                                    </div>
                                </form>
                                <div class="col-sm-12">
                                    <button id="sign-up" style="float: right; margin-right: 50px" type="button" onclick="beneficiary.update_beneficiary()" class="btn bg-green waves-effect">Save Changes</button>
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

    // Webcam.set({
    //     height: 200,
    //     width: 300,
    //     // crop_width:300,
    //     // crop_height:200,
    //     image_format: 'jpeg',
    //     jpeg_quality: 90
    // });

    // Webcam.attach('#my_camera');



});

// function take_snapshot() {
//     Webcam.snap( function(data_uri) {
//         $(".image-tag").val(data_uri);
//         document.getElementById('results').innerHTML = '<img src="'+data_uri+'"/>';
//     } );
// }

</script>
