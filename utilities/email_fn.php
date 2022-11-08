<?php
//include required phpmailer files
require 'includes/PHPMailer.php';
require 'includes/SMTP.php';
require 'includes/Exception.php';

//define name spaces
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function sendEmail($subject, $email, $item_info, $purpose)
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
    $mail->Subject = $subject;
    //set sender email
    $mail->setFrom("atima.thong@gmail.com");
    //email body
    $mail->Body = '<html><body>';
    $mail->Body .= '<h3 style="color:#f40;">Dear Auctioner,</h3>';
    $mail->Body .= $purpose == "start_bid"? '<p style="color:#080;font-size:18px;">You have successfully start your bid on'. $item_info['item_name'] . '.</p>': 
    '<p style="color:#080;font-size:18px;">'.$item_info['item_name']. '</p>';
    $mail->Body .= '<br>';
    $mail->Body .= '<p style="color:#080;font-size:18px;">Best Regards,</p>';
    $mail->Body .= '<p style="color:#080;font-size:18px;">Customer Support Team</p>';
    $mail->Body .='</body></html>';
    //add recipient
    $mail->addAddress($email);
    //finally send email
    if ($mail->Send()) {
        echo "--Email Sent--!";
    } else {
        echo "Error..!";
    }
    //closing smtp connection
    $mail->smtpClose();
}
