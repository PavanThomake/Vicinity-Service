<?php
session_start();
$email=$_SESSION["user"];
if(isset($_SESSION["user"])){
?>
<?php  
include 'config.php';
 $query = "select * from userdetails where email='$email'";
 $result=mysqli_query($con,$query) or die(mysqli_error($con));
		while($row=mysqli_fetch_assoc($result))
		{
			$file=$row['file'];
			$role = $row['service'];
			$path="profile/".$file;
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
      <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> 
<script src="//geodata.solutions/includes/statecity.js"></script>
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
        <a class="nav-link" style="color: white" href="#">Profile <img class="rounded-circle" src="<?php echo $path;?>" width="25px" height="25px"/ ></a>
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
				<div class="card-body"><h2>PROFILE</h2></div>
				  <div class="container" style="margin-top:10px">
				  
					<form class="needs-validation" action="upload_process.php"   method="post" enctype="multipart/form-data"><!--  novalidate action="/action" novalidate class="needs-validation" 	-->
						<div class="row" >
							<div class="col-5 col-sm-5 col-md-5 col-lg-5 col-lg-5">
							</div>
							<div class="col-2 col-sm-2 col-md-2 col-lg-2 col-lg-2">
								<img src="<?php echo $path; ?>" width="100px" height="100px" />
							</div>
							<input type="hidden" name="id" value="<?php echo $row['id'];?>">
						</div>
						<div class="row" style="margin-top:20px">
							<div class="col-2 col-sm-2 col-md-2 col-lg-2 col-lg-2">
								<div class="input-group text-center">
									<label for="firstName">First Name</label>
								</div>
							</div>
							<div class="col-8 col-sm-8 col-md-8 col-lg-8 col-lg-8">
								<div class="input-group">	
									<span class="input-group-prepend">
										<div class="input-group-text"><i class="fas fa-user"></i></div>
									</span>
									<input type="text" value="<?php echo $row['fname']; ?>" required="required" class="form-control" id="fname" name="fname" /> 
							
								</div>
							</div>
						</div>
						<div class="row" style="margin-top:20px">
							<div class="col-2 col-sm-2 col-md-2 col-lg-2 col-lg-2">
								<div class="input-group text-center">
									<label for="firstName">Last Name</label>
								</div>
							</div>
							<div class="col-8 col-sm-8 col-md-8 col-lg-8 col-lg-8">
								<div class="input-group">	
									<span class="input-group-prepend">
										<div class="input-group-text"><i class="fas fa-user"></i></div>
									</span>
									<input type="text" value="<?php echo $row['lname']; ?>" required="required" class="form-control" id="lname" name="lname" /> 
							
								</div>
							</div>
						</div>
						<div class="row" style="margin-top:20px">
							<div class="col-2 col-sm-2 col-md-2 col-lg-2 col-lg-2">
								<div class="input-group text-center">
									<label>Gender</label>
								</div>
							</div>
						
							<div class="col-8 col-sm-8 col-md-8 col-lg-8 col-lg-8">
								<div class="input-group">	
									<span class="input-group-prepend">
										<div class="input-group-text"><i class="fas fa-venus-mars"></i></div>
									</span>
									<input type="text" required="required" value="<?php echo $row['gender']; ?>" name="gen" class="form-control" readonly="readonly"/> 
								</div>
							</div>
						</div>
						<div class="row" style="margin-top:20px">
							<div class="col-2 col-sm-2 col-md-2 col-lg-2 col-lg-2">
								<div class="input-group text-center">
									<label>Contact Number</label>
								</div>
							</div>
							<div class="col-8 col-sm-8 col-md-8 col-lg-8 col-lg-8">
								<div class="input-group">	
									<span class="input-group-prepend">
										<div class="input-group-text"><i class="fas fa-phone"></i></div>
									</span>
									<input type="text" required="required" value="<?php echo $row['contact']; ?>" name="contact" class="form-control"/> 
								</div>
							</div>
						</div>
						<div class="row" style="margin-top:20px">
							<div class="col-2 col-sm-2 col-md-2 col-lg-2 col-lg-2">
								<div class="input-group text-center">
									<label>Service</label>
								</div>
							</div>
							<div class="col-8 col-sm-8 col-md-8 col-lg-8 col-lg-8">
								<div class="input-group">	
									<span class="input-group-prepend">
										<div class="input-group-text"><i class="fas fa-phone"></i></div>
									</span>
									<input type="text" required="required" readonly="readonly" value="<?php echo $row['service']; ?>" name="service" class="form-control"/> 
								</div>
							</div>
						</div>
						<div class="row" style="margin-top:20px">
							<div class="col-2 col-sm-2 col-md-2 col-lg-2 col-lg-2">
								<div class="input-group text-center">
									<label>Email Id</label>
								</div>
							</div>
							<div class="col-8 col-sm-8 col-md-8 col-lg-8 col-lg-8">
								<div class="input-group">	
									<span class="input-group-prepend">
										<div class="input-group-text"><i class="far fa-envelope"></i></div>
									</span>
									<input type="text" required="required" value="<?php echo $row['email']; ?>" name="mail" class="form-control" readonly="readonly" /> 
								</div>
						
							</div>
						</div>
					
						
						<div class="row" style="margin-top:20px">
							<div class="col-2 col-sm-2 col-md-2 col-lg-2 col-lg-2">
								<div class="input-group text-center">
									<label>State</label>
								</div>
							</div>
                            <input type="hidden" name="country" id="countryId" value="IN"/>
							<div class="col-8 col-sm-8 col-md-8 col-lg-8 col-lg-8">
								<div class="input-group">	
									<span class="input-group-prepend">
										<div class="input-group-text"><i class="fas fa-city"></i></div>
									</span>
									<select name="state" class="states order-alpha custom-select" id="stateId" required="required">
                                        <option value="">Select State</option>
                                    </select>
								</div>
						
							</div>
						</div>
                        <div class="row" style="margin-top:20px">
							<div class="col-2 col-sm-2 col-md-2 col-lg-2 col-lg-2">
								<div class="input-group text-center">
									<label>Place</label>
								</div>
							</div>
							<div class="col-8 col-sm-8 col-md-8 col-lg-8 col-lg-8">
								<div class="input-group">	
									<span class="input-group-prepend">
										<div class="input-group-text"><i class="fas fa-home"></i></div>
									</span>
									<select name="place" class="cities order-alpha custom-select" id="cityId" required="required">
                                        <option value="">Select City</option>
                                    </select> 
								</div>
						
							</div>
						</div>
						
						<div class="row" style="margin-top:20px">
					
							<div class="col-2 col-sm-2 col-md-2 col-lg-2 col-lg-2">
								<div class="input-group text-center">
									<label>Upload Profile Photo</label>
								</div>
							</div>
							<div class="col-8 col-sm-8 col-md-8 col-lg-8 col-lg-8">
								<div class="input-group">	
									<span class="input-group-prepend">
										<div class="input-group-text"><i class="fas fa-image"></i></div>
									</span>
									<input type="file" name="photo" id="photo"  class="form-control" /> 
								</div>
							</div>
							
						</div>
				
						<div class="row" style="margin-top:20px">
							<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-lg-12">
								<input type="submit" class="btn btn-primary" value="Update"/>
							</div>
						</div>
					</form>
			<?php 
				}
			?>
				</div>
			</div> 
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


		
</script>  
</body>
</html>
<?php
}else{
	echo "<Script>alert('Please Login');</script>";
	echo "<script>window.location.href = 'userLogin.php';</script>";
}

?>