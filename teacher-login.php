<?php
session_start();
error_reporting(0);
include('db/conn.php');

if(isset($_POST['btnLogin'])){
    $username=$_POST['username'];
    $password=$_POST['password'];

    $ret=mysqli_query($con,"SELECT a.id_user_role,a.username,a.password,b.*,c.role 
                        FROM users a INNER JOIN user_profile b ON a.id_user = b.id
                        INNER JOIN user_role c ON a.id_user_role = c.id
                        WHERE a.username='".$_POST['username']."' and a.password='".md5($_POST['password'])."' 
                        AND a.del_status = 1 ");
    $num=mysqli_fetch_array($ret);
    if($num>0)
    {
        $ret1=mysqli_query($con,"SELECT * FROM sy WHERE status = 1");
        $num1=mysqli_fetch_array($ret1);
        if($num1>0)
        {
            $_SESSION['id_sy'] = $num1['id'];
            $_SESSION['year_from'] = $num1['year_from'];
            $_SESSION['year_to'] = $num1['year_to'];
            $_SESSION['semester'] = $num1['semester'];
        }

        $_SESSION['id_user']=$num['id'];
        $_SESSION['first_name']=$num['first_name'];
        $_SESSION['middle_name']=$num['middle_name'];
        $_SESSION['last_name']=$num['last_name'];
        $_SESSION['birthday']=$num['birthday'];
        $_SESSION['email']=$num['email'];
        $_SESSION['contact']=$num['contact'];
        $_SESSION['address']=$num['address'];
        $_SESSION['id_user_role']=$num['id_user_role'];
        $_SESSION['role']=$num['role'];
        $_SESSION['picture']=$num['picture'];
        $_SESSION['password']=$num['password'];
        header('location:dashboard/index.php');
    }else{
        echo "<script>alert('Login Failed');</script>";
    }
}
?>
<!doctype html>
<html>
<head>
<title>Login as Teacher</title>
<link rel="icon" href="img/logo.png">
<link rel="stylesheet" href="css/custom-style.css">
</head>
<body>
	<div class="regform"><h1>Teacher Login</h1></div>
	<div class="main">
	<form method="post">
        
        <h2 class="name">Username:</h2>
        <input class="email" type="text" name="username">
        
        <h2 class="name">Password:</h2>
        <input class="number" type="password" name="password">
        
        
        <button type="submit" name="btnLogin">Login</button>
	
	</form>
</body>
</html>