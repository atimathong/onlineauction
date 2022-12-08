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
    function sendEmail($email, $user_fname, $item_name, $purpose, $bid_price, $receiver,$bid_fail,$winner='')
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
        $mail->Username = "abidmore.auction@gmail.com";
        //set gmail password
        $mail->Password = "oteaflbmbansrmnl";
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
        $mail->setFrom("abidmore.auction@gmail.com");

        //email body
        $message = '<html><body>';
        $message .= '<h3 style="color:#294461;font-size:20px"><b>Dear</b> ' . $user_fname . ',</h3>';
        if ($purpose === "start_bid") {
            // main user will be the person who has just created the bid.
            if($receiver == "seller"){
                $message .= '<p style="color:black;font-size:18px;">One auctioner has just created new a bid for your item, named '. $item_name . ', at a price of &pound;' . $bid_price .'.</p>';
            }else{
                $message .= $receiver == "main_user" ? '<p style="color:black;font-size:18px;">You have successfully started your bid for ' . $item_name . ' at a price of &pound;' . $bid_price . '.</p>' :
                    '<p style="color:black;font-size:18px;">New bid has been created for ' . $item_name . ' by another auctioner. Please feel free to update your bid price to grab a change to become the winner!</p>';
            }
        } else {
            //end bid: main user is the winner.
            if ($bid_fail === false) {
                // bid success
                if($receiver == "seller"){
                    $message .= '<p style="color:black;font-size:18px;">Congratulations!, your item, named '. $item_name . ', are successfully sold to ' . $winner . ' at a price of &pound;' . $bid_price .'. We recommend contacting your customer and delivering the bidded item to his/her as soon as possible to keep your customer happy.</p>';
                }else{
                    $message .= $receiver == "main_user" ? '<p style="color:black;font-size:18px;">Congratulations!, you are the winner of the auction for ' . $item_name . ' at a highest price of &pound;' . $bid_price . '. The seller will contact you shortly.</p>' :
                        '<p style="color:black;font-size:18px;">We regret to inform you that your bid for ' . $item_name . ' at a price of &pound;' . $bid_price . ' is unsuccessful. 
                    However, we have many ongoing and upcoming bids which you can potentially become the winner. So stay tuned for your next auction!</p>';
                }
            } else {
                // bid_fail due to the price < reserve price
                if($receiver == "seller"){
                    $message .= '<p style="color:black;font-size:18px;">We regret to inform you that you item, named ' . $item_name . ", is not successully sold to any auctioners because the highest bid price doesn't reach the your item's reserved price. We strongly recommend creating a new auction in the near future or reducing the reserved price.</p>";
                }else{
                    $message .= '<p style="color:black;font-size:18px;">We regret to inform you that the auction for ' . $item_name . " has been declined by the seller because the highest bid price doesn't reach the seller's reserved price.</p>";
                }
            }
        }
        $message .= '<br>';
        $message .= '<p style="color:black;font-size:18px;"></b>Best Regards,</b></p>';
        $message .= '<p style="color:black;font-size:18px;">aBidMore Auction Team</p>';
        $message .= '</body></html>';

        $mail->isHTML(true);  
        $mail->Body = $message;
        // echo $receiver;
        // echo $message;
        //add recipient
        $mail->addAddress($email);
        //finally send email
        if ($mail->send()) {
            echo "--Email Sent--";
        } else {
            echo "Error!!!";
        }
        //closing smtp connection
        $mail->smtpClose();
    }

    ?>

</body>

</html>