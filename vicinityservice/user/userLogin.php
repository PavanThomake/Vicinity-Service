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
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
	<style>
		body{
			overflow-x: hidden;
		}
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
		<form action="validateUser.php" method="POST" class="form-inline">
			<div class="input-group mr-sm-2">
				<span class="input-group-prepend">
					<div class="input-group-text"><i class="fa fa-user"></i></div>
				</span>
				<input type="email" required="required" name="username" class="form-control " placeholder="Username" aria-label="Username" aria-describedby="Username"/>
				<div class="input-group-append">
					<span class="input-group-text" id="basic-addon1">@</span>
				</div>  
				<!-- <span class="input-group-append">
                <button class="btn btn-outline-secondary border-left-0 border" type="button">
                    Search
                </button>
              </span>-->
			</div>
			<div class="input-group mr-sm-2">	
			<!--<div class="input-group-prepend">
				<span class="input-group-text" id="basic-addon1">@</span>
			</div>-->
				<span class="input-group-prepend">
					<div class="input-group-text"><i class="fa fa-lock"></i></div>
				</span>
				<input type="password" class="form-control" name="password" required="required" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1"/>
				<div class="input-group-append">
					<span class="input-group-text" id="basic-addon1">**</span>
				</div>
			</div>
			<div class="input-group mr-sm-2">	
				<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Login</button>
			</div>
			<div class="input-group mr-sm-3">	
				<label style="color: white;font-size:12px">or</label>
			</div>
			<div class="input-group mr-sm-2 text-center">	
				<a href="forgotPassword.php" style="color: white;font-size:12px">Forgot <br/> Password?</a>
			</div>
			
		</form>
	</ul>
   </div>
</nav>
  
	<div class="row">
		<div class="col-12 col-sm-12 col-md-5 col-lg-5 col-lg-5" >
			<img src="../images/vicinity.png" class="mx-auto d-block" class="rounded" alt="There is no logo" > 
            <p style="font-family: 'Lobster', cursive; font-size:1.5rem; margin-left:5%; margin-top:10%;">Vicinity webservice is a web application where the users can search for the services or events which are near to their location.<br/>Ex: If you have to search for Electrician who are near to your location then you can search their information by our web application. </p>
		</div>
		
		<div class="col-12 col-sm-12 col-md-7 col-lg-7 col-lg-7">
			<div class="row">
				<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-lg-12">
					<h3></h3>
				</div>
			</div>
				
			<form class="needs-validation" action="registerUserDetails.php" onsubmit="return checkPasswordMatch()" autocomplete="off"  method="post" ><!--  novalidate action="/action" novalidate class="needs-validation" 	-->
				<div class="row">
					<div class="col-12 col-sm-12 col-md-12 col-lg-6 col-lg-6">
						<div class="input-group text-center">
							<label for="firstName">First Name</label>
						</div>
						<div class="input-group">	
							<span class="input-group-prepend">
								<div class="input-group-text"><i class="fa fa-user-circle"></i></div>
							</span>
							<input type="text"  required="required" class="form-control" id="firstName" name="firstName"   placeholder="First Name" /> 
							
						</div>
					</div>
					<div class="col-12 col-sm-12 col-md-12 col-lg-6 col-lg-6">
						<div class="input-group text-center">
							<label>Last Name</label>
						</div>
						<div class="input-group">	
							<span class="input-group-prepend">
								<div class="input-group-text"><i class="fa fa-user-circle"></i></div>
							</span>
							<input type="text" required="required" name="lastName" class="form-control" placeholder="Last Name" /> 
						</div>
					</div>
				</div>
				
				<div class="row" style="margin-top:20px">
					
					<div class="col-12 col-sm-12 col-md-12 col-lg-6 col-lg-6">
						<div class="input-group text-center">
							<label>Email Address</label>
						</div>
						<div class="input-group">	
							<span class="input-group-prepend">
								<div class="input-group-text"><i class="fa fa-user"></i></div>
							</span>
							<input type="email" required="required" id="emailAddress" name="emailAddress" class="form-control" placeholder="Email Address" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" /> 
						</div>
						
					</div>
					
					<div class="col-12 col-sm-12 col-md-12 col-lg-6 col-lg-6">
						<div class="input-group text-center">
							<label>Contact Number</label>
						</div>
						<div class="input-group">	
							<span class="input-group-prepend">
								<div class="input-group-text"><i class="fas fa-phone-square-alt"></i></div>
							</span>
							<input type="text"  minlength="10" maxlength="10" required="required" name="contact" class="form-control" id="contact" placeholder="Contact Number" onkeyup="checkIfPhoneExists()" /> 
						</div>
					</div>
				</div>
				
				<div class="row" style="margin-top:20px">
					
					<div class="col-12 col-sm-12 col-md-12 col-lg-6 col-lg-6">
						<div class="input-group text-center">
							<label>Password</label>
						</div>
						<div class="input-group">	
							<span class="input-group-prepend">
								<div class="input-group-text"><i class="fa fa-lock"></i></div>
							</span>
							<input type="Password" required="required" name="password" id="password" maxlength="12" class="form-control" placeholder="Enter Password" /> 
						</div>
					</div>
					
					<div class="col-12 col-sm-12 col-md-12 col-lg-6 col-lg-6">
						<div class="input-group text-center">
							<label>Confirm Password</label>
						</div>
						<div class="input-group">	
							<span class="input-group-prepend">
								<div class="input-group-text"><i class="fa fa-lock"></i></div>
							</span>
							<input type="Password" required="required" name="confirmPassword"  id="confirmPassword"  maxlength="12" class="form-control" placeholder="Please Re-enter Password" /> 
						</div>
					</div>
				</div>
				
                
				<div class="row" style="margin-top:20px">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-lg-4">
						<div class="input-group text-center">
							<label>State</label>
						</div>
						<div class="input-group">	
							<span class="input-group-prepend">
								<div class="input-group-text"><i class="fas fa-city"></i></div>
							</span>
							<select name="state" class="states order-alpha custom-select" id="stateId" required="required">
                                    <option value="">Select State</option>
                            </select>  
							
						</div>
					</div>
                    <input type="hidden" name="country" id="countryId" value="IN"/>
					<div class="col-12 col-sm-12 col-md-12 col-lg-4 col-lg-4">
						<div class="input-group text-center">
							<label>Place</label>
						</div>
						<div class="input-group">	
							<span class="input-group-prepend">
								<div class="input-group-text"><i class="fa fa-home"></i></div>
							</span>
							<select name="place" class="cities order-alpha custom-select" id="cityId">
                                <option value="">Select City</option>
                            </select>
										
						</div>
					</div>
					
					
					
					
				</div>
				
				<div class="row" style="margin-top:20px">
					<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-lg-12">
						<div class="input-group text-center">
							<label>Gender</label>
						</div>
						<div class="input-group">
							<select class="custom-select" name="gender" required>
								<option value="">Open this select menu</option>
								<option value="male">Male</option>
								<option value="female">Female</option>
							</select>
							<div class="invalid-feedback">Example invalid custom select feedback</div>
						</div>
					</div>
				</div>
				
				<div class="row" style="margin-top:20px">
					<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-lg-12">
						<div class="input-group text-center">
							<label>Service</label>
						</div>
						<div class="input-group">
							<select class="custom-select" name="service" required>
								<option value="">Open this select menu</option>
								<?php  
									include 'config.php';
									$query = "select * from service ";
									$result=mysqli_query($con,$query) or die(mysqli_error($con));
									while($row=mysqli_fetch_assoc($result))
									{
										$name=$row['service'];
			
									?>
									<option value="<?php echo $name;?>"> <?php echo $name;?></option>
								<?php 
									}
								
								?>
							</select>
						</div>
					</div>
				</div>
				
				<div class="row" style="margin-top:20px">
					<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-lg-12">
						<input type="submit" class="btn btn-primary" value="Register"/>
					</div>
				</div>
			</form>
		</div>	
	</div>
    </div>
  
    <div class="row"> 
		<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-lg-12">
			<div class="card bg-dark" style="margin-top: 10px">
				<div class="card-body">
					<div class="row justify-content-stretch">
						<div class="col-4 col-sm-4 col-md-4 col-lg-4 col-xl-4" style="width:30%;">
						</div>
						<div class="col-4 col-sm-4 col-md-4 col-lg-4 col-xl-4" style="text-align:center;">
                            <div class="col-xl-12">
                            <p style="display:inline;color:#eeeeee; font-size:1.3rem;">Follow us on....</p>
                            <img src="img/facebook.png" style="width:9%;">
                            <img src="img/instagram-icon.png" style="width:15%;">
                             <img src="img/twitter-icon.webp" style="width:11%;">
                                <p style="color:#eeeeee; margin-top:5%;">&copy reserved under Vicinity webservice</p>
                            </div>

						</div>
						<div class="col-4 col-sm-4 col-md-4 col-lg-4 col-xl-4">
							
						</div>
					</div>	
				</div>
			</div>
		</div>	
    </div>
     
<script>
function checkPasswordMatch(){
	var email = $("#emailAddress").val();
	var password = $("#password").val();		
	var confirm = $("#confirmPassword").val();
	
	/*
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
		
		if(this.responseText == "email exists"){
			alert("This email number is already registered, please change");
			return false;
		  }else{
			
			
				
		  
		  }
		}
	};
	xhttp.open("GET", "fetchEmailIfExists.php?email="+email+"", true);
	xhttp.send();*/
	
	if(password!=confirm){
		alert("Password Doesnot Matches");
		return false ;
	}else{
		alert("Password Matches");
		// $("#confirmPassword").setCustomValidity("Passwords Don't Match");
		return true;	
	}
	
	
	
	
	
}

function checkIfPhoneExists(){
	var phoneNum = $("#contact").val();
	
	if(phoneNum<10){
		
		
	}else{
			
		$.get("fetchPhoneNumIfExists.php?contact="+phoneNum+"", function(data, status){
			  if(data == "number exits"){
				alert("This phone number is already present, please change");
			  }else{
				
			  }
		});
	}
}
    
</script>

</body>
</html>