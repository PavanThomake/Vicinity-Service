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
		<div class="col-12 col-sm-12 col-md-12 col-lg-6">
			<div class="card w-100" style="height: 300px; margin-top:100px">
				<div class="card-header">Forgot Your Password</div>
				<div class="card-body">
					<h6>Please Enter the mobile number to get an otp to reset the password</h6>
					<form action="checkMobileNumber.php" method="post">
						<div class="row" style="margin-top:20px">
							<div class="col-12 col-sm-12 col-md-12 col-lg-10">		
								<div class="input-group">	
									<span class="input-group-prepend">
										<div class="input-group-text"><i class="fas fa-phone-square-alt"></i></div>
									</span>
									<input type="text"  maxlength="10" required="required" name="contact" class="form-control" placeholder="Contact Number" /> 		
								</div>
							</div>
						</div>
						<div class="row justify-content-right" style="margin-top:30px">
							<div class="col-12 col-sm-12 col-md-12 col-lg-10 text-right">
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
</body>
</html>