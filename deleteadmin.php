<?php
include_once "connection.php";
$email=$_REQUEST['q'];
$s="delete from admin where  email='$email'";
mysqli_query($conn,$s);
header("Location:view.php");