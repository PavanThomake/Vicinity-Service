<?php

include 'config.php';

$name = $_POST["name"];
$location = $_POST["location"];
$contact = $_POST["contact"];
$type = $_POST["type"];
$photo = $_FILES["photo"]["name"];
$photo1 = $_FILES["photo1"]["name"];
$photo2 = $_FILES["photo2"]["name"];
$date = $_POST["date"];

    $tmp_name = $_FILES['photo']['tmp_name'];
    $error = $_FILES['photo']['error'];

    if (!empty($photo)) {
        $path = 'img/';
		
		$file = $path.$photo;
        if  (move_uploaded_file($tmp_name, $path.$photo)){
            echo 'Uploaded';
        }

    } else {
        //echo 'please choose a file';
		$photo="Not Uploaded";
	}

	$tmp_name1 = $_FILES['photo1']['tmp_name'];
    $error1 = $_FILES['photo1']['error'];

    if (!empty($photo1)) {
        $path = 'img/';
		$file1 = $path.$photo1;
        if  (move_uploaded_file($tmp_name1, $path.$photo1)){
            echo 'Uploaded';
        }

    } else {
        //echo 'please choose a file';
		$photo1="Not Uploaded";
	}
	
	$tmp_name2 = $_FILES['photo2']['tmp_name'];
    $error2 = $_FILES['photo2']['error'];

    if (!empty($photo2)) {
        $path = 'img/';
		$file2 = $path.$photo2;
        if  (move_uploaded_file($tmp_name2, $path.$photo2)){
            echo 'Uploaded';
        }

    } else {
        //echo 'please choose a file';
		$photo2="Not Uploaded";
    }


$query = "insert into event(ename,location,contact,etype,file1,file2,file3,edate) values('$name','$location','$contact','$type','$file','$file1','$file2','$date')";
$insertedFlag=mysqli_query($con,$query) or die(mysqli_error($con));
if($insertedFlag){
	echo "<script>alert('Event Added Successfully');</script>";
}else{
	echo "<Script>alert('Event Not Added');</script>";
	}

echo "<script>window.location.href = 'userIndex.php';</script>";
?>