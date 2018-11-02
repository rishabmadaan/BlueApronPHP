<!doctype HTML>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Menu</title>
    <?php
    include "headerfiles.php";
    ?>
</head>
<body>
<?php
include "restaurant_header.php";
$menuid = $_REQUEST['q'];
$s = "select * from menu where id='$menuid'";
$result = mysqli_query($conn, $s);
$row = mysqli_fetch_array($result);
?>
<div class="services">
    <div class="container">
        <h1 class="animated fadeInLeftBig" data-wow-duration="1000ms" data-wow-delay="300ms">Edit Menu</h1>
        <form action="update-menu.php" method="post" class="form-horizontal">
            <input type="hidden" name="id" value="<?php echo $row[0] ?>">

            <div class="form-group">
                <label class="col-sm-2">Cuisine </label>
                <div class="col-sm-10">
                    <select name="cuisine" class="form-control" id="cuisine"
                            data-rule-required="true">
                        <option value="">--Choose--</option>
                        <?php
                        $cuisine = "select * from cuisine where restaurant_id='" . $res_row[0] . "'";
                        // echo $s;
                        $cuisine_result = mysqli_query($conn, $cuisine);
                        while ($cuisine_row = mysqli_fetch_array($cuisine_result)) {
                            ?>
                            <option value="<?php echo $cuisine_row[0] ?>" <?php if($cuisine_row[0]==$row[4]) {    ?>selected<?php   } ?>><?php echo $cuisine_row[1] ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2">Item</label>
                <div class="col-sm-10">
                    <input type="text" name="item" value="<?php echo $row[1] ?>" class="form-control"
                           data-rule-required="true">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2">Price</label>
                <div class="col-sm-10">
                    <input type="text" name="price" value="<?php echo $row[2] ?>" class="form-control"
                           data-rule-required="true">
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2"></label>
                <div class="col-sm-10">
                    <input type="submit" class="btn btn-primary" value="Submit">
                </div>
            </div>
        </form>
        <div class="text-center">
            <?php
            if (isset($_REQUEST['er'])) {
                $val = $_REQUEST['er'];
                if ($val == 1) {
                    echo "<span class='text-danger'> Added Successfully</span>";
                }
                else {
                    echo "<span class='text-success'> Already Exist</span>";
                }
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

