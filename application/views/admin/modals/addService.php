<!-- Large Size -->
    <div class="modal fade" id="addService" tabindex="-1" role="dialog" data-backdrop="static">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-cyan">
                    <h4 class="modal-title" id="ss">Add New Service</h4>
                </div>
                
                <div class="modal-body">
                    <form id="add-service-form"><br>
                        <div class="col-sm-12">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" name="service" class="form-control" required="required">
                                    <label class="form-label">Service Description</label>
                                </div>
                                <small style="color:red"></small>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" name="price" class="form-control" required="required">
                                    <label class="form-label">Price</label>
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
                            <button type="button" onclick="services.add_service()" class="btn btn-link waves-effect">SAVE</button>
                    </div>
                    
                    
                </div>
            </div>
        </div>
    </div>