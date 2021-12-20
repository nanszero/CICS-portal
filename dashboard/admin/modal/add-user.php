<!-- Modal -->
<form method="POST" id="myForm">
    <div class="modal fade" data-keyboard="false" data-backdrop="static" id="addRowModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">									
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title">
                        <span class="fw-mediumbold">
                        Details</span> 
                        <span class="fw-light">
                        
                        </span>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">          
                    <div class="row p-3" id="data_for_edit">                   
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <?php
                                    if($id_user_role == 4){
                                        ?>
                                        <div class="col-md-12 mb-3 logindetails">
                                            <span class="bg-info btn-block text-white">Student ID No.</span>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group form-group-default">
                                                <label><span class="text-danger"><span class="text-danger">*</span></span> Student ID No.</label>
                                                <input  type="text" name="lrn" id="lrn" class="form-control" required>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                    ?>
                                    <div class="col-md-12 mb-3 logindetails">
                                        <span class="bg-info btn-block text-white">Basic Details</span>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group form-group-default">
                                            <label><span class="text-danger"><span class="text-danger">*</span></span> Last name</label>
                                            <input  type="hidden" name="id" id="id" class="form-control" placeholder="" required>
                                            <input  type="text" name="last_name" id="last_name" class="form-control" placeholder="Last name" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group form-group-default">
                                            <label><span class="text-danger">*</span> First name</label>
                                            <input  type="text" name="first_name" id="first_name" class="form-control" placeholder="First name" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group form-group-default">
                                            <label><span class="text-danger">*</span> MI</label>
                                            <input  type="text" name="middle_name" id="middle_name"class="form-control" placeholder="Mi" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group form-group-default">
                                            <label><span class="text-danger"><span class="text-danger">*</span></span> Birthday</label>
                                            <input  type="date" name="birthday" id="birthday"class="form-control" placeholder="" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group form-group-default">
                                            <label><span class="text-danger">*</span> Gender</label>
                                            <select name="gender" id="gender" class="form-control" required>
                                                <option value="">Select</option>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- <div class="col-md-4">
                                        <div class="form-group form-group-default">
                                            <label><span class="text-danger">*</span> Nationality</label>
                                            <input  type="text" name="nationality" id="nationality" class="form-control" placeholder="Nationality" value="Filipino" required>
                                        </div>
                                    </div> -->
                                    <!-- <div class="col-md-4">
                                        <div class="form-group form-group-default">
                                            <label><span class="text-danger"><span class="text-danger">*</span></span> Civil Status</label>
                                            <select name="civil_status" id="civil_status" class="form-control" required>
                                                <option value="">Select</option>
                                                <option value="Single">Single</option>
                                                <option value="Married">Married</option>
                                                <option value="Divorce">Divorce</option>
                                            </select>
                                        </div>
                                    </div> -->
                                    <!-- <div class="col-md-4">
                                        <div class="form-group form-group-default">
                                            <label><span class="text-danger">*</span> Religion</label>
                                            <input  type="text" name="religion" id="religion" class="form-control" placeholder="Religion" required>
                                        </div>
                                    </div> -->
                                    <div class="col-md-4">
                                        <div class="form-group form-group-default">
                                            <label><span class="text-danger">*</span> Contact</label>
                                            <input  type="text" name="contact" id="contact" class="form-control" placeholder="contact" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group form-group-default">
                                            <label><span class="text-danger">*</span> Email</label>
                                            <input  type="text" name="email" id="email" class="form-control" placeholder="email" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group form-group-default">
                                            <label><span class="text-danger">*</span> Address</label>
                                            <input  type="text" name="address" id="address" class="form-control" placeholder="address" required>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-3 logindetails">
                                        <span class="bg-info bg-info btn-block text-white">Login Credentials</span>
                                    </div>
                                    <div class="col-md-4 logindetails">
                                        <div class="form-group form-group-default">
                                            <label><span class="text-danger">*</span> Username</label>
                                            <input  type="text" name="username" id="username" class="form-control" placeholder="Username" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4 logindetails">
                                        <div class="form-group form-group-default">
                                            <label><span class="text-danger">*</span> Password</label>
                                            <input  type="password" name="password" id="password" class="form-control" placeholder="Password" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer no-bd">
                    <button type="submit" name="btnssave" id="btnssave"  class="btn btn-info"><i class="fa fa-save"></i> Save</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</form>