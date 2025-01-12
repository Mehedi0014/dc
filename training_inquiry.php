<?php

session_start();
include ('admin/includes/conn.php');
header('location: training.php');
exit();
$qry_email = "select * from setting";
$res_email = mysqli_query($con, $qry_email);
$row_email = mysqli_fetch_array($res_email);
$admin_email = $row_email['email'];

$name = mysqli_real_escape_string($con, $_POST['name']);
$training = mysqli_real_escape_string($con, $_POST['training']);
$email = mysqli_real_escape_string($con, $_POST['email']);
$message1 = mysqli_real_escape_string($con, $_POST['message']);
//exit();

if (($name != '' ) && ($email != '' ) && ($training != '') && ($message1 != '')) {


    $to = $admin_email;
    $subject = 'Training Query From ' . $name . ' on ' .$training ;

    $message = '<br>Name: ' . '<strong>' . $name . '</strong>' .
            '<br>Training: ' . '<strong>' . $training . '</strong>' .
            '<br>Email: ' . '<strong>' . $email . '</strong>' .'
                
<br>------------------------
<br><strong>Message: </strong><br>' . $message1 . '' . '

<br>------------------------
 
';


            $headers = 'From:' . $name . ' <info@disseminare>' . "\r\n" // Set from headers
                    . "MIME-Version: 1.0" . "\r\n"
                    . "Content-type:text/html;charset=UTF-8" . "\r\n"
            ;

//    $headers = 'From: CABCON' . "\r\n" // Set from headers
//            . "MIME-Version: 1.0" . "\r\n"
//            . "Content-type:text/html;charset=UTF-8" . "\r\n"
//    ;


    if (mail($to, $subject, $message, $headers)) {
        $_SESSION['mail_succ'] = 'Your message has been sent successfully.';
        header('Location:' . $base_url . 'training.php');
    } else {
        $_SESSION['mail_fail'] = 'Sorry, error occured this time sending your message.';
        header('Location:' . $base_url . 'training.php');
    }
} else {
    $_SESSION['mail_fail'] = 'Form is not filled up properly.';
    header('Location:' . $base_url . 'training.php');
}