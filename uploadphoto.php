<?php
ob_start();
$temppath = $_FILES["tbfile"]["tmp_name"];
$actualname = $_FILES["tbfile"]["name"];
$ext = strtolower(pathinfo($actualname, PATHINFO_EXTENSION));
$filesize = round($_FILES["tbfile"]["size"] / 1024, 1);
echo $filesize;
$path = "userphotos/$actualname";
if ($ext != "jpg" && $ext != "png") {
    echo "please select jpg or png file only";
} elseif ($filesize > 10) {
    echo "Image size must be less than 10 KB";
} else {
    move_uploaded_file($temppath, $path);
    echo "<img src='$path'>";
}