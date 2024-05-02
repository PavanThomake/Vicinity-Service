<?php
include 'config.php';
$eventAndService = $_GET["eventAndService"];
if($eventAndService=="service"){
	
	$query = "select * from service where service <> 'Common User'";
	$result=mysqli_query($con,$query) or die(mysqli_error($con));
	echo "<select class=\"form-control search-slt\" id=\"optionsDisplay\" onchange=\"searchOptionSelection()\">";
	echo "<option>--Select--</option>";
	while($row=mysqli_fetch_assoc($result)){
		
		echo "<option value='".$row['service']."'>".$row['service']."</option>";	
	}
	echo "</select>";			
}else {
	
	$query = "select * from event_type";
	$result=mysqli_query($con,$query) or die(mysqli_error($con));
	echo "<select class=\"form-control search-slt\" id=\"optionsDisplay\" onchange=\"searchOptionSelection()\">";
	echo "<option>--Select--</option>";
	while($row=mysqli_fetch_assoc($result)){
		
		echo "<option value='".$row['type']."'>".$row['type']."</option>";	
	}
	echo "</select>";
	
}
?>
