<?php
session_start();
error_reporting(0);
include('../db/conn.php');

if($_SESSION['id_user'] == ''){
	header('location:logout.php');
}

if(isset($_POST['btnssave'])){
	$year_from = $_POST['year_from'];
	$year_to = $_POST['year_to'];
	$semester = $_POST['semester'];
	mysqli_query($con,"INSERT INTO sy (year_from,year_to) VALUES ('$year_from','$year_to','$semester') ");

	$_SESSION['status_msg'] = 'New Record was successfully Saved';
	$_SESSION['status_type'] = 'success';
}


include 'template/header.php';
include 'template/sidebar.php';
?>

	<div class="main-panel">
		<div class="content">
			<div class="page-inner">
				<div class="mt-2 mb-4">
					<h2 class="text-black pb-2">School Year Management</h2>
				</div>	
				<div class="row row-card-no-pd">
					<div class="col-md-12">
						<div class="card">
							<div class="card-header">
								<div class="card-head-row">
									<h4 class="card-title">List of School Year</h4>
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
												<th>School Year</th>
												<th>Semester</th>
												<th>Status</th>
												<th>Option</th>
											</tr>
										</thead>
										<tbody>
											
											<?php
											$result = mysqli_query($con,"SELECT * FROM sy ");
											if($result -> num_rows > 0){
												while($row = $result -> fetch_assoc()){
													?>
													<tr>
														<td><?= $row['year_from'] ?> - <?= $row['year_to'] ?></td>
														<td><?= $row['semester'] ?></td>
														<td>
															<?php
															if($row['status'] == 1){
																echo '<span class="badge badge-success">Open</span>';
															}else{
																echo '<span class="badge badge-danger">Close</span>';
															}
															?>
														</td>
														<td>
															<div class="btn-group">
															<button title="Edit" onclick="btnedit(<?= $row['id'] ?>)"
																	class="btn btn-warning btn-sm br-0" ><i class="fa fa-edit"></i></button>
																	
																	<a onclick="return confirm('Are you sure you want to delete this record?');"
																	href="functions/delete-sy.php?id=<?= $row['id'] ?>" title="Delete" class="btn btn-danger btn-sm br-0"><i class="fa fa-trash"></i></a>
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
include 'admin/modal/add-sy.php';
include 'template/footer.php';
include 'class/notifications.php';
?>


<script>
	$('#btnAdd').click(function(){
		$('#addRowModal').modal('show');
		$('#addRowModal').find('.modal-title').text('Create School Year');
		$('#btnssave').attr('name','btnssave');
		$('#btnssave').text('Save');
        $('#myForm').attr('action','functions/save-sy.php');
	});

	function btnedit(id){
		$('#addRowModal').modal('show');
		$('#btnssave').attr('name','btnupdate');
		$('#btnssave').text('Update');
		$('#myForm').attr('action','functions/update-sy.php');
		
		var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                var responseText = this.responseText;
                var array = responseText.split(",");
                
                $("#id").val(array[0]);
                $("#year_from").val(array[1]);
                $("#year_to").val(array[2]);
                $("#semester").val(array[3]);
                $("#status").val(array[4]);
            }
        };
        xhttp.open("GET", "functions/get-sy.php?id="+id, true);
        xhttp.send();
	}


</script>


<script>
	if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>