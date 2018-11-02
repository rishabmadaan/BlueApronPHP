<?php
ob_start();
include "restaurant_header.php";
$id=$_REQUEST['id'];
$caption = $_POST['caption'];
$photo=$_FILES['photo']['name'];
$tmp=$_FILES['photo']['tmp_name'];

if($photo!='')
{
    $path="rest_photos/".$photo;
    move_uploaded_file($tmp,$path);
    $update="UPDATE `restaurant_photo` SET `caption`='$caption',`photo`='$path' WHERE `id`='$id'";
}
else
{
    $update="UPDATE `restaurant_photo` SET `caption`='$caption' WHERE `id`='$id'";
}
mysqli_query($conn,$update);
header("Location:viewphoto.php");