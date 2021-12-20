<?php
session_start();
error_reporting(0);
include('db/conn.php');


if(isset($_POST['btnProceed'])){
    $type=$_POST['type'];
	if($type == 'Student'){
		header('location:student-login.php');
	}else{
		header('location:teacher-login.php');
	}
}

?>
<!doctype html>
<html>
<head>
<title>CICS Student Portal</title>
<link rel="icon" href="img/logo.png">
<link rel="stylesheet" href="css/custom-style.css">
</head>
<body>
	<div class="regform"><h1>WELCOME TO CICS PORTAL</h1></div>
	<div class="main">
	<form method="post">
		<div id="name">
		
		<h2 class="name">Login as:</h2>
		<select class="option" name="type">
			<option disabled="disabled" selected="">Choose</option>
			<option value="Teacher">Teacher</option>
			<option value="Student">Student</option>
		</select>
	
	
	<button type="submit" name="btnProceed">Proceed</button>
	
	</form>
</body>
</html>
