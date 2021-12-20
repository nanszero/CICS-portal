<?php
session_start();
error_reporting(0);
include('../db/conn.php');


if($_SESSION['id_user'] == ''){
	header('location:logout.php');
}


if(isset($_POST['btnssave'])){
	if (isset($_FILES["userfile"]) && !empty($_FILES['userfile']['name'])) {
		$fileInfo = pathinfo($_FILES["userfile"]["name"]);
		$userfile = 'vi'.date("ymdhis"). '.' . $fileInfo['extension'];
		move_uploaded_file($_FILES["userfile"]["tmp_name"], "pictures/announcements/" . $userfile);
	}else{
		$userfile = 'default_pic.png';
	}

	$date = $_POST['date'];
	$name = $_POST['name'];
	$pic = $userfile;
	$description = $_POST['description'];
	mysqli_query($con,"INSERT INTO announcement (date,name,pic,description) VALUES ('$date','$name','$userfile','$description') ");

	$_SESSION['status_msg'] = 'New Record was successfully Saved';
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
									<h4 class="card-title">Announcements Masterlist</h4>
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
                                                <th>Banner</th>
                                                <th>Date</th>
                                                <th>Event</th>
                                                <th>Description</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
											<?php
											$result = mysqli_query($con,"SELECT * FROM announcement ");
											if($result -> num_rows > 0){
												while($row = $result -> fetch_assoc()){
													?>
													<tr>
														<td width="150px" ><a href="pictures/announcements/<?= $row['pic']?>" target="_blank"> <img src="pictures/announcements/<?= $row['pic']?>" style="width:100%" alt=""> </a> </td>
														<td><?= $row['date']?></td>
														<td><?= $row['name']?></td>
														<td><?= $row['description']?></td>
														<td>
															<div class="btn-group">
																<button title="Edit" class="form-control btn-warning btn-sm br-0" ><i class="fa fa-edit"></i></button>
																<button title="Delete" class="form-control btn-danger btn-sm br-0"><i class="fa fa-trash"></i></button>
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
include 'admin/modal/add-announcements.php';
include 'template/footer.php';
include 'class/notifications.php';
?>


<script>
	$('#btnAdd').click(function(){
		$('#addRowModal').modal('show');
	});

</script>


<script>
	if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>