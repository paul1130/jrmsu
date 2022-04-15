<!-- Large Size -->
    <div class="modal fade" id="addFeedback" tabindex="-1" role="dialog" data-backdrop="static">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-cyan">
                    <h4 class="modal-title" id="ss">Add New Feedback</h4>
                </div>
                
                <div class="modal-body">
                    <form id="add-feedback-form"><br>
                        <div class="col-sm-12">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" name="emailad" class="form-control">
                                    <label class="form-label">Email Address</label>
                                </div>
                                <small style="color:red"></small>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <textarea rows="3" name="message" class="form-control no-resize"></textarea>
                                    <label class="form-label">Message</label>
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
                            <button type="button" onclick="feedback.add_feedback()" class="btn btn-link waves-effect">SAVE</button>
                    </div>
                    
                    
                </div>
            </div>
        </div>