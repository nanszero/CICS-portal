<?php
session_start();
error_reporting(0);
include('../db/conn.php');


if($_SESSION['id_user'] == ''){
	header('location:logout.php');
}

$id_user_role = 3; //TEACHER

$role = $_GET['type'];
if($role == 'students'){
	$id_user_role = 4; //STUDENTS
}

if(isset($_POST['btnssave'])){
	$lrn = $_POST['lrn'];
	$picture = 'default_pic.png';
	$last_name = $_POST['last_name'];
	$first_name = $_POST['first_name'];
	$middle_name = $_POST['middle_name'];
	$birthday = $_POST['birthday'];
	$gender = $_POST['gender'];
	$contact = $_POST['contact'];
	$email = $_POST['email'];
	$address = $_POST['address'];
	$username = $_POST['username'];
	$password = md5($_POST['password']);


	mysqli_query($con,"INSERT INTO user_profile 
	(lrn,picture,last_name,first_name,middle_name,birthday,gender,contact,email,address) 
	VALUES ('$lrn','$picture','$last_name','$first_name','$middle_name','$birthday','$gender','$contact','$email','$address') ");

	$id_user = mysqli_insert_id($con);

	mysqli_query($con,"INSERT INTO users (id_user_role,id_user,username,password)
	VALUES ($id_user_role,$id_user,'$username','$password') ");

	$_SESSION['status_msg'] = 'New Account was successfully Saved';
	$_SESSION['status_type'] = 'success';
}


if(isset($_POST['btnupdate'])){
	$id = $_POST['id'];
	$lrn = $_POST['lrn'];
	$picture = 'default_pic.png';
	$last_name = $_POST['last_name'];
	$first_name = $_POST['first_name'];
	$middle_name = $_POST['middle_name'];
	$birthday = $_POST['birthday'];
	$gender = $_POST['gender'];
	$contact = $_POST['contact'];
	$email = $_POST['email'];
	$address = $_POST['address'];
	$username = $_POST['username'];
	$password = md5($_POST['password']);


	mysqli_query($con,"UPDATE user_profile SET 
	lrn='$lrn',
	picture='$picture',
	last_name = '$last_name',
	first_name = '$first_name',
	middle_name = '$middle_name',
	birthday = '$birthday',
	gender = '$gender',
	contact = '$contact',
	email = '$email',
	address = '$address'
	WHERE id=$id
	");

	mysqli_query($con,"UPDATE users SET 
	username = '$username',
	password = '$password'
	WHERE id_user=$id
	");

	$_SESSION['status_msg'] = 'New Account was successfully Saved';
	$_SESSION['status_type'] = 'success';
}

include 'template/header.php';
include 'template/sidebar.php';
?>

	<div class="main-panel">
		<div class="content">
			<div class="page-inner">
				<div class="row row-card-no-pd">
				
					<div class="col-md-12">
						<div class="card">
							<div class="card-header">
								<div class="card-head-row">
									<h4 class="card-title"><?= ucfirst($_GET['type']) ?> Masterlist</h4>
									<button id="btnAdd" class="btn btn-primary btn-round ml-auto">
										<i class="fa fa-plus"></i>
										Add 
									</button>
								</div>
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table id="multi-filter-select" class="display table table-striped table-hover" >
										<thead>
											<tr>
												<?php
												if($id_user_role == 4){
													?>
													<th>Student ID No.</th>
													<?php
												}
												?>
												<th>Name</th>
												<th>Gender</th>
												<th>Email</th>
												<th>Contact</th>
												<th>Option</th>
											</tr>
										</thead>
										<tbody>
											<?php

                                                $result = mysqli_query($con,"SELECT a.* FROM user_profile a INNER JOIN users b ON a.id = b.id_user WHERE b.del_status = 1 AND b.id_user_role=$id_user_role ");
                                                if($result -> num_rows > 0){
                                                    while($info = $result -> fetch_assoc()){
														?>
														<tr>
															<?php
															if($id_user_role == 4){
																?>
																<th><?= $info['lrn'] ?></th>
																<?php
															}
															?>
															<td><?= ucfirst($info['last_name']) ?>,<?= ucfirst($info['first_name']) ?>
															<?= ucfirst($info['middle_name']) ?>.</td>
															<td><?= $info['gender'] ?></td>
															<td><?= $info['email'] ?></td>
															<td><?= $info['contact'] ?></td>
															<td>
																<div class="btn-group">
																	<button title="Edit" onclick="btnedit(<?= $info['id'] ?>)"
																	class="btn btn-warning btn-sm br-0" ><i class="fa fa-edit"></i></button>
																	
																	<a onclick="return confirm('Are you sure you want to delete this record?');"
																	href="functions/delete-user.php?id=<?= $info['id'] ?>" title="Delete" class="btn btn-danger btn-sm br-0"><i class="fa fa-trash"></i></a>
																</div>
															</td>
														</tr>
														<?php
													}
												}
											?>
											
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
		


<?php
include 'admin/modal/add-user.php';
include 'template/footer.php';
include 'class/notifications.php';
?>

<script>
	$('#btnAdd').click(function(){
		$('#addRowModal').modal('show');
		$('#btnssave').attr('name','btnssave');
		$('#btnssave').text('Save');
	});

	function btnedit(id){
		$('#addRowModal').modal('show');
		$('#btnssave').attr('name','btnupdate');
		$('#btnssave').text('Update');
		
		var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                var responseText = this.responseText;
                var array = responseText.split(",");
                
                $("#id").val(array[0]);
                $("#first_name").val(array[1]);
                $("#middle_name").val(array[2]);
                $("#last_name").val(array[3]);
                $("#birthday").val(array[4]);
                $("#gender").val(array[5]);
                $("#contact").val(array[6]);
                $("#email").val(array[7]);
                $("#address").val(array[8]);
                $("#username").val(array[9]);
                $("#lrn").val(array[10]);
            }
        };
        xhttp.open("GET", "functions/get-user-byid.php?id="+id, true);
        xhttp.send();
	}
</script>


<script>
	if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>