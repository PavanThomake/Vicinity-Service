<?php
session_start();
include 'config.php';
$email=$_SESSION["user"];
$loggedInName=$_SESSION["userFName"];
$userContactInfo=$_SESSION["userContact"];

if(isset($_SESSION["user"])){

 $query = "select * from userdetails where email='$email'";
	$result=mysqli_query($con,$query) or die(mysqli_error($con));
		while($row=mysqli_fetch_assoc($result))
		{
			$file=$row['file'];
			$path="profile/".$file;
		}
    $query="select * from userdetails where email='$email'";
    $result=mysqli_query($con,$query) or die(mysqli_error($con));
    while($row=mysqli_fetch_assoc($result))
    {
        $place=$row['place'];
    }
}

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
	<script src='https://cdn.rawgit.com/pguso/jquery-plugin-circliful/master/js/jquery.circliful.min.js'></script>
	<!--<script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js" ></script>-->
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
	<link href="https://fonts.googleapis.com/css2?family=Chelsea+Market&display=swap" rel="stylesheet">
	<!--UI jquerry cdn links for autocomplete -->
	
	  <link href = "https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel = "stylesheet">
      <script src = "https://code.jquery.com/jquery-1.10.2.js"></script>
      <script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
    
    

<style>
.Newsgrid
    {
        border:5px solid;
}
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
    .img-holder
    {
        text-align: center;
    }
    img
    {
        width:100%;
        margin-top:5%;
        margin-bottom:5%;
    }
}
@media(max-width:1200px) and (min-height:1100px)
{
  
}
    .description
{
    font-family: 'Chelsea Market', cursive;
    text-align: justify;
}

@media (max-width: 767px){
    #searchResult{
        margin-top: 50px;
    }
    .title
    {
        
        font-size:2rem;
        
    }
   

}
    .title
    {
        margin-top:3%;
    }
    
@media screen and (max-width:1300px) and ( min-width:1220px)
{
   
    .title
    {
        padding-left:5%;
    }
}
    .img-holder img
    {
        margin-top:5%;
        width:90%;
        height:90%;
        
    }
@media (max-width:1100px) and (min-width:900px)
{
    width:60%;
    height:60%;
}
    
</style>
    </head>
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
        <a class="nav-link" style="color: white" href="search.php">Search</a>
      </li>
          <li class="nav-item">
        <a class="nav-link" style="color: white" href="userIndex.php"><span>Event Registration</span></a>
      </li>
         <li class="nav-item">
        <a class="nav-link" style="color: white" href="#"></a>
      </li>
         <li class="nav-item">
        <a class="nav-link" style="color: white" href="index.php"></a>
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

<?php
            $place=strtolower($place);
            $url="https://newsapi.org/v2/everything?q=$place&from=2020-08-01&sortBy=publishedAt&apiKey=4768541bf10245518ef6c708d092d4af";
            $response=file_get_contents($url);
            $NewsData=json_decode($response);
        
        ?>
        
        
        <div class="container-fluid">
            <?php
            if($NewsData)
            {
                echo "No news found";
            }
            else
            {
                
            }
                foreach($NewsData->articles as $News)
                {
                ?>
                <div class="row Newsgrid">
                    <div class="col-md-12 col-lg-3 col-sm-12 img-holder">
                       <img src="<?php echo $News->urlToImage?>" alt="News thumbnail" height="240px" width="350px">
                    </div>
                    <div class="col-md-12 col-lg-9 col-sm-12 information">
                        <h2 class="title">Title:&nbsp<?php echo $News->title?></h2>
                        <h5 class="description">Description:<?php echo $News->description?></h5>
                        <p>Content:<?php echo $News->content?></p>
                        <h6>Author:<?php echo $News->author?></h6>
                        <h6>Published:<?php echo $News->publishedAt?></h6>
                        <h6><a href="<?php echo $News->url?>">Click here to view news</a></h6>
                       
                        
                    </div>
                </div>
            <?php
                }
            ?>
                     
                
            
        </div>


</body>
</html>