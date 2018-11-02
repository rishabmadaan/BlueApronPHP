<?php
include "cart.php";
@session_start();
include "connection.php";
$cuisineid = $_REQUEST['q'];
$restid = $_REQUEST['restid'];
$rest = "select * from restaurant_signup where id='$restid'";
$rest_result = mysqli_query($conn, $rest);
$rest_row = mysqli_fetch_array($rest_result);
?>
<!doctype HTML>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <?php
    include "headerfiles.php";
    ?>

</head>
<body>
<?php


if (isset($_SESSION['user'])) {
    include "user_header.php";
} else {
    include "publicheader.php";
}
?>
<div class="single">
    <div class="container">
        <h1 class="animated fadeInLeftBig" data-wow-duration="1000ms"
            data-wow-delay="300ms"><?php echo $rest_row[1] ?></h1>
        <div class="col-sm-6">
            <?php
            $cuisine = "select * from cuisine where restaurant_id='$restid'";
            $cuisine_result = mysqli_query($conn, $cuisine);
            while ($cuisine_row = mysqli_fetch_array($cuisine_result)) {
                $cuisine_name = $cuisine_row[1];
                $firstletter = substr($cuisine_name, 0, 1);
                $rest_word = substr($cuisine_name, 1);
                ?>
                <div class="cat-grid wow flipInY cuisine" data-wow-duration="1000ms"
                     data-wow-delay="300ms">
                    <h4><span><?php echo $firstletter ?></span><?php echo $rest_word ?></h4>
                    <ul>
                        <?php
                        $k = 1;
                        $menu = "select * from menu where cuisine_id='$cuisine_row[0]'";
                        $menu_result = mysqli_query($conn, $menu);
                        while ($menu_row = mysqli_fetch_array($menu_result)) {
                            ?>
                            <li>
                                <div class="col-sm-7">
                                    <a><b><?php echo $k++; ?>. <?php echo $menu_row[1] ?>
                                            &#8377;<?php echo $menu_row[2] ?> </b></a>
                                </div>
                                <div class="col-sm-3"><a>
                                        <input type="number" class="form-control " value="1"
                                               id="menu-<?php echo $menu_row[0] ?>" data-rule-required="true"
                                               data-rule-number="true">
                                    </a>
                                </div>
                                <div class="col-sm-2"><a> <input type="button"
                                                                 onclick="addtocart(<?php echo $menu_row[0] ?>)"
                                                                 class="btn btn-warning" value="Add"></a>
                                </div>
                            </li>
                            <?php
                        }
                        ?>

                    </ul>

                </div>

                <?php
            }
            ?>
        </div>
        <div class="col-sm-6">
            <h1 class="animated fadeInLeftBig" data-wow-duration="1000ms"
                data-wow-delay="300ms">Order Detail</h1>
            <div id="items">
                <?php
                $ar = array();
                if (isset($_SESSION['items'])) {
                    $ar = $_SESSION['items'];
                    // print_r($ar);
                    ?>
                    <table class="table table-striped">
                        <tr>
                            <th>Sr No.</th>
                            <th>Item</th>
                            <th>Price</th>
                            <th>Qty</th>
                            <th>SubTotal</th>
                            <th>Delete</th>
                        </tr>
                        <?php
                        $k = 1;
                        $total = 0;
                        $subtotal = 0;
                        //print_r($ar);
                        for ($i = 0; $i < count($ar); $i++) {
                            $subtotal = $ar[$i]->price * $ar[$i]->qty;
                            $total += $subtotal;
                            ?>
                            <tr>
                                <td><?php echo $k++; ?></td>
                                <td><?php echo $ar[$i]->itemname; ?></td>
                                <td>&#8377;<?php echo $ar[$i]->price; ?></td>
                                <td><input type="number" onkeyup="updateqty(this,<?php echo $ar[$i]->id; ?>)"
                                           value="<?php echo $ar[$i]->qty; ?>" class="form-control qtybox"
                                           id="qtyitem-<?php echo $ar[$i]->id; ?>" min="1"></td>
                                <td id="subtotal-<?php echo $ar[$i]->id; ?>">&#8377;<?php echo $subtotal ?></td>
                                <td>
                                    <a href="deletecart.php?q=<?php echo $ar[$i]->id; ?>&restid=<?php echo $restid ?>"><span
                                                title="Delete"
                                                class="glyphicon glyphicon-trash"></span></a>
                                </td>
                            </tr>
                            <?php
                        }
                        $cgst = ($total * 2.5) / 100;
                        ?>
                        <tr>
                            <th colspan="4"> Total</th>
                            <td colspan="2" id="total">&#8377;<?php echo $total ?></td>
                        </tr>

                        <tr>
                            <th colspan="4">CGST (2.5%)</th>
                            <td colspan="2" id="cgst">&#8377;<?php echo $cgst ?></td>
                        </tr>
                        <tr>
                            <th colspan="4">SGST (2.5%)</th>
                            <td colspan="2" id="sgst">&#8377;<?php echo $cgst ?></td>
                        </tr>

                        <tr>
                            <th colspan="4">Grand Total</th>
                            <td colspan="2" id="grandtotal">&#8377;<?php echo $cgst+$cgst + $total ?></td>
                        </tr>
                    </table>
                    <div class="text-right"><a href="confirm_order.php"><input type="button" value="Next"
                                                                               class="btn btn-warning"></a>
                    </div>
                    <?php
                }
                ?>

            </div>
        </div>
    </div>
    <div class="clearfix"></div>
</div>
<?php
include "footer.php";
?>
</body>
</html>
