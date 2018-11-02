<!doctype HTML>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <?php
    include "headerfiles.php";
    ?>
</head>
<body>
<?php
include "restaurant_header.php";
?>
<div class="container">
    <h1 class="animated fadeInLeftBig text-center" data-wow-duration="1000ms"
        data-wow-delay="300ms"><?php echo $res_row[1] ?></h1>
    <form action="update-profile.php" method="post" enctype="multipart/form-data" class="form-horizontal" id="resthome">
        <div class="form-group">
            <label class="col-sm-2">Photo</label>
            <div class="col-sm-4"><img src="<?php echo $res_row['photo'] ?>" class="img-responsive img-thumbnail">
                <input type="file" name="photo" data-rule-extension="jpg|pg|gif|jpeg"
                       class="form-control"></div>
            <label class="col-sm-2">Location</label>
            <div class="col-sm-4">
                <iframe src="<?php echo urldecode($res_row['location']) ?>" width="100%" height="250px"></iframe>
                <textarea name="location" class="form-control"></textarea></div>

        </div>
        <div class="form-group">
            <label class="col-sm-2">Owner</label>
            <div class="col-sm-4"><input type="text" name="owner" class="form-control" data-rule-required="true"
                                         value="<?php echo $res_row['owner'] ?>"></div>
            <label class="col-sm-2">Email</label>
            <div class="col-sm-4"><?php echo $res_row['email'] ?></div>
        </div>
        <div class="form-group">
            <label class="col-sm-2">Opening Hours</label>
            <div class="col-sm-4"><textarea name="opening_hours" data-rule-required="true"
                                            class="form-control"><?php echo $res_row['opening_hours'] ?></textarea>
            </div>
            <label class="col-sm-2">Descriptionn</label>
            <div class="col-sm-4"><textarea name="description" data-rule-required="true"
                                            class="form-control"><?php echo $res_row['description'] ?></textarea></div>
        </div>
        <div class="form-group">
            <label class="col-sm-2">Address</label>
            <div class="col-sm-4"><textarea name="address" data-rule-required="true"
                                            class="form-control"><?php echo $res_row['address'] ?></textarea></div>
            <label class="col-sm-2">Mobile</label>
            <div class="col-sm-4"><input type="text" name="mobile" class="form-control"
                                         value="<?php echo $res_row['mobile'] ?>"></div>
        </div>
        <div class="form-group">
            <div class="col-sm-12">
                <?php
                $ex_categories = $res_row['categories'];
                $ar = explode(',', $ex_categories);
                function checkva($day)
                {
                    global $ar;
                    $rt = "";
                    foreach ($ar as $x) {
                        if ($x == $day) {
                            $rt = "checked";
                        }
                    }
                    return $rt;
                }

                $cat = "select * from categories";
                $cat_result = mysqli_query($conn, $cat);
                while ($cat_row = mysqli_fetch_array($cat_result)) {
                    ?>
                    <input type="checkbox" value="<?php echo $cat_row[0] ?>"
                           name="categories[]" <?php echo checkva($cat_row[0]) ?>> <?php echo $cat_row[0] ?>
                    <?php
                }
                ?>
            </div>
        </div>
        <div class="form-group">
            <div class="text-right"><input type="submit" value="Submit" class="btn btn-warning"></div>
        </div>
    </form>
    <div class="text-center">
        <?php
        if (isset($_REQUEST['er'])) {
            $val = $_REQUEST['er'];
            if ($val == 1) {
                echo "<span class='text-danger'>Restaurant Name already Exist</span>";
            } else {
                echo "<span class='text-success'>Restaurant Added Successfully</span>";
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
