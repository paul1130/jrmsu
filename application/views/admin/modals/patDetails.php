<!-- Large Size -->
    <div class="modal fade" id="patDetails" tabindex="-1" role="dialog" data-backdrop="static">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-cyan">
                    <h4 class="modal-title" id="ss">Patient Details</h4>
                </div>
                
                <div class="modal-body">
                    <form id="add-medicine-form"><br>
                        <div class="col-sm-12">
                            <table>
                                <tr>
                                    <td><span>Name : </span></td><td><b><span id="pat-name"></span></b></td>
                                    <td style="padding-left: 10px;"><span>Contact No :</span></td><td><b><span id="pat-contact"></span></b></td>
                                </tr>
                                <tr>
                                    <td style="padding-top: 10px;"><span>Appointment Date : </span></td><td style="padding-top: 10px;"><b><span id="pat-date"></span></b></td>
                                    <td style="padding-left: 10px;padding-top: 10px;"><span>Time : </span></td><td style="padding-top: 10px;"><b><span id="pat-time"></span></b></td>
                                </tr>
                                <tr>
                                    <td style="padding-top: 10px;"><span>Bill : </span></td><td style="padding-top: 10px;"><b><span id="pat-bill"></span></b><br></td>
                                </tr>
                            </table>
                            
                        </div>
                        <div class="col-sm-12" style="margin-top: 20px;">
                            <label>Medicines</label>
                            <div class="table-responsive">
                                <table id="pat-meds-table" class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>Description</th>
                                            <th>Dose</th>
                                            <th>Qty</th>
                                        </tr>
                                    </thead>
                                </table>
                             </div>
                        </div>
                        <div class="col-sm-12" style="margin-top: 20px;">
                            <label>Services</label>
                            <div class="table-responsive">
                                <table id="pat-sers-table" class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>Description</th>
                                        </tr>
                                    </thead>
                                </table>
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
                    </div>
                    
                    
                </div>
            </div>
        </div>