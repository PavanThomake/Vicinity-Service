<?php
session_start();


if(isset($_SESSION["admin"])){
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
<style>
	
.card-signin {
  border: 0;
  border-radius: 1rem;
  box-shadow: 0 0.5rem 1rem 0 rgba(0, 0, 0, 0.1);
}

</style>

<body>

<nav class="navbar navbar-expand-md bg-dark navbar-dark">
  <a class="navbar-brand" href="#"><span>VICNITY WEB SERVICES</span></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="adminPanel.php" style="color: white"><span>ADD EVENTS</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="userList.php" style="color: white" ><span>USER LIST</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#" style="color: white"><span>ADD SERVICES</span></a>
      </li>
	  <li class="nav-item">
        <a class="nav-link" href="adminLogout.php" style="color: white"><span>LOGOUT</span></a>
      </li>	
    </ul>
  </div>  
</nav>
<br>

<div class="container-fluid">
	<div class="row">
		<div class="col-12 col-sm-12 col-md-12">
			<div class="card">
				<div class="card-header">Add Service</div>
				<div class="card-body">
					<div class="row">
						<div class="col-12 col-sm-12 col-md-12">
								<form action="service.php"  method="post" enctype="multipart/form-data">
									<div class="row" style="margin-top:20px">
										<div class="col-2 col-sm-2 col-md-2 col-lg-2 col-lg-2">
											<div class="input-group text-center">
												<label for="serviceName">Name of the Service</label>
											</div>
										</div>
										<div class="col-8 col-sm-8 col-md-6 col-lg-6 col-lg-6">
											<div class="input-group">	
												<span class="input-group-prepend">
													<div class="input-group-text"><i class="fas fa-user"></i></div>
												</span>
												<input type="text" required="required" class="form-control" placeholder="Enter the name of the service" id="serviceName" name="serviceName" /> 
							
											</div>
										</div>
									</div>
								
									<div class="row text-center" style="margin-top:20px">
										<div class="col-12 col-sm-12 col-md-6 col-lg-6 col-lg-6">
											<input type="submit" class="btn btn-primary" value="Submit"/>
										</div>
									</div>
								</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

</body>
</html>
<?php
}else{
	header("Location: adminLogin.php");
}
?>