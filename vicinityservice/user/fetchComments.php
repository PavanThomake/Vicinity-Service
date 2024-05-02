<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1"/>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.2/css/all.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
</head>
<body>
<?php
session_start();
error_reporting(0);
include 'config.php';

$fname = $_GET["fname"];
$lname = $_GET["lname"];
$contact = $_GET["contact"];
$occupation = $_GET["service"];

$query = "select feedback,cur_date from comment_table where f_name='$fname' and l_name='$lname' and contact='$contact' and occupation='$occupation' and feedback <> 'N/A'";
$result=mysqli_query($con,$query) or die(mysqli_error($con));
if(mysqli_num_rows($result)>0){
	
	while($row = mysqli_fetch_assoc($result)){	
		echo "<div class=\"card mb-2 text-left\" >";												
			echo "<div class=\"card-body\">"; 
				echo "<label style=\"color: black\">".$row['feedback']."</label>";
			echo "</div>"; //end of the card body
		echo "</div>";//end of div class=card div tag				
	}
}
?>
</body>
</html>

