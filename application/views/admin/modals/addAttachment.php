<!-- Large Size -->
    <div class="modal fade" id="addAttachment" tabindex="-1" role="dialog" data-backdrop="static">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-cyan">
                    <h4 class="modal-title" id="ss">Add New Attachment</h4>
                </div>
                
                <div class="modal-body">
                    <form id="attachment-form" enctype="multipart/form-data">
                        <input type="hidden" name="record_id" value="<?= $program[0]["id"] ?>">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="file" name="files[]" class="form-control" multiple required="required">
                                        <small style="color:red"></small>
                                    </div>
                                </div>
                            </div>
                    </form>
                    <div class="row">
                        <div class="col-xs-9 p-t-5"></div>
                    </div>
                </div>
                <div class="modal-footer bg-cyan">
                    <div class="col-md-12">
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Close</button>
                            <button type="button" onclick="programs.add_attachment()" class="btn btn-link waves-effect">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </div>