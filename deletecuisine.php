<?php
include_once "connection.php";
$id=$_REQUEST['q'];
$s="delete from cuisine where id='$id'";
mysqli_query($conn,$s);
header("Location:cuisine_view.php");