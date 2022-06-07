<body class="theme-cyan">
     <section class="content">
        <div class="container-fluid">
            <div class="block-header">
            <ol class="breadcrumb breadcrumb-col-cyan">
                <li><a href="<?= base_url('program') ?>">Extension Programs</a></li>
                <li><a href="javascript:void(0);" style="color: #333 !important;">Add Program</a></li>
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
                                    <div class="col-sm-12">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="text" name="title" class="form-control" required="required">
                                                <label class="form-label">Title</label>
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
                                                <input type="text" name="date" class="datepicker form-control" placeholder="Conduction date...">
                                            </div>
                                            <small style="color:red"></small>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="text" name="partner" class="form-control" required="required">
                                                <label class="form-label">Partner LGUs/NGAs/SMEs/Industries/ others</label>
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
                                                <input type="text" name="started" class="datepicker-started form-control" placeholder="Started">
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
                                                <input type="text" name="ended" class="datepicker-ended form-control" placeholder="Ended">
                                            </div>
                                            <small style="color:red"></small>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="text" name="conducted" class="form-control" required="required">
                                                <label class="form-label">Place Conducted</label>
                                            </div>
                                            <small style="color:red"></small>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <select name="implementor[]" class="form-control implementor" multiple>
                                                    <option value='' style='display: none'>Implementing College</option>
                                                    <?php foreach ($courses as $course) {?>
                                                        <option value="<?=$course["id"]?>"><?=$course["acronym"]?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <small style="color:red"></small>
                                        </div>
                                    </div>
                                   
                                    <div class="col-sm-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="text" name="beneficiary" class="form-control" required="required">
                                                <label class="form-label">No. of Beneficiary</label>
                                            </div>
                                            <small style="color:red"></small>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="text" name="trained" class="form-control" required="required">
                                                <label class="form-label">No. Of Persons Trained</label>
                                            </div>
                                            <small style="color:red"></small>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="text" name="numerical_rating" class="form-control" required="required">
                                                <label class="form-label">Numerical Rating</label>
                                            </div>
                                            <small style="color:red"></small>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="text" name="descriptive_rating" class="form-control" required="required">
                                                <label class="form-label">Descriptive Rating</label>
                                            </div>
                                            <small style="color:red"></small>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <select name="moa_status" class="form-control" placeholder="Moa Status">
                                                    <option value='' style='display: none'>Moa Status</option>
                                                    <?php foreach (moa_status as $key => $value) {?>
                                                        <option value="<?=$key?>"><?=$value?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <small style="color:red"></small>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <select name="remarks" class="form-control" placeholder="Moa Status">
                                                    <option value='' style='display: none'>Remarks</option>
                                                    <?php foreach (remarks as $key => $value) {?>
                                                        <option value="<?=$key?>"><?=$value?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <small style="color:red"></small>
                                        </div>
                                    </div>
                                </form>
                                <form id="attachment-form" enctype="multipart/form-data">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="file" name="files[]" class="form-control" multiple required="required">
                                                <small style="color:red"></small>
                                            </div>
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
    var sidemenu = $('#menu-programs').addClass('active');

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

    // $("#add-program-form select[name=myTime]").selectpicker("destroy");
    // $("#add-program-form select[name=myTime]").selectpicker();
});
</script>
