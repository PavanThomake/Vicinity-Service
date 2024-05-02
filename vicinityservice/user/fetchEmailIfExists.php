<?php
include 'config.php';

$email = $_GET["email"];
$sql = "select email from userdetails where email='$email'";
$result = mysqli_fetch_assoc(mysqli_query($con,$sql)) or die(mysqli_error($con));
if($email == $result["email"]){
	echo "email exists";
}else{
	echo "not exists";
}

?>