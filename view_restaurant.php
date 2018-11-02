<!doctype HTML>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>View Restaurant</title>
    <?php
    include "headerfiles.php";
    ?>
</head>
<body>
<?php
include "adminheader.php";
?>
<div class="container">
    <div class="services">
        <div class="container">
            <h1 class="animated fadeInLeftBig" data-wow-duration="1000ms" data-wow-delay="300ms">View Restaurant</h1>
            <table class="table table-bordered">
                <tr>
                    <th>Sr No.</th>
                    <th>Restaurant Name</th>
                    <th>Mobile</th>
                    <th>Email</th>
                    <th>Owner</th>
                    <th>Address</th>
                    <th>Status</th>
                    <th colspan="2">Controls</th>
                </tr>
                <?php
                $k = 0;
                include "connection.php";
                $s = "select * from restaurant_signup";
                $result = mysqli_query($conn, $s);
                while ($row = mysqli_fetch_array($result)) {
                    ?>
                    <tr>
                        <td><?php echo ++$k; ?></td>
                        <td><?php echo $row['restaurant_name'] ?></td>
                        <td><?php echo $row['mobile'] ?></td>
                        <td><?php echo $row['email'] ?></td>
                        <td><?php echo $row['owner'] ?></td>
                        <td><?php echo $row['address'] ?></td>
                        <td><?php echo ucwords($row['status']) ?></td>
                        <td><?php
                            if ($row['status'] == 'enable') {
                                ?>
                                <a href="enablerest.php?q=<?php echo $row[0] ?>&type=<?php echo 'disable' ?>">Disable</a>
                                <?php
                            } else {
                                ?>
                                <a href="enablerest.php?q=<?php echo $row[0] ?>&type=<?php echo 'enable' ?>">Enable</a>
                                <?php
                            }
                            ?></td>
                        <td><a href="deleteresturant.php?q=<?php echo $row[0] ?>"
                               onclick="return confirm('Are you sure you want to Delete?')">
                                <span class="glyphicon glyphicon-remove" title="Delete"></span> </a></td>

                    </tr>
                    <?php
                }
                ?>
            </table>
        </div>
    </div>
</div>
<?php
include "footer.php";
?>
</body>
</html>
