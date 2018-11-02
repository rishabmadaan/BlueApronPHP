<!doctype HTML>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Menu</title>
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
        <h1 class="animated fadeInLeftBig" data-wow-duration="1000ms" data-wow-delay="300ms">Add Menu</h1>
        <form action="menuaction.php" method="post" class="form-horizontal">

            <div class="form-group">
                <div class="col-md-12">
                </div>
            </div>
            <div class="form-group">
                <label for="cuisine" class="col-md-2 ">Cuisine</label>
                <div class="col-md-10">
                    <select name="cuisine" class="form-control" id="cuisine"
                            data-rule-required="true">
                        <option value="">--Choose--</option>
                        <?php
                        $s = "select * from cuisine where restaurant_id='" . $res_row[0] . "'";
                        // echo $s;
                        $result = mysqli_query($conn, $s);
                        while ($row = mysqli_fetch_array($result)) {
                            ?>
                            <option value="<?php echo $row[0] ?>"><?php echo $row[1] ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="item" class="col-md-2 ">Item</label>
                <div class="col-md-10">
                    <input type="text" name="item" class="form-control" id="item"
                           data-rule-required="true" autocomplete="off">
                </div>
            </div>
            <div class="form-group">
                <label for="price" class="col-md-2 ">Price</label>
                <div class="col-md-10">
                    <input type="text" name="price" class="form-control" id="price"
                           data-rule-required="true" autocomplete="off">
                </div>
            </div>

            <div class="col-md-10 col-md-offset-2">
                <input type="submit" class="btn btn-primary" value="submit">
            </div>
        </form>
    </div>
</div>
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <br>
        <?php
        if (isset($_GET['er'])) {
            $val = $_REQUEST['er'];
            if ($val == 2) {
                echo "<span class='text-danger'> Menu added Successfully</span>";
            } else  {
                echo "<span class='text-danger'> Menu already Exist</span>";
            }
        }
        ?>


    </div>
</div>
<?php
include "footer.php";
?>
</body>
</html>