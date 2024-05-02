<?php
session_start();
include 'config.php';

$otp = $_POST["otp"];
$contact = $_SESSION["fpContact"];
/*$timeStampQuery = "select max(otptimestamp) from otptable where otp='$otp' and contactnum='$contact'";
$timeStampresult=mysqli_query($con,$timeStampQuery) or die(mysqli_error($con));
$result = mysqli_fetch_assoc($timeStampresult);
$otpTimeStamp = $result['max(otptimestamp)'];*/

$otpExists = "select * from otptable where otp='$otp' and expired=0 and contactnum='$contact' limit 1";

$OtpExistsResult = mysqli_query($con,$otpExists) or die(mysqli_error($con));
echo mysqli_num_rows($OtpExistsResult);
if(mysqli_num_rows($OtpExistsResult)>0){
	
	$timeIntervalQuery = "select id,TIMESTAMPDIFF(MINUTE,max(otptimestamp),CURRENT_TIMESTAMP) as 
	timeinterval from otptable where contactnum='$contact' and expired=0  and otp='$otp' order by id desc limit 1";
	$timeStampresult = mysqli_query($con,$timeIntervalQuery) or die(mysqli_error($con));
	$result = mysqli_fetch_assoc($timeStampresult);
	$otpTimeStampInterval = $result['timeinterval'];

	if( $otpTimeStampInterval <= 30 ){ //Here 30 is the time inetrval to enter the otp
	
	$updateQuery = "update otptable set expired = 1 where otp = '$otp'";
	$updateQueryResult = mysqli_query($con,$updateQuery) or die(mysqli_error($con));
		if($updateQueryResult){
			echo "<script>window.location.href = 'resetPassword.php';</script>";	
		}else{
			echo "<script>alert('OTP is already used');</script>";
		}
	
	}else{
		$updateQuery = "update otptable set expired = 1 where otp = '$otp'";
		$updateQueryResult = mysqli_query($con,$updateQuery) or die(mysqli_error($con));
		echo "<script>alert('The Time Interval for OTP is 30 mins already expired, please generate a new one');</script>";
		echo "<script>window.location.href = 'forgotPassword.php';</script>";
	}		
}else{
	echo "<script>alert('The OTP is expired please generate a new one');</script>";
	echo "<script>window.location.href = 'forgotPassword.php';</script>";
}

?>