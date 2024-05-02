<?php
session_start();
error_reporting(0);
include 'config.php';
$id = $_POST["id"];
$fname = $_POST["fname"];
$lname = $_POST["lname"];
$contact = $_POST["contact"];
$mail = $_POST["mail"];
$loggedInName = $_POST["loggedInName"];
$userEmailId = $_POST["userEmailId"];
$userContactInfo = $_POST["userContactInfo"];
$rating= $_POST["rating"];
$feedback= $_POST["feedback"];
$service = $_POST["service"];
$place = $_POST["place"];
if($feedback==""){
	$feedback="N/A";
}

//echo $fname." ".$lname." ".$contact." ".$mail." ".$loggedInName." ".$userEmailId." ".$userContactInfo." ".$rating." ".$feedback." ".$service." ".$place;
$query ="insert into ratingtable(fname,lname,contact,email,username,useremail,usercontactinfo,rating,feedback,service,location) values('$fname','$lname','$contact','$mail','$loggedInName','$userEmailId','$userContactInfo','$rating','$feedback','$service','$place')";
$status = mysqli_query($con,$query) or die(mysqli_error($con));

$feedbackQuery ="insert into comment_table(f_name,l_name,contact,occupation,cur_date,useremail,feedback) values('$fname','$lname','$contact','$service',CURRENT_DATE(),'$userEmailId','$feedback')";
$feedback = mysqli_query($con,$feedbackQuery) or die(mysqli_error($con));


echo "<script>window.location.href = 'ratingsAndFeedback.php?id=$id';</script>";

?>