<?php
ob_start();
session_start();
include_once ('admin/includes/conn.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

$mail = new PHPMailer(true);

if(isset($_POST["submitHomePage"])){
    $recipient_email = 'mehedi0014@gmail.com'; // recipient mail

    $sender_name = $_POST["fname"];
    $sender_name_l = $_POST["lname"];
    $sender_email = $_POST["email"];
    $mobile = $_POST["mobile"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];
    
    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                       //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'auraofoffice@gmail.com';               //SMTP username
        $mail->Password   = 'vtdd hilm ukrq yiit';                  //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom($sender_email, $sender_name);
        $mail->addReplyTo($sender_email, $sender_name);
        $mail->addAddress($recipient_email);                        //Add a recipient

        //Content
        $mail->isHTML(true);                                        //Set email format to HTML
        $mail->Subject = 'Email from disseminare.com - Home page';
        $mail->Body =   "First Name: $sender_name<br>".
                        "Last Name: $sender_name_l<br>".
                        "Email: $sender_email<br>".
                        "Phone Number: $mobile<br>".
                        "Subject: $subject<br>".
                        "Message: $message";        

        $mail->send();
        $_SESSION['message_success'] = 'Message has been sent';

        header("Location: $base_url");
        exit();

    } catch (Exception $e) {
        $_SESSION['message_success'] = "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}



if(isset($_POST["submitContactUsPage"])){
    $recipient_email = 'mehedi0014@gmail.com'; // recipient mail

    $name = $_POST["name"];
    $email = $_POST["email"];
    $mobile = $_POST["mobile"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];
    
    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                       //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'auraofoffice@gmail.com';               //SMTP username
        $mail->Password   = 'vtdd hilm ukrq yiit';                  //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom($email, $name);
        $mail->addReplyTo($email, $name);
        $mail->addAddress($recipient_email);                        //Add a recipient

        //Content
        $mail->isHTML(true);                                        //Set email format to HTML
        $mail->Subject = 'Email from disseminare.com - Contact Us page';
        $mail->Body =   "Name: $name<br>".
                        "Email: $email<br>".
                        "Phone Number: $mobile<br>".
                        "Subject: $subject<br>".
                        "Message: $message";       

        $mail->send();
        $_SESSION['message_success'] = 'Message has been sent';

        header("Location: {$base_url}contact-us.php");
        exit();

    } catch (Exception $e) {
        $_SESSION['message_success'] = "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}

ob_end_flush();
?>
