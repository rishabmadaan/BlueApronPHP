<!doctype HTML>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Admin</title>
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
        <h1 class="animated fadeInLeftBig" data-wow-duration="1000ms" data-wow-delay="300ms">Add Admin</h1>
        <form action="add-admin.php" method="post" class="form-horizontal">
            <div class="form-group">
                <label class="col-sm-2">Email</label>
                <div class="col-sm-10">
                    <input type="text" name="email" class="form-control" data-rule-required="true"
                           data-rule-email="true" autocomplete="off">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2">Password</label>
                <div class="col-sm-10">
                    <input type="password" name="pass" id="pass" class="form-control" data-rule-required="true">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2">Confirm Password</label>
                <div class="col-sm-10">
                    <input type="password" name="cpass" id="cpass" class="form-control"
                           data-rule-required="true" data-rule-equalTo="#pass">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2">Fullname</label>
                <div class="col-sm-10">
                    <input type="text" name="fullname" class="form-control" data-rule-required="true">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2">Mobile</label>
                <div class="col-sm-10">
                    <input type="text" name="mobile" class="form-control" data-rule-required="true"
                           data-rule-number="true" data-rule-minlength="10" data-rule-maxlength="10">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2">Type</label>
                <div class="col-sm-10">
                    <select name="type" class="form-control" data-rule-required="true">
                        <option value="">--Choose--</option>
                        <option value="Admin">Admin</option>
                        <option value="Sub-Admin">Sub-Admin</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2"></label>
                <div class="col-sm-10">
                    <input type="submit" class="btn btn-warning" value="Submit">
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