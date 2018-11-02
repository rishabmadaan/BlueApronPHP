<?php
ob_start();
include "restaurant_header.php";
$photo = $_FILES['photo']['name'];
$tmp = $_FILES['photo']['tmp_name'];
$mobile = $_REQUEST['mobile'];
$owner = $_REQUEST['owner'];
$opening_hours = $_REQUEST['opening_hours'];
$description = $_REQUEST['description'];
$address = $_REQUEST['address'];
$location = urlencode($_REQUEST['location']);
$categories=$_REQUEST['categories'];
$cat='';
for ($i=0;$i<count($categories);$i++)
{
    $cat.=$categories[$i].",";
}
if ($photo != "") {
    $path = "rest_photos/" . $photo;
    move_uploaded_file($tmp, $path);
    $update = "UPDATE `restaurant_signup` SET `photo`='$path',`mobile`='$mobile',`address`='$address',`owner`='$owner',`opening_hours`='$opening_hours',`description`='$description',`location`='$location',`categories`='$cat' WHERE `id`='$res_row[0]'";
} else {
    $update = "UPDATE `restaurant_signup` SET `mobile`='$mobile',`address`='$address',`owner`='$owner',`opening_hours`='$opening_hours',`description`='$description',`location`='$location',`categories`='$cat' WHERE `id`='$res_row[0]'";
}
echo $update;
mysqli_query($conn, $update);
header("Location:resthome.php");