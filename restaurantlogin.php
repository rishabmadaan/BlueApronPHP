<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Restaurant Login</title>
    <?php
    include_once "headerfiles.php";
    ?>
</head>
<body>
<?php
include_once "publicheader.php";
?>
<style>
    .banner1 {
        min-height: 250px;
    }
</style>
<div class="container">
    <h1 class="animated fadeInLeftBig" data-wow-duration="1000ms" data-wow-delay="300ms">Restaurant Login</h1>

    <div class="col-md-6 col-md-offset-3">
        <form action="checkrestlogin.php" method="post">
            <div class="form-group">
                <label>Email</label>
                <input type="email" data-rule-required="true"
                       data-msg-required="Enter Email"
                       name="tbemail" id="tbemail" class="form-control">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" data-rule-required="true"
                       data-msg-required="Enter Password" name="tbpassword"
                       id="tbpassword" class="form-control">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-warning">Login <span class="glyphicon glyphicon-log-in"></span>
                </button>
            </div>


        </form>
    </div>


</div>
<div class="text-center">
    <?php
    if (isset($_REQUEST['er'])) {
        $val = $_REQUEST['er'];
        if ($val == 1 || $val == 2) {
            echo "<span class='text-danger'>Invalid Credentials or Restaurant has not been Approved yet</span>";
        }
    }
    ?>
</div>
<?php
include_once "footer.php";
?>
</body>
</html>