<?php
include "cart.php";
session_start();
$menuid = $_REQUEST['q'];
$qty = $_REQUEST['qty'];
$ar = $_SESSION['items'];
$ar = $_SESSION['items'];
$total = 0;
$subtotal = 0;
$menu_subtotal=0;
$gradtotal=0;
for ($i = 0; $i < count($ar); $i++) {
    if ($ar[$i]->id == $menuid) {
        $ar[$i]->qty = $qty;
        $menu_subtotal=$ar[$i]->price * $ar[$i]->qty;
    }
    $subtotal = $ar[$i]->price * $ar[$i]->qty;
    $total += $subtotal;

}
$cgst = ($total * 2.5) / 100;
$gradtotal=$cgst+$total+$cgst;
echo $qty . '!@#$' . $menu_subtotal . '!@#$' . $gradtotal.'!@#$'.$cgst.'!@#$'.$total;