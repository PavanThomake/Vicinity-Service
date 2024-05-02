<?php
include 'config.php';

$firstName = $_POST["firstName"];
$lastName = $_POST["lastName"];
$emailAddress = $_POST["emailAddress"];
$contact = $_POST["contact"];
$password = $_POST["password"];
$place = $_POST["place"];
$state = $_POST["state"];
$gender = $_POST["gender"];
$service = $_POST["service"];

$simple_string = $password; 
// Store the cipher method 
$ciphering = "AES-128-CTR"; 
// Use OpenSSl Encryption method 
$iv_length = openssl_cipher_iv_length($ciphering); 
$options = 0; 
// Non-NULL Initialization Vector for encryption 
$encryption_iv = '1234567891011121'; 
$encryption_key = "kaizoku_123"; 
$encryptedPassword = openssl_encrypt($simple_string, $ciphering,$encryption_key, $options, $encryption_iv); 
  
// Display the encrypted string
  

  

$selectQuery = "select * from userdetails where email='$emailAddress'";
$checkUserExists = mysqli_query($con,$selectQuery) or die(mysqli_error($con));
if(mysqli_num_rows($checkUserExists)>0){
	echo "<script>alert('You Have already registered');</script>"; 
}else{
	$query = "insert into userdetails(fname,lname,email,contact,password,place,state,gender,service) values('$firstName','$lastName','$emailAddress','$contact','$encryptedPassword','$place','$state','$gender','$service')";
	$insertedFlag=mysqli_query($con,$query) or die(mysqli_error($con));
	/*The if condition is written below by gaurav duth baliga to insertvlues meant for service table that 
	is used to search events */
	if($service != "Common User"){
		$query2 = "insert into servicestable(fname,lname,contact,email,location,service,profilepic) values('$firstName','$lastName','$contact','$emailAddress','$place','$service',' ')";
		mysqli_query($con,$query2) or die(mysqli_error($con));
	}
	if($insertedFlag){
		echo "<script>alert('You Have Resgistered Successfully');</script>";
	}else{
		echo "<Script>alert('Regsitration is not possible at this moment please try later');</script>";
	}
}
echo "<script>window.location.href = 'userLogin.php';</script>";
?>
