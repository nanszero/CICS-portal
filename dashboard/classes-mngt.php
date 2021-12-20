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
	mysqli_query($con,"INSERT INTO sy (year_from,year_to) VALUES ('$year_from','$year_to') ");

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
					<h2 class="text-black pb-2">Classes Management</h2>
				</div>	
				<div class="row row-card-no-pd">
					<div class="col-md-12">
						<div class="card">
							<div class="card-header">
								<div class="card-head-row">
									<h4 class="card-title">List of Classes</h4>
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
												<th>Course</th>
												<th>Year & Section</th>
												<th>Adviser</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
											
											<?php
											$result = mysqli_query($con,"SELECT a.*,b.course,c.section,CONCAT(d.first_name,', ',d.last_name) as name
                                            FROM class_schedule a
                                            INNER JOIN courses b ON a.id_course = b.id
                                            INNER JOIN sections c ON a.id_section = c.id
                                            INNER JOIN user_profile d ON a.id_class_adviser = d.id
											WHERE a.id_sy = $_SESSION[id_sy] ");
											if($result -> num_rows > 0){
												while($row = $result -> fetch_assoc()){
													?>
													<tr>
                                                        <td><?= $row['course'] ?></td>
														<td><?= $row['year'] ?> - <?= $row['section'] ?></td>
                                                        <td><?= $row['name'] ?></td>
														<td>
															<div class="btn-group">
																<button title="Edit" class="btn btn-warning btn-sm br-0" 
																onclick="btnEdit(<?= $row['id']?>)"><i class="fa fa-edit"></i></button>

																<a href="class-schedule.php?id=<?= $row['id']?>" title="View Class Schedule" class="btn btn-success btn-sm br-0" 
																><i class="fa fa-eye"></i> Class Schedule</a>

                                                                <a href="view-class.php?id=<?= $row['id']?>" title="View Class" class="btn btn-primary btn-sm br-0" 
																><i class="fa fa-eye"></i> View Class</a>
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
include 'admin/modal/add-class.php';
include 'template/footer.php';
include 'class/notifications.php';
?>


<script>
	$('#btnAdd').click(function(){
		$('#addRowModal').modal('show');
		$('#addRowModal').find('.modal-title').text('Create Class');
		$('#btnssave').text('Update');
        $('#myForm').attr('action','functions/save-class.php');
	});

	function btnEdit(id){
        $('#addRowModal').modal('show');
		$('#addRowModal').find('.modal-title').text('Update Class');
		$('#btnssave').text('Update');
        $('#myForm').attr('action','functions/update-class.php');

        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                var responseText = this.responseText;
                var array = responseText.split(",");
                
                $("#id").val(array[0]);
                $("#id_course").val(array[1]);
                $("#year").val(array[2]);
                $("#id_section").val(array[3]);
                $("#id_class_adviser").val(array[4]);
            }
        };
        xhttp.open("GET", "functions/get-class.php?id="+id, true);
        xhttp.send();
	};

</script>


<script>
	if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>