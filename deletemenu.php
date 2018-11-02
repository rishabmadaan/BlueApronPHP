<?php
include_once "connection.php";
$menuid=$_REQUEST['q'];
$s="delete from menu where id='$menuid'";
mysqli_query($conn,$s);
header("Location:menu_view.php");