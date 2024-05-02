<?php
session_start();
include 'config.php';
$email=$_SESSION["user"];
$loggedInName=$_SESSION["userFName"];
$userContactInfo=$_SESSION["userContact"];

if(isset($_SESSION["user"])){
  
  
 $query = "select file from userdetails where email='$email'";
 $result = mysqli_fetch_assoc(mysqli_query($con,$query)) or die(mysqli_error($con));
 $path="profile/".$result['file'];
	 
  /*The below code commented by Gaurav Duth Baliga as it was */
 /*$query = "select * from userdetails where email='$email'";
 $result=mysqli_query($con,$query) or die(mysqli_error($con));
	while($row=mysqli_fetch_assoc($result))
	{
		$file=$row['file'];
		$path="profile/".$file;
	}
  */
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1"/>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css"/>
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	
	<link href="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" rel="Stylesheet"></link>
	
	<!--<script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js" ></script>-->
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
	
	<!--UI jquerry cdn links for autocomplete -->
	
	  <link href = "https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel = "stylesheet">
      <script src = "https://code.jquery.com/jquery-1.10.2.js"></script>
      <script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
</head>
<style>

#autoCompleteContainer {
    display: block; 
    position:relative
} 
.ui-autocomplete {
    position: absolute;
}

.vertical-divider{
 margin-left:5px;
 margin-right:5px;
 width:1px;
 height:100%;
 border-left:1px solid red;
}

/*search box css start here*/
.search-sec{
    padding: 2rem;
}
.search-slt{
    display: block;
    width: 100%;
    font-size: 0.875rem;
    line-height: 1.5;
    color: #55595c;
    background-color: #fff;
    background-image: none;
    border: 1px solid #ccc;
    height: calc(3rem + 2px) !important;
    border-radius:0;
}
.wrn-btn{
    width: 100%;
    font-size: 16px;
    font-weight: 400;
    text-transform: capitalize;
    height: calc(3rem + 2px) !important;
    border-radius:0;
}

#searchResult{
   margin-top:-90px	
}

@media (min-width: 992px){
    .search-sec{
        position: relative;
        top: -114px;
        background: rgba(26, 70, 104, 0.51);
    }
}

@media (max-width: 992px){
    .search-sec{
        background: #1A4668;
    }
}

@media (max-width: 767px){
    #searchResult{
        margin-top: 50px;
    }
}
</style>
<body style="background-color: #f5f5f5;">

<nav class="navbar navbar-expand-md bg-dark navbar-dark">
  <!-- Brand -->
  <a class="navbar-brand" href="#">VICINITY WEB SEVICES</a>

  <!-- Toggler/collapsibe Button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>

  <!-- Navbar links -->
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav navbar-expand-sm ml-auto" >
      <li class="nav-item">
        <a class="nav-link" style="color: white" href="#">Search</a>
      </li>
	  <li class="nav-item">
        <a class="nav-link" style="color: white" href="userIndex.php"><span>Event Registration</span></a>
      </li>
       
      <li class="nav-item">
        <a class="nav-link" style="color: white" href="profileUpload.php">Profile <img class="rounded-circle" src="<?php echo $path;?>" width="25px" height="25px"/ ></a>
      </li>
        
	  <li class="nav-item">
        <a class="nav-link" href="logout.php" style="color: white"><span>Logout</span></a>
      </li>
    </ul>
  </div>
</nav>

<section>
    <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://pbs.twimg.com/media/EGHYvttU4AAYKb7?format=jpg&name=large" class="d-block w-100" alt="...">
            </div>
            <!--<div class="carousel-item">
                <img src="https://pbs.twimg.com/media/EGHYvtkUcAAuc8T?format=jpg&name=large" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="https://pbs.twimg.com/media/EGHYvtjU0AAO8w1?format=jpg&name=large" class="d-block w-100" alt="...">
            </div>-->
        </div>
        <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</section>
<section class="search-sec" >
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-12 col-sm-12 col-lg-3 col-md-3  p-0">
                        <select class="form-control search-slt" id="searchOptionTypes">
                            <option>--Select--</option>
                            <option value="service">Service</option>
                            <option value="events">Events</option>
                        </select>
                    </div>
                    <div class="col-12 col-sm-12 col-lg-3 col-md-3  p-0">
                        <!--<input type="text" class="form-control search-slt" placeholder="Enter Drop City">-->
						<div id="options"></div>
                    </div>
                    <div class="col-12 col-sm-12 col-lg-3 col-md-3  p-0">
                        <input type="search" id="searchField" class="form-control search-slt" placeholder="Enter the service or event to search"/>
						<div id="autoCompleteContainer">
						</div>
					</div>
                    <div class="col-12 col-sm-12 col-lg-3 col-md-3 col-sm-12 p-0">
                        <button type="button" id="searchButton" class="btn btn-danger wrn-btn">Search</button>
                    </div>
                </div>
            </div>
        </div>
    </div>	
</section>


<div class="container-fluid">
	<div class="row" >
		<div class="col-12 col-sm-12 col-lg-12 col-md-12">
			<div id="searchResult"></div>
			
		</div>
	</div>
</div>

    		

<script>

var searchWord;
var searchType;
var eventsAndservice;
var loc;
var data = new Array();
$.ajax({url: "fetchServicesAndEvents.php?eventAndService=service", success: function(result){
		$("#options").html(result);
}});

/*The below jquery method #searchOptionTypes loads the options in select tag beside the service and */
$("#searchOptionTypes").change(function(){
	
	searchType = $(this).children("option:selected").val();
	//alert(searchType);
	$.ajax({url: "fetchServicesAndEvents.php?eventAndService="+searchType+"", success: function(result){
		$("#options").html(result);
	}});
});

/*The below searchOptionSelection() is added by Gaurav Duth Baliga to select each option either from 
services or events to save it in a global variable which loads the data from the server*/	
function searchOptionSelection(){
			
	eventsAndservice =  document.getElementById("optionsDisplay").value;
	
	/*The below ajax code added by Gaurav Duth Baliga on 14-May-2020 to load the location from the db as 
	suggestion for events and service inside the text box when the cursor is placed or a word is being searched*/
	$.ajax({url: "fetchLocationForEventAndService.php?searchType="+searchType, success: function(result){
		
		if(result != null){
			
			var jsonObject = JSON.parse(result);		
			for(var i=0;i<jsonObject.length;i++){
				data[i] = jsonObject[i].location;
				//alert(data[i]);
			}
		
			$('#searchField').autocomplete({
				appendTo:"#autoCompleteContainer",	
				source: data,
				minLength: 0,
				autoFocus: true, //This is used to highlight a option in the menu  
				delay: 5, //The delay in miliseconds taken to display the options when it is typed by the user
			});
		}else{
			alert("There is no location suggestion as the locations are not present");
		}
		
		
	}});	
  
  
	
}



function intrestedEvent(event,counter){
	//$("#intrestedButton").click(function(){
		;
		var  evName = document.getElementById("eventName"+counter+"").innerHTML;
		var  orgNum = document.getElementById("organiser_contact_num"+counter+"").innerHTML;
		var  place = document.getElementById("place"+counter+"").innerHTML;
		var  evType = document.getElementById("eventType"+counter+"").innerHTML;
		var  evdate = document.getElementById("eventdate"+counter+"").innerHTML;
		var  iName = '<?php echo $loggedInName; ?>';
		var  iNum = "<?php echo $userContactInfo; ?>";
		//alert("evName="+evName+"&orgNum="+orgNum+"&place="+place+"&evType="+evType+"&evdate="+evdate+"&iName="+iName+"&iNum="+iNum+"");
		
		$.ajax({
			type: "POST",
			data: {"evName":evName,"orgNum":orgNum,"place":place,"evType":evType,"evdate":evdate,"iName":iName,"iNum":iNum},
			url: "intrestedPerson.php",
			success: function(result) {
				//$("#resultadd").html(response);
				var jsonObj = JSON.parse(result);
				if(jsonObj.return == true){
					alert("SMS sent sucessfully");
				}else{
				   //
				}
			}
		});	
		event.preventDefault();
		
		/*var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function() {
		//if (this.readyState == 4 && this.status == 200) {
		//	 alert(this.responseText);
		//}
		};
			xhttp.open("GET", "intrestedPerson.php?evName="+evName+"&orgNum="+orgNum+"&place="+place+"&evType="+evType+"&evdate="+evdate+"&iName="+iName+"&iNum="+iNum+"", true);
			xhttp.send();
		});*/
}



/*The jquerry method displays the search for events and service from DB*/
$("#searchButton").click(function(){
	
	/*if(searchWord==""){
		alert("Please select the word to be searched in the search box");
	}else{
		
	}*/
	loc = document.getElementById("searchField").value;
	searchWord = eventsAndservice+","+loc;
	//alert("displaySearchResults.php?searchType="+searchType+"&searchWord="+searchWord+"");
	$.ajax({url: "displaySearchResults.php?searchType="+searchType+"&searchWord="+searchWord+"", success: function(result){
		$("#searchResult").html(result);
		/*The alert below gets displayed during clicking on the red search button while searching based
		on either service or events*/
		//alert(result);
		 $('html, body').animate({
             scrollTop: $("#searchResult").offset().top
        }, 1000);
	}});
		
});

	
   
		
</script>  
</body>
</html>
<?php
}else{
	echo "<Script>alert('Please Login');</script>";
	echo "<script>window.location.href = 'userLogin.php';</script>";
}

?>