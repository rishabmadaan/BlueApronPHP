<?php
include_once "connection.php";
$category=$_REQUEST['q'];
$s="delete from categories where categories_name='$category'";
mysqli_query($conn,$s);
header("Location:viewcategory.php");