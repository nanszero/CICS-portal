<!-- Modal -->
<form action="" method="POST" id="myForm">
    <div class="modal fade" data-keyboard="false" data-backdrop="static" id="addRowModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">									
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
                        <div class="col-md-12">
                            <div class="form-group form-group-default">
                                <label><span class="text-danger">*</span> Year(from)</label>
                                <input  type="year" name="year_from" id="year_from" class="form-control"  maxlength="4"   oninput="this.value = this.value.replace(/[^0-9.]/g, &quot;&quot;); this.value = this.value.replace(/(\..*)\./g, &quot;$1&quot;)" required>

                                <input  type="hidden" name="id" id="id" class="form-control" placeholder="" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group form-group-default">
                                <label><span class="text-danger">*</span> Year(to)</label>
                                <input  type="text" name="year_to" id="year_to" class="form-control"   maxlength="4"   oninput="this.value = this.value.replace(/[^0-9.]/g, &quot;&quot;); this.value = this.value.replace(/(\..*)\./g, &quot;$1&quot;)" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group form-group-default">
                                <label><span class="text-danger">*</span> Semester Title</label>
                                <input  type="text" name="semester" id="semester" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group form-group-default">
                                <label><span class="text-danger">*</span> Status</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="">Select</option>
                                    <option value="1">Open</option>
                                    <option value="0">Close</option>
                                </select>
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
    </div>
</form>