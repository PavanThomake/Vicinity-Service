<?php 
include 'config.php';
$serviceName = $_POST["serviceName"];
$selectQuery = "select * from service where service='$serviceName'";
$checkUserExists = mysqli_query($con,$selectQuery) or die(mysqli_error($con));
if(mysqli_num_rows($checkUserExists)>0){
	echo "<script>alert('You Have already Added this Service');</script>"; 
	//header("Location: addService.php");
}else{
	$query = "insert into service(service) values('$serviceName')";
	$insertedFlag=mysqli_query($con,$query) or die(mysqli_error($con));
	if($insertedFlag){
		echo "<script>alert('You Have Added Successfully');</script>";
	}
}
header("Location: addService.php");
?>