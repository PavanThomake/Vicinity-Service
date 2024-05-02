<?php
session_start();
include 'config.php';
$id = $_POST["id"];
$fname = $_POST["fname"];
$lname = $_POST["lname"];
$gen = $_POST["gen"];
$contact = $_POST["contact"];
$service = $_POST["service"];
$mail= $_POST["mail"];
$place= $_POST["place"];
$state = $_POST["state"];
//$cpass = $_POST["cpass"];
$file=$_FILES['photo']['name'];

if($file==""){
	$imgQuery = "Select file from userdetails where contact='$contact' or fname='$fname' or lname='$lname' or email='$mail' ";
	$imgQueryResult = mysqli_query($con,$imgQuery) or die(mysqli_error($con));
	$result = mysqli_fetch_assoc($imgQueryResult);
	$file=$result["file"];
}
	
$tmp_name = $_FILES['photo']['tmp_name'];
$error = $_FILES['photo']['error'];
   if (!empty($file)) {
       $location = 'profile/';
       if  (move_uploaded_file($tmp_name, $location.$file)){
           echo 'Uploaded';
       }
	} else {
		echo 'please choose a file';
	}	

 




$query ="update userdetails set fname='$fname',lname='$lname',gender='$gen',contact='$contact',email='$mail',place='$place',state='$state',file='$file' where id=$id";
$status = mysqli_query($con,$query) or die(mysqli_error($con));
if($service !="Common User"){
	/*The below three lines of code is written by Gaurav Duth Baliga to 
	add a profile pic to each and every card when the user tries to search
	*/
	$path="profile/".$file;
	$query2 ="update servicestable set fname='$fname',lname='$lname',email='$mail',location='$place',profilepic='$path' where contact='$contact'";
	$status2 = mysqli_query($con,$query2) or die(mysqli_error($con));
}

/*This below line was uncommenented by by Gaurav Duth Baliga while testing it on 30-April-2019 as it was not navigating back to profile page.*/
header("Location: profileUpload.php");

?>