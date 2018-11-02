<?php
include "connection.php";
$sql = "select * from restaurant_signup";
$sql_result = mysqli_query($conn, $sql);
while ($sql_row = mysqli_fetch_array($sql_result)) {
    $total = "select COUNT(*) as total from reviews where restaurant_id='$sql_row[0]'";
    $total_result = mysqli_query($conn, $total);
    $total_row = mysqli_fetch_array($total_result);
    echo '!@#$'.$sql_row[0] . '!@#$';
    ?>
    <h3 class="wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms"><?php echo $total_row['total']; ?>
        Reviews <span>on</span> <label><?php echo $sql_row['restaurant_name']; ?></label></h3>
    <div class="tom-grid wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
        <?php
        $s = "select * from reviews inner join user_signup on user_signup.email=reviews.user_email where reviews.restaurant_id='$sql_row[0]'";
        //echo $s;
        $result = mysqli_query($conn, $s);
        ?>
        <?php
        while ($row = mysqli_fetch_array($result)) {
            ?>
            <div class="tom">
                <img src="<?php echo $row['photo'] ?>" alt=" "/>
            </div>
            <div class="tom-right">
                <div class="Hardy">
                    <h4><?php echo $row['fullname'] ?></h4>
                    <p><label><?php echo $row['datetym'] ?></label></p>
                </div>

                <div class="clearfix"></div>
                <p class="lorem"><?php echo $row['review'] ?></p>
            </div>
            <div class="clearfix"></div>

            <?php
        }

        ?>
    </div>

    <?php

}

?>


