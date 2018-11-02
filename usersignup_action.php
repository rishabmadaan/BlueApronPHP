<?php
ob_start();
include "connection.php";
$email = $_REQUEST['email'];
$password = $_REQUEST['pass'];
$confirmpassword = $_REQUEST['cpass'];
$fullname = $_REQUEST['fullname'];
$mob = $_REQUEST['mob'];
$photo=$_FILES['photo']['name'];
$tmp=$_FILES['photo']['tmp_name'];

$sql = "select * from user_signup where email='$email'";
$sql_result = mysqli_query($conn, $sql);

if (mysqli_num_rows($sql_result)>0)
{
    header("Location:user_signup.php?er=1");
} else {
    $path="user_photos/".$photo;
    move_uploaded_file($tmp,$path);
    $s = "INSERT INTO `user_signup`(`email`, `password`, `fullname`, `mobile`,`photo`)
 VALUES ('$email','$password','$fullname','$mob','$path')";
    echo $s;
    mysqli_query($conn, $s);
    header("Location:user_signup.php?er=2");
}