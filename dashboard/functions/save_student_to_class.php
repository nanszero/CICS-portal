<?php
session_start();
error_reporting(0);
include('../../db/conn.php');

if($_SESSION['id_user'] == ''){
	header('location:logout.php');
}

$students = $_POST['students'];
$id_class = $_POST['id_class'];

if($students['data_table'] != ''){
    for($x = 0; $x < count($students['data_table']); $x++){
        $id_student = $students['data_table'][$x]['id_student'];

        $result=mysqli_query($con,"SELECT * FROM students WHERE id_student = $id_student AND id_class=$id_class ");
        $num1=mysqli_fetch_array($result);
        if(!$num1>0)
        {
            mysqli_query($con,"INSERT INTO students (id_class,id_student)
            VALUES ('$id_class','$id_student') ");
        }else{
        }

    }
}

$_SESSION['status_msg'] = 'New Record was successfully Saved';
$_SESSION['status_type'] = 'success';
?>