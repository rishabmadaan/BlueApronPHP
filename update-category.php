<?php
ob_start();
include "adminheader.php";
$categoryname=$_REQUEST['categoryname'];
$Description=$_REQUEST['Description'];
$photo=$_FILES['photo']['name'];
$tmp=$_FILES['photo']['tmp_name'];
if($photo!='') {
    $path = "category_photos/" . $photo;
    move_uploaded_file($tmp, $path);

    $s = "UPDATE `categories` SET `description`='$Description',`photo`='$path' WHERE categories_name='$categoryname'";
}
else
{
    $s = "UPDATE `categories` SET `description`='$Description' WHERE `categories_name`='$categoryname'";
}
echo $s;
mysqli_query($conn,$s);
header("Location:viewcategory.php");