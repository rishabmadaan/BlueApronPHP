<!DOCTYPE HTML>
<html>
<head>
    <title>Cooks a Hotels and Restaurants Category Flat Bootstrap Responsive Website Template | Single ::
        w3layouts</title>
    <?php
    include "headerfiles.php";
    ?>
</head>

<body>
<?php
@session_start();

if (isset($_SESSION['user'])) {
    include "user_header.php";
} else {
    include "publicheader.php";
}
$rest_id = $_REQUEST['q'];
$s = "select * from restaurant_signup where id='$rest_id'";
$result = mysqli_query($conn, $s);
$row = mysqli_fetch_array($result);

$avgrate = "select AVG(`rating`) as avgrate from rating where restaurant_id='$rest_id'";
$avgrate_result = mysqli_query($conn, $avgrate);
$avgrate_row = mysqli_fetch_array($avgrate_result);
?><!-- single -->
<div class="single">
    <div class="container">
        <h1 class="animated fadeInLeftBig" data-wow-duration="1000ms" data-wow-delay="300ms"><?php echo $row[1] ?>
            (<?php echo (int)$avgrate_row['avgrate'] . "/5" ?>)<span class="glyphicon glyphicon-star"></span></h1>
        <div class="single-left wow fadeInLeftBig" data-wow-duration="1000ms" data-wow-delay="300ms">

            <img src="<?php echo $row['photo']; ?>" alt=" " class="img-responsive"/>
        </div>
        <div class="single-right wow fadeInRightBig" data-wow-duration="1000ms" data-wow-delay="300ms">
            <h2><?php echo $row['address'] ?></h2>
            <p>Opening Hours <span><?php echo $row['opening_hours']; ?></span></p>
            <p><span><?php echo $row['description'] ?></span>
                <span><b>Cuisines: </b> <?php
                    $cuisine = "select * from cuisine where restaurant_id='$rest_id'";
                    $cuisine_result = mysqli_query($conn, $cuisine);
                    while ($cuisine_row = mysqli_fetch_array($cuisine_result)) {
                        echo "<b>" . $cuisine_row[1] . ", </b>";
                    }
                    ?></span></p>
            <p><b>Proprietor: </b><?php echo $row['owner'] ?></p>
            <div>
                <?php
                if (isset($_SESSION['user'])) {
                    $rate = "select * from rating where user_email='$email' and restaurant_id='$rest_id'";
                    $rate_result = mysqli_query($conn, $rate);
                    if (mysqli_num_rows($rate_result) > 0) {
                        $rate_row = mysqli_fetch_array($rate_result);
                        $rating = $rate_row['rating'];
                        if ($rating == 1) {
                            ?><span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star-empty"></span>
                            <span class="glyphicon glyphicon-star-empty"></span>
                            <span class="glyphicon glyphicon-star-empty"></span>
                            <span class="glyphicon glyphicon-star-empty"></span>
                            <?php
                        } elseif ($rating == 2) {
                            ?><span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star-empty"></span>
                            <span class="glyphicon glyphicon-star-empty"></span>
                            <span class="glyphicon glyphicon-star-empty"></span>
                            <?php
                        } elseif ($rating == 3) {
                            ?><span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star-empty"></span>
                            <span class="glyphicon glyphicon-star-empty"></span>
                            <?php
                        } elseif ($rating == 4) {
                            ?><span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star-empty"></span>
                            <?php
                        } elseif ($rating == 5) {
                            ?><span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <?php
                        }
                    } else {
                        ?>
                        <span onclick="selected(this,'<?php echo $rest_id ?>','<?php echo $_SESSION['user']; ?>')"
                              class="glyphicon glyphicon-star-empty" id="rating_1" onmouseover="fill(this)"
                              onmouseout="unfill(this)"></span>
                        <span onclick="selected(this,'<?php echo $rest_id ?>','<?php echo $_SESSION['user']; ?>')"
                              class="glyphicon glyphicon-star-empty" id="rating_2" onmouseover="fill(this)"
                              onmouseout="unfill(this)"></span>
                        <span onclick="selected(this,'<?php echo $rest_id ?>','<?php echo $_SESSION['user']; ?>')"
                              class="glyphicon glyphicon-star-empty" id="rating_3" onmouseover="fill(this)"
                              onmouseout="unfill(this)"></span>
                        <span onclick="selected(this,'<?php echo $rest_id ?>','<?php echo $_SESSION['user']; ?>')"
                              class="glyphicon glyphicon-star-empty" id="rating_4" onmouseover="fill(this)"
                              onmouseout="unfill(this)"></span>
                        <span onclick="selected(this,'<?php echo $rest_id ?>','<?php echo $_SESSION['user']; ?>')"
                              class="glyphicon glyphicon-star-empty" id="rating_5" onmouseover="fill(this)"
                              onmouseout="unfill(this)"></span>
                        <span id="sp1"></span>
                        <?php
                    }
                } else {
                    echo "<a href='userlogin.php'>Login To Rate?</a>";
                }
                ?>
            </div>
        </div>
        <div class="clearfix"></div>
        <p class="tortor wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
            <span class="glyphicon glyphicon-phone"> <?php echo $row['mobile'] ?></span>
            <span class="glyphicon glyphicon-envelope"> <?php echo $row['email'] ?></span>
            <span class="glyphicon glyphicon-globe"> <?php echo $row['address'] ?></span>
        </p>
        <div class="tags-cate">
            <div class="cat-grid wow flipInY" data-wow-duration="1000ms" data-wow-delay="300ms">
                <h4><span>P</span>hotos</h4>
                <ul>
                    <?php
                    $photos = "select * from restaurant_photo where restaurant_id='$rest_id'";
                    $photos_result = mysqli_query($conn, $photos);
                    while ($photos_row = mysqli_fetch_array($photos_result)) {
                        ?>
                        <li><img src="<?php echo $photos_row[2] ?>" class="img-responsive img-circle"> <a
                                    href="#"><?php echo $photos_row[1] ?></a></li>
                        <?php
                    }
                    ?>

                </ul>
            </div>
            <div class="cat-grid wow flipInY" data-wow-duration="1000ms" data-wow-delay="300ms">
                <h4><span>C</span>uisines</h4>
                <ul>
                    <?php
                    $k=1;
                    $menu = "select * from cuisine where restaurant_id='$rest_id'";
                    $menu_result = mysqli_query($conn, $menu);
                    while ($menu_row = mysqli_fetch_array($menu_result)) {
                        ?>
                        <li><a href="showmenu.php?q=<?php echo $menu_row[0] ?>&restid=<?php echo $rest_id ?>"><b><?php echo $k++; ?>. <?php echo $menu_row[1] ?></b></a></li>
                        <?php
                    }
                    ?>

                </ul>
            </div>
            <div class="cat-grid wow flipInY" data-wow-duration="1000ms" data-wow-delay="300ms">
                <h4><span>L</span>ocation</h4>
                <div class="top-social-icons">
                    <iframe src="<?php echo $row['location'] ?>"></iframe>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="three-com" id="<?php echo $rest_id; ?>">
            <?php
            $total = "select COUNT(*) as total from reviews where restaurant_id='$rest_id'";
            $total_result = mysqli_query($conn, $total);
            $total_row = mysqli_fetch_array($total_result);
            //echo '!@#$' . $sql_row[0] . '!@#$';
            ?>
            <h3 class="wow fadeInUp" data-wow-duration="1000ms"
                data-wow-delay="300ms"><?php echo $total_row['total']; ?>
                Reviews <span>on</span> <label><?php echo $row['restaurant_name']; ?></label></h3>

            <?php
            $review = "select * from reviews inner join user_signup on user_signup.email=reviews.user_email where reviews.restaurant_id='$row[0]'";
            //echo $review;
            $review_result = mysqli_query($conn, $review);
            ?>
            <?php
            while ($review_row = mysqli_fetch_array($review_result)) {
                ?>

                <div class="tom-grid wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
                    <div class="tom">
                        <img src="<?php echo $review_row['photo'] ?>" class="img-responsive" alt=" "/>
                    </div>
                    <div class="tom-right">
                        <div class="Hardy">
                            <h4><?php echo $review_row['fullname'] ?></h4>
                            <p><label><?php echo $review_row['datetym'] ?></label></p>
                        </div>

                        <div class="clearfix"></div>
                        <p class="lorem"><?php echo $review_row['review'] ?></p>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <?php
            }

            ?>
        </div>
        <div class="leave-comment wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
            <h3>Write a Review</h3>
            <p>Give us your Feedback about your Experience</p>
            <?php
            @session_start();
            if (isset($_SESSION['user'])) {
                ?>
                <form>
                    <textarea placeholder="Review" required=" " name="review" id="review"></textarea>
                    <input type="button" onclick="User_reviews(<?php echo $rest_id ?>)" value="Add Review"
                           class="btn btn-warning">
                    <div class="clearfix"></div>
                </form>
                <?php
            } else {
                ?>
                <a href="userlogin.php">Login to Review</a>
                <?php
            }
            ?>

        </div>
    </div>
</div>
<!-- //single --><?php
include "footer.php";
?>
<!-- //for bootstrap working -->
</body>
</html>