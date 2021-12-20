<?php
session_start();
error_reporting(0);
include('../../db/conn.php');

if($_SESSION['id_user'] == ''){
	header('location:logout.php');
}

if(isset($_POST['btnssave'])){
	$year_from = $_POST['year_from'];
	$year_to = $_POST['year_to'];
	$semester = $_POST['semester'];
	mysqli_query($con,"INSERT INTO sy (year_from,year_to,semester) VALUES ('$year_from','$year_to','$semester') ");

	$_SESSION['status_msg'] = 'New Record was successfully Saved';
	$_SESSION['status_type'] = 'success';

    header('location:../schoolyear.php');
}

?>