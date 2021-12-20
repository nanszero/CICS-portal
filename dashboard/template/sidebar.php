	<body data-background-color="bg2">
	<div class="wrapper">
		<div class="main-header">
			<!-- Logo Header -->
			<div class="logo-header">
				
				<a href="index.php" class="logo">
					<!-- <img src="../public/assets/img/logo.svg" alt="navbar brand" class="navbar-brand"> -->
                    <h3 class="navbar-brand card-title mt-3" style="font-size: 18px;"><span class="text-white"> <?= ucfirst($_SESSION['role']) ?> Dashboard</span></h3>
				</a>
				<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">
						<i class="icon-menu"></i>
					</span>
				</button>
				<button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
				<div class="nav-toggle">
					<button class="btn btn-toggle toggle-sidebar">
						<i class="icon-menu"></i>
					</button>
				</div> 
			</div> 
			<!-- End Logo Header -->

			<!-- Navbar Header -->
			<nav class="navbar navbar-header navbar-expand-lg">
				
				<div class="container-fluid">
					<div class="collapse" id="search-nav">
						<form class="navbar-left navbar-form nav-search mr-md-3">
							<!-- <div class="input-group">
								<div class="input-group-prepend">
									<button type="submit" class="btn btn-search pr-1">
										<i class="fa fa-search search-icon"></i>
									</button>
								</div>
								<input type="text" placeholder="Search ..." class="form-control">
							</div> -->
						</form>
					
						<h3 class="navbar-brand card-title mt-1" style="font-size: 18px;"><span  class="text-white">CICS Student Portal Management System (SY: <?= $_SESSION['year_from']?>-<?= $_SESSION['year_to']?> <?= $_SESSION['semester']?>)</span></h3>
					</div>
					<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
						<li class="nav-item toggle-nav-search hidden-caret">
							<a class="nav-link" data-toggle="collapse" href="#search-nav" role="button" aria-expanded="false" aria-controls="search-nav">
								<i class="fa fa-search"></i>
							</a>
						</li>


		
					</ul>
				</div>
			</nav>
			<!-- End Navbar -->
		</div>


		<!-- Sidebar -->
		<div class="sidebar sidebar-style-2" data-background-color="white">
			<div class="sidebar-wrapper scrollbar scrollbar-inner">
				<div class="sidebar-content">
					<div class="user">
						<div class="avatar-sm float-left mr-2">
							<img src="pictures/dp/<?php echo $_SESSION['picture'] ?>" alt="..." class="avatar-img rounded-circle">
						</div>
						<div class="info">
							<a data-toggle="collapse" href="#collapseExample" aria-expanded="false" class="collapsed">
								<span>
									<?= $_SESSION['last_name']?>, <?= $_SESSION['first_name']?>  
									<span class="user-level"><?= ucfirst($_SESSION['role']) ?> </span>
									<span class="caret"></span>
								</span>
							</a>
							<div class="clearfix"></div>

							<div class="in collapse" id="collapseExample" style="">
								<ul class="nav">
									<li>
										<a href="profile.php">
											<i class="fas fa-user"></i>
											<span class="link-collapse">Account Settings</span>
										</a>
									</li>
									<li>
										<a href="logout.php">
											<i class="fas fa-sign-out-alt"></i>
											<span class="link-collapse">Sign Out</span>
										</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<ul class="nav nav-primary">
			
						<li class="nav-section">
							<span class="sidebar-mini-icon">
								<i class="fa fa-ellipsis-h"></i>
							</span>
							<h4 class="text-section">Components</h4>
						</li>

						<li class="nav-item">
							<a href="index.php">
								<i class="fas fa-chalkboard"></i>
								<p>Dashboard</p>
								
							</a>
						</li>
						<?php
						if($_SESSION['id_user_role'] == 3){
							?>
							<li class="nav-item">
								<a href="teacher-class-schedule.php">
									<i class="fas fa-chalkboard-teacher"></i>
									<p>My Classes Schedule</p>
								</a>
							</li>
							<?php
						}
						?>

					
						<?php
						if($_SESSION['id_user_role'] == 4){ // STUDENT
							?>
							<li class="nav-item">
								<a href="student-class-schedule.php?year=I">
									<i class="fas fa-chalkboard-teacher"></i>
									<p>My Classes & Schedules</p>
									
								</a>
							</li>
							<li class="nav-item">
								<a href="student-view-grade.php?year=I">
									<i class="fas fa-list-ol"></i>
									<p>My Grades</p>
								</a>
							</li>
							<?php
						}
						?>

						<?php
						if($_SESSION['id_user_role'] == 1){
							?>
							<li class="nav-item">
								<a href="users-management.php?type=teachers">
									<i class="fas fa-user-tie"></i>
									<p>Teachers Management</p>
									
								</a>
							</li>
							<li class="nav-item">
								<a href="users-management.php?type=students">
									<i class="fas fa-users"></i>
									<p>Students Management</p>
									
								</a>
							</li>



							<li class="nav-item ">
								<a data-toggle="collapse" href="#forms" class="collapsed" aria-expanded="false">
									<i class="fas fa-chalkboard"></i>
									<p>Credentials</p>
									<span class="caret"></span>
								</a>
								<div class="collapse" id="forms" style="">
									<ul class="nav nav-collapse">
										<li>
											<a href="schoolyear.php">
												<p>School Year Management</p>
											</a>
										</li>
										<li>
											<a href="classes-mngt.php">
												<p>Classes Management</p>
											</a>
										</li>
										<li>
											<a href="sections.php">
												<p>Sections Management</p>
											</a>
										</li>
										<li>
											<a href="subjects.php">
												<p>Subjects Management</p>
											</a>
										</li>
										<li>
											<a href="courses.php">
												<p>Course Management</p>
											</a>
										</li>
									</ul>
								</div>
							</li>
							<!--<li class="nav-item ">
								<a data-toggle="collapse" href="#cms" class="collapsed" aria-expanded="false">
									<i class="fas fa-cogs"></i>
									<p>CMS</p>
									<span class="caret"></span>
								</a>
								<div class="collapse" id="cms" style="">
									<ul class="nav nav-collapse">
										<li>
											<a href="school-settings.php">
												<span class="sub-item">School Settings</span>
											</a>
										</li>
										<li>
											<a href="announcements.php">
												<span class="sub-item">Announcements Management</span>
											</a>
										</li>
									</ul>
								</div>
							</li>-->
							<!-- <li class="nav-item">
								<a href="../admin/Gradelevel">
									<i class="fas fa-list-ol"></i>
									<p>Grade/Level Management</p>
									
								</a>
							</li> -->
							<?php
						}
						?>

					
						<!--<li class="nav-item">
							<a href="logout.php">
								<i class="fas fa-sign-out-alt"></i>
								<p>Sign Out</p>
								
							</a>
						</li>-->
					</ul>
				</div>
			</div>
		</div>
		<!-- End Sidebar -->