<?php
include "connection.php";
@session_start();
if (isset($_SESSION['restuarant'])) {
    $email = $_SESSION['restuarant'];

    $rest="select * from restaurant_signup where email='$email'";
    $res_result=mysqli_query($conn,$rest);
    $res_row=mysqli_fetch_array($res_result);
} else {
    header("Location:restaurantlogin.php");
}
?>
<style>
    .banner1 {
        min-height: 250px;
    }
</style>
<!-- header -->
<div class="header">
    <div class="container">
        <nav class="navbar navbar-default">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <div class="logo">
                    <a class="navbar-brand" href="index.php">Food Club</a>
                </div>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse nav-wil" id="bs-example-navbar-collapse-1">
                <nav class="cl-effect-13" id="cl-effect-13">
                    <ul class="nav navbar-nav">
                        <li><a href="resthome.php" class="active">Home</a></li>
                        <li role="presentation" class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button"
                               aria-haspopup="true" aria-expanded="false">
                                Photo <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="add_Photos.php">Add Photo</a></li>
                                <li><a href="viewphoto.php">View Photo</a></li>
                            </ul>
                        </li>

                        <li role="presentation" class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button"
                               aria-haspopup="true" aria-expanded="false">
                                Cuisine <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="addcuisine.php">Add Cuisine</a></li>
                                <li><a href="cuisine_view.php">View Cuisine</a></li>
                            </ul>
                        </li>

                        <li role="presentation" class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button"
                               aria-haspopup="true" aria-expanded="false">
                                Menu <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="addmenu.php">Add Menu</a></li>
                                <li><a href="menu_view.php">View Menu</a></li>
                            </ul>
                        </li>
                        <li><a href="orders.php">Orders</a></li>
                        <li role="presentation" class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button"
                               aria-haspopup="true" aria-expanded="false">
                                Settings <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="rest_changepassword.php">Change Password</a></li>
                                <li><a href="rest_logout.php">Log Out</a></li>
                            </ul>
                        </li>




                    </ul>
                </nav>
                <div class="social-icons">
                    <ul>
                        <li><a class="" href="#"><span class="glyphicon glyphicon-user">Welcome, <?php echo $res_row[1] ?></span> </a></li>

                    </ul>
                </div>
            </div>
            <!-- /.navbar-collapse -->
        </nav>
    </div>
</div>
<!-- header -->
<!-- banner1 -->
<div class="banner1">
    <div class="container">
    </div>
</div>
<!-- //banner1 -->