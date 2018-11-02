<!doctype HTML>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Food Club</title>
    <?php
    include "headerfiles.php";
    ?>
</head>
<body onload="showmodal()">
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
                        session_start();
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
<div class="banner">
    <div class="container">
        <div class="banner-info">
            <h1 class="animated fadeInLeftBig" data-wow-duration="1000ms" data-wow-delay="300ms">If you have good food,
                people will come to your restaurant.
                <span> Choose meal</span></h1>
            <div class="banner-info1 animated wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
                <ul id="flexiselDemo1">
                    <?php
                    include "connection.php";
                    $cat = "select * from categories";
                    $cat_result = mysqli_query($conn, $cat);
                    while ($cat_row = mysqli_fetch_array($cat_result)) {
                        ?>
                        <li>
                            <a href="show_restaurants.php?q=<?php echo $cat_row[0] ?>">
                                <div class="banner-info1-grid">
                                    <img src="<?php echo $cat_row[2] ?>" alt=" " class="img-responsive"/>
                                    <h3><?php echo $cat_row[0] ?></h3>
                                    <p><?php echo $cat_row[1] ?></p>
                                </div>
                            </a>
                        </li>
                        <?php
                    }
                    ?>


                </ul>
                <script type="text/javascript">
                    $(window).load(function () {
                        $("#flexiselDemo1").flexisel({
                            visibleItems: 3,
                            animationSpeed: 1000,
                            autoPlay: true,
                            autoPlaySpeed: 3000,
                            pauseOnHover: true,
                            enableResponsiveBreakpoints: true,
                            responsiveBreakpoints: {
                                portrait: {
                                    changePoint: 480,
                                    visibleItems: 1
                                },
                                landscape: {
                                    changePoint: 640,
                                    visibleItems: 2
                                },
                                tablet: {
                                    changePoint: 768,
                                    visibleItems: 2
                                }
                            }
                        });

                    });
                </script>
                <script type="text/javascript" src="js/jquery.flexisel.js"></script>
                <div class="more wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- //banner -->
<!-- banner-bottom -->
<div class="banner-bottom">
    <div class="container">
        <div class="banner-bottom-grids">
            <div class="col-md-5 banner-bottom-grid wow fadeInRightBig" data-wow-duration="1000ms"
                 data-wow-delay="300ms">
                <h2>Food Club</h2>
                <p>To provide the customer with
                    Quality food at competitive price.
                    Quality and Quick Service
                    Quality Dining Area
                    Quality Waiting Facility and
                    Overall a Best and Enjoyable atmosphere
                    Read More</p>
                <div class="more">
                </div>
            </div>
            <div class="col-md-7 banner-bottom-grid wow flipInY" data-wow-duration="1000ms" data-wow-delay="300ms">
                <div class="banner-bottom-grid1">
                    <img src="images/1.jpg" alt=" " class="img-responsive"/>
                    <div class="banner-bottom-grid-pos">
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" aria-valuenow="30" aria-valuemin="0"
                                 aria-valuemax="100" style="width: 30%;">
                                <span class="sr-only">30% Complete</span>
                            </div>
                        </div>
                        <div class="progress progress1">
                            <div class="progress-bar" role="progressbar" aria-valuenow="20" aria-valuemin="0"
                                 aria-valuemax="100" style="width: 20%;">
                                <span class="sr-only">20% Complete</span>
                            </div>
                        </div>
                        <div class="progress progress2">
                            <div class="progress-bar" role="progressbar" aria-valuenow="30" aria-valuemin="0"
                                 aria-valuemax="100" style="width: 30%;">
                                <span class="sr-only">30% Complete</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="banner-bottom-grids">
            <div class="col-md-6 banner-bottom-grid-1 wow flipInY" data-wow-duration="1000ms" data-wow-delay="300ms">
                <div class="banner-bottom-grid-11">
                    <img src="images/2.jpg" alt=" " class="img-responsive"/>
                    <div class="banner-bottom-grid-11-pos">
                        <p>In this food club we provide the good restaurant available.
                            In the food club we rating the restaurant.
                            They provide the option of the review to give by the user.
                            The easily provide the facility of food by the categories.
                        </p>
                        <div class="more m1">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 banner-bottom-grid-1 wow fadeInLeftBig" data-wow-duration="1500ms"
                 data-wow-delay="100ms">
                <h3>Food Club</h3>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<!-- //banner-bottom -->
<!-- newsletter-bottom -->
<div class="newsletter-bottom">
    <div class="container">
        <?php
        $k = 0;
        $s = "select * from restaurant_signup order by id DESC ";
        $result = mysqli_query($conn, $s);
        while ($row = mysqli_fetch_array($result)) {
            $avgrate = "select AVG(`rating`) as avgrate from rating where restaurant_id='$row[0]'";
            $avgrate_result = mysqli_query($conn, $avgrate);
            $avgrate_row = mysqli_fetch_array($avgrate_result);
            if ($k % 2 == 0) {
                ?>
                <div class="newsletter-bottom-grids">
                    <div class="col-md-6 newsletter-bottom-grid wow fadeInLeftBig" data-wow-duration="1000ms"
                         data-wow-delay="300ms">
                        <a href="single.php?q=<?php echo $row[0] ?>">
                            <h3><?php echo $row['restaurant_name'] ?> (<?php echo (int)$avgrate_row['avgrate'] . "/5" ?>
                                )<span class="glyphicon glyphicon-star"></span></h3></a>
                        <div class="row">
                            <div class="col-sm-1"><span class="glyphicon glyphicon-phone"></span></div>
                            <div class="col-sm-11"><?php echo $row['mobile'] ?></div>
                        </div>
                        <div class="row">
                            <div class="col-sm-1"><span class="glyphicon glyphicon-envelope"></span></div>
                            <div class="col-sm-11"><?php echo $row['email'] ?></div>
                        </div>
                        <div class="row">
                            <div class="col-sm-1"><span class="glyphicon glyphicon-globe"></span></div>
                            <div class="col-sm-11"><?php echo $row['address'] ?></div>
                        </div>
                        <p><?php echo $row['description'] ?></p>
                    </div>
                    <div class="col-md-6 newsletter-bottom-grid wow flipInY" data-wow-duration="1000ms"
                         data-wow-delay="300ms">
                        <img src="<?php echo $row['photo'] ?>" alt=" " class="img-responsive"/>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <?php
            } else {
                ?>
                <div class="newsletter-bottom-grids">
                    <div class="col-md-6 newsletter-bottom-grid wow flipInY" data-wow-duration="1000ms"
                         data-wow-delay="300ms">
                        <img src="<?php echo $row['photo'] ?>" alt=" " class="img-responsive"/>
                    </div>
                    <div class="col-md-6 newsletter-bottom-grid  wow fadeInLeftBig" data-wow-duration="1000ms"
                         data-wow-delay="300ms">
                        <a href="single.php?q=<?php echo $row[0] ?>">
                            <h3><?php echo $row['restaurant_name'] ?> (<?php echo (int)$avgrate_row['avgrate'] . "/5" ?>
                                )<span class="glyphicon glyphicon-star"></span></h3></a>
                        <div class="row">
                            <div class="col-sm-1"><span class="glyphicon glyphicon-phone"></span></div>
                            <div class="col-sm-11"><?php echo $row['mobile'] ?></div>
                        </div>
                        <div class="row">
                            <div class="col-sm-1"><span class="glyphicon glyphicon-envelope"></span></div>
                            <div class="col-sm-11"><?php echo $row['email'] ?></div>
                        </div>
                        <div class="row">
                            <div class="col-sm-1"><span class="glyphicon glyphicon-globe"></span></div>
                            <div class="col-sm-11"><?php echo $row['address'] ?></div>
                        </div>
                        <p><?php echo $row['description'] ?></p>
                        <div class="more">

                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <?php
            }
            $k++;
        }
        ?>
    </div>
</div>
<!-- //newsletter-bottom -->
<!-- footer -->
<div class="footer">
    <div class="container">
        <div class="footer-grids">
            <div class="col-md-3 footer-grid wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
                <h3>About Food club </h3>
                <div class="footer-grd-left">
                    <img src="images/6.jpg" class="img-responsive" alt=" "/>
                </div>
                <div class="footer-grd-left">
                    <p>*In this food club we provide the good restaurant available.
                        *In the food club we rating the restaurant.
                        *They provide the option of the review to give by the user.
                        *The easily provide the facility of food by the categories.
                    </p>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="col-md-3 footer-grid wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
                <h3>Cuisine Available</h3>
                <ul>
                    <?php
                    $menu = "select * from cuisine order by id DESC LIMIT 0,6";
                    $menu_result = mysqli_query($conn, $menu);
                    while ($menu_row = mysqli_fetch_array($menu_result)) {
                        ?>
                        <li><a href="#"><?php echo $menu_row[1] ?></a></li>
                        <?php
                    }
                    ?>
                </ul>
            </div>
            <div class="col-md-3 footer-grid wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
                <h3>Delicious Items</h3>
                <ul>
                    <?php
                    $menu = "select * from menu order by id DESC LIMIT 0,6";
                    $menu_result = mysqli_query($conn, $menu);
                    while ($menu_row = mysqli_fetch_array($menu_result)) {
                        ?>
                        <li><a href="#"><?php echo $menu_row[1] ?></a></li>
                        <?php
                    }
                    ?>
                </ul>
            </div>
            <div class="col-md-3 footer-grid wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
                <h3> Food</h3>
                <div class="footer-grd">
                    <a href="#"><img src="images/7.jpg" class="img-responsive" alt=" "/></a>
                </div>
                <div class="footer-grd">
                    <a href="#"><img src="images/8.jpg" class="img-responsive" alt=" "/></a>
                </div>
                <div class="footer-grd">
                    <a href="#"><img src="images/7.jpg" class="img-responsive" alt=" "/></a>
                </div>
                <div class="clearfix"></div>
                <div class="footer-grd">
                    <a href="#"><img src="images/8.jpg" class="img-responsive" alt=" "/></a>
                </div>
                <div class="footer-grd">
                    <a href="#"><img src="images/7.jpg" class="img-responsive" alt=" "/></a>
                </div>
                <div class="footer-grd">
                    <a href="#"><img src="images/8.jpg" class="img-responsive" alt=" "/></a>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<?php
if(isset($_REQUEST['msg']))
{
    $val=$_REQUEST['msg'];
    ?>
    <div class="modal fade" id="msgmodal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Food Club</h4>
                </div>
                <div class="modal-body">
                    <p>Thank you for shopping with us</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
<?php
}
?>
<?php
include "footer.php";
?>
</body>
</html>