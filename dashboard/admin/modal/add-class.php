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
                                <input type="hidden" name="id" id="id">
                                <label><span class="text-danger">*</span> Course</label>
                                <select name="id_course" id="id_course" class="form-control">
                                    <option value="">Select</option>
                                    <?php
                                    $result = mysqli_query($con,"SELECT * FROM courses WHERE del_status = 1 ");
                                    if($result -> num_rows > 0){
                                        while($row = $result -> fetch_assoc()){
                                            ?>
                                            <option value="<?= $row['id'] ?>"><?= $row['code'] ?> <?= $row['course'] ?></option>
                                            <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group form-group-default">
                                <label><span class="text-danger">*</span> Year / Level </label>
                                <select name="year" id="year" class="form-control">
                                    <option value="">Select</option>
                                    <option value="1">1st Year</option>
                                    <option value="2">2nd Year</option>
                                    <option value="3">3rd Year</option>
                                    <option value="4">4th Year</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group form-group-default">
                                <label><span class="text-danger">*</span> Section</label>
                                <select name="id_section" id="id_section" class="form-control">
                                    <option value="">Select</option>
                                    <?php
                                    $result = mysqli_query($con,"SELECT * FROM sections WHERE del_status = 1 ");
                                    if($result -> num_rows > 0){
                                        while($row = $result -> fetch_assoc()){
                                            ?>
                                            <option value="<?= $row['id'] ?>"><?= $row['section'] ?></option>
                                            <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group form-group-default">
                                <label><span class="text-danger">*</span> Class Adviser</label>
                                <select name="id_class_adviser" id="id_class_adviser" class="form-control">
                                    <option value="">Select</option>
                                    <?php
                                    $result = mysqli_query($con,"SELECT a.* FROM user_profile a INNER JOIN users b ON a.id = b.id_user WHERE b.del_status = 1 AND b.id_user_role=3 ");
                                    if($result -> num_rows > 0){
                                        while($info = $result -> fetch_assoc()){
                                            ?>
                                            <option value="<?= $info['id'] ?>"><?= ucfirst($info['last_name']) ?>,<?= ucfirst($info['first_name']) ?></option>
                                            <?php
                                        }
                                    }
                                    ?>
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