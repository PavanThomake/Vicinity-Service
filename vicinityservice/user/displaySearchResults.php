<?php
session_start();
$email=$_SESSION["user"];
?>
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
      <style>
          .card-img-top
          {
              width:50%;
              height: 100%;
              margin-left: 25%;
          }
      </style>
</head>
<body>

<?php

include 'config.php';

$searchType = $_GET["searchType"];
$searchWord = $_GET["searchWord"];

if($searchType == "service"){
	
	$serviceAndLocationArray = explode(",",$searchWord);
	$service = $serviceAndLocationArray[0];
	$location = $serviceAndLocationArray[1];
	
	/*The query written below is to load the members list from servicestable, if there are no entries in the 
	ratings table. 
	This is useful in a scenario where a member/members don't have ratings attached to them. Hence while loading searched profiles it will be loaded based on their location.*/
	$ratingQuery = "Select * from ratingtable where service = '$service' and location = '$location'";
	$ratingQueryResult = mysqli_query($con,$ratingQuery) or die(mysqli_error($con));	
	$serviceQueryResult;
	if(mysqli_num_rows($ratingQueryResult)<=0){
		$serviceQuery = "Select * from servicestable where location = '$location' and service='$service' and email!='$email' " ;
		$serviceQueryResult = mysqli_query($con,$serviceQuery) or die(mysqli_error($con));			
	}
	else{
		//one more query that fetches data by clubbing the srevices and ratings table must be written
		//bcoz some data might be present in the registration but not in the ratings table
		/*The below query code change made by Gaurav Duth Baliga on 14-May-2020 by adding the location to the innser join table*/
		$serviceQuery = "SELECT s.id,s.fname,s.lname,s.contact,s.email,s.location,s.service,s.profilepic, avg(r.rating) FROM servicestable s LEFT JOIN ratingtable r ON s.contact=r.contact  where s.location = '$location' and s.email <> '$email' GROUP by s.contact order by avg(r.rating) desc, s.id asc";
		//$serviceQuery = "Select * from servicestable where location Like'%$location%' and service='$service' " ;
		$serviceQueryResult = mysqli_query($con,$serviceQuery) or die(mysqli_error($con));
	}
	
	
	
	if(mysqli_num_rows($serviceQueryResult) > 0){
		
		$numofItems = mysqli_num_rows($serviceQueryResult); //Here total number of items is the total row count
		
		while($row=mysqli_fetch_assoc($serviceQueryResult)){
			$output[] =$row;
		}
		
		createRowAndFillItems($output,$numofItems);
		
	}else{
		echo "There are no records matching in the database that you are searching for";
	}
		
}else if($searchType== "events"){
	
	$eventsAndLocationArray = explode(",",$searchWord);
	$events = $eventsAndLocationArray[0];
	$location = $eventsAndLocationArray[1];
	$query = "select * from event where etype Like '%$events%' and location = '$location' and `edate` > CURDATE() ";
	$result = mysqli_query($con,$query) or die(mysqli_error($con));
	
	
	if(mysqli_num_rows($result) > 0){
			
		$numofItems = mysqli_num_rows($result);	
		
		
		while($row=mysqli_fetch_assoc($result)){
				$eventArray[] =$row;
		}
		
		
		
		addThreeEventItemsInARow($eventArray,$numofItems);
	
		/*echo "<div class=\"row\">";
		
			echo "<div class=\"col-12 col-sm-12 col-md-12 col-lg-2 col-xl-2\">";
			
				echo "<div class=\"card\" style=\"height:100%\">";
				
				echo "</div>";//End of card
			
			
		echo "</div>"; // ending div tag of the first column*/
				
		/*echo "<div class=\"col-12 col-sm-12 col-md-12 col-lg-10 col-xl-10\">";
			$counter=0;
			while($row = mysqli_fetch_assoc($result)){
				$counter++;
				echo "<div class=\"card mb-2\">";
					echo "<div class=\"row no-gutters\">";	
						
						echo "<img class=\"bd-placeholder-img card-img-top\" width=\"80%\" height=\"180\" src=".$row['file1']." aria-label=\"Placeholder: Image cap\" preserveAspectRatio=\"xMidYMid slice\" role=\"img\"><rect width=\"100%\" height=\"100%\" fill=\"#868e96\"/></img>";
							
						echo "<div class=\"card-body\" style=\"background-color: #296E85\">";
							echo "<div class=\"row\">";
								echo "<div class=\"col-12 col-sm-12 col-md-12 col-lg-2 col-xl-2\">";
									echo "<h4 class=\"card-title\" id=\"eventName".$counter."\" style=\"color: white\">".strtoupper($row['ename'])."</h4>";
								echo "</div>";	
								
								echo "<div class=\"col-12 col-sm-12 col-md-12 col-lg-2 col-xl-2\">";
									echo "<i class=\"fas fa-phone-square\"></i><label style=\"color: white\"  class=\"card-text\"><small><b id=\"organiser_contact_num".$counter."\">".$row['contact']."</b></small></label>";
								echo "</div>";
							
								echo "<div class=\"col-12 col-sm-12 col-md-12 col-lg-2 col-xl-2\">";
									echo "<i class=\"fas fa-map-marked-alt\"></i><label style=\"color: white\"  class=\"card-text\"><small class=\"\"><b id=\"place".$counter."\">".$row['location']."</b></small></label>";
								echo "</div>";
						
								echo "<div class=\"col-12 col-sm-12 col-md-12 col-lg-2 col-xl-2\">";
									echo "<i class=\"far fa-star\"></i><label style=\"color: white\"  class=\"card-text\"><small class=\"\"><b id=\"eventType".$counter."\">".$row['etype']."</b></small></label>";
								echo "</div>";
							
								echo "<div class=\"col-12 col-sm-12 col-md-12 col-lg-2 col-xl-2\">";
									echo "<i class=\"far fa-calendar-times\"></i> <label style=\"color: white\"  class=\"card-text\"><small class=\"\"><b id=\"eventdate".$counter."\">".$row['edate']."</b></small></label>";
								echo "</div>";
								
								echo "<div class=\"col-12 col-sm-12 col-md-12 col-lg-2 col-xl-2\">";
									echo "<button type=\"button\" id=\"intrestedButton\" onclick=\"intrestedEvent(event,$counter)\" class=\"btn btn-info\">INTRESTED</button>";
								echo "</div>";	
						
							echo "</div>"; //end of row div tag
						echo "</div>"; //end of the card body
					echo "</div>";//end of no gutters div tag
				echo "</div>";//end of div class=card div tag
			}
		
		echo "</div>"; // ending tag of row*/
	
	}else{
		echo "There are no records matching in the database that you are searching for";
	}
}

function addThreeEventItemsInARow($eventArray,$numofItems) {
    
	//print_r($eventArray);
	
	$totalBootstrapRows = ceil($numofItems/3);
	$limit=0;
	$count=0;
	$counter=0;
	echo "<div class=\"row\">";
		echo "<div class=\"col-12 col-sm-12 col-md-12 col-lg-2 col-xl-2\">";
			echo "<div class=\"card\" style=\"height:100%\">";
				
			echo "</div>";//End of card
		echo "</div>"; // ending div tag of the first column
		echo "<div class=\"col-12 col-sm-12 col-md-12 col-lg-10 col-xl-10\">";
		for($i=0;$i<$totalBootstrapRows;$i++){
			echo "<div class=\"row\">";
				$limit=$limit+3;
				for($j=$count;$j<$limit;$j++){
					if(!empty($eventArray[$j])){
							$counter++;
							
							echo "<div class=\"col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4\">";
								
									echo "<div class=\"card mb-2\">";
										echo "<img class=\"card-img-top\" height=\"125px\" width=\"125px\" src=\"".$eventArray[$j]['file1']."\" alt=\"Card image cap\" />";
										echo "<div class=\"card-body\">";
											//echo "<h5 class=\"card-title\">".$cardDetails[$j]['fname']."</h5>";
											//echo "<h5 class=\"card-title\">".$cardDetails[$j]['lname']."</h5>";		
										echo "</div>";	
										echo "<ul class=\"list-group list-group-flush\">";
											echo "<li class=\"list-group-item\" id=\"eventName".$counter."\" style=\"background-color: #296E85;color: white\">".strtoupper($eventArray[$j]['ename'])."</li>";
											echo "<li class=\"list-group-item\" style=\"background-color: #296E85;color: white\"><i class=\"fas fa-phone-square\"></i>&nbsp; &nbsp;&nbsp;&nbsp;<label style=\"color: white\"  class=\"card-text\"><small><b id=\"organiser_contact_num".$counter."\">".$eventArray[$j]['contact']."</b></small></label></li>";
											echo "<li class=\"list-group-item\" style=\"background-color: #296E85;color: white\"><i class=\"fas fa-map-marked-alt\"></i>&nbsp; &nbsp;&nbsp;&nbsp;<label style=\"color: white\"  class=\"card-text\"><small class=\"\"><b id=\"place".$counter."\">".$eventArray[$j]['location']."</b></small></label></li>";
											echo "<li class=\"list-group-item\" style=\"background-color: #296E85;color: white\"><i class=\"far fa-star\"></i>&nbsp; &nbsp;&nbsp;&nbsp;<label style=\"color: white\"  class=\"card-text\"><small class=\"\"><b id=\"eventType".$counter."\">".$eventArray[$j]['etype']."</b></small></label></li>";
											echo "<li class=\"list-group-item\" style=\"background-color: #296E85;color: white\"><i class=\"far fa-calendar-times\"></i>&nbsp; &nbsp;&nbsp;&nbsp;<label style=\"color: white\"  class=\"card-text\"><small class=\"\"><b id=\"eventdate".$counter."\">".$eventArray[$j]['edate']."</b></small></label></li>";
										echo "</ul>";
										echo "<div class=\"card-body\" style=\"background-color: #296E85\">";
											echo "<button type=\"button\" id=\"intrestedButton\" onclick=\"intrestedEvent(event,$counter)\" class=\"btn btn-info\">INTRESTED</button>";
										echo "</div>"; //end of the first card body
									echo "</div>";//Ending div tag for card
							
							echo "</div>";//Ending div tag for column
						$count++;				
					}
					
				}
			echo "</div>"; //End of class="row"	
		}
		echo "</div>";//end of div class="" second column
	echo "</div>";//End of div class="row"
}


function createRowAndFillItems($cardDetails,$numofItems) {
    
	$totalBootstrapRows = ceil($numofItems/3);
	$limit=0;
	$count=0;
	echo "<div class=\"row\">";
		echo "<div class=\"col-12 col-sm-12 col-md-12 col-lg-2 col-xl-2\">";
			echo "<div class=\"card\" style=\"height:100%\">";
				
			echo "</div>";//End of card
		echo "</div>"; // ending div tag of the first column
		echo "<div class=\"col-12 col-sm-12 col-md-12 col-lg-10 col-xl-10\">";
		for($i=0;$i<$totalBootstrapRows;$i++){
			echo "<div class=\"row\">";
				$limit=$limit+3;
				for($j=$count;$j<$limit;$j++){
					if(!empty($cardDetails[$j])){
							//print_r ($cardDetails[$j]);
							echo "<div class=\"col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4\">";
								echo "<form action=\"ratingsAndFeedback.php\" method=\"get\">";
									echo "<input type=\"hidden\" name=\"id\" value=\"".$cardDetails[$j]['id']."\"/>";
									echo "<div class=\"card mb-2\">";
										echo "<img class=\"card-img-top\" height=\"125px\" width=\"125px\" src=\"".$cardDetails[$j]['profilepic']."\" alt=\"Card image cap\">";
										echo "<div class=\"card-body\">";
											//echo "<h5 class=\"card-title\">".$cardDetails[$j]['fname']."</h5>";
											//echo "<h5 class=\"card-title\">".$cardDetails[$j]['lname']."</h5>";		
										echo "</div>";	
										echo "<ul class=\"list-group list-group-flush\">";
											echo "<li class=\"list-group-item\" style=\"background-color: #296E85;color: white\">".strtoupper($cardDetails[$j]['fname'])."</li>";
											echo "<li class=\"list-group-item\" style=\"background-color: #296E85;color: white\">".strtoupper($cardDetails[$j]['lname'])."</li>";
											echo "<li class=\"list-group-item\" style=\"background-color: #296E85;color: white\">".$cardDetails[$j]['contact']."</li>";
											echo "<li class=\"list-group-item\" style=\"background-color: #296E85;color: white\">".$cardDetails[$j]['email']."</li>";
											echo "<li class=\"list-group-item\" style=\"background-color: #296E85;color: white\">".$cardDetails[$j]['location']."</li>";
											echo "<li class=\"list-group-item\" style=\"background-color: #296E85;color: white\">".$cardDetails[$j]['service']."</li>";
										echo "</ul>";
										echo "<div class=\"card-body\" style=\"background-color: #296E85\">";
											echo "<input type=\"submit\" class=\"card-link btn btn-info\" value=\"More Info\"/>";
										echo "</div>"; //end of the first card body
									echo "</div>";//Ending div tag for card
								echo "</form>";
							echo "</div>";//Ending div tag for column
						$count++;				
					}
					
				}
			echo "</div>"; //End of class="row"	
		}
		echo "</div>";//end of div class="" second column
	echo "</div>";//End of div class="row"
}	
?>
</body>
</html>