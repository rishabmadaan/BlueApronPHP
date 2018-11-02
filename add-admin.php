<?php
include 'connection.php';
$email=$_REQUEST['email'];
$pass=$_REQUEST['pass'];
$fullname=$_REQUEST['fullname'];
$mobile=$_REQUEST['mobile'];
$type=$_REQUEST['type'];

$sql="select * from admin where email='$email'";
$sql_result=mysqli_query($conn,$sql);

if(mysqli_num_rows($sql_result)>0)
{
    header("Location:admin.php?er=1");
}
else
{
    $s="INSERT INTO `admin`(`email`, `password`, `fullname`, `mobile`, `type`) 
VALUES ('$email','$pass','$fullname','$mobile','$type')";
    echo $s;
    mysqli_query($conn,$s);
    header("Location:admin.php?er=2");
}