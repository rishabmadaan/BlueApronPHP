<!doctype HTML>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Restaurant Signup</title>
    <?php
    include "headerfiles.php";
    ?>
</head>
<body>
<?php
include "publicheader.php";
?>
<style>
    .banner1 {
        min-height: 250px;
    }
</style>
<div class="services">
    <div class="container">
        <h1 class="animated fadeInLeftBig" data-wow-duration="1000ms" data-wow-delay="300ms">Restaurant Sign up</h1>
        <form class="form-horizontal" method="post" action="restaurant_signupaction.php"
              enctype="multipart/form-data">

            <div class="form-group">
                <label for="tbemail" class="col-md-4">Restaurant Name</label>
                <div class="col-md-8">
                    <input type="text" data-rule-required="true"
                           data-msg-required="Please Fill Restaurant Name"
                           class="form-control" name="restaurantname" id="restaurantname"
                           placeholder="Enter restaurant name">
                </div>
            </div>

            <div class="form-group">
                <label for="tbmob" class="col-md-4">Mobile No</label>
                <div class="col-md-8">
                    <input type="text" data-rule-required="true"
                           data-msg-required="Please Fill Mobile no"
                           data-rule-number="true"
                           minlength="10"
                           maxlength="10"

                           class="form-control" name="mob" id="tbmob"
                           placeholder="Enter Mobile no">
                </div>
            </div>

            <div class="form-group">
                <label for="tbemail" class="col-md-4">Email</label>
                <div class="col-md-8">
                    <input type="email" data-rule-required="true"
                           data-msg-required="Please Fill Email"
                           class="form-control" name="email" id="tbemail"
                           placeholder="Enter Email">
                </div>
            </div>
            <div class="form-group">
                <label for="tbemail" class="col-md-4">Password</label>
                <div class="col-md-4">
                    <input type="password" data-rule-required="true"
                           data-msg-required="Please Fill Password"
                           class="form-control" name="pass" id="pass"
                           placeholder="Enter Password">
                </div>
                <div class="col-md-4">
                    <input type="password" data-rule-required="true"
                           data-msg-required="Please Fill Confirm Password"
                           class="form-control" name="cpass" id="cpass" data-rule-equqlTo="#pass"
                           placeholder="Enter Confirm Password">
                </div>
            </div>

            <div class="form-group">
                <label for="tbpass" class="col-md-4">Proprieter Name</label>
                <div class="col-md-8">
                    <input type="text" data-rule-required="true"
                           data-msg-required="Please Fill Proprieter Name"
                           class="form-control" name="prop" id="tbprop"
                           placeholder="Enter Proprieter Name">
                </div>
            </div>
            <div class="form-group">
                <label for="tbaddress" class="col-md-4">Address</label>
                <div class="col-md-8">
                <textarea name="address" data-rule-required="true" data-msg-required="Please Fill Address"
                          class="form-control"
                          id="tbaddress"></textarea>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-8 col-md-offset-4">
                    <input type="submit" class="btn btn-info btn-block" value="Submit">
                </div>
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
</div>
<?php
include "footer.php";
?>
</body>
</html>