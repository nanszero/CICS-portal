<?php
session_start();
error_reporting(0);
include('../db/conn.php');

if($_SESSION['id_user'] == ''){
	header('location:logout.php');
}

$id=$_GET['id'];

$result = mysqli_query($con,"SELECT a.*,b.course,c.section,CONCAT(d.first_name,', ',d.last_name) as name
                        FROM class_schedule a
                        INNER JOIN courses b ON a.id_course = b.id
                        INNER JOIN sections c ON a.id_section = c.id
                        INNER JOIN user_profile d ON a.id_class_adviser = d.id
                        WHERE a.id = $id ");
$num=mysqli_fetch_array($result);
if($num>0)
{
    $id = $num['id'];
    $id_course = $num['id_course'];
    $year = $num['year'];
    $id_section = $num['id_section'];
    $id_class_adviser = $num['id_class_adviser'];
    $id_sy = $num['id_sy'];
    $course = $num['course'];
    $section = $num['section'];
    $name = $num['name'];
}

include 'template/header.php';
include 'template/sidebar.php';
?>

    <div class="main-panel">
		<div class="content">
			<div class="page-inner">
                <div class="mt-2 mb-4">
					<h2 class="text-black pb-2">Classes Management (<?= $year ?> - <?= $section ?>)</h2>
				</div>	
				<div class="row row-card-no-pd">
					<div class="col-md-12">
						<div class="card">
							<div class="card-header">
								<div class="card-head-row">
									<h4 class="card-title">List of Students <br>
										<small> <b>Class Adviser:</b> <?= ucfirst($name) ?></small>
									</h4>
								
									<?php
									if($_SESSION['id_user_role'] == 1 || $_SESSION['id_user_role'] == 3){
										?>
										<button id="btnAdd" class="btn btn-primary btn-round ml-auto">
											<i class="fa fa-plus"></i>
											Add Students
										</button>
										<?php
									}
									?>
								</div>
							</div>
							<div class="card-body">
                                <div class="table-responsive">
									<table id="multi-filter-select" class="display table table-striped table-hover" >
										<thead>
											<tr>
												<th>LRN</th>
												<th>Name</th>
												<th>Gender</th>
												<th>Email</th>

												<?php
												if($_SESSION['id_user_role'] == 1){
													?>
														<th>Option</th>
													<?php
												}
												?>
											
											</tr>
										</thead>
										<tbody>
                                            <?php
											$result = mysqli_query($con,"SELECT a.*,b.lrn,b.gender,b.contact,b.email,CONCAT(b.first_name,', ',b.last_name) as name
                                            FROM students a
                                            INNER JOIN user_profile b ON a.id_student = b.id
                                            WHERE a.id_class=$_GET[id] ");
											if($result -> num_rows > 0){
												while($row = $result -> fetch_assoc()){
													?>
													<tr>
                                                        <td><?= $row['lrn'] ?></td>
                                                        <td><?= $row['name'] ?></td>
                                                        <td><?= $row['gender'] ?></td>
                                                        <td><?= $row['email'] ?></td>
														<td>
															<div class="btn-group">
																<!-- <button title="Edit" class="btn btn-warning btn-sm br-0" 
																onclick="btnEdit(<?= $row['id']?>)"><i class="fa fa-edit"></i></button> -->
																<a onclick="return confirm('Are you sure you want to delete this record?');"
																href="functions/delete-students.php?id=<?= $row['id'] ?>" title="Delete" class="btn btn-danger btn-sm br-0"><i class="fa fa-trash"></i></a>

                                                                <a href="grades-management.php?id_student=<?= $row['id']?>" title="View Grades" class="btn btn-warning btn-sm br-0" 
																onclick="btnEdit(<?= $row['id']?>)"><i class="fa fa-eye"></i> View Grades</a>
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
include 'admin/modal/add-students.php';
include 'template/footer.php';
include 'class/notifications.php';
?>


<script>
	$('#btnAdd').click(function(){
		$('#addRowModal').modal('show');
		$('#addRowModal').find('.modal-title').text('Class Details');
		$('#btnssave').text('Save');
		$('#btnssave').attr('data-operation','save');
	});

	$(".add_student").click(function(){
		let id_student = $("#id_student").val();
		let student_name = $('#id_student').find(":selected").text();

		if(id_student != ''){
			$(".studentlist").append(
				'<tr><td hidden>'+id_student+'</td> <td>'+student_name+'</td></tr>'
			);
		}else{
			swal('Please select student','','warning');
			return false;
		}

	})

	$("#btnssave").click(function(){

        var table_data = [];
        $('.studentlist tr').each(function(row,tr){
            if($(tr).find('td:eq(0)').text() == ''){
            }else{
                var sub = {
                'id_student' : $(tr).find('td:eq(0)').text()
                };
            } 
            table_data.push(sub);
        });
        table_data = table_data.filter(function(e){return e}); 
        var students = {'data_table' : table_data}
        console.log(students);
        $.ajax({
            type: 'ajax',
            method: 'post',
            url: 'functions/save_student_to_class.php',
            data: {
                students : students,
                id_class : <?= $id ?>
            },
            datatype: 'text',
            success: function(response){
                swal('New students was successfully added in this class','','success');
                $("#addRowModal").modal('hide');
            },
            error: function(){
                swal("There is something error, Try to fix it.");
            }
        })

        setTimeout(
        function() 
        {
            location.reload();
        }, 1000);

    })

</script>
