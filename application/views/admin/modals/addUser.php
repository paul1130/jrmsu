<!-- Large Size -->
    <div class="modal fade" id="addUser" tabindex="-1" role="dialog" data-backdrop="static">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-cyan">
                    <h4 class="modal-title" id="ss">Add New User</h4>
                </div>
                
                <div class="modal-body" style="overflow: visible;">
                    <form id="add-user-form"><br>
                        <div class="col-sm-12">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" name="first_name" class="form-control" required="required">
                                    <label class="form-label">First Name</label>
                                </div>
                                <small style="color:red"></small>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" name="middle_name" class="form-control" required="required">
                                    <label class="form-label">Middle Name</label>
                                </div>
                                <small style="color:red"></small>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" name="last_name" class="form-control" required="required">
                                    <label class="form-label">Last Name</label>
                                </div>
                                <small style="color:red"></small>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <select class="form-select form-control" id="sel1" name="type">
                                        <option value='none' style='display: none'>User Type</option>
                                        <?php foreach (user_type as $key => $value) {  echo $value; ?>
                                            <option value="<?=$key?>"><?=$value?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <small style="color:red"></small>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" name="username" class="form-control" required="required">
                                    <label class="form-label">Username</label>
                                </div>
                                <small style="color:red"></small>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="password" name="password" class="form-control" required="required">
                                    <label class="form-label">Password</label>
                                </div>
                                <small style="color:red"></small>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" name="confirm_password" class="form-control" required="required">
                                    <label class="form-label">Verify Password</label>
                                </div>
                                <small style="color:red"></small>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-9 p-t-5"></div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer bg-cyan">
                    <!--<button type="button" class="btn btn-link waves-effect">SAVE CHANGES</button>-->
                    <div class="col-md-12">
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                            <button type="button" onclick="users.add_user()" class="btn btn-link waves-effect">SAVE</button>
                    </div>
                    
                    
                </div>
            </div>
        </div>
    </div>