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
                                <label><span class="text-danger">*</span> School Year</label>
                                <input  type="hidden" name="id" id="id1" class="form-control" placeholder="" required>
                                <div class="input-group mb-3">
                                    <select name="id_student" id="id_student" class="form-control" required>
                                        <option value="">Select</option>
                                        <?php foreach($students as $row):?>
                                        <option value="<?= $row->id?>"><?= $row->first_name?></option>
                                        <?php endforeach;?>
                                    </select>
                                    <div class="input-group-append">
                                        <button type="button" class="btn btn-primary btn-sm add_student">Add</button>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <span class="bg-primary btn-block text-white">List of Selected Students</span>
                            <table id="multi-filter-select" class="display table table-striped table-hover studentlist" >
                                <tbody>
                                    
                                </tbody>
                            </table>
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