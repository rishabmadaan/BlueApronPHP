<!doctype HTML>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Restaturant Password</title>
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
        <h1 class="animated fadeInLeftBig" data-wow-duration="1000ms" data-wow-delay="300ms">Change Password</h1>
        <form action="rest_changepass_action.php" method="post" class="form-horizontal">
            <div class="form-group">
                <label class="col-sm-2">Email</label>
                <div class="col-sm-10">
                    <input type="text" name="email" value="<?php echo $email; ?>" readonly class="form-control" data-rule-required="true"
                           data-rule-email="true">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2">Password</label>
                <div class="col-sm-10">
                    <input type="password" name="pass" class="form-control" data-rule-required="true">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2">New Password</label>
                <div class="col-sm-10">
                    <input type="password" name="newpass" id="pass" class="form-control" data-rule-required="true">
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
                <label class="col-sm-2"></label>
                <div class="col-sm-10">
                    <input type="submit" class="btn btn-primary" value="Submit">
                </div>
            </div>
        </form>
        <div class="text-center">
            <?php
            if(isset($_REQUEST['er']))
            {
                $val=$_REQUEST['er'];
                if($val==1)
                {
                    echo "<span class='text-success'>Your password has been updated Successfully</span>";
                }
                else
                {
                    echo "<span class='text-danger'>Invalid Credendials</span>";
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