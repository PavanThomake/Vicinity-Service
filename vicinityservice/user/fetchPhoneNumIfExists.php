<?php
include 'config.php';

$contact = $_GET["contact"];
$sql = "select contact from userdetails where contact='$contact'";
$result = mysqli_fetch_assoc(mysqli_query($con,$sql)) or die(mysqli_error($con));
if($contact == $result["contact"]){
	echo "number exits";
}else{
	echo "not exists";
}

?>