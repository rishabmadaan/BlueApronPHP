<?php
include_once "connection.php";
$resturantname=$_REQUEST['q'];
$s="delete from resturant_signup where restaurant_name='$restaurantname'";
mysqli_query($conn,$s);
header("Location:view_restaurant.php");