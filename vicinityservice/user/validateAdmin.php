<?php
session_start();
include 'config.php';

$username = $_POST["username"];
$password  = $_POST["password"];
$query = "select * from adminLogin where username='$username' and password='$password' ";
$result=mysqli_query($con,$query) or die(mysqli_error($con));

if(mysqli_num_rows($result)>0){
	$_SESSION["admin"] = $username;
	header("Location: adminPanel.php");
}else{
	header("Location: login.php");
}

?>