<!-- Large Size -->
    <div class="modal fade" id="addAppointment" tabindex="-1" role="dialog" data-backdrop="static">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-cyan">
                    <h4 class="modal-title" id="ss">Appointment Schedule</h4><small></small>
                </div>
                
                <div class="modal-body">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Personal Information
                            </h2>
                        </div>
                        <div class="body">
                            <div class="row clearfix">
                                <form id="sign-up-form">
                                    <input type="hidden" name="xdate" class="form-control">
                                    <input type="hidden" name="xqueue" class="form-control">
                                <div class="col-sm-6">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">person</i>
                                        </span>
                                        <div class="form-line">
                                            <input name="name" tabindex="1" type="text" class="form-control date" placeholder="Fullname">
                                        </div>
                                        <small style="color:red"></small>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">person</i>
                                        </span>
                                        <div class="form-line">
                                            <input name="contactno" tabindex="1" type="text" class="form-control date" placeholder="Contact Number">
                                        </div>
                                        <small style="color:red"></small>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">person</i>
                                        </span>
                                        <div class="form-line">
                                            <input name="emailadd" tabindex="1" type="text" class="form-control date" placeholder="Email Address">
                                        </div>
                                        <small style="color:red"></small>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="input-group">
                                        <span class="input-group-addon">    
                                            <i class="material-icons">perm_contact_calendar</i>
                                        </span>
                                        <div class="form-line">
                                            <input name="bdate" type="text" class="datepicker2 form-control" placeholder="Birth Date">
                                        </div>
                                        <small style="color:red"></small>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="input-group">
                                        <span class="input-group-addon">    
                                            <i class="material-icons">perm_contact_calendar</i>
                                        </span>
                                        <div class="form-line">
                                            <textarea name="address" rows="1" class="form-control no-resize auto-growth" placeholder="Address"></textarea>

                                        </div>
                                        <small style="color:red"></small>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="input-group">
                                        <span class="input-group-addon">    
                                            <i class="material-icons">perm_contact_calendar</i>
                                        </span>
                                        <div class="form-line">
                                            <input name="gender" value="1" type="radio" id="maleRadio" class="with-gap radio-col-blue" />
                                            <label for="maleRadio">Male</label>
                                            <input name="gender" value="0" type="radio" id="femaleRadio" class="with-gap radio-col-pink" />
                                            <label for="femaleRadio">Female</label>
                                        </div>
                                        <small style="color:red"></small>
                                    </div>
                                </div>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
                <div class="modal-footer">
                    <!--<button type="button" class="btn btn-link waves-effect">SAVE CHANGES</button>-->
                    <div class="col-md-12">
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                            <button type="button" onclick="app.add_appointment()" class="btn btn-link waves-effect">SEND REQUEST</button>
                    </div>
                    
                    
                </div>
            </div>
        </div>