<?php
session_start();
include 'config.php';
$contact = $_SESSION["fpContact"];

$query = "select email from userdetails where contact='$contact' ";
$result= mysqli_fetch_assoc(mysqli_query($con,$query)) or die(mysqli_error($con));

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
	<style>
    .my-auto{
		margin-top: calc(100%-100/2)
	}
	.card-width{
			width: 650px;height: 375px; margin-top:100px
	}
	@media only screen and (max-width: 600px){
		.card-width{
			width: 450px;
			height: 375px;
			margin-top:100px
		}
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
				<label style="color: white; font-size:12px">or</label>
			</div>
			<div class="input-group mr-sm-2 text-center">	
				<a href="forgotPassword.php" style="color: white; font-size:12px">Forgot <br/> Password?</a>
			</div>
			
		</form>
	</ul>
   </div>
</nav>
  
<!--<div class="container-fluid">-->
	<div class="row h-100 justify-content-center">
		<div class="col-12 col-sm-12 col-md-12 col-lg-6 ">
			<div class="card card-width">
				<div class="card-header">Reset Password</div>
				<div class="card-body">
					<form action="changePassword.php" method="post" onsubmit="return matchPassword()">
						<div class="row">
							<div class="input-group text-center">
								<label>Username</label>
							</div>
							<div class="input-group mr-sm-2" style="margin-top:-5px">
								<span class="input-group-prepend">
									<div class="input-group-text"><i class="fa fa-user"></i></div>
								</span>
								<input type="email" required="required" name="username" class="form-control " placeholder="Username" value="<?php echo $result["email"]?>" aria-label="Username" aria-describedby="Username" readonly ="readonly"/>
								<!--<div class="input-group-append">
									<span class="input-group-text" id="basic-addon1">@</span>
								</div> --> 
							</div>
						</div>
						<div class="row">
								<div class="input-group text-center" style="margin-top: 4px">
									<label>Password</label>
								</div>
								<div class="input-group">	
									<span class="input-group-prepend">
										<div class="input-group-text"><i class="fa fa-lock"></i></div>
									</span>
									<input type="Password" required="required" name="password" id="password" maxlength="12" class="form-control" placeholder="Enter Password" /> 
									<span class="input-group-append">
										<div class="input-group-text" onmouseover="mouseoverPass('password');" onmouseout="mouseoutPass('password');" ><i class="fas fa-eye"></i></div>
									</span>
								</div>
								
							
						</div>
						<div class="row">
							<div class="input-group text-center" style="margin-top: 4px">
								<label>Confirm Password</label>
							</div>
							<div class="input-group">	
								<span class="input-group-prepend">
									<div class="input-group-text"><i class="fa fa-lock"></i></div>
								</span>
								<input type="Password" required="required" name="confirmPassword"  id="confirmPassword"  maxlength="12" class="form-control" placeholder="Please Re-enter Password"/> 
								<span class="input-group-append">
									<div class="input-group-text" onmouseover="mouseoverPass('confirmPassword');" onmouseout="mouseoutPass('confirmPassword');" ><i class="fas fa-eye"></i></div>
								</span>	
	
							</div>
						</div>
						<div class="row" style="margin-top:30px">
							<div class="col-12 col-sm-12 col-md-12 col-lg-12 text-center">
								<!--<input type="button" class="btn btn-light" name="cancel" value="Cancel"/>-->
								<input type="Submit" class="btn btn-primary" name="submit" value="Submit"/>	
							</div>
						</div>
					</form>	
				</div>				
			</div>
		</div>
	</div>
<!--</div>--> 
<script>

function mouseoverPass(idTag) {
  var obj = document.getElementById(idTag);
  obj.type = "text";
}
function mouseoutPass(idTag) {
  var obj = document.getElementById(idTag);
  obj.type = "password";
}

function matchPassword(){
	var password = $("#password").val();
	var confirmPassword = $("#confirmPassword").val();
	if( password == confirmPassword){
		alert("The password match with confirm password");
		return true;
	}else{
		alert("The password doesnot match with confirm password");
		return false;
	
	}
}
</script>		
</body>
</html>