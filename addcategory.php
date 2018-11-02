<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Category</title>
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
        <h1 class="animated fadeInLeftBig" data-wow-duration="1000ms" data-wow-delay="300ms">Add
            Category</h1>
        <form action="addcategory_action.php" method="post" class="form-horizontal" enctype="multipart/form-data">

            <div class="form-group">
                <div class="col-md-12">
                </div>
            </div>
            <div class="form-group">
                <label for="categoryname" class="col-md-2 ">Category Name</label>
                <div class="col-md-10">
                    <input type="text" name="categoryname" class="form-control" id="categoryname"
                           data-rule-required="true" autocomplete="off">
                </div>
            </div>
            <div class="form-group">
                <label for="categoryname" class="col-md-2 ">Photo</label>
                <div class="col-md-10">
                    <input type="file" name="photo" class="form-control" id="photo"
                           data-rule-required="true" autocomplete="off" data-rule-extension="jpg|png|gif|jpeg">
                </div>
            </div>
            <div class="form-group">
                <label for="description" class="col-md-2 ">Description</label>
                <div class="col-md-10">
                                <textarea name="description" class="form-control" id="description"
                                          data-rule-required="true"></textarea>
                </div>
            </div>
            <div class="col-md-10 col-md-offset-2">
                <input type="submit" class="btn btn-primary" value="Add Category">
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
            if ($val == 1) {
                echo "<span class='text-success'>Category added Successfully</span>";
            } else {
                echo "<span class='text-danger'>Category name already Exist</span>";
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