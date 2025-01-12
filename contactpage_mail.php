<?php

session_start();
include ('admin/includes/conn.php');
$_SESSION['mail_succ'] = 'Your message has been sent successfully.';
header('Location:' . $base_url . 'contact-us.php');
exit();
$qry_email = "select * from setting";
$res_email = mysqli_query($con, $qry_email);
$row_email = mysqli_fetch_array($res_email);
$admin_email = $row_email['email'];

$name = mysqli_real_escape_string($con, $_POST['name']);
$email = mysqli_real_escape_string($con, $_POST['email']);
$mobile = mysqli_real_escape_string($con, $_POST['mobile']);
$subject = mysqli_real_escape_string($con, $_POST['subject']);
$message1 = mysqli_real_escape_string($con, $_POST['message']);
//exit();

if (($name != '' ) && ($email != '' ) && ($mobile != '') && ($subject != '') && ($message1 != '')) {

//    $response = $_POST["g-recaptcha-response"];
//    
//    $url = 'https://www.google.com/recaptcha/api/siteverify';
//    $data = array(
//        'secret' => '6LfrxnYUAAAAAOGQ2u89EMNKZjvSDFtzBjGtM5te',
//        'response' => $_POST["g-recaptcha-response"]
//    );
//    $options = array(
//        'http' => array(
//            'method' => 'POST',
//            'content' => http_build_query($data)
//        )
//    );
//    $context = stream_context_create($options);
//
//    $verify = file_get_contents($url, false, $context);
//    $captcha_success = json_decode($verify);
//    if ($captcha_success->success == false) {
//
//        $_SESSION['mail_fail'] = 'Captcha Error.';
//        header('Location:' . $base_url . 'contact-us.php');
//    } else {

        $to = $admin_email;
        $subject = $subject;

        $message = '<br>Name: ' . '<strong>' . $name . '</strong>' .
                '<br>Email: ' . '<strong>' . $email . '</strong>' .
                '<br>Mobile: ' . '<strong>' . $mobile . '</strong>' .
                '<br>Subject: ' . '<strong>' . $subject . '</strong>' . '
                
<br>------------------------
<br><strong>Message: </strong><br>' . $message1 . '' . '

<br>------------------------
 
';


        $headers = 'From:' . $name . '<info@disseminare.com>' . "\r\n" // Set from headers
                . "MIME-Version: 1.0" . "\r\n"
                . "Content-type:text/html;charset=UTF-8" . "\r\n"
        ;

        if (mail($to, $subject, $message, $headers)) {
            $_SESSION['mail_succ'] = 'Your message has been sent successfully.';
            header('Location:' . $base_url . 'contact-us.php');
        } else {
            $_SESSION['mail_fail'] = 'Sorry, error occured this time sending your message.';
            header('Location:' . $base_url . 'contact-us.php');
        }
    //}
} else {
    $_SESSION['mail_fail'] = 'Form is not filled up properly.';
    header('Location:' . $base_url . 'contact-us.php');
}