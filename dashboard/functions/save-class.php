<?php
session_start();
error_reporting(0);
include('../../db/conn.php');

if($_SESSION['id_user'] == ''){
	header('location:logout.php');
}

if(isset($_POST['btnssave'])){
	$id_course = $_POST['id_course'];
	$year = $_POST['year'];
	$id_section = $_POST['id_section'];
	$id_class_adviser = $_POST['id_class_adviser'];
	$id_sy = $_SESSION['id_sy'];

	mysqli_query($con,"INSERT INTO class_schedule (id_course,year,id_section,id_class_adviser,id_sy)
    VALUES ('$id_course','$year','$id_section','$id_class_adviser','$id_sy') ");

	$_SESSION['status_msg'] = 'New Record was successfully Saved';
	$_SESSION['status_type'] = 'success';

    header('location:../classes-mngt.php');
}

?>