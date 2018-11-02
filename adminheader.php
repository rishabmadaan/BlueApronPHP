<?php
include "connection.php";
@session_start();
if (isset($_SESSION['admin'])) {
    $email = $_SESSION['admin'];
} else {
    header("Location:adminlogin.php");
}
$page= pathinfo($_SERVER['PHP_SELF'],PATHINFO_FILENAME);
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
                    <a class="navbar-brand" href="index.html">Food Club </a>
                </div>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse nav-wil" id="bs-example-navbar-collapse-1">
                <nav class="cl-effect-13" id="cl-effect-13">
                    <ul class="nav navbar-nav">
                        <li><a href="home.php" <?php if($page=='home') { ?> class="active" <?php } ?>>Home</a></li>
                        <li role="presentation" class="dropdown <?php if($page=='admin' || $page=='view') { ?> active <?php } ?>">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button"
                               aria-haspopup="true" aria-expanded="false">
                                Admin <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="admin.php">Add Admin</a></li>
                                <li><a href="view.php">View Admin</a></li>
                            </ul>
                        </li>
                        <li role="presentation" class="dropdown<?php if($page=='addcategory' || $page=='viewcategory') { ?>  active <?php } ?>">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button"
                               aria-haspopup="true" aria-expanded="false">
                                Category <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="addcategory.php">Add Category</a></li>
                                <li><a href="viewcategory.php">View Category</a></li>
                            </ul>
                        </li>
                        <li><a href="view_restaurant.php" <?php if($page=='view_restaurant') { ?> class="active" <?php } ?>>View Restaurants</a></li>
                        <li role="presentation" class="dropdown <?php if($page=='changepassword' || $page=='logout') { ?> active <?php } ?>" >
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button"
                               aria-haspopup="true" aria-expanded="false">
                                Settings <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="changepassword.php">Change Password</a></li>
                                <li><a href="logout.php">Log Out</a></li>
                            </ul>
                        </li>

                    </ul>

                </nav>
                <div class="social-icons">
                    <ul>
                        <li><a href="#" style="color: whitesmoke">Welcome, <?php echo $email ?></a></li>

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