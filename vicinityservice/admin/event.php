<?php 
include 'config.php';
$eventType = $_POST["eventType"];
$selectQuery = "select * from event_type where type='$eventType'";
$checkUserExists = mysqli_query($con,$selectQuery) or die(mysqli_error($con));
if(mysqli_num_rows($checkUserExists)>0){
	echo "<script>alert('You Have already Adeed this Event');</script>";
}else{
	$query = "insert into event_type(type) values('$eventType')";
	$insertedFlag=mysqli_query($con,$query) or die(mysqli_error($con));
if($insertedFlag){
	echo "<script>alert('You Have Resgistered Successfully');</script>";
}
header("Location: adminPanel.php");
}
?>