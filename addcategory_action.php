RE<?php
ob_start();
include 'adminheader.php';
$categoryname=$_REQUEST['categoryname'];
$description=$_REQUEST['description'];
$photo=$_FILES['photo']['name'];
$tmp=$_FILES['photo']['tmp_name'];

$path="category_photos/".$photo;
move_uploaded_file($tmp,$path);
$s="select * from categories WHERE categories_name='$categoryname'";
echo $s;
$result=mysqli_query($conn,$s);
if(mysqli_num_rows($result)<=0)
{
    $sql="INSERT INTO `categories`(`categories_name`, `description`,`photo`) VALUES ('$categoryname','$description','$path')";
    echo $sql;
    mysqli_query($conn,$sql);
    header("Location:addcategory.php?er=1");
}
else
{
    header("Location:addcategory.php?er=2");
}