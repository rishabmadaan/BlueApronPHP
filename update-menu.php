<?php
ob_start();
include 'restaurant_header.php';
$cuisine=$_REQUEST['cuisine'];
$item=$_REQUEST['item'];
$price=$_REQUEST['price'];
$id=$_REQUEST['id'];

$update="UPDATE `menu` SET `menu_item`='$item',`price`='$price',`cuisine_id`='$cuisine' WHERE `id`='$id'";
echo $update;
mysqli_query($conn,$update);
header("Location:menu_view.php");