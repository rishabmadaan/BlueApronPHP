<?php
ob_start();
include "restaurant_header.php";
$cuisine = $_POST['cuisinename'];


$sel_caption = "select * from cuisine where cuisine='$cuisine' and id='.$res_row[0].'";
$result = mysqli_query($conn, $sel_caption);
if (mysqli_num_rows($result) > 0) {
    header("Location:addcuisine.php?er=1"); /*caption already exist*/
} else {
    $sql = "INSERT INTO `cuisine`(`cuisine`, `restaurant_id`) VALUES ('$cuisine','$res_row[0]')";
    if (mysqli_query($conn,$sql)) {
        header("Location:addcuisine.php?er=3");
    } else {
        header("Location:addcuisine.php?er=2");
    }


}