<body class="theme-cyan">
     <section class="content">
        <div class="container-fluid">
            <div class="block-header">
            <ol class="breadcrumb breadcrumb-col-cyan">
                <li><a href="<?= base_url('program') ?>">Extension Programs</a></li>
                <li><a href="javascript:void(0);" style="color: #333 !important;">Program Details</a></li>
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
                                <form id="update-program-form">
                                    <input type="hidden" name="program_id" value="<?= $program[0]["id"] ?>">
                                    <div class="col-sm-12">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="text" name="title" class="form-control" required="required" value="<?= $program[0]["title"] ?>">
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
                                                <input type="text" name="date" class="datepicker form-control" placeholder="Conduction date..." value="<?= $program[0]["date"] ?>">
                                            </div>
                                            <small style="color:red"></small>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="text" name="partner" class="form-control" required="required" value="<?= $program[0]["partner"] ?>" >
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
                                                <input type="text" name="started" class="datepicker-started form-control" placeholder="Started" value="<?= date('Y-m-d - H:i', strtotime($program[0]["started"])) ?>">
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
                                                <input type="text" name="ended" class="datepicker-ended form-control" placeholder="Ended" value="<?=  date('Y-m-d - H:i', strtotime($program[0]["ended"])) ?>">
                                            </div>
                                            <small style="color:red"></small>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="text" name="conducted" class="form-control" required="required" value="<?= $program[0]["conducted"] ?>">
                                                <label class="form-label">Place Conducted</label>
                                            </div>
                                            <small style="color:red"></small>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <select name="implementor[]" class="form-control implementor" placeholder="Implementing College" multiple>
                                                    <option value='' style='display: none'></option>
                                                    <?php foreach ($courses as $course) {?>
                                                        <option value="<?=$course["id"]?>" <?= in_array($course["id"], $implementors) ? "selected" : '' ?>><?=$course["acronym"]?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <small style="color:red"></small>
                                        </div>
                                    </div>
                                   
                                    <div class="col-sm-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="text" name="beneficiary" class="form-control" required="required" value="<?= $program[0]["beneficiary"] ?>">
                                                <label class="form-label">No. of Beneficiary</label>
                                            </div>
                                            <small style="color:red"></small>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="text" name="trained" class="form-control" required="required" value="<?= $program[0]["trained"] ?>">
                                                <label class="form-label">No. Of Persons Trained</label>
                                            </div>
                                            <small style="color:red"></small>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="text" name="numerical_rating" class="form-control" required="required" value="<?= $program[0]["numerical_rating"] ?>">
                                                <label class="form-label">Numerical Rating</label>
                                            </div>
                                            <small style="color:red"></small>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="text" name="descriptive_rating" class="form-control" required="required" value="<?= $program[0]["descriptive_rating"] ?>">
                                                <label class="form-label">Descriptive Rating</label>
                                            </div>
                                            <small style="color:red"></small>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="text" name="moa_status" class="form-control" required="required" value="<?= $program[0]["moa_status"] ?>">
                                                <label class="form-label">Moa Status</label>
                                            </div>
                                            <small style="color:red"></small>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="text" name="remarks" class="form-control" required="required" value="<?= $program[0]["remarks"] ?>">
                                                <label class="form-label">Remarks</label>
                                            </div>
                                            <small style="color:red"></small>
                                        </div>
                                    </div>
                                </form>
                                <div class="col-sm-12">
                                    <button id="sign-up" style="float: right; margin-right: 50px" type="button" onclick="programs.update_program()" class="btn bg-green waves-effect">Update</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="header">
                            <h2>
                                Attachments
                            </h2>
                            <button style="float: right;margin-top: -21px;" type="button" data-toggle="modal" href="#addAttachment" class="btn bg-green waves-effect">Add</button>
                        </div>
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <ul class="list-group">
                                        <?php foreach($attachments as $attachment) { ?>
                                            <li class="list-group-item">
                                                <?= $attachment["original_file_name"] ?>
                                                <a style="float: right; margin-top: -5px" type="button" onclick="programs.delete_attachment(<?= $attachment['id'] ?>)" class="btn bg-red waves-effect">Delete</a>
                                                <a style="float: right; margin-top: -5px; margin-right: 10px;" href="<?php echo base_url("program/attachment-download?filename=".$attachment['file_name']."&orig_filename=".$attachment['original_file_name']); ?>" type="button" class="btn bg-blue waves-effect">View</a>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
<?php $this->load->view('admin/modals/addAttachment'); ?>

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

    // $('#update-program-form input').prop('readonly', true);
});
</script>
