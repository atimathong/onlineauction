<?php
//include required phpmailer files
require 'includes/PHPMailer.php';
require 'includes/SMTP.php';
require 'includes/Exception.php';

//define name spaces
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    function sendEmail($email, $user_fname, $item_name, $purpose, $bid_price, $receiver, $bid_fail)
    {
        //create instance of phpmailer
        $mail = new PHPMailer();
        //set mailer to use smtp
        $mail->isSMTP();
        //define smtp host
        $mail->Host = "smtp.gmail.com";
        //enable smtp authen
        $mail->SMTPAuth = "true";
        //set type of encryption (ssl/tls)
        $mail->SMTPSecure = "tls";
        //set port to connect smtp
        $mail->Port = "587";
        //set gmail username
        $mail->Username = "atima.thong@gmail.com";
        //set gmail password
        $mail->Password = "adhurpuultfghfsd";
        //set gmail subject
        $subject = "";
        if ($purpose == "start_bid") {
            $subject = "New Bid Created";
        } else {
            // end_bid
            $subject = "Bid Result Update";
        }
        $mail->Subject = $subject;
        //set sender email
        $mail->setFrom("atima.thong@gmail.com");

        //email body
        $message = '<html><body>';
        $message .= '<h3 style="color:blue;"><b>Dear</b> ' . $user_fname . ',</h3>';
        if ($purpose === "start_bid") {
            // main user will be the person who has just created the bid.
            $message .= $receiver == "main_user" ? '<p style="color:black;font-size:18px;">You have successfully started your bid for ' . $item_name . ' at a price of &pound;' . $bid_price . '.</p>' :
                '<p style="color:black;font-size:18px;">New bid has been created for ' . $item_name . ' by another auctioner.</p>';
        } else {
            //end bid: main user is the winner.
            if ($bid_fail === false) {
                // bid success
                $message .= $receiver == "main_user" ? '<p style="color:black;font-size:18px;">Congratulation, you are the winner of the auction for ' . $item_name . ' at a highest price of &pound;' . $bid_price . '. The seller will contact you shortly.</p>' :
                    '<p style="color:black;font-size:18px;">We are regret to inform you that your bid for ' . $item_name . ' at a price of &pound;' . $bid_price . ' is unsuccessful. 
                However, we have many on-going bids which you can potentially become the winner. So stay tuned for your next auction!</p>';
            } else {
                // bid_fail due to the price < reserve price
                $message .= '<p style="color:black;font-size:18px;">We would like to inform you that the auction result cannot be obtained for ' . $item_name . " because the final bid price doesn't reach the seller's reserved price.</p>";
            }
        }
        $message .= '<br>';
        $message .= '<p style="color:black;font-size:18px;"></b>Best Regards,</b></p>';
        $message .= '<p style="color:black;font-size:18px;">Customer Support Team</p>';
        $message .= '</body></html>';

        $mail->isHTML(true);  
        $mail->Body = $message;
        // echo $receiver;
        // echo $message;
        //add recipient
        $mail->addAddress($email);
        //finally send email
        if ($mail->send()) {
            echo "--Email Sent--!";
        } else {
            echo "Error..!";
        }
        //closing smtp connection
        $mail->smtpClose();
    }

    ?>

</body>

</html>