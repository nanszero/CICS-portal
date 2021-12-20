<?php
session_start();
error_reporting(0);
include('../db/conn.php');


if($_SESSION['id_user'] == ''){
	header('location:logout.php');
}

if(isset($_POST['btnUpdate'])){
	$id_user = $_POST['id_user'];

	// PASSWORD
	$current_pass = $_SESSION['password'];
	$new_pass = $_POST['current_password'];
	$new_password = $_POST['new_password'];
	$confirm_password = $_POST['confirm_password'];
	// die($current_pass.' - '.md5($new_pass));
	if($current_pass == md5($new_pass)){

		if($new_password == $confirm_password){
			// PASSWORD
			$new_pass = md5($new_password);
			mysqli_query($con,"UPDATE users SET password='$new_pass' WHERE id_user='$id_user' ");
			// PASSWORD

			// PROFILE PIC
			if (isset($_FILES["userfile"]) && !empty($_FILES['userfile']['name'])) {
				$fileInfo = pathinfo($_FILES["userfile"]["name"]);
				$userfile = 'vi'.date("ymdhis"). '.' . $fileInfo['extension'];
				move_uploaded_file($_FILES["userfile"]["tmp_name"], "pictures/dp/" . $userfile);
			}else{
				$userfile = 'default_pic.png';
			}
			$_SESSION['picture'] = $userfile;

			mysqli_query($con,"UPDATE user_profile SET picture='$userfile' WHERE id='$id_user' ");
			// PROFILE PIC

			// ACCOUNT DETAILS
			$_SESSION['first_name'] = $_POST['first_name'];
			$_SESSION['middle_name'] = $_POST['middle_name'];
			$_SESSION['last_name'] = $_POST['last_name'];
			$_SESSION['email'] = $_POST['email'];
			$_SESSION['contact'] = $_POST['contact'];
			$_SESSION['address'] = $_POST['address'];

			mysqli_query($con,"UPDATE user_profile SET 
			first_name='$_SESSION[first_name]',
			middle_name='$_SESSION[middle_name]',
			last_name='$_SESSION[last_name]',
			email='$_SESSION[email]',
			contact='$_SESSION[contact]',
			address='$_SESSION[address]'
			WHERE id='$id_user' ");
			// ACCOUNT DETAILS

			$_SESSION['status_msg'] = 'Profile was updated successfully';
			$_SESSION['status_type'] = 'success';
		}else{
			$_SESSION['status_msg'] = "Password did not match";
			$_SESSION['status_type'] = 'error';
		}

		
	}else{
		$_SESSION['status_msg'] = 'Incorrect current password';
		$_SESSION['status_type'] = 'error';
	}
	// PASSWORD

}

if(isset($_POST['btnUpdateStudents'])){
	$id_user = $_POST['id_user'];

	if (isset($_FILES["userfile"]) && !empty($_FILES['userfile']['name'])) {
		$fileInfo = pathinfo($_FILES["userfile"]["name"]);
		$userfile = 'vi'.date("ymdhis"). '.' . $fileInfo['extension'];
		move_uploaded_file($_FILES["userfile"]["tmp_name"], "pictures/dp/" . $userfile);
	}else{
		$userfile = 'default_pic.png';
	}
	$_SESSION['picture'] = $userfile;

	mysqli_query($con,"UPDATE user_profile SET picture='$userfile' WHERE id='$id_user' ");
	$_SESSION['status_msg'] = 'Profile was updated successfully';
	$_SESSION['status_type'] = 'success';

}


include 'template/header.php';
include 'template/sidebar.php';
?>
<form method="post" id="myForm" enctype="multipart/form-data">
		<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">Dashboard</h4>
						<ul class="breadcrumbs">
							<li class="nav-home">
								<a href="#">
									<i class="flaticon-home"></i>
								</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
							<li class="nav-item">
								<a href="#">Profile</a>
							</li>
						</ul>
					</div>
					<div class="row">

                        <div class="col-md-12">
						
						</div>

                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                
                                    <div class="d-flex align-items-center">
                                        <h4 class="card-title">Change Display Picture</h4>
                                        
                                    </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">              
                                            <div class="col-sm-12">
                                                <div class="form-group form-group-default">
                                                    <label>DP</label>
                                                    <input  type="hidden" name="id_user" id="id_user" class="form-control" value="<?= $_SESSION['id_user']?>" required>
                                                    <input  required type="file" name="userfile" id="userfile" class="form-control" placeholder="Code"  >
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </div>

						<?php
						if($_SESSION['role'] != 'students'){
							?>
							<div class="col-md-12">
								<div class="card">
									<div class="card-header">
										<div class="d-flex align-items-center">
											<h4 class="card-title">Account Details</h4>
										
										</div>
									</div>
									<div class="card-body">
										<div class="row">
											<div class="col-md-12" id="error_msg">
											</div>     
											<div class="col-sm-4">
												<div class="form-group form-group-default">
													<label>First Name</label>
													<input  type="text" name="first_name" id="first_name" class="form-control" value="<?= $_SESSION['first_name']?>"  required>
												</div>
											</div>
											<div class="col-sm-4">
												<div class="form-group form-group-default">
													<label>Middle Name</label>
													<input  type="text" name="middle_name" id="middle_name" class="form-control"  value="<?= $_SESSION['middle_name']?>" required>
												</div>
											</div>
											<div class="col-sm-4">
												<div class="form-group form-group-default">
													<label>Last Name</label>
													<input  type="text" name="last_name" id="last_name" class="form-control" value="<?= $_SESSION['last_name']?>" required>
												</div>
											</div>

											<div class="col-sm-4">
												<div class="form-group form-group-default">
													<label>Email</label>
													<input  type="email" name="email" id="email" class="form-control" value="<?= $_SESSION['email']?>" required>
												</div>
											</div>
											<div class="col-sm-4">
												<div class="form-group form-group-default">
													<label>Mobile Number</label>
													<input  type="text" name="contact" maxlength="11" id="contact" class="form-control" value="<?= $_SESSION['contact']?>" onkeyup="this.value=this.value.replace(/[^\d]/,'')" value="" required>
												</div>
											</div>
												<div class="col-sm-4">
													<div class="form-group form-group-default">
														<label>Address</label>
														<input  type="text" name="address" id="address" class="form-control"  value="<?= $_SESSION['address']?>" required>
													</div>
												</div>
											</div>
									</div>
								</div>
							</div>
							<?php
						}
						?>

						
						<?php
						if($_SESSION['role'] != 'students'){
							?>
							<div class="col-md-12">
								<div class="card">
									<div class="card-header">
										<div class="d-flex align-items-center">
											<h4 class="card-title">Change Password</h4>
										
										</div>
									</div>
									<div class="card-body">
										<div class="row">
											<div class="col-md-12" id="error_msg">
											</div>                       
											<div class="col-sm-4">
												<div class="form-group form-group-default">
													<label>Current Password</label>
													<input  required type="password" name="current_password" id="current_password" class="form-control" placeholder="Current password"   >
												</div>
											</div>
											<div class="col-sm-4">
												<div class="form-group form-group-default">
													<label>New Password</label>
													<input required type="password" name="new_password" id="new_password" class="form-control" placeholder="New password"  >
												</div>
											</div>
											<div class="col-sm-4">
												<div class="form-group form-group-default">
													<label>Confirm Password</label>
													<input required type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="Confirm password"  >
												</div>
											</div>
										</div>
									</div>
									
								</div>
							</div>
							<?php
						}
						?>

						<?php
						if($_SESSION['role'] == 'students'){
						?>
						<button type="submit" name="btnUpdateStudents" class="btn btn-warning btn-block btn-round ml-auto" >
							<i class="fa fa-save"></i>
							Save Changes
						</button>
						<?php
						}else{
							?>
							<button type="submit" name="btnUpdate" class="btn btn-warning btn-block btn-round ml-auto" >
								<i class="fa fa-save"></i>
								Save Changes
							</button>
							<?php
						}
						?>

						

					</div>
				</div>

			</div>
		</div>

</form>
		
<?php
include 'template/footer.php';
include 'class/notifications.php';
?>

<script>
	if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>