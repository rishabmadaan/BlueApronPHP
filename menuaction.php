<?php
ob_start();
include 'restaurant_header.php';
$cuisine=$_REQUEST['cuisine'];
$item=$_REQUEST['item'];
$price=$_REQUEST['price'];

$s="select * from menu WHERE menu_item='$item'";
echo $s;
$result=mysqli_query($conn,$s);
if(mysqli_num_rows($result)<=0)
{
    $sql="INSERT INTO `menu`(`id`, `menu_item`, `price`, `resturant_id`, `cuisine_id`)
VALUES (null ,'$item','$price','$res_row[0]','$cuisine')";
    echo $sql;
    mysqli_query($conn,$sql);
    header("Location:addmenu.php?er=2");
}
else
{
    header("Location:addmenu.php?er=3");
}