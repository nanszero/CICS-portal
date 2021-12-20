<?php
session_start();
error_reporting(0);
include('../../db/conn.php');

if($_SESSION['id_user'] == ''){
	header('location:logout.php');
}


	$id_class = $_POST['id_class'];
	// $course_nos = $_POST['course_nos'];
	// $course_title = $_POST['course_title'];
	$id_subject = $_POST['id_subject'];
	$unit = $_POST['unit'];
	$day = $_POST['day'];
	$time = $_POST['time'];
	$id_instructor = $_POST['id_instructor'];

	mysqli_query($con,"INSERT INTO class_schedule_details (id_class,id_subject,unit,day,time,id_instructor)
    VALUES ('$id_class','$id_subject','$unit','$day','$time','$id_instructor') ");

	$_SESSION['status_msg'] = 'New Record was successfully Saved';
	$_SESSION['status_type'] = 'success';

    // header('location:../classes-mngt.php');
    header('Location: ' . $_SERVER['HTTP_REFERER']);


?>