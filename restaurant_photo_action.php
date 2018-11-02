<?php
ob_start();
include "restaurant_header.php";
$caption = $_POST['caption'];
$photo=$_FILES['photo']['name'];
$tmp=$_FILES['photo']['tmp_name'];

$sel_caption = "select * from restaurant_photo where caption='$caption' and id='.$res_row[0].'";
$result = mysqli_query($conn, $sel_caption);
if (mysqli_num_rows($result) > 0) {
    header("Location:add_Photos.php?er=1"); /*caption already exist*/
} else {
    $path="rest_photos/".$photo;
    move_uploaded_file($tmp,$path);

    $insert_photo = "INSERT INTO `restaurant_photo`(`caption`, `photo`, `restaurant_id`) VALUES ('$caption','$path','$res_row[0]')";
    if (mysqli_query($conn, $insert_photo)) {
        header("Location:add_Photos.php?er=2");
    } else {
        header("Location:add_Photos.php?er=3");
    }


}