<?php
include "cart.php";
session_start();
include 'connection.php';
$menuid = $_REQUEST['q'];
$qty = $_REQUEST['qty'];
$items = array();

$s = "select * from menu inner  join restaurant_signup signup on menu.resturant_id = signup.id where menu.id='$menuid'";
$result = mysqli_query($conn, $s);
$row = mysqli_fetch_array($result);


if (isset($_SESSION['items'])) {
    $items = $_SESSION['items'];
    $flag = 0;
    $index = 0;
    for ($i = 0; $i < count($items); $i++) {
        if ($menuid == $items[$i]->id) {
            $flag = 1;
            $index = $i;
            break;
        }
    }
    if ($flag == 1) {
        $items[$index]->qty = $items[$index]->qty + $qty;
    } else {
        $items[count($items)] = new cart($menuid, $row['menu_item'], $row['price'], $qty, $row['resturant_id'], $row['cuisine_id'], $row['restaurant_name']);
    }
} else {
    $items[0] = new cart($menuid, $row['menu_item'], $row['price'], $qty, $row['resturant_id'], $row['cuisine_id'], $row['restaurant_name']);
}

$_SESSION['items'] = $items;
echo count($_SESSION['items']) . '!@#$';
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
    $ar=array();
    $ar=$_SESSION['items'];
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
<div class="text-right"><a href="confirm_order.php"><input type="button" value="Next"
                                                           class="btn btn-warning"></a>
</div>