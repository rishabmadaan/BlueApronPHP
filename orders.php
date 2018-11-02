<?php
ob_start();
?>
<!doctype HTML>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>View Orders</title>
    <?php
    include "headerfiles.php";
    ?>
</head>
<body>
<?php
include "restaurant_header.php";
?>
<div class="services">
    <div class="container">
        <h1 class="animated fadeInLeftBig" data-wow-duration="1000ms" data-wow-delay="300ms">View Orders</h1>
        <div class="container">
            <?php
            $k = 0;
            include "connection.php";
            $s = "SELECT * FROM `bill` inner  join  user_signup on  user_signup.email=bill.useremail where restid='$res_row[0]'";
            //echo $s;
            $result = mysqli_query($conn, $s);
            if (mysqli_num_rows($result) <= 0) {
                echo "<div class='text-center'>No Orders Yet</div>";
            } else {

                ?>

                <div class="text-center">
                    <table class="table table-bordered">

                        <tr>
                            <th>Sr No.</th>
                            <th>Email</th>
                            <th>Fullname</th>
                            <th>Mobile</th>
                            <th>Address</th>
                            <th>Mode of Payment</th>
                            <th>Date Time</th>
                        </tr>
                        <?php
                        while ($row = mysqli_fetch_array($result)) {
                            ?>
                            <tr>
                                <td><?php echo ++$k; ?></td>
                                <td><?php echo $row['email'] ?></td>
                                <td><?php echo $row['fullname'] ?></td>
                                <td><?php echo $row['mobile'] ?></td>
                                <td><?php echo $row['address'] ?></td>
                                <td><?php echo $row['modeoff_payment'] ?></td>
                                <td><?php echo $row['datetime'] ?></td>

                            </tr>
                            <tr>
                                <td colspan="7">
                                    <div class="text-center detailbill">
                                        <table>
                                            <tr>
                                                <th>Sr No.</th>
                                                <th>Item</th>
                                                <th>Price</th>
                                                <th>Qty</th>
                                                <th>Sub Total</th>
                                            </tr>
                                            <?php
                                            $m = 1;
                                            $total = 0;
                                            $sql = "select * from billdetail inner  join menu m on billdetail.menueid = m.id where billdetail.orderid='$row[0]'";
                                            $sql_result = mysqli_query($conn, $sql);
                                            while ($sql_row = mysqli_fetch_array($sql_result)) {
                                                $total += $sql_row['qty'] * $sql_row[3];
                                                ?>
                                                <tr>
                                                    <td><?php echo $m++; ?></td>
                                                    <td><?php echo $sql_row['menu_item'] ?></td>
                                                    <td><?php echo $sql_row[3] ?></td>
                                                    <td><?php echo $sql_row['qty'] ?></td>
                                                    <td><?php echo $sql_row['qty'] * $sql_row[3]; ?></td>
                                                </tr>
                                                <?php

                                            }
                                            ?>
                                            <tr>
                                                <td colspan="4">Total</td>
                                                <td><?php echo $total ?></td>
                                            </tr>
                                            <tr>
                                                <td colspan="4">CGST</td>
                                                <td><?php echo $row['cgst'] ?></td>
                                            </tr>
                                            <tr>
                                                <td colspan="4">SGST</td>
                                                <td><?php echo $row['cgst'] ?></td>
                                            </tr>
                                            <tr>
                                                <td colspan="4">Grand Total</td>
                                                <td><?php echo $row['grandtotal'] ?></td>
                                            </tr>
                                        </table>
                                    </div>
                                </td>
                            </tr>
                            <?php
                        }

                        ?>
                    </table>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</div>
<?php
include "footer.php";
?>
</body>
</html>