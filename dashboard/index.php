<?php
session_start();
error_reporting(0);
include('../db/conn.php');

if($_SESSION['id_user'] == ''){
	header('location:logout.php');
}

include 'template/header.php';
include 'template/sidebar.php';
?>
	<div class="main-panel">
		<div class="content">
			<div class="panel-header bg-primary-gradient">
				<div class="page-inner py-5" style="background-image: url(public/uploads/dp/sc1.jpg);background-size: 1100px 163px;
		justify-content: center;
		align-items: center;
		background-position: center;
		background size: cover;">
					<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
						<div>
							<h2 class="text-white pb-2 fw-bold">Dashboard</h2>
							<h5 class="text-white op-7 mb-2">Blessed Day! <?= $_SESSION['last_name']?>, <?= $_SESSION['first_name']?>  </h5>
						</div>
						<div class="ml-md-auto py-2 py-md-0">
							<!-- <a href="#" class="btn btn-primary btn-border btn-round mr-2">Manage Classes</a>
							<a href="#" class="btn btn-primary btn-round">Add Student</a> -->
						</div>
					</div>
				</div>
			</div>
			<div class="page-inner mt--5">
					<?php
					if($_SESSION['id_user_role'] == 1){
					?>
					<div class="row mt--2">
					<div class="col-md-12">
						<div class="card full-height">
							<div class="card-body">
								<!-- <div class="card-category">Daily information about statistics in system for drivers and bookings</div> -->

								<?php
								$sql=mysqli_query($con,"SELECT 
													(SELECT COUNT(id) FROM users WHERE id_user_role=4 AND del_status = 1) as 'student_count',
													(SELECT COUNT(id) FROM users WHERE id_user_role=3 AND del_status = 1) as 'teacher_count',
													(SELECT COUNT(id) FROM subjects WHERE del_status = 1) as 'subject_count',
													(SELECT COUNT(id) FROM sections WHERE del_status = 1) as 'section_count',
													(SELECT COUNT(id) FROM courses WHERE del_status = 1) as 'course_count',
													(SELECT COUNT(a.id)
													FROM class_schedule a
													INNER JOIN courses b ON a.id_course = b.id
													INNER JOIN sections c ON a.id_section = c.id
													INNER JOIN user_profile d ON a.id_class_adviser = d.id
													WHERE a.id_sy = $_SESSION[id_sy]) as 'classes_count'
												
													FROM users LIMIT 1");
								while($row=mysqli_fetch_array($sql))
								{
								?>
								<div class="d-flex flex-wrap justify-content-around pt-4">
									
									<div class="col">
										<div class="card card-stats card-primary card-round">
											<div class="card-body">
												<div class="row">
													<div class="col-5">
														<div class="icon-big text-center">
															<i class="fas fa-users"></i>
														</div>
													</div>
													<div class="col-7 col-stats">
														<div class="numbers">
															<p class="card-category">Teachers</p>

															<h4 class="card-title"><?= $row['teacher_count'] ;?></h4>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="col">
										<div class="card card-stats card-info card-round">
											<div class="card-body ">
												<div class="row">
													<div class="col-5">
														<div class="icon-big text-center">
															<i class="fas fa-users"></i>
														</div>
													</div>
													<div class="col-7 col-stats">
														<div class="numbers">
															<p class="card-category">Students</p>
															<h4 class="card-title"><?= $row['student_count'] ;?></h4>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="col">
										<div class="card card-stats card-success card-round">
											<div class="card-body ">
												<div class="row">
													<div class="col-5">
														<div class="icon-big text-center">
															<i class="fas fa-users"></i>
														</div>
													</div>
													<div class="col-7 col-stats">
														<div class="numbers">
															<p class="card-category">Classes</p>
															<h4 class="card-title"><?= $row['classes_count'] ;?></h4>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								
								<div class="d-flex flex-wrap justify-content-around ">
									<div class="col">
										<div class="card card-stats card-round">
											<div class="card-body ">
												<div class="row">
													<div class="col-5">
														<div class="icon-big text-center">
															<i class="fas fa-copy text-warning"></i>
														</div>
													</div>
													<div class="col-7 col-stats">
														<div class="numbers">
															<p class="card-category">Subjects</p>
															<h4 class="card-title"><?= $row['subject_count']?></h4>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="col">
										<div class="card card-stats card-round">
											<div class="card-body ">
												<div class="row">
													<div class="col-5">
														<div class="icon-big text-center">
															<i class="fas fa-envelope-open text-success"></i>
														</div>
													</div>
													<div class="col-7 col-stats">
														<div class="numbers">
															<p class="card-category">Section</p>
															<h4 class="card-title"><?= $row['section_count']?></h4>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="col">
										<div class="card card-stats card-round">
											<div class="card-body ">
												<div class="row">
													<div class="col-5">
														<div class="icon-big text-center">
															<i class="fas fa-envelope-open text-success"></i>
														</div>
													</div>
													<div class="col-7 col-stats">
														<div class="numbers">
															<p class="card-category">Course</p>
															<h4 class="card-title"><?= $row['course_count']?></h4>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									
								</div>
								<?php }?>

							</div>
						</div>
					</div>
					</div>
				<?php
				}
				?>

					

					<?php
					if($_SESSION['id_user_role'] == 4 || $_SESSION['id_user_role'] == 3){
						?>
						<?php include('student-dashboard.php'); ?>
						<?php
					}
					?>
				</div>
				
			</div>
		</div>
	</div>

		
<?php
include 'template/footer.php';
?>

<!-- Sweet Alert -->
<script src="public/assets/js/plugin/owl-carousel/owl.carousel.min.js"></script>

<script>
		$(document).ready(function() {
			$('#owl-demo').owlCarousel({
				loop:true,
				margin:10,
				nav:true,
				responsive:{
					0:{
						items:1
					},
					600:{
						items:3
					},
					1000:{
						items:4
					}
				}
			})

			$("#owl-demo2").owlCarousel({

				nav:true, // Show next and prev buttons
				autoplaySpeed:300,
				navSpeed:400,
				items:1

			});

			$('#owl-demo3').owlCarousel({
				center: true,
				items:2,
				loop:true,
				margin:10,
				responsive:{
					600:{
						items:4
					}
				}
			});

			$('#owl-demo4').owlCarousel({
				margin:10,
				loop:false,
				autoWidth:true,
				items: 4
			})
		});
	</script>