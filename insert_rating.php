<?php
include "connection.php";
$restid=$_REQUEST['q'];
$user=$_REQUEST['user'];
$rating=$_REQUEST['rate'];

$s="select * from rating where user_email='$user' and restaurant_id=$restid";
$result=mysqli_query($conn,$s);
if(mysqli_num_rows($result)<=0)
{
    $insert="INSERT INTO `rating`(`id`, `rating`, `user_email`, `restaurant_id`) 
VALUES (null ,'$rating','$user','$restid')";
    mysqli_query($conn,$insert);
}