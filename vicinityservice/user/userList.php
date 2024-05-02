<?php
session_start();
if(isset($_SESSION["admin"])){
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1"/>
	 <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<style>


.form-control-borderless {
    border: none;
}

.form-control-borderless:hover, .form-control-borderless:active, .form-control-borderless:focus {
    border: none;
    outline: none;
    box-shadow: none;
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
        <a class="nav-link" href="#" style="color: white"><span>ADD EVENTS</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="userList.html" style="color: white" ><span>USER LIST</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#" style="color: white"><span>ADD SERVICES</span></a>
      </li>
	  <li class="nav-item">
        <a class="nav-link" href="#" style="color: white"><span>LOGOUT</span></a>
      </li>	
    </ul>
  </div>  
</nav>
<br>

<div class="container-fluid">
	<div class="row">
		<div class="col-12 col-sm-12 col-md-12">
				<div class="row justify-content-center">
                        <div class="col-12 col-md-12 col-lg-12">
                            <form action="/page.php" class="card card-sm">
                                <div class="card-body row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <i class="fas fa-search h4 text-body"></i>
                                    </div>
                                    <!--end of col-->
                                    <div class="col">
                                        <input class="form-control form-control-lg form-control-borderless" type="search" placeholder="Please the location to be searched" required >
                                    </div>
                                    <!--end of col-->
                                    <div class="col-auto">
                                        <button class="btn btn-lg btn-success" type="submit">Search</button>
                                    </div>
                                    <!--end of col-->
                                </div>
                            </form>
                        </div>
                        <!--end of col-->
                    </div>
		</div>	
	</div>

	<div class="row" style="margin-top: 20px">
		<div class="col-12 col-sm-12 col-md-12">
			<div class="card">
				<div class="card-header">User List</div>
				<div class="card-body">
					<table class="table table-striped table-bordered">
						<thead>
							<tr>
								<th>Name</th>
								<th>Date Of Birth</th>
								<th>Email</th>
								<th>Phone Number</th>
								<th>Address</th>
								<th>Delete</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>John</td>
								<td>17-08-1993</td>
								<td>john@example.com</td>
								<td>9876543210</td>
								<td>XYZ Place Mangalore</td>
								<td><a href="#">delete</a></td>
							</tr>
							<tr>
								<td>Mary</td>
								<td>17-08-1993</td>
								<td>mary@example.com</td>
								<td>9876543210</td>
								<td>XYZ Place Mangalore</td>
								<td><a href="#">delete</a></td>
							</tr>
							<tr>
								<td>July</td>
								<td>17-08-1993</td>
								<td>july@example.com</td>
								<td>9876543210</td>
								<td>XYZ Place Mangalore</td>
								<td><a href="#">delete</a></td>
							</tr>
						</tbody>
					</table>
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

