<?php
session_start();
error_reporting(0);
include('../db/conn.php');


if($_SESSION['id_user'] == ''){
	header('location:logout.php');
}


if(isset($_POST['btnssave'])){
	$code = $_POST['code'];
	$subject = $_POST['subject'];
	mysqli_query($con,"INSERT INTO subjects (code,subject) VALUES ('$code','$subject') ");

	$_SESSION['status_msg'] = 'New Record was successfully Saved';
	$_SESSION['status_type'] = 'success';
}

if(isset($_POST['btnupdate'])){
	$code = $_POST['code'];
	$subject = $_POST['subject'];
	$id = $_POST['id'];
	mysqli_query($con,"UPDATE subjects SET code='$code',subject='$subject' WHERE id=$id ");

	$_SESSION['status_msg'] = 'Record was successfully updated';
	$_SESSION['status_type'] = 'success';
}

include 'template/header.php';
include 'template/sidebar.php';
?>

	<div class="main-panel">
		<div class="content">
			<div class="page-inner">
				<div class="mt-2 mb-4">
					<h2 class="text-black pb-2">Subjects Management</h2>
				</div>	
				<div class="row row-card-no-pd">
					<div class="col-md-12">
						<div class="card">
							<div class="card-header">
								<div class="card-head-row">
									<h4 class="card-title">List of Subjects</h4>
									<button id="btnAdd" class="btn btn-primary btn-round ml-auto">
										<i class="fa fa-plus"></i>
										Add Subject
									</button>
								</div>
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table id="multi-filter-select" class="display table table-striped table-hover" >
										<thead>
											<tr>
												<th>Code</th>
												<th>Subject</th>
												<th>Option</th>
											</tr>
										</thead>
										<tbody>
											<?php
											$result = mysqli_query($con,"SELECT * FROM subjects WHERE del_status = 1 ");
											if($result -> num_rows > 0){
												while($row = $result -> fetch_assoc()){
													?>
													<tr>
														<td><?= $row['code'] ?></td>
														<td><?= $row['subject'] ?></td>
														<td>
															<div class="btn-group">
																<button title="Edit" onclick="btnedit(<?= $row['id'] ?>)"
																class="btn btn-warning btn-sm br-0" ><i class="fa fa-edit"></i></button>
																
																<a onclick="return confirm('Are you sure you want to delete this record?');"
																href="functions/delete-subject.php?id=<?= $row['id'] ?>" title="Delete" class="btn btn-danger btn-sm br-0"><i class="fa fa-trash"></i></a>
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
include 'admin/modal/add-subject.php';
include 'template/footer.php';
include 'class/notifications.php';
?>



<script>
	$('#btnAdd').click(function(){
		$('#addRowModal').modal('show');
		$('#btnssave').attr('name','btnssave');
		$('#btnssave').text('Save');
		$("#id").val('');
		$("#subject").val('');
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
                $("#subject").val(array[1]);
            }
        };
        xhttp.open("GET", "functions/get-subject.php?id="+id, true);
        xhttp.send();
	}
</script>


<script>
	if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>