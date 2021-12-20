<?php
session_start();
error_reporting(0);
include('../../db/conn.php');

if($_SESSION['id_user'] == ''){
	header('location:logout.php');
}

$id = $_GET['id'];


mysqli_query($con,"DELETE FROM subjects WHERE id = $id ");

$_SESSION['status_msg'] = 'Record was successfully deleted';

header('Location: ' . $_SERVER['HTTP_REFERER']);

?>