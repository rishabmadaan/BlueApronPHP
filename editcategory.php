<?php
include_once "connection.php";
$category = $_REQUEST['q'];
$s = "select * from categories where categories_name='$category'";
$result = mysqli_query($conn, $s);
$row = mysqli_fetch_array($result);
?>
<!doctype HTML>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Category</title>
    <?php
    include "headerfiles.php";
    ?>
</head>
<body>
<?php
include "adminheader.php";
?>
<div class="services">
    <div class="container">
        <h1 class="animated fadeInLeftBig" data-wow-duration="1000ms" data-wow-delay="300ms">Edit Category</h1>
        <form action="update-category.php" method="post" class="form-horizontal" enctype="multipart/form-data">
            <div class="form-group">
                <label class="col-sm-2">Category name</label>
                <div class="col-sm-10">
                    <input type="text" name="categoryname" readonly value="<?php echo $row[0] ?>" class="form-control"
                           data-rule-required="true">
                </div>
            </div>
            <div class="form-group">
                <label for="categoryname" class="col-md-2 ">Photo</label>

                <div class="col-md-10">
                    <img src="<?php echo $row[2]; ?>" height="100" width="100">
                    <input type="file" name="photo" class="form-control" id="photo"
                            autocomplete="off" data-rule-extension="jpg|png|gif|jpeg">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2">Description</label>
                <div class="col-sm-10">
                    <input type="text" name="Description" value="<?php echo $row[1] ?>" class="form-control"
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
                    echo "<span class='text-danger'>category already Exist</span>";
                } else {
                    echo "<span class='text-success'>Category added Successfully</span>";
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

