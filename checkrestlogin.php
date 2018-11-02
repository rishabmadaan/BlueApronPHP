<?php
include 'connection.php';
$tbemail = $_REQUEST['tbemail'];
$tbpassword = $_REQUEST['tbpassword'];

$s = "select * from restaurant_signup where email='$tbemail'";
$result = mysqli_query($conn, $s);
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_array($result);
    if ($row['password'] == $tbpassword && $row['status'] == 'enable') {
        session_start();
        $_SESSION['restuarant'] = $tbemail;
        header("Location:resthome.php");
    } else {
        header("Location:restaurantlogin.php?er=2");
    }
} else {
    header("Location:restaurantlogin.php?er=1");
}