<!-- Modal -->
<form action="" method="POST" id="myForm">
    <div class="modal fade" data-keyboard="false" data-backdrop="static" id="addRowModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">									
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title">
                        <span class="fw-mediumbold">
                        New</span> 
                        <span class="fw-light">
                            Row
                        </span>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">          
                    <div class="row p-3" id="data_for_edit">
                        <div class="col-md-12" id="error_msg">
                        </div>    
                        <div class="col-md-4">
                            <div class="form-group form-group-default">
                                <label><span class="text-danger">*</span> Submit To</label>
                                <select name="civil_status" id="civil_status" class="form-control" required>
                                    <option value="">Select</option>
                                    <option value="Check Up">Teacher Ana</option>
                                    <option value="Check Up">Teacher Eva</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group form-group-default">
                                <label><span class="text-danger">*</span> File To Submit</label>
                                <select name="civil_status" id="civil_status" class="form-control" required>
                                    <option value="">Select</option>
                                    <option value="Check Up">Teacher Ana</option>
                                    <option value="Check Up">Teacher Eva</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group form-group-default">
                                <label><span class="text-danger">*</span> Date Submit</label>
                                <input  type="text" name="file_name" id="file_name" class="form-control" value="<?= date('Y-m-d')?>" disabled required>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group form-group-default">
                                <label><span class="text-danger">*</span> Remarks</label>
                               <textarea name="description" id="description" class="form-control" cols="30" rows="5"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer no-bd">
                    <button type="button" id="btnssave" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</form>