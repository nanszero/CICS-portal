<!-- Modal -->
<form method="POST" id="myForm">
    <div class="modal fade" data-keyboard="false" data-backdrop="static" id="addRowModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">									
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title">
                        <span class="fw-mediumbold">
                        Course</span> 
                        <span class="fw-light">
                            Details
                        </span>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">          
                    <div class="row p-3" id="data_for_edit">
                        <div class="col-md-12">
                            <div class="form-group form-group-default">
                                <label><span class="text-danger">*</span> Subject Code</label>
                                <input type="hidden" name="id" id="id">
                                <input  type="text" name="code" id="code" class="form-control" placeholder="" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group form-group-default">
                                <label><span class="text-danger">*</span> Subject</label>
                                <input  type="text" name="subject" id="subject" class="form-control" placeholder="" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer no-bd">
                    <button type="submit" name="btnssave" id="btnssave" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</form>