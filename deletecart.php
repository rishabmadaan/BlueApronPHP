<?php
include "cart.php";
session_start();
$menuid = $_REQUEST['q'];
$restid=$_REQUEST['restid'];
$ar = $_SESSION['items'];
$newar=array();
$num=0;
for ($i = 0; $i < count($ar); $i++) {
    if ($menuid != $ar[$i]->id) {
       $newar[$num]=$ar[$i];
       $num++;
    }
}
//print_r($ar);
$_SESSION['items']=$newar;
header("Location:showmenu.php?q=".$menuid."&restid=".$restid);