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
                        WHERE a.id_sy = $_SESSION[id_sy] ");
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
				</div>	
				<div class="row row-card-no-pd">
					<div class="col-md-12">
						<div class="card">
							<div class="card-header">
								<div class="card-head-row">
									<!-- <h4 class="card-title">List of Schedules <br>
										<small> <b>Class Adviser:</b> <?= ucfirst($name) ?></small>
									</h4> -->	
                                    <h4 class="card-title">List of my Classes Schedules</h4>
								
									<?php
									if($_SESSION['id_user_role'] == 1){
										?>
										<button id="btnAdd" class="btn btn-primary btn-round ml-auto">
											<i class="fa fa-plus"></i>
											Add Schedule
										</button>
										<?php
									}
									?>
								</div>
							</div>
							<div class="card-body">
                                <div class="table-responsive">
                                <table id="multi-filter-select1" class="display table table-striped table-hover" >
										<thead>
											<tr>
												<th>Course/Year/Section</th>
												<th>Subject</th>
												<th>Units</th>
												<th>Day</th>
												<th>Time </th>
												<th>Instructor</th>
                                                <th>Option</th>
											</tr>
										</thead>
										<tbody>
                                            <?php
											$result = mysqli_query($con,"SELECT a.*,CONCAT(b.last_name,',',b.first_name) as name,c.subject,d.year,d.id as id_class,e.code as course,f.section
											FROM class_schedule_details a
											INNER JOIN user_profile b ON a.id_instructor = b.id
											INNER JOIN subjects c ON a.id_subject = c.id
											INNER JOIN class_schedule d ON a.id_class = d.id
											INNER JOIN courses e ON d.id_course = e.id
											INNER JOIN sections f ON d.id_section = f.id
                                            WHERE a.id_instructor = $_SESSION[id_user] AND d.id_sy = $_SESSION[id_sy]
                                            ");
											if($result -> num_rows > 0){
												while($row = $result -> fetch_assoc()){
													?>
													<tr>
                                                        <td><?= $row['course'] ?> <?= $row['year'] ?> - <?= $row['section'] ?></td>
                                                        <td><?= $row['subject'] ?></td>
                                                        <td><?= $row['unit'] ?></td>
                                                        <td><?= $row['day'] ?></td>
                                                        <td><?= $row['time'] ?></td>
                                                        <td><?= ucfirst($row['name']) ?></td>
														<td>
															<div class="btn-group">
                                                                <a href="view-class.php?id=<?= $row['id_class']?>" title="View Class" class="btn btn-primary btn-sm br-0" 
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
include 'admin/modal/add-class-schedule.php';
include 'template/footer.php';
include 'class/notifications.php';
?>


<script>
	$('#btnAdd').click(function(){
		$('#addRowModal').modal('show');
		$('#addRowModal').find('.modal-title').text('Class Schedule');
		$('#myForm').attr('action','functions/save-class-schedule.php');
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
            // location.reload();
        }, 1000);

    })

</script>
