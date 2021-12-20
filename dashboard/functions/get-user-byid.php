<?php
session_start();
error_reporting(0);
include('../../db/conn.php');

if($_SESSION['id_user'] == ''){
	header('location:logout.php');
}

$id=$_GET['id'];



$ret=mysqli_query($con,"SELECT b.*,a.username
FROM users a INNER JOIN user_profile b ON a.id_user = b.id
INNER JOIN user_role c ON a.id_user_role = c.id
WHERE b.id=$id");
$num=mysqli_fetch_array($ret);
if($num>0)
{
    echo 
    $num['id'].','.
    $num['first_name'].','.
    $num['middle_name'].','.
    $num['last_name'].','.
    $num['birthday'].','.
    $num['gender'].','.
    $num['contact'].','.
    $num['email'].','.
    $num['address'].','.
    $num['username'].','.
    $num['lrn'];
}
?>