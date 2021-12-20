<?php
session_start();
error_reporting(0);
include('../db/conn.php');

if($_SESSION['id_user'] == ''){
	header('location:logout.php');
}

$year = $_GET['year'];

$result = mysqli_query($con,"SELECT a.*,b.id as id_class,b.year,c.code as course,d.section,e.year_from,e.year_to,e.semester,CONCAT(f.first_name,', ',f.last_name) as name
FROM students a 
INNER JOIN class_schedule b ON a.id_class = b.id
INNER JOIN courses c ON b.id_course = c.id
INNER JOIN sections d ON b.id_section = d.id
INNER JOIN sy e ON b.id_sy = e.id
INNER JOIN user_profile f ON b.id_class_adviser = f.id
WHERE a.id_student = $_SESSION[id_user] AND b.year='$year' ");
$num=mysqli_fetch_array($result);
if($num>0)
{
    $id = $num['id'];
    $id_class = $num['id_class'];
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
				<div class="row row-card-no-pd mt--2">
					<div class="col-sm-6 col-md-3">
						<div class="card card-stats card-round">
							<div class="card-body ">
								<div class="row">
									<div class="col-12 text-center">
										<div class="">
											<?php
											$bgI = 'btn btn-primary';
											if($year == 'I'){
												$bgI = 'btn btn-warning';
											}
											?>
											<h4 class="card-title"><a href="student-class-schedule.php?year=I" class="btn btn-<?= $bgI?> btn-block">
											<i class="fas fa-angle-double-right"></i> First Year</a></h4>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-6 col-md-3">
						<div class="card card-stats card-round">
							<div class="card-body ">
								<div class="row">
									<div class="col-12 text-center">
										<div class="">
											<?php
											$bgII = 'btn btn-primary';
											if($year == 'II'){
												$bgII = 'btn btn-warning';
											}
											?>
											<h4 class="card-title"><a href="student-class-schedule.php?year=II" class="btn btn-<?= $bgII?> btn-block">
											<i class="fas fa-angle-double-right"></i> Second Year</a></h4>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-6 col-md-3">
						<div class="card card-stats card-round">
							<div class="card-body ">
								<div class="row">
									<div class="col-12 text-center">
										<div class="">
											<?php
											$bgIII = 'btn btn-primary';
											if($year == 'III'){
												$bgIII = 'btn btn-warning';
											}
											?>
											<h4 class="card-title"><a href="student-class-schedule.php?year=III" class="btn btn-<?= $bgIII?> btn-block">
											<i class="fas fa-angle-double-right"></i> Third Year</a></h4>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-6 col-md-3">
						<div class="card card-stats card-round">
							<div class="card-body ">
								<div class="row">
									<div class="col-12 text-center">
										<div class="">
											<?php
											$bgIV = 'btn btn-primary';
											if($year == 'IV'){
												$bgIV = 'btn btn-warning';
											}
											?>
											<h4 class="card-title"><a href="student-class-schedule.php?year=IV" class="btn btn-<?= $bgIV?> btn-block">
											<i class="fas fa-angle-double-right"></i> Fourt Year</a></h4>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row row-card-no-pd">
					<div class="col-md-12">
						<div class="card">
							<div class="card-header">
								<div class="row">
									<div class="col-md-7">
										<b> Course/Year/Section: </b><?= $course?> <?= $year?>-<?= $section?> <br>
										<b> Semester: </b><?= $_SESSION['semester']?><br>
									</div>
									<div class="col-md-5 push-right">
										<b> Class Adviser: </b><?= $name?> <br>
										<b> SY: </b><?= $_SESSION['year_from']?> - <?= $_SESSION['year_to']?><br>
									</div>
								</div>
							</div>
							<div class="card-body">
                                <div class="table-responsive">
									<table id="multi-filter-select1" class="table table-bordered table-head-bg-info table-bordered-bd-info" >
										<thead>
											<tr>
												<th>Subject</th>
												<th>Units</th>
												<th>Day</th>
												<th>Time </th>
												<th>Instructor</th>

											</tr>
										</thead>
										<tbody>
                                            <?php
											$result = mysqli_query($con,"SELECT a.*,CONCAT(b.last_name,',',b.first_name) as name,c.subject
											FROM class_schedule_details a
											INNER JOIN user_profile b ON a.id_instructor = b.id
											INNER JOIN subjects c ON a.id_subject = c.id
                                            WHERE a.id_class=$id_class ");
											if($result -> num_rows > 0){
												while($row = $result -> fetch_assoc()){
													?>
													<tr>
                                                        <td><?= $row['subject'] ?></td>
                                                        <td><?= $row['unit'] ?></td>
                                                        <td><?= $row['day'] ?></td>
                                                        <td><?= $row['time'] ?></td>
                                                        <td><?= ucfirst($row['name']) ?></td>
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
