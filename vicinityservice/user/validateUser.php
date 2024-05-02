<?php
session_start();
include 'config.php';

$username =$_POST["username"];
$password  =$_POST["password"];

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

$query = "Select * from userdetails cr where cr.email='$username' "; //and cr.password ='$encryptedPassword'
$result=mysqli_query($con,$query) or die(mysqli_error($con));
$resultSet = mysqli_fetch_assoc($result);

// Non-NULL Initialization Vector for decryption 
$decryption_iv = '1234567891011121'; 
// Store the decryption key 
$decryption_key = "kaizoku_123"; 
// Use openssl_decrypt() function to decrypt the data 
$decryptedPassword=openssl_decrypt ($resultSet["password"], $ciphering,$decryption_key, $options, $decryption_iv); 	
		
if($resultSet["email"] != $username){ 

	
	echo "<Script>alert('Invalid username');</script>";
	echo "<script>window.location.href = 'userLogin.php';</script>";

}else if($password != $decryptedPassword){
		
	echo "<Script>alert('Invalid password');</script>";
	echo "<script>window.location.href = 'userLogin.php';</script>";	
	
}else if(mysqli_num_rows($result)>0){

	$_SESSION["user"] = $username;
	$_SESSION["userFName"] = $resultSet["fname"];
	$_SESSION["userContact"] = $resultSet["contact"];	
	//echo $_SESSION["user"]." ".$_SESSION["userFName"]." ".$_SESSION["userContact"]; 
	/*$_SESSION["address"] = $resultSet["address"];*/
	header("Location: search.php");
}else{
		
	echo "<Script>alert('Invalid Credentials');</script>";
	echo "<script>window.location.href = 'userLogin.php';</script>";
	
} 	
	

?>