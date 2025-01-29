<?php
session_start();
include_once ('admin/includes/conn.php');
require 'PHPMailer/PHPMailerAutoload.php';


if(isset($_POST["submitHomePage"])){

    $recipient_email='mehedi0014@gmail.com'; // J mail e sms asbe

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

    if (!$mail->send()) {
        $_SESSION['message_failed'] = 'Message could not be sent. Mailer Error: ' . $mail->ErrorInfo;
    } else {
        $_SESSION['message_success'] = 'Message has been sent';
    }

    
    // Redirect to the same page to show the message
    // header("Location: " . $_SERVER['PHP_SELF']);
    header("Location: $base_url");
    exit();
}


if(isset($_POST["submitContactUsPage"])){

    $recipient_email='mehedi0014@gmail.com'; // J mail e sms asbe

    $name = $_POST["name"];
    $email = $_POST["email"];
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

    $mail->setFrom($email,$name);
    $mail->addReplyTo($email,$name);

    $mail->addAddress($recipient_email);
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    $mail->isHTML(true);
    
    $mail->Subject = 'Email from disseminare Contact Us page';

    $mail->Body =   "Name: $name<br>".
                    "Email: $email<br>".
                    "Phone Number: $mobile<br>".
                    "Subject: $subject<br>".
                    "Message: $message";

    if (!$mail->send()) {
        $_SESSION['message_failed'] = 'Message could not be sent. Mailer Error: ' . $mail->ErrorInfo;
    } else {
        $_SESSION['message_success'] = 'Message has been sent';
    }

    
    // Redirect to the same page to show the message
    // header("Location: " . $_SERVER['PHP_SELF']);
    header("Location: {$base_url}contact-us.php");
    exit();
}


if(isset($_POST["submitClassroomTrainingPage"])){

    $recipient_email='mehedi0014@gmail.com'; // J mail e sms asbe

    $training = $_POST["training"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];


    $mail = new PHPMailer;

    $mail->isSMTP();                                   // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';                    // Specify main and backup SMTP servers, no need to change it if you use gmail as a Username
    $mail->SMTPAuth = true;                            // Enable SMTP authentication
    $mail->Username = 'auraofoffice@gmail.com';        // J mail er maddome mail jabe o google server a connect hobo
    $mail->Password = 'vtdd hilm ukrq yiit'; 		   // server mail er password
    $mail->SMTPSecure = 'tls';                         // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                 // TCP port to connect to

    $mail->setFrom($email,$name);
    $mail->addReplyTo($email,$name);

    $mail->addAddress($recipient_email);
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    $mail->isHTML(true);
    
    $mail->Subject = 'Email from disseminare - Classroom Training page';

    $mail->Body =   "Training: $training<br>".
                    "Name: $name<br>".
                    "Email: $email<br>".
                    "Message: $message";

    /* if (!$mail->send()) {
        $_SESSION['message_failed'] = 'Message could not be sent. Mailer Error: ' . $mail->ErrorInfo;
    } else {
        $_SESSION['message_success'] = 'Message has been sent';
    } */

    
    // Redirect to the same page to show the message
    // header("Location: " . $_SERVER['PHP_SELF']);
    header("Location: {$base_url}training.php");
    exit();
}


if( isset($_POST['submitCareerPage']) ) {

    $recipient_email='mehedi0014@gmail.com'; // J mail e sms asbe

    $name = $_POST["name"];
    $email = $_POST["email"];
    $mobile = $_POST["mobile"];
    $qualification = $_POST["qualification"];
    $jobexp = $_POST["jobexp"];
    $langp = $_POST["langp"];
    $message = $_POST["message"];
    $jobindex = $_POST["jobindex"];


    
    $mail = new PHPMailer;

    $mail->isSMTP();                                   // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';                    // Specify main and backup SMTP servers, no need to change it if you use gmail as a Username
    $mail->SMTPAuth = true;                            // Enable SMTP authentication
    $mail->Username = 'auraofoffice@gmail.com';        // J mail er maddome mail jabe o google server a connect hobo
    $mail->Password = 'vtdd hilm ukrq yiit'; 		   // server mail er password
    $mail->SMTPSecure = 'tls';                         // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                 // TCP port to connect to

    $mail->setFrom($email,$name);
    $mail->addReplyTo($email,$name);

    $mail->addAddress($recipient_email);
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    $mail->isHTML(true);
    
    $mail->Subject = 'Email from disseminare Career page';

    $mail->Body =   "Name: $name<br>".
                    "Email: $email<br>".
                    "Phone Number: $mobile<br>".
                    "Qualification: $qualification<br>".
                    "Job experience: $jobexp<br>".
                    "Language proficiency: $langp<br>".
                    "Message: $message";
                    "Job Index: $jobindex";


    // **Handle file upload and attach it**
    if (isset($_FILES['file']) && $_FILES['file']['error'] == UPLOAD_ERR_OK) {
        $uploadfile = $_FILES['file']['tmp_name'];
        $filename = $_FILES['file']['name'];
        
        // Attach file
        $mail->addAttachment($uploadfile, $filename);
    }

    if (!$mail->send()) {
        $_SESSION['message_failed'] = 'Message could not be sent. Mailer Error: ' . $mail->ErrorInfo;
    } else {
        $_SESSION['message_success'] = 'Message has been sent';
    }

    
    // Redirect to the same page to show the message
    // header("Location: " . $_SERVER['PHP_SELF']);
    header("Location: {$base_url}career.php");
    exit();
}
?>
