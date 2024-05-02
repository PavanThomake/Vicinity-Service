<?php
include 'config.php';
$searchType = $_GET["searchType"];

if($searchType=="service"){
	
	$query="SELECT distinct(location) FROM servicestable";
	
}else if($searchType=="events"){
	
	$query="SELECT distinct(location) FROM event";
	
}

$result=mysqli_query($con,$query) or die(mysqli_error($con));
while($row = mysqli_fetch_assoc($result)){
	$output[] = $row;
}
print json_encode($output);

?>