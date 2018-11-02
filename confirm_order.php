<?php
include "cart.php";
@session_start();
include "connection.php";
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
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
</head>
<body>
<?php
if (isset($_SESSION['user'])) {
    include "user_header.php";
} else {
    $email='';
    include "publicheader.php";
}
?>
<div class="single">
    <div class="container">
        <h1 class="animated fadeInLeftBig" data-wow-duration="1000ms"
            data-wow-delay="300ms"></h1>

        <div class="col-sm-6">
            <h1 class="animated fadeInLeftBig" data-wow-duration="1000ms"
                data-wow-delay="300ms">Confirm Order </h1>
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
                        </tr>
                        <?php
                        $k = 1;
                        $total = 0;
                        $subtotal = 0;
                        for ($i = 0; $i < count($ar); $i++) {
                            $subtotal = $ar[$i]->price * $ar[$i]->qty;
                            $total += $subtotal;
                            ?>
                            <tr>
                                <td><?php echo $k++; ?></td>
                                <td><?php echo $ar[$i]->itemname; ?></td>
                                <td>&#8377;<?php echo $ar[$i]->price; ?></td>
                                <td><?php echo $ar[$i]->qty; ?></td>
                                <td id="subtotal-<?php echo $ar[$i]->id; ?>">&#8377;<?php echo $subtotal ?></td>

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
                            <td colspan="2">&#8377;<?php echo $cgst ?></td>
                        </tr>
                        <tr>
                            <th colspan="4">SGST (2.5%)</th>
                            <td colspan="2">&#8377;<?php echo $cgst ?></td>
                        </tr>
                        <tr>
                            <th colspan="4">Grand Total</th>
                            <td colspan="2" id="grandtotal">&#8377;<?php echo $cgst + $cgst + $total ?></td>
                        </tr>
                    </table>
                    <?php
                }
                ?>
            </div>
        </div>
        <div class="col-sm-6">
            <h1 class="animated fadeInLeftBig" data-wow-duration="1000ms"
                data-wow-delay="300ms">Choose Mode of Payment</h1>
            <br><br><br>
            <div class="row">

                <div class="col-sm-4"></div>
                <div class="col-sm-4"><input type="radio" name="mode" value="COD" checked> COD</div>
                <div class="col-sm-4"><input type="radio" name="mode" value="Online"> Online</div>

            </div>
            <br><br><br>
            <div class="row">
                <div class="col-sm-12">
                    <textarea class="form-control address" name="address" id="address"
                              placeholder="Enter your Shipping Address"></textarea>
                </div>
            </div>
        </div>

    </div>
    <div class="row">
        <div class="col-sm-10">
            <div class="text-right"><input type="button" value="Next" class="btn btn-warning" onclick="paynow('<?php echo $email ?>',<?php echo $cgst + $cgst + $total ?>)">
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
