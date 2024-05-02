<?php
session_start();
include 'config.php';

$username = $_POST["username"];
$password  = $_POST["password"];
$query = "select * from adminLogin where username='$username' or password='$password' ";
$result = mysqli_query($con,$query) or die(mysqli_error($con));
$resultSet = mysqli_fetch_assoc($result);
if($resultSet["username"] != $username){
	
	echo "<Script>alert('Wrong Username');</script>";
	echo "<script>window.location.href = 'adminLogin.php';</script>";

}else if($resultSet["password"] != $password){

	echo "<Script>alert('Wrong Password');</script>";
	echo "<script>window.location.href = 'adminLogin.php';</script>";

}else if(mysqli_num_rows($result)>0){
	$_SESSION["admin"] = $username;
	header("Location: adminPanel.php");
}else{
	header("Location: adminLogin.php");
}

?>