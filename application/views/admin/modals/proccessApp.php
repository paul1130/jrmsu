<!-- Large Size -->
    <div class="modal fade" id="proccessApp" tabindex="-1" role="dialog" data-backdrop="static">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-cyan">
                    <h4 class="modal-title" id="ss">Proccess Appointment</h4><small></small>
                </div>
                
                <div class="modal-body">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header patient-name">
                            <h2>
                                Personal Information
                            </h2>
                        </div>
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <!-- Nav tabs -->
                                    <ul class="nav nav-tabs tab-nav-right" role="tablist">
                                        <li id="day1-tab" role="presentation" class="active"><a href="#profile_animation_2" data-toggle="tab">Consultation Form</a></li>
                                        <li id="day2-tab" role="presentation" ><a href="#home_animation_2" data-toggle="tab">Prescription Form</a></li>
                                        
                                        <li id="day3-tab" role="presentation"><a href="#messages_animation_2" data-toggle="tab">Billing Form</a></li>
                                    </ul>

                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                        <div role="tabpanel" class="tab-pane animated active" id="profile_animation_2">
                                            <form id="consult-form">
                                                    <div class="col-md-12">
                                                    <label>
                                                        Prepared By
                                                    </label>
                                                    <div class="input-group">
                                                        <div class="form-line">
                                                            <input name="prepare" tabindex="1" type="text" class="form-control" value="" placeholder="Type Here">
                                                        </div>
                                                        <small style="color:red"></small>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <label>
                                                        Examined By
                                                     </label>
                                                    <div class="input-group">
                                                        <div class="form-line">
                                                            <input name="examine" tabindex="1" type="text" class="form-control" value="" placeholder="Type Here">
                                                        </div>
                                                        <small style="color:red"></small>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div role="tabpanel" class="tab-pane animated" id="home_animation_2">
                                            <form id="pres-form">
                                                <input type="hidden" name="code" value="">
                                                <div class="col-md-4">
                                                <label>
                                                    Medicine
                                                </label>
                                                <select id="medicine-codes" name="code" class="form-control show-tick" data-live-search="true">
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <label>
                                                    Quantity
                                                 </label>
                                                <div class="input-group">
                                                    <div class="form-line">
                                                        <input name="qty" tabindex="1" type="text" class="form-control" value="1" placeholder="0">
                                                    </div>
                                                    <small style="color:red"></small>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <label>
                                                    Dose
                                                 </label>
                                                <div class="input-group">
                                                    <div class="form-line">
                                                        <input name="dose" tabindex="1" type="text" class="form-control" placeholder="Enter here">
                                                    </div>
                                                    <small style="color:red"></small>
                                                </div>
                                            </div>
                                            <div class="col-md-10">
                                                <label>
                                                    Remarks
                                                </label>
                                                <div class="input-group">
                                                    <div class="form-line">
                                                        <textarea style="resize: none;" name="remark" class="form-control"></textarea>
                                                    </div>
                                                    <small style="color:red"></small>
                                                </div>
                                            </div>
                                            </form>
                                            
                                            <div class="col-md-2">
                                                <button type="button" style="margin-top: 25px; margin-left: 20px;" onclick="appointment.add_med()" class="btn btn-success">Add</button>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="table-responsive">
                                                    <table id="pat-medicine-table" class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                                        <thead>
                                                            <tr>
                                                                <th>Medicine Code</th>
                                                                <th>Description</th>
                                                                <th>Dose</th>
                                                                <th>Qty</th>
                                                                <th>Price</th>
                                                                <th>Remarks</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                    </table>
                                                 </div>
                                            </div>
                                        </div>
                                        
                                        <div role="tabpanel" class="tab-pane animated" id="messages_animation_2">
                                            <form id="bill-form">
                                                <div class="col-md-5">
                                                <label>
                                                    Service
                                                </label>
                                                <select id="service-codes" name="code" class="form-control show-tick" data-live-search="true">
                                                </select>
                                            </div>
                                            <div class="col-md-5">
                                                <label>
                                                    Type
                                                 </label>
                                                <div class="input-group">
                                                    <div class="form-line">
                                                        <input name="type" tabindex="1" type="text" class="form-control" placeholder="Enter here">
                                                    </div>
                                                    <small style="color:red"></small>
                                                </div>
                                            </div>
                                            </form>
                                            
                                            <div class="col-md-2">
                                                <button type="button" style="margin-top: 25px; margin-left: 20px;" onclick="appointment.add_ser()" class="btn btn-success">Add</button>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="table-responsive">
                                                    <table id="pat-service-table" class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                                        <thead>
                                                            <tr>
                                                                <th>Service Code</th>
                                                                <th>Description</th>
                                                                <th>Type</th>
                                                                <th>Price</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                    </table>
                                                 </div>

                                                 <button onclick="appointment.proccess_pat()" style="float: right; width: 100px; height: 40px; font-size: 16px; margin-top: 10px;" type="button" onclick="appointment.proccess_pat()" class="btn btn-sm bg-blue waves-effect btn-remove-med">SAVE</button>
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
                <div class="modal-footer">
                    <!--<button type="button" class="btn btn-link waves-effect">SAVE CHANGES</button>-->
                    <div class="col-md-12">
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                            <!-- <button type="button" onclick="appointment.proccess_pat()" class="btn btn-link waves-effect">SEND REQUEST</button> -->
                    </div>
                    
                    
                </div>
            </div>
        </div>