<!doctype HTML>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>View Photo</title>
    <?php
    include "headerfiles.php";
    ?>
</head>
<body>
<?php
include "restaurant_header.php";
?>
<div class="container">
    <div class="services">
        <div class="container">
            <h1 class="animated fadeInLeftBig" data-wow-duration="1000ms" data-wow-delay="300ms">View Photo</h1>
            <table class="table table-bordered">
                <tr>
                    <th>Sr No. </th>
                    <th>Caption </th>
                    <th>Photo</th>
                    <th colspan="2">Controls</th>
                </tr>
                <?php
                $k = 0;
                include "connection.php";
                $s = "select * from restaurant_photo where restaurant_id='".$res_row[0]."'";
//                echo $s;
                $result = mysqli_query($conn, $s);
                while ($row = mysqli_fetch_array($result)) {
                    ?>
                    <tr>
                        <td><?php echo ++$k; ?></td>
                        <td><?php echo $row[1] ?></td>
                        <td><img src="<?php echo $row[2] ?>" height="100" width="100"></td>
                        <td><a href="editphoto.php?q=<?php echo $row[0] ?>"><span class="glyphicon glyphicon-pencil" title="Edit"></span> </a></td>
                        <td><a href="deletephoto.php?q=<?php echo $row[0] ?>"onclick="return confirm('Are you sure you want to Delete?')"><span class="glyphicon glyphicon-remove" title="Delete"></span> </a></td>
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
