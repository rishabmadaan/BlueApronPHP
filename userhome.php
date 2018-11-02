<!doctype HTML>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User Home</title>
    <?php
    include "headerfiles.php";
    ?>
</head>
<body>
<?php
include "user_header.php";
?>
<div class="jumbotron text-center">
    <h1 class="text-center">Welcome, <?php echo $email ?></h1>
</div>
<?php
include "footer.php";
?>
</body>
</html>
