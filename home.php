<!doctype HTML>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <?php
    include "headerfiles.php";
    ?>
</head>
<body>
<?php
include "adminheader.php";
?>

<div class="banner-info1 animated wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
    <ul id="flexiselDemo1">
        <?php
        include "connection.php";
        $cat = "select * from categories";
        $cat_result = mysqli_query($conn, $cat);
        while ($cat_row = mysqli_fetch_array($cat_result)) {
            ?>
            <li>
                <a href="">
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
<?php
include "footer.php";
?>
</body>
</html>
