<?php
include "user_header.php";
$email = $_POST['email'];
$pass = $_POST['pass']; /*this is old password*/
$newpass = $_POST['newpass']; /*this is new password*/

$s = "select * from user_signup where email='$email' and  password='$pass'";
$result = mysqli_query($conn, $s);
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_array($result);
    if ($row['password'] == $pass) {
        $update = "update user_signup set password='$newpass' where email='$email'";
        mysqli_query($conn, $update);
        header("Location:chpass_user.php?er=1");
    } else {
        header("Location:chpass_user.php?er=2");
    }
} else {
    header("Location:chpass_user.php?er=3"); /*old password is wrong*/
}