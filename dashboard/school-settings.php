<?php
session_start();
error_reporting(0);
include('../db/conn.php');


if($_SESSION['id_user'] == ''){
	header('location:logout.php');
}

include 'template/header.php';
include 'template/sidebar.php';

$sql=mysqli_query($con,"SELECT * FROM school_settings");
while($row=mysqli_fetch_array($sql))
{
    $mission = $row['mission'];
    $vision = $row['vision'];
    $core_values = $row['core_values'];
    $goals = $row['goals'];
}


if(isset($_POST['btnSave'])){
    $mission = $_POST['mission'];
    $vision = $_POST['vision'];
    $core_values = $_POST['core_values'];
    $goals = $_POST['goals'];
    $presiden_name = $_POST['presiden_name'];

    // PRESIDENT PIC
    if (isset($_FILES["userfile"]) && !empty($_FILES['userfile']['name'])) {
        $fileInfo = pathinfo($_FILES["userfile"]["name"]);
        $userfile = 'vi'.date("ymdhis"). '.' . $fileInfo['extension'];
        move_uploaded_file($_FILES["userfile"]["tmp_name"], "pictures/president-image/" . $userfile);
    }else{
        $userfile = 'default_pic.png';
    }

    mysqli_query($con,"UPDATE school_settings SET president_logo='$userfile' ");
    // PRESIDENT PIC

    mysqli_query($con,"UPDATE school_settings 
    SET mission='$mission',vision='$vision',core_values='$core_values',goals='$goals',presiden_name='$presiden_name' ");

    $_SESSION['status_msg'] = 'Record was updated successfully';
    $_SESSION['status_type'] = 'success';
}
?>

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
								<a href="#">School Settings</a>
							</li>
						</ul>
					</div>
					<form method="POST" id="myForm" enctype="multipart/form-data">
					<div class="row">

                        <div class="col-md-12">
						
						</div>

                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                
                                    <div class="d-flex align-items-center">
                                        <h4 class="card-title">Picture Managements</h4>
                                        
                                    </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">              
                                            
                                            <div class="col-sm-12">
                                                <div class="form-group form-group-default">
                                                    <label>President Image</label>
                                                    <input  type="hidden" name="id_user" id="id_user" class="form-control" value="<?= $_SESSION['id_user']?>" required>
                                                    <input  required type="file" name="userfile" id="userfile" class="form-control" placeholder="Code"  >
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group form-group-default">
                                                    <label>President Name</label>
                                                    <input  type="text" name="presiden_name" id="presiden_name" value="<?= $presiden_name?>" class="form-control"  required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </div>

						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
                                    <div class="d-flex align-items-center">
										<h4 class="card-title">School Details</h4>
									
									</div>
								</div>
								<div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12" id="error_msg">
                                        </div>     


                                        <div class="col-sm-12">
                                            <div class="form-group form-group-default">
                                                <label>Mission</label>
                                                <input  type="text" name="mission" id="mission" value="<?= $mission?>" class="form-control"  required>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group form-group-default">
                                                <label>Vision</label>
                                                <input  type="text" name="vision" id="vision" value="<?= $vision?>" class="form-control"  required>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group form-group-default">
                                                <label>Core Values</label>
                                                <input  type="text" name="core_values" id="core_values" value="<?= $core_values?>" class="form-control"  required>
                                            </div>
                                        </div>

                                        <div class="col-sm-12">
                                            <div class="form-group form-group-default">
                                                <label>Goals</label>
                                                <input  type="text" name="goals" id="goals" value="<?= $goals?>" class="form-control"  required>
                                            </div>
                                        </div>

                                       
								</div>
							</div>
						</div>
						
						<button type="submit" name="btnSave" class="btn btn-warning btn-block btn-round ml-auto" data-toggle="modal" data-target="#addRowModal">
							<i class="fa fa-save"></i>
							Save Changes
						</button>

					</div>
				</div>
				</form>

			</div>
		</div>


		
<?php
include 'template/footer.php';
include 'class/notifications.php';
?>