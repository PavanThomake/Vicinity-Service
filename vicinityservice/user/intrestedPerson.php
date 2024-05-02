<?php
include 'config.php';

$evName = $_POST["evName"]; //eventName
$orgNum = $_POST["orgNum"]; //organizerNumber
$place = $_POST["place"];   //Location
$evType = $_POST["evType"]; //typeofEvent
$evdate = $_POST["evdate"]; //eventDate
$iName = $_POST["iName"];   //intreste Person Name
$iNum = $_POST["iNum"];     //Here iNum is the variable that has the number of person who is intrested for the ecevent
$contact = $iNum;

$query = "insert into intrestedevents(eventname,organiser_contact_num,place,eventtype,eventdate,personname,personcontact) values('$evName','$orgNum','$place','$evType','$evdate','$iName','$iNum')";
$insertedFlag=mysqli_query($con,$query) or die(mysqli_error($con));
if($insertedFlag){
	
	$curl = curl_init();

	curl_setopt_array($curl, array(
		//QlsWkFod7OZ5MeTnw1aA6NRfu3HDvj9St8GChXPry2EzKBq4VL9I5lSjvQd4tiWwcmDVRoTsAn3GU1ze
		//CURLOPT_URL => "https://www.fast2sms.com/dev/bulk?authorization=g2ZmFlSNxTqKfXdBGjuyiwhYIRrJOb4vp1EDAWnUM7Coae5VcLvPX82N4yu6BQcgsfOUrhSMDEFYZw3L&sender_id=FSTSMS&message=".urlencode("Hi You Have subscribed for an event named ".$evName." held on ".$evdate)."&language=english&route=p&numbers=".urlencode($contact),
		CURLOPT_URL => "https://www.fast2sms.com/dev/bulk?authorization=QlsWkFod7OZ5MeTnw1aA6NRfu3HDvj9St8GChXPry2EzKBq4VL9I5lSjvQd4tiWwcmDVRoTsAn3GU1ze&sender_id=FSTSMS&message=".urlencode("Hi You Have subscribed for an event named ".$evName." held on ".$evdate)."&language=english&route=p&numbers=".urlencode($contact),
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
	
}


?>
