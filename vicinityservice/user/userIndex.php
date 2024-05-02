<?php
session_start();
include 'config.php';
$email=$_SESSION["user"];

if(isset($_SESSION["user"])){

 $query = "select file from userdetails where email='$email'";
 $result = mysqli_fetch_assoc(mysqli_query($con,$query)) or die(mysqli_error($con));
 $path="profile/".$result['file'];
	
//	echo $path;
 
 /*while($row=mysqli_fetch_assoc($result))
 {
	$file=$row['file'];
	$path="profile/".$file;
	
	//echo $path;
 }*/
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
        <a class="nav-link" style="color: white" href="#"><span>Event Registration</span></a>
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

  
  <div class="container-fluid" style="margin-top:10px">
	<div class="row">
		<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-lg-12">
			<div class="shadow card text-center h-100" style="max-height: 100%">
				<div class="card-body">
					<h2>EVENT REGISTRATION</h2>
					<div class="container" style="margin-top:10px">
						<form class="needs-validation" action="addEvent.php"   method="post" enctype="multipart/form-data"><!--  novalidate action="/action" novalidate class="needs-validation" 	-->
							
							<div class="row">
							
								<div class="col-12 col-sm-12 col-md-12 col-lg-2 col-lg-2">
									<div class="input-group text-center">
										<label for="firstName">Event Name</label>
									</div>
								</div>
							
								<div class="col-12 col-sm-12 col-md-12 col-lg-8 col-lg-8">
									<div class="input-group">	
										<span class="input-group-prepend">
											<div class="input-group-text"><i class="fas fa-calendar-week"></i></div>
										</span>
										<input type="text"  required="required" class="form-control" id="name" name="name"   placeholder="Event Name" /> 
									</div>
								</div>
							</div>
							
							<div class="row" style="margin-top:20px">
								<div class="col-12 col-sm-12 col-md-12 col-lg-2 col-lg-2">
									<div class="input-group text-center">
										<label>Location</label>
									</div>
								</div>
					
								<div class="col-12 col-sm-12 col-md-12 col-lg-8 col-lg-8">
									<div class="input-group">	
										<span class="input-group-prepend">
											<div class="input-group-text"><i class="fas fa-map-marker-alt"></i></div>
										</span>
										<input type="text" required="required" name="location" class="form-control" placeholder="Location" /> 
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
											<input type="text" required="required" minlength="10" maxlength="10" name="contact" class="form-control" placeholder="Contact Number" /> 
										</div>
									</div>
							</div>
						
							<div class="row" style="margin-top:20px">
								<div class="col-12 col-sm-12 col-md-12 col-lg-2 col-lg-2">
									<div class="input-group text-center">
										<label>Type Of Events</label>
									</div>
								</div>
						
								<div class="col-12 col-sm-12 col-md-12 col-lg-8 col-lg-8">
									<div class="input-group">	
										<span class="input-group-prepend">
											<div class="input-group-text"><i class="fas fa-calendar-week"></i></i></div>
										</span>
										<select required="required" name="type" class="form-control" placeholder="Type of Event" > 
											<option value="">Open this select menu</option>
												<?php  
													include 'config.php';
													$query = "select * from event_type ";
													$result=mysqli_query($con,$query) or die(mysqli_error($con));
													while($row=mysqli_fetch_assoc($result))
													{
														$name=$row['type'];
													?>
													<option value="<?php echo $name;?>"> <?php echo $name;?></option>
													<?php }?>
										</select>
									</div>
								</div>
							</div>
				
							<div class="row" style="margin-top:20px">
								<div class="col-12 col-sm-12 col-md-12 col-lg-2 col-lg-2">
									<div class="input-group text-center">
										<label>Upload Photos</label>
									</div>
								</div>
								<div class="col-12 col-sm-12 col-md-12 col-lg-3 col-lg-3">
									<div class="input-group">	
										<span class="input-group-prepend">
											<div class="input-group-text"><i class="fas fa-image"></i></div>
										</span>
										<input type="file" name="photo" id="photo"  class="form-control" placeholder="Enter Password" /> 
									</div>
								</div>
								<div class="col-12 col-sm-12 col-md-12 col-lg-3 col-lg-3">
									<div class="input-group">	
										<span class="input-group-prepend">
											<div class="input-group-text"><i class="fas fa-image"></i></div>
										</span>
										<input type="file" name="photo1" id="photo" class="form-control" placeholder="Enter Password" /> 
									</div>
								</div>
								<div class="col-12 col-sm-12 col-md-12 col-lg-3 col-lg-3">
									<div class="input-group">	
										<span class="input-group-prepend">
											<div class="input-group-text"><i class="fas fa-image"></i></div>
										</span>
										<input type="file" name="photo2" id="photo"  class="form-control" placeholder="Enter Password" /> 
									</div>
								</div>
							</div>
							
							<div class="row" style="margin-top:20px">
								<div class="col-12 col-sm-12 col-md-12 col-lg-2 col-lg-2">
									<div class="input-group text-center">
										<label>Date Of Events</label>
									</div>
								</div>
						
								<div class="col-12 col-sm-12 col-md-12 col-lg-8 col-lg-8">
									<div class="input-group">	
										<span class="input-group-prepend">
											<div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
										</span>
										<input type="Date" required="required" name="date"  id="date"  class="form-control" class="Date of Event" /> 
									</div>
								</div>
							</div>
				
							<div class="row" style="margin-top:20px">
								<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-lg-12">
									<input type="submit" class="btn btn-primary" value="Submit"/>
								</div>	
							</div>
						
							<div class="row">
								<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-lg-12">
								</div>
							</div>	
					</form>
				</div><!--End of container div tag -->
			</div> <!--End of div tag class="card-body" -->
		</div>
     </div> 
  </div> 		
      <!--<div class="col-sm-9 col-md-7 col-lg-5">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h5 class="card-title text-center"><b></b></h5>
            <form action="validateAdmin.php" class="form-signin" method="post">
              <div class="form-label-group">
                <input type="text" id="username" name="username" class="form-control" placeholder="Admin Username" required autofocus />
                <label for="username">Username</label>
              </div>

              <div class="form-label-group">
                <input type="password" id="password" name="password" class="form-control" placeholder="Admin Password" required /-*>
                <label for="password">Password</label>
              </div>
			  
              <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Sign in</button>
            </form>
          </div>
        </div>
      </div>-->
<script>

var dtToday = new Date();
var month = dtToday.getMonth() + 1;     // getMonth() is zero-based
var day = dtToday.getDate();
var year = dtToday.getFullYear();
if(month < 10)
   month = '0' + month.toString();
if(day < 10)
   day = '0' + day.toString();

var maxDate = year+'-'+month+'-'+day;
$('#date').attr('min', maxDate);
		
</script>  
</body>
</html>
<?php
}else{
	echo "<Script>alert('Please Login');</script>";
	echo "<script>window.location.href = 'userLogin.php';</script>";
}

?>