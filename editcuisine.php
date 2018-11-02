<!doctype HTML>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Cuisine</title>
    <?php
    include "headerfiles.php";
    ?>
</head>
<body>
<?php
include "restaurant_header.php";
$id = $_REQUEST['q'];
$s = "select * from cuisine where id='$id'";
$result = mysqli_query($conn, $s);
$row = mysqli_fetch_array($result);
?>
<div class="services">
    <div class="container">
        <h1 class="animated fadeInLeftBig" data-wow-duration="1000ms" data-wow-delay="300ms">Edit Category</h1>
        <form action="update-category.php" method="post" class="form-horizontal">
            <input type="hidden" name="id" value="<?php echo $row[0] ?>">
            <div class="form-group">
                <label class="col-sm-2">cuisine name</label>
                <div class="col-sm-10">
                    <input type="text" name="cuisinename" readonly value="<?php echo $row[1] ?>" class="form-control"
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
                    echo "<span class='text-danger'> Already Exist</span>";
                } else {
                    echo "<span class='text-success'> Added Successfully</span>";
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

