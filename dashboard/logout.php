<?php
session_start();
$id_user_role = $_SESSION['id_user_role'];

session_destroy();

if($id_user_role == 1){
    header('location:../admin-login.php');
}else if($id_user_role == 3){
    header('location:../teacher-login.php');
}else{
    header('location:../student-login.php');
}


?>