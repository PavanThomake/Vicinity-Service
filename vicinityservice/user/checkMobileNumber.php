<?php
session_start();
include 'config.php';

$contact = $_POST["contact"];
$_SESSION["fpContact"] = $contact;

$query = "select * from userdetails where contact='$contact' ";
$result=mysqli_query($con,$query) or die(mysqli_error($con));

if(mysqli_num_rows($result)>0){
	
	$otp = rand(100000,999999);
	$curl = curl_init();

	curl_setopt_array($curl, array(
		//CURLOPT_URL => "https://www.fast2sms.com/dev/bulk?authorization=g2ZmFlSNxTqKfXdBGjuyiwhYIRrJOb4vp1EDAWnUM7Coae5VcLvPX82N4yu6BQcgsfOUrhSMDEFYZw3L&sender_id=FSTSMS&message=".urlencode('Hi This is the OTP generated that is valid for 30 mins '.$otp)."&language=english&route=p&numbers=".urlencode($contact),   
		//QlsWkFod7OZ5MeTnw1aA6NRfu3HDvj9St8GChXPry2EzKBq4VL9I5lSjvQd4tiWwcmDVRoTsAn3GU1ze
		CURLOPT_URL => "https://www.fast2sms.com/dev/bulk?authorization=QlsWkFod7OZ5MeTnw1aA6NRfu3HDvj9St8GChXPry2EzKBq4VL9I5lSjvQd4tiWwcmDVRoTsAn3GU1ze&sender_id=FSTSMS&message=".urlencode('Hi This is the OTP generated that is valid for 30 mins '.$otp)."&language=english&route=p&numbers=".urlencode($contact),
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => "",
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 30,
		CURLOPT_SSL_VERIFYHOST => 0,
		CURLOPT_SSL_VERIFYPEER => 0,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => "GET",
		CURLOPT_HTTPHEADER => array(
			"cache-control: no-cache"
		),
	));

	$response = curl_exec($curl);
	$err = curl_error($curl);
	curl_close($curl);
	
	if ($err) {
		echo "cURL Error #:" . $err;
	} else {
		echo $response;
	}
	
	
	//echo $otp;
	$query = "insert into otptable(contactnum,otp,expired) values('$contact','$otp',0)";
	mysqli_query($con,$query) or die(mysqli_error($con));
	
	
	// Process your response here
	//echo $response;
	echo "<script>window.location.href = 'enterOTPPage.php';</script>";
	//header("Location: adminPanel.php");
}else{
	echo "<script>alert('There are no fields associated with this contact, please register first');</script>";
	echo "<script>window.location.href = 'forgotPassword.php';</script>";
	
}

?>