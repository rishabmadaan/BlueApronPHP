<?php
include_once "connection.php";
$id=$_REQUEST['q'];
$s="delete from restaurant_photo where id='$id'";
mysqli_query($conn,$s);
header("Location:viewphoto.php");