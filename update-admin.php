<?php
ob_start();
include 'connection.php';
$email=$_REQUEST['email'];
$fullname=$_REQUEST['fullname'];
$mobile=$_REQUEST['mobile'];
$type=$_REQUEST['type'];

$s="UPDATE `admin` SET `fullname`='$fullname',`mobile`='$mobile',`type`='$type' WHERE `email`='$email'";
mysqli_query($conn,$s);
header("Location:view.php");