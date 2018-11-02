<?php
include "adminheader.php";
$id = $_REQUEST['q'];
$type = $_REQUEST['type'];
$update = "update restaurant_signup set status='$type' where id='$id'";
mysqli_query($conn,$update);
header("Location:view_restaurant.php");
