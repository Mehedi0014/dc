<?php
include_once ('admin/includes/conn.php');
require 'PHPMailer/PHPMailerAutoload.php';


if(isset($_POST["submitHomePage"])){

    $recipient_email='mehedi0014@gmail.com';// J mail e sms asbe

    $sender_name = $_POST["fname"];
    $sender_name_l = $_POST["lname"];
    $sender_email = $_POST["email"];
    $mobile = $_POST["mobile"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];


    $mail = new PHPMailer;

    $mail->isSMTP();                                   // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';                    // Specify main and backup SMTP servers, no need to change it if you use gmail as a Username
    $mail->SMTPAuth = true;                            // Enable SMTP authentication
    $mail->Username = 'auraofoffice@gmail.com';        // J mail er maddome mail jabe o google server a connect hobo
    $mail->Password = 'vtdd hilm ukrq yiit'; 		   // server mail er password
    $mail->SMTPSecure = 'tls';                         // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                 // TCP port to connect to

    $mail->setFrom($sender_email,$sender_name);
    $mail->addReplyTo($sender_email,$sender_name);

    $mail->addAddress($recipient_email);
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    $mail->isHTML(true);
    

    $mail->Subject = 'Email from disseminare home page';

    $mail->Body =   "First Name: $sender_name<br>".
                    "Last Name: $sender_name_l<br>".
                    "Email: $sender_email<br>".
                    "Phone Number: $mobile<br>".
                    "Subject: $subject<br>".
                    "Message: $message";



    /* if(!$mail->send()) {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        echo 'Message has been sent';
    } */

    if (!$mail->send()) {
        $_SESSION['message'] = 'Message could not be sent. Mailer Error: ' . $mail->ErrorInfo;
        $_SESSION['msg_type'] = 'danger';
    } else {
        $_SESSION['message'] = 'Message has been sent';
        $_SESSION['msg_type'] = 'success';
    }
    
    // Redirect to the same page to show the message
    // header("Location: " . $_SERVER['PHP_SELF']);
    header("Location: $base_url");
    exit();
    

}
?>
