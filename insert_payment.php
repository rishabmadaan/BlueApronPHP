<?php
ob_start();
include "cart.php";
include "user_header.php";
$mode = $_REQUEST['mode'];
$address = $_REQUEST['address'];
date_default_timezone_set("Asia/Kolkata");
$dttym = date("Y-m-d H:i:s");
$ar = array();
if (isset($_SESSION['items'])) {
    $ar = $_SESSION['items'];
    $grandtotal = 0;
    $k = 1;
    $total = 0;
    $subtotal = 0;
    for ($i = 0; $i < count($ar); $i++) {
        $subtotal = $ar[$i]->price * $ar[$i]->qty;
        $total += $subtotal;

    }
    $cgst = ($total * 2.5) / 100;
    $gst = $cgst + $cgst;
    $grandtotal = $cgst + $cgst + $total;
}
$s = "INSERT INTO `bill`(`id`, `grandtotal`, `datetime`, `useremail`, `address`, `modeoff_payment`, `cgst`, `sgst`, `gst`,`restid`) 
VALUES (null ,'$grandtotal','$dttym','$email','$address','$mode','$cgst','$cgst',$gst,'".$ar[0]->restid."')";
mysqli_query($conn, $s);

$order = "select MAX(`id`) as orderid from  `bill`";
$order_result = mysqli_query($conn, $order);
$order_row = mysqli_fetch_array($order_result);

$orderid = $order_row['orderid'];

$msg = 'Thank you for Ordering with us. Your Order Details are as follows:<table class="table table-striped">
                        <tr>
                            <th>Sr No.</th>
                            <th>Item</th>
                            <th>Price</th>
                            <th>Qty</th>
                            <th>SubTotal</th>
                        </tr>
                    ';
for ($i = 0; $i < count($ar); $i++) {
    $subtotal = $ar[$i]->price * $ar[$i]->qty;
    $total += $subtotal;
    $sql = "INSERT INTO `billdetail`(`id`, `orderid`, `menueid`, `price`, `qty`) 
VALUES (null ,'$orderid','" . $ar[$i]->id . "','" . $ar[$i]->price . "','" . $ar[$i]->qty . "')";
    mysqli_query($conn, $sql);
   // echo $sql;
    $msg .= '<tr>
                                <td>' . $k++ . '</td>
                                <td>' . $ar[$i]->itemname . '</td>
                                <td>&#8377;' . $ar[$i]->price . '</td>
                                <td>' . $ar[$i]->qty . '</td>
                                <td>&#8377;' . $subtotal . '</td>
                            </tr>';
}
$msg .= '<tr>
                            <th colspan="4"> Total</th>
                            <td colspan="2">&#8377;' . $total . '</td>
                        </tr>
                        <tr>
                            <th colspan="4">CGST (2.5%)</th>
                            <td colspan="2">&#8377;' . $cgst . '</td>
                        </tr>
                        <tr>
                            <th colspan="4">SGST (2.5%)</th>
                            <td colspan="2">&#8377;' . $cgst . '</td>
                        </tr>
                        <tr>
                            <th colspan="4">Grand Total</th>
                            <td colspan="2">&#8377;' . $grandtotal . '</td>
                        </tr>
                    </table>';
$ch = curl_init();
$mobile=$res_row['mobile'];
$message=urlencode($msg);
curl_setopt($ch, CURLOPT_URL,"http://server1.vmm.education/VMMCloudMessaging/AWS_SMS_Sender?");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS,
    "username=phpmay2018&password=YD411F1R&message=".$message."&phone_numbers=".$mobile);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//print_r($ch);
$server_output = curl_exec ($ch);

curl_close ($ch);


//error_reporting(E_ALL);
error_reporting(E_STRICT);

require_once('class.phpmailer.php');
//include("class.smtp.php"); // optional, gets called from within class.phpmailer.php if not already loaded

$mail             = new PHPMailer();

/*$body             = file_get_contents('contents.html');
$body             = preg_replace('/[\]/','',$body);*/

$mail->IsSMTP(); // telling the class to use SMTP
$mail->Host       = "mail.yourdomain.com"; // SMTP server
$mail->SMTPDebug  = 0;                     // enables SMTP debug information (for testing)
// 1 = errors and messages
// 2 = messages only
$mail->SMTPAuth   = true;                  // enable SMTP authentication
$mail->SMTPSecure = "ssl";                 // sets the prefix to the servier
$mail->Host       = "smtp.gmail.com";      // sets GMAIL as the SMTP server
$mail->Port       = 465;                   // set the SMTP port for the GMAIL server
$mail->Username   = "tania.vmmteachers23@gmail.com";  // GMAIL username
$mail->Password   = "Teachers@123";            // GMAIL password

$mail->SetFrom('tania.vmmteachers23@gmail.com', 'Food Club');

$mail->AddReplyTo("tania.vmmteachers23@gmail.com","Food Club");

$mail->Subject    = "Order Detail";

$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test
$body=$msg;
$mail->MsgHTML($body);

$address = $email;
$mail->AddAddress($address, $res_row['fullname']);

/*$mail->AddAttachment("images/phpmailer.gif");      // attachment
$mail->AddAttachment("images/phpmailer_mini.gif"); */// attachment
$_SESSION['items']=null;
unset($_SESSION['items']);
if(!$mail->Send()) {
    //echo "Mailer Error: " . $mail->ErrorInfo;

    header("index.php?msg=1");
    ?>
    <script>
        window.location.href="index.php?msg=1";
    </script>
    <?php
} else {
    echo "Message sent!";
    header("index.php?msg=2");
    ?>
    <script>
        window.location.href="index.php?msg=2";
    </script>
<?php
}

?>


