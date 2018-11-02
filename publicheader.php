<?php
include "connection.php";
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
                    <?php
                    @session_start();
                    if (isset($_SESSION['user'])) {
                        ?>
                        <li><a href="index.php" class="active">Home</a></li>
                        <li role="presentation" class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button"
                               aria-haspopup="true" aria-expanded="false">
                                Settings <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="chpass_user.php">ChangePassword</a></li>
                                <li><a href="logout_user.php">Log out</a></li>
                            </ul>
                        </li>
                        <?php
                    } else {
                        include "menu.php";
                    }
                    ?>
                    </ul>
                </nav>
                <div class="social-icons">
                    <ul>
                        <li><a href="showcart.php"><span class="glyphicon glyphicon-shopping-cart shopping_cart"></span><sup><span
                                            class="badge badge-danger" id="totalitems">
                                        <?php
                                        if (isset($_SESSION['items'])) {
                                            echo count($_SESSION['items']);
                                        }
                                        ?>
                                    </span></sup></a></li>
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
