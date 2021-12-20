<?php
session_start();
error_reporting(0);
include('../../db/conn.php');

if($_SESSION['id_user'] == ''){
	header('location:logout.php');
}


	$year_from = $_POST['year_from'];
	$year_to = $_POST['year_to'];
	$id = $_POST['id'];
	$status = $_POST['status'];
	$semester = $_POST['semester'];

	mysqli_query($con,"UPDATE sy set year_from='$year_from',year_to='$year_to',semester='$semester' WHERE id=$id ");

	if($status == '1'){
		mysqli_query($con,"UPDATE sy set status='0' ");
		mysqli_query($con,"UPDATE sy set status='1' WHERE id=$id ");

		$_SESSION['year_from'] = $year_from;
		$_SESSION['year_to'] = $year_to;
		$_SESSION['id_sy'] = $id;
		$_SESSION['semester'] = $semester;
	}

	$_SESSION['status_msg'] = 'Record was successfully updated';
	$_SESSION['status_type'] = 'success';

    header('location:../schoolyear.php');


?>