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
                        <!-- <div class="col-md-12">
                            <div class="form-group form-group-default">
                                <label><span class="text-danger">*</span> Course No.</label>
                                <input  type="hidden" name="id" id="id" class="form-control" placeholder="" required>
                                <input  type="hidden" name="id_class" id="id_class" value="<?=$_GET['id']?>" required>
                                <input  type="text" name="course_nos" id="course_nos" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group form-group-default">
                                <label><span class="text-danger">*</span> Course Title</label>
                                <input  type="text" name="course_title" id="course_title" class="form-control" required>
                            </div>
                        </div> -->
                        <div class="col-md-12">
                            <div class="form-group form-group-default">
                                <label><span class="text-danger">*</span> Subject</label>
                                <input  type="hidden" name="id" id="id" class="form-control" placeholder="" required>
                                <input  type="hidden" name="id_class" id="id_class" value="<?=$_GET['id']?>" required>
                                <select name="id_subject" id="id_subject" class="form-control" required>
                                    <option value="">Select</option>
                                    <?php
                                    $result = mysqli_query($con,"SELECT * FROM subjects ");
                                    if($result -> num_rows > 0){
                                        while($info = $result -> fetch_assoc()){
                                            ?>
                                            <option value="<?= $info['id'] ?>"><?= ucfirst($info['subject']) ?></option>
                                            <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group form-group-default">
                                <label><span class="text-danger">*</span> Unit</label>
                                <input  type="number" name="unit" id="unit" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group form-group-default">
                                <label><span class="text-danger">*</span> Time</label>
                                <input  type="text" name="time" id="time" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group form-group-default">
                                <label><span class="text-danger">*</span> Day</label>
                                <select name="day" id="day" class="form-control">
                                    <option value="">Select</option>
                                    <option value="Monday">Monday</option>
                                    <option value="Tuesday">Tuesday</option>
                                    <option value="Wednesday">Wednesday</option>
                                    <option value="Thursday">Thursday</option>
                                    <option value="Friday">Friday</option>
                                    <option value="Saturday">Saturday</option>
                                    <option value="Sunday">Sunday</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group form-group-default">
                                <label><span class="text-danger">*</span> Instructor</label>
                                <select name="id_instructor" id="id_instructor" class="form-control" required>
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
                </div>
                <div class="modal-footer no-bd">
                    <button type="submit" id="btnssave" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</form>