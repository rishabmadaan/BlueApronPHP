<?php
ob_start();
include "connection.php";
$restaurantname = $_REQUEST['restaurantname'];
$mob = $_REQUEST['mob'];
$email = $_REQUEST['email'];
$prop = $_REQUEST['prop'];
$password=$_REQUEST['pass'];
$address = $_REQUEST['address'];

$sql = "select * from restaurant_signup where email='$email'";
$sql_result = mysqli_query($conn, $sql);

if (mysqli_num_rows($sql_result) > 0) {
    header("Location:restaurant_signup.php?er=1");
} else {
    $s = "INSERT INTO `restaurant_signup`(`id`, `restaurant_name`, `mobile`, `address`, `email`,`password`, `owner`,`status`) 
VALUES (null ,'$restaurantname','$mob','$address','$email','$password','$prop','disable')";
    echo $s;
    mysqli_query($conn, $s);
    header("Location:restaurant_signup.php?er=2");
}