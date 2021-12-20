<?php
session_start();
error_reporting(0);
include('../db/conn.php');

if($_SESSION['id_user'] == ''){
	header('location:logout.php');
}

$result = mysqli_query($con,"SELECT a.*,b.id as id_class,b.year,c.code as course,d.section,e.year_from,e.year_to,e.semester,CONCAT(f.first_name,', ',f.last_name) as name,CONCAT(g.first_name,', ',g.last_name) as student_name
FROM students a 
INNER JOIN class_schedule b ON a.id_class = b.id
INNER JOIN courses c ON b.id_course = c.id
INNER JOIN sections d ON b.id_section = d.id
INNER JOIN sy e ON b.id_sy = e.id
INNER JOIN user_profile f ON b.id_class_adviser = f.id
INNER JOIN user_profile g ON a.id_student = g.id
WHERE a.id = $_GET[id_student] ");
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
    $student_name = $num['student_name'];
}

if(isset($_POST['btnssave'])){
	$id_student = $_GET['id_student'];
	$semester = $_POST['semester'];
	$id_subject = $_POST['id_subject'];
	$midterm = $_POST['midterm'];
	$final = $_POST['final'];
	mysqli_query($con,"INSERT INTO grades (id_student,semester,id_subject,midterm,final) 
    VALUES ('$id_student','$semester','$id_subject','$midterm','$final') ");

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
					<h2 class="text-black pb-2">Student Grades of <b><?= $student_name?></b>
                        <button id="btnAdd" class="btn btn-primary btn-round ml-auto pull-right">
                            <i class="fa fa-plus"></i>
                            Add Grade
                        </button>
                    </h2>
                  
				</div>	
				<div class="row row-card-no-pd">
                <div class="col-md-12">
						<div class="card">
							<div class="card-header">
								<div class="row">
									<div class="col-md-7">
										<b> Course/Year/Section: </b><?= $course?> <?= $year?>-<?= $section?> <br>
									</div>
									<div class="col-md-5 push-right">
										<b> SY: </b><?= $_SESSION['year_from']?> - <?= $_SESSION['year_to']?><br>
									</div>
								</div>
							</div>
							<div class="card-body">
                               <div class="row">
                                    <div class="col-md-6">
                                        <div class="table-responsive">
                                            <div class="btn-block btn-primary text-center">First Semester</div>
                                            <table id="multi-filter-select1" class="table table-bordered table-head-bg-info table-bordered-bd-info" >
                                                <thead>
                                                    <tr>
                                                        <th>Subject Code</th>
                                                        <th>Subject</th>
                                                        <th>Midterm</th>
                                                        <th>Final</th>
                                                        <th>Remarks</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $result = mysqli_query($con,"SELECT a.*,CONCAT(d.first_name,', ',d.last_name) as student_name,e.code,e.subject 
                                                    FROM grades a 
                                                    INNER JOIN  students b ON a.id_student = b.id
                                                    INNER JOIN  class_schedule c ON b.id_class = c.id
                                                    INNER JOIN user_profile d ON b.id_student = d.id
                                                    INNER JOIN subjects e ON a.id_subject = e.id
                                                    WHERE a.semester='first_semester' AND c.id = $id_class ");
                                                    if($result -> num_rows > 0){
                                                        while($row = $result -> fetch_assoc()){
                                                            ?>
                                                            <tr>
                                                                <td><?= $row['code'] ?></td>
                                                                <td><?= $row['subject'] ?></td>
                                                                <td><?= $row['midterm'] ?></td>
                                                                <td><?= $row['final'] ?></td>
                                                                <td><?= $row['remarks'] ?></td>
                                                            </tr>
                                                            <?php
                                                        }
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                   </div>
                                   <div class="col-md-6">
                                        <div class="table-responsive">
                                            <div class="btn-block btn-primary text-center">Second Semester</div>
                                            <table id="multi-filter-select1" class="table table-bordered table-head-bg-info table-bordered-bd-info" >
                                                <thead>
                                                    <tr>
                                                        <th>Subject Code</th>
                                                        <th>Subject</th>
                                                        <th>Midterm</th>
                                                        <th>Final</th>
                                                        <th>Remarks</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $result = mysqli_query($con,"SELECT a.*,CONCAT(d.first_name,', ',d.last_name) as student_name,e.code,e.subject 
                                                    FROM grades a 
                                                    INNER JOIN  students b ON a.id_student = b.id
                                                    INNER JOIN  class_schedule c ON b.id_class = c.id
                                                    INNER JOIN user_profile d ON b.id_student = d.id
                                                    INNER JOIN subjects e ON a.id_subject = e.id
                                                    WHERE a.semester='second_semester' AND c.id = $id_class ");
                                                    if($result -> num_rows > 0){
                                                        while($row = $result -> fetch_assoc()){
                                                            ?>
                                                            <tr>
                                                                <td><?= $row['code'] ?></td>
                                                                <td><?= $row['subject'] ?></td>
                                                                <td><?= $row['midterm'] ?></td>
                                                                <td><?= $row['final'] ?></td>
                                                                <td><?= $row['remarks'] ?></td>
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
		</div>
	</div>

<?php
include 'admin/modal/add-grade.php';
include 'template/footer.php';
include 'class/notifications.php';
?>


<script>
	$('#btnAdd').click(function(){
		$('#addRowModal').modal('show');
		$('#addRowModal').find('.modal-title').text('Add Grade');
		$('#btnssave').text('Save');
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