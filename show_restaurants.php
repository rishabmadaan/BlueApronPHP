<!doctype HTML>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Show Restaurant</title>
    <?php
    include "headerfiles.php";
    ?>
</head>
<body>
<?php
@session_start();

if (isset($_SESSION['user'])) {
    include "user_header.php";
}  else {
    include "publicheader.php";
}
?>
<div class="container">
    <div class="row">
        <div class="newsletter-bottom">
            <div class="container">
                <?php
                $k = 0;
                $category = $_REQUEST['q'];
                $s = "select * from restaurant_signup where categories like '%" . $category . "%'";
                $result = mysqli_query($conn, $s);
                while ($row = mysqli_fetch_array($result)) {
                    $avgrate="select AVG(`rating`) as avgrate from rating where restaurant_id='$row[0]'";
                    $avgrate_result=mysqli_query($conn,$avgrate);
                    $avgrate_row=mysqli_fetch_array($avgrate_result);
                    if ($k % 2 == 0) {
                        ?>
                        <div class="newsletter-bottom-grids">
                            <div class="col-md-6 newsletter-bottom-grid wow fadeInLeftBig" data-wow-duration="1000ms"
                                 data-wow-delay="300ms">
                                <a href="single.php?q=<?php echo $row[0] ?>">
                                    <h3><?php echo $row['restaurant_name'] ?> (<?php echo (int)$avgrate_row['avgrate']."/5" ?>)<span class="glyphicon glyphicon-star"></span></h3> </a>
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
                                    <h3><?php echo $row['restaurant_name'] ?> (<?php echo (int)$avgrate_row['avgrate']."/5" ?>)<span class="glyphicon glyphicon-star"></span></h3></a>

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
    </div>
</div>
<?php
include 'footer.php'
?>
</body>
</html>