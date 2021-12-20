<!-- Modal -->
<form action="<?= base_url()?>/driver_type/add" method="POST" id="myForm">
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
                                <label><span class="text-danger"><span class="text-danger">*</span></span> Service Code</label>
                                <input  type="text" name="service_code" id="service_code" class="form-control" placeholder="Last name" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group form-group-default">
                                <label><span class="text-danger">*</span> Service</label>
                                <input  type="text" name="service" id="service" class="form-control" placeholder="First name" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group form-group-default">
                                <label><span class="text-danger">*</span> Fee</label>
                                <input  type="text" name="fee" id="fee"class="form-control" placeholder="Mi" required>
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