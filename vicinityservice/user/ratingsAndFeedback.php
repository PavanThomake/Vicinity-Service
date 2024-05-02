<?php
session_start();

$email=$_SESSION["user"];

//echo $loggedInName." ".$userEmailId." ".$userContactInfo;
if(isset($_SESSION["user"])){


$id=$_GET["id"];
$userEmailId=$_SESSION["user"];
$loggedInName=$_SESSION["userFName"];
$userContactInfo=$_SESSION["userContact"];	

	include 'config.php';
	
	$imageQuery = "select file from userdetails  where email= '$email' ";
	$imageQueryResult = mysqli_fetch_assoc(mysqli_query($con,$imageQuery)) or die(mysqli_error($con));	
	$profileImage = "profile/".$imageQueryResult["file"];
	
	$query = "select * from servicestable  where id= '$id' ";
	$result=mysqli_query($con,$query) or die(mysqli_error($con));
	//while($row=mysqli_fetch_assoc($result))
	//{
		$row=mysqli_fetch_assoc($result);		
		$file=$row['profilepic'];
		/*$role = $row['service'];
		$path="profile/".$file;*/
		$ratingQuery = "select avg(rating) from ratingtable where contact= '".$row['contact']."' ";
		$ratingQueryResult=mysqli_query($con,$ratingQuery) or die(mysqli_error($con));
		$tempRating=mysqli_fetch_assoc($ratingQueryResult);
		$avgRating=$tempRating['avg(rating)'];
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1"/>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
	 
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	<script src="jquery-bar-rating-master/dist/jquery.barrating.min.js" type="text/javascript"></script>
	<!--The CSS CDN for the rating starts here  -->
		<link href="style.css" type="text/css" rel="stylesheet" />
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
		<link href='jquery-bar-rating-master/dist/themes/fontawesome-stars.css' rel='stylesheet' type='text/css'
	<!--The CSS CDN for the rating ends here -->
	<!--The javascript CDN starts for rating starts here -->
		 <script src="jquery-3.0.0.js" type="text/javascript"></script>
        <script src="jquery-bar-rating-master/dist/jquery.barrating.min.js" type="text/javascript"></script>
	<!--The javascript CDN of ratings ends here -->
        <script type="text/javascript">
        $(function() {
            $('.rating').barrating({
                theme: 'fontawesome-stars',
                onSelect: function(value, text, event) {

                    // Get element id by data-id attribute
                    var el = this;
                    var el_id = el.$elem.data('id');
					//alert(el_id);
                    // rating was selected by a user
                    /*if (typeof(event) !== 'undefined') {
                        
                        var split_id = el_id.split("_");

                        var postid = split_id[1];  // postid

                        // AJAX Request
                        $.ajax({
                            url: 'rating_ajax.php',
                            type: 'post',
                            data: {postid:postid,rating:value},
                            dataType: 'json',
                            success: function(data){
                                // Update average
                                var average = data['averageRating'];
                                $('#avgrating_'+postid).text(average);
                            }
                        });
                    }*/
                }
            });
        });
      
        </script>
	<style>
	</style>
</head>
<body>

<nav class="navbar navbar-expand-md bg-dark navbar-dark">
  <!-- Brand -->
  <a class="navbar-brand" href="#">VICINITY WEB SEVICES</a>

  <!-- Toggler/collapsibe Button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>

  <!-- Navbar links -->
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav navbar-expand-sm ml-auto">
        <li class="nav-item">
        <a class="nav-link" style="color: white" href="search.php">Search</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" style="color: white" href="userIndex.php"><span>Event Registration</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" style="color: white" href="news1.php"><span>Vicinity news</span></a>
      </li>
         <li class="nav-item">
        <a class="nav-link" style="color: white" href="index.php"><span>Helpdesk</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" style="color: white" href="#">Profile <img class="rounded-circle" src="<?php echo $profileImage;?>" width="25px" height="25px"/ ></a>
      </li>
	  <li class="nav-item">
        <a class="nav-link" href="logout.php" style="color: white"><span>Logout</span></a>
      </li>
    </ul>
  </div>
</nav>

<div class="container-fluid" style="margin-top:10px">
	<div class="row">
		<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-lg-12">
			<div class="shadow card text-center">
				<div class="card-body"><h2></h2>
					<div class="container" style="margin-top:10px">
						<form class="needs-validation" action="upload_RatingsAndFeedback.php"   method="post" enctype="multipart/form-data">
							<div class="row" >
								
								<div class="col-5 col-sm-5 col-md-5 col-lg-5 col-lg-5">
								</div>
								<div class="col-2 col-sm-2 col-md-2 col-lg-2 col-lg-2">
									<img src="<?php echo $file; ?>" width="100px" height="100px" />
								</div>
							</div>
							<input type="hidden" name="id" value="<?php echo $id;?>"/>
							<input type="hidden" name="loggedInName" value="<?php echo $loggedInName;?>"/>
							<input type="hidden" name="userEmailId" value="<?php echo $userEmailId;?>"/>
							<input type="hidden" name="userContactInfo" value="<?php echo $userContactInfo;?>"/>
							<div class="row" style="margin-top:20px">
								<div class="col-12 col-sm-12 col-md-12 col-lg-2 col-lg-2">
									<div class="input-group text-center">
										<label for="firstName">First Name</label>
									</div>
								</div>
								<div class="col-12 col-sm-12 col-md-12 col-lg-8 col-lg-8">
									<div class="input-group">	
										<span class="input-group-prepend">
											<div class="input-group-text"><i class="fas fa-user"></i></div>
										</span>
										<input type="text" value="<?php echo $row['fname']; ?>" required="required" class="form-control" id="fname" name="fname" readonly ="readonly" /> 
									</div>
								</div>
							</div>
							<div class="row" style="margin-top:20px">
								<div class="col-12 col-sm-12 col-md-12 col-lg-2 col-lg-2">
									<div class="input-group text-center">
										<label for="firstName">Last Name</label>
									</div>
								</div>
								<div class="col-12 col-sm-12 col-md-12 col-lg-8 col-lg-8">
									<div class="input-group">	
										<span class="input-group-prepend">
											<div class="input-group-text"><i class="fas fa-user"></i></div>
										</span>
										<input type="text" value="<?php echo $row['lname']; ?>" required="required" class="form-control" id="lname" name="lname" readonly ="readonly"/>
									</div>
								</div>
							</div>
							<div class="row" style="margin-top:20px">
								<div class="col-12 col-sm-12 col-md-12 col-lg-2 col-lg-2">
									<div class="input-group text-center">
										<label>Contact Number</label>
									</div>
								</div>
								<div class="col-12 col-sm-12 col-md-12 col-lg-8 col-lg-8">
									<div class="input-group">	
										<span class="input-group-prepend">
											<div class="input-group-text"><i class="fas fa-phone"></i></div>
										</span>
										<input type="text" required="required" value="<?php echo $row['contact']; ?>" name="contact" class="form-control" readonly ="readonly"/> 
									</div>
								</div>
							</div>
							<div class="row" style="margin-top:20px">
								<div class="col-12 col-sm-12 col-md-12 col-lg-2 col-lg-2">
									<div class="input-group text-center">
										<label>Service</label>
									</div>
								</div>
								<div class="col-12 col-sm-12 col-md-12 col-lg-8 col-lg-8">
									<div class="input-group">	
										<span class="input-group-prepend">
											<div class="input-group-text"><i class="fas fa-phone"></i></div>
										</span>
										<input type="text" required="required" value="<?php echo $row['service']; ?>" name="service" class="form-control" readonly ="readonly"/> 
									</div>
								</div>
							</div>
							<div class="row" style="margin-top:20px">
								<div class="col-12 col-sm-12 col-md-12 col-lg-2 col-lg-2">
									<div class="input-group text-center">
										<label>Email Id</label>
									</div>
								</div>
								<div class="col-12 col-sm-12 col-md-12 col-lg-8 col-lg-8">
									<div class="input-group">	
										<span class="input-group-prepend">
											<div class="input-group-text"><i class="far fa-envelope"></i></div>
										</span>
										<input type="text" required="required" value="<?php echo $row['email']; ?>" name="mail" class="form-control" readonly ="readonly" /> 
									</div>
								</div>
							</div>
							<div class="row" style="margin-top:20px">
								<div class="col-12 col-sm-12 col-md-12 col-lg-2 col-lg-2">
									<div class="input-group text-center">
										<label>Place</label>
									</div>
								</div>
								<div class="col-12 col-sm-12 col-md-12 col-lg-8 col-lg-8">
									<div class="input-group">	
										<span class="input-group-prepend">
											<div class="input-group-text"><i class="fas fa-home"></i></div>
										</span>
										<input type="text" required="required" value="<?php echo $row['location']; ?>" name="place" class="form-control" readonly ="readonly"/> 
									</div>
								</div>
							</div>
							<div class="row" style="margin-top:20px">
								<div class="col-12 col-sm-12 col-md-12 col-lg-2 col-lg-2">
									<div class="input-group text-center">
										<label>Ratings</label>
									</div>
								</div>
								<div class="col-12 col-sm-12 col-md-12 col-lg-2 col-lg-2 text-left">
									<div class="post-action">
										<select class='rating' id='rating' name="rating" data-id='rating'>
											<option value="1" >1</option>
											<option value="2" >2</option>
											<option value="3" >3</option>
											<option value="4" >4</option>
											<option value="5" >5</option>
										</select>
									</div>
								</div>
								<div class="col-12 col-sm-12 col-md-12 col-lg-2 col-lg-2 text-left" style=	"margin-top: 10px">
									<label>Avg Rating (<?php echo round($avgRating, 2);?>)</label>
								</div>
							</div>
							<div class="row" style="margin-top:20px">
								<div class="col-12 col-sm-12 col-md-12 col-lg-2 col-lg-2">
									<div class="input-group text-center">
										<label>Feedback</label>
									</div>
								</div>
								<div class="col-12 col-sm-12 col-md-12 col-lg-8 col-lg-8">
									<div class="form-group">
										<textarea class="form-control" name="feedback" id="exampleFormControlTextarea3" rows="4"></textarea>
									</div>
								</div>
							</div>
							<div class="row" style="margin-top:20px">
								<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-lg-12">
									<input type="submit" class="btn btn-primary" value="Submit"/>
								</div>
							</div>
						</form>
						<?php 
						//	}
						?>
					</div>	
				</div> 
			</div>
		</div>	 
	</div>
	<div class="row text-left" style="margin-top: 10px">
		<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-lg-12">
			<label style="font-size:25px">Comments</label>
		</div>
	</div>
	<div class="row text-center">
		<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-lg-12">
			<div id="comments"></div>
		</div>
	</div>	
</div>		
     
<script>
$(document).ready(function(){
	$('#rating').barrating('set','<?php echo floor($avgRating);?>');
});


$.get("fetchComments.php?fname=<?php echo $row['fname'];?>&lname=<?php echo $row['lname'];?>&contact=<?php echo $row['contact'];?>&service=<?php echo $row['service'];?>", function(data, status){
    
	  document.getElementById("comments").innerHTML = data;
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