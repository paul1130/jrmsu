<!-- Large Size -->
    <div class="modal fade" id="addProgram" tabindex="-1" role="dialog" data-backdrop="static">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-cyan">
                    <h4 class="modal-title" id="ss">Add New Program</h4>
                </div>
                
                <div class="modal-body">
                    <form id="add-medicine-form"><br>
                        <div class="col-sm-12">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" name="description" class="form-control">
                                    <label class="form-label">Medicine Description</label>
                                </div>
                                <small style="color:red"></small>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" name="price" class="form-control">
                                    <label class="form-label">Price</label>
                                </div>
                                <small style="color:red"></small>
                            </div>
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
                            <button type="button" onclick="medicines.add_medicine()" class="btn btn-link waves-effect">SAVE</button>
                    </div>
                    
                    
                </div>
            </div>
        </div>