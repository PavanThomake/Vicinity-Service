<?php
session_start();
include 'config.php';

$username = $_POST["username"];
$password = $_POST["password"];
$confirmPassword = $_POST["confirmPassword"];

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

$selectQuery = "select * from userdetails where email='$username'";
$selectQueryResult = mysqli_query($con,$selectQuery) or die(mysqli_error($con));

if(mysqli_num_rows($selectQueryResult) > 0){
		
	$updatePasswordQuery = "update userdetails set password = '$encryptedPassword' where email='$username' ";
	$updatePasswordResult = mysqli_query($con,$updatePasswordQuery) or die(mysqli_error($con));	
	if($updatePasswordResult){
		echo "<script>window.location.href = 'resetPassword.php';</script>";	
	}else{
		echo "<script>alert('Not possible to update at this moment');</script>";
	}
}else{
	echo "<script>alert('There is no user registered user account withthis username please register');</script>";
	echo "<script>window.location.href = 'userLogin.php';</script>";
}

?>