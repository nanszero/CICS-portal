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
                        <!-- <div class="col-md-12">
                            <div class="form-group form-group-default">
                                <input type="hidden" name="id" id="id">
                                <label><span class="text-danger">*</span> Year</label>
                                <select name="year" id="year" class="form-control" required>
                                    <option value="">Select</option>
                                    <option value="I">First Year</option>
                                    <option value="II">Second Year</option>
                                    <option value="III">Third Year</option>
                                    <option value="IV">Fourth Year</option>
                                </select>
                            </div>
                        </div> -->
                        <div class="col-md-12">
                            <div class="form-group form-group-default">
                                <label><span class="text-danger">*</span> Semester</label>
                                <select name="semester" id="semester" class="form-control" required>
                                    <option value="">Select</option>
                                    <option value="first_semester">First Semester</option>
                                    <option value="second_semester">Second Semester</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group form-group-default">
                                <label><span class="text-danger">*</span> Subject</label>
                                <select name="id_subject" id="id_subject" class="form-control" required>
                                    <option value="">Select</option>
                                    <?php
                                    $result = mysqli_query($con,"SELECT * FROM subjects WHERE del_status = 1 ");
                                    if($result -> num_rows > 0){
                                        while($row = $result -> fetch_assoc()){
                                            ?>
                                            <option value="<?= $row['id'] ?>"><?= $row['code'] ?> - <?= $row['subject'] ?></option>
                                            <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group form-group-default">
                                <label><span class="text-danger">*</span> Midterm</label>
                                <input type="text" name="midterm" id="midterm" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group form-group-default">
                                <label><span class="text-danger">*</span> Final</label>
                                <input type="text" name="final" id="final" class="form-control" required>
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