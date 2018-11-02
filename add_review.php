<?php
include "connection.php";
$review = $_REQUEST['q'];
$restid = $_REQUEST['restid'];
@session_start();
$useremail = $_SESSION['user'];
$dt_tym = date("Y-m-d H:i:s");

$insert = "INSERT INTO `reviews`(`id`, `review`, `user_email`, `restaurant_id`, `datetym`) 
VALUES (null ,'$review','$useremail','$restid','$dt_tym')";
mysqli_query($conn, $insert);