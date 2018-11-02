<?php
ob_start();
include "restaurant_header.php";
$email=$_REQUEST['email'];
$pass=$_REQUEST['pass'];
$newpass=$_REQUEST['newpass'];

$s="select * from restaurant_signup where email='$email'";
$result=mysqli_query($conn,$s);
if(mysqli_num_rows($result)>0)
{
    $row=mysqli_fetch_array($result);
    if($row['password']==$pass)
    {
        $update="update restaurant_signup set password='$pass' where email='$email'";
        mysqli_query($conn,$update);
        header("Location:rest_changepassword.php?er=1");
    }
    else
    {
        header("Location:rest_changepassword.php?er=2");
    }
}
else
{
    header("Location:rest_changepassword.php?er=3");
}