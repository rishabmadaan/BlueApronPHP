<?php
include_once "connection.php";
$email = $_REQUEST['q'];
$s = "select * from admin where email='$email'";
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
    <title>Edit Admin</title>
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
        <h1 class="animated fadeInLeftBig" data-wow-duration="1000ms" data-wow-delay="300ms">Edit Admin</h1>
        <form action="update-admin.php" method="post" class="form-horizontal">
            <div class="form-group">
                <label class="col-sm-2">Email</label>
                <div class="col-sm-10">
                    <input type="text" name="email" readonly value="<?php echo $row[0] ?>" class="form-control"
                           data-rule-required="true"
                           data-rule-email="true">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2">Fullname</label>
                <div class="col-sm-10">
                    <input type="text" name="fullname" value="<?php echo $row[2] ?>" class="form-control"
                           data-rule-required="true">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2">Mobile</label>
                <div class="col-sm-10">
                    <input type="text" name="mobile" class="form-control" data-rule-required="true"
                           value="<?php echo $row[3] ?>"
                           data-rule-number="true" data-rule-minlength="10" data-rule-maxlength="10">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2">Type</label>
                <div class="col-sm-10">
                    <select name="type" class="form-control" data-rule-required="true">
                        <option value="">--Choose--</option>
                        <option value="Admin" <?php if ($row[4] == 'Admin') { ?>selected<?php } ?>>Admin</option>
                        <option value="Sub-Admin" <?php if ($row[4] == 'Sub-Admin') { ?>selected<?php } ?>>Sub-Admin
                        </option>
                    </select>
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
                    echo "<span class='text-danger'>Email already Exist</span>";
                } else {
                    echo "<span class='text-success'>Admin Added Successfully</span>";
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
