<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Photo</title>
    <?php
    include "headerfiles.php";
    ?>
</head>
<body>
<?php
include "restaurant_header.php";
$id=$_REQUEST['q'];
$s="select * from restaurant_photo where id='$id'";
$result=mysqli_query($conn,$s);
$row=mysqli_fetch_array($result);
?>

<div class="services">
    <div class="container">
        <h1 class="animated fadeInLeftBig" data-wow-duration="1000ms" data-wow-delay="300ms">Edit
            photo</h1>
        <form action="update-restaurant_photo.php" method="post" class="form-horizontal" enctype="multipart/form-data">
<input type="hidden" name="id" value="<?php echo $row[0] ?>">
            <div class="form-group">
                <div class="col-md-12">
                </div>
            </div>
            <div class="form-group">
                <label for="categoryname" class="col-md-2 ">Caption</label>
                <div class="col-md-10">
                    <input type="text" name="caption" class="form-control" id="categoryname" value="<?php echo $row[1] ?>"
                           data-rule-required="true" autocomplete="off">
                </div>
            </div>
            <div class="form-group">
                <label for="description" class="col-md-2 ">Photo</label>
                <div class="col-md-10">
                    <img src="<?php echo $row[2] ?>" height="100" width="100">
                    <input type="file" name="photo" class="form-control" id="description"
                           data-rule-extension="jpg|png|gif|jpeg|JPG|PNG|GIF|JPEG">
                </div>
            </div>
            <div class="col-md-10 col-md-offset-2">
                <input type="submit" class="btn btn-danger" value="Submit">
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
                echo "<span class='text-success'>Photo added Successfully</span>";
            } elseif ($val == 1) {
                echo "<span class='text-danger'>Photo already Exist</span>";
            } else {
                echo "<span class='text-danger'>Try again Later</span>";
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