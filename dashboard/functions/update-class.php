<?php
session_start();
error_reporting(0);
include('../../db/conn.php');

if($_SESSION['id_user'] == ''){
	header('location:logout.php');
}

$id=$_GET['id'];

$id = $_POST['id'];
$id_course = $_POST['id_course'];
$year = $_POST['year'];
$id_section = $_POST['id_section'];
$id_class_adviser = $_POST['id_class_adviser'];
$id_sy = $_SESSION['id_sy'];

mysqli_query($con,"UPDATE class_schedule SET 
    id_course='$id_course',
    year='$year',
    id_section='$id_section',
    id_class_adviser='$id_class_adviser',
    id_sy='$id_sy' 
    WHERE id=$id
    ");

$_SESSION['status_msg'] = 'New Record was successfully Saved';
$_SESSION['status_type'] = 'success';

header('location:../classes-mngt.php');

?>