<?php
session_start();
error_reporting(0);
include('../../db/conn.php');

if($_SESSION['id_user'] == ''){
	header('location:logout.php');
}

$id=$_GET['id'];



$ret=mysqli_query($con,"SELECT * FROM courses WHERE id=$id ");
$num=mysqli_fetch_array($ret);
if($num>0)
{
    echo 
    $num['id'].','.
    $num['code'].','.
    $num['course'];
}
?>