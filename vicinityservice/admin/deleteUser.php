<?php
//error_reporting(0);
session_start();
include 'config.php';

$rowid = $_GET["id"];
$query = "delete from userdetails where id='$rowid' ";
$status = mysqli_query($con,$query) or die(mysqli_error($con));

echo "<script>alert('Deleted');</script>";
echo "<script>window.location.href='userList.php';</script>";


?>