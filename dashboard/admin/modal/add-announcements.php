<!-- Modal -->
<form  method="POST" id="myForm" enctype="multipart/form-data">
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
                    <div class="row p-3 annmt_form" id="data_for_edit">    
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group form-group-default">
                                    <label><span class="text-danger">*</span> Date</label>
                                    <input type="hidden" name="id" id="id">
                                    <input  type="date" name="date" id="date" class="form-control"  required>
                                </div>
                            </div>
                           <div class="col-md-12">
                                <div class="form-group form-group-default">
                                    <label><span class="text-danger">*</span> Announcement Name</label>
                                    <input  type="text" name="name" id="name" class="form-control"  required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group form-group-default">
                                    <label><span class="text-danger">*</span> Banner</label>
                                    <input  type="file" name="userfile" id="userfile" class="form-control"  required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group form-group-default">
                                    <label><span class="text-danger"></span> Description</label>
                                    <textarea name="description" id="description" cols="30" rows="3" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                  

                </div>
                <div class="modal-footer no-bd">
                    <button type="submit" name="btnssave" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</form>