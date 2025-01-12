<?php

session_start();
include ('admin/includes/conn.php');
header('location: index.php');
exit();
$secret_key = "6LexbeAZAAAAAAE04KgQqr2EJ3im3y7azwUCTbyd";
$response_key = $_POST['g-recaptcha-response'];
$userIP = $_SERVER['REMOTE_ADDR'];

$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => "https://www.google.com/recaptcha/api/siteverify",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "secret=$secret_key&response=$response_key&remoteip=$userIP",
  CURLOPT_HTTPHEADER => array(
    "Content-Type: application/x-www-form-urlencoded"
  ),
));
$response = curl_exec($curl);

curl_close($curl);
$respon = json_decode($response, true);
if($respon['success'] === false){ 
    $_SESSION['mail_fail'] = 'You\'re a robot';
    header("location: index.php");
    exit();
}elseif($respon['success'] === true){
    

$qry_email = "select * from setting";
$res_email = mysqli_query($con, $qry_email);
$row_email = mysqli_fetch_array($res_email);
$admin_email = $row_email['email'];

$fname = mysqli_real_escape_string($con, $_POST['fname']);
$lname = mysqli_real_escape_string($con, $_POST['lname']);
$email = mysqli_real_escape_string($con, $_POST['email']);
$mobile = mysqli_real_escape_string($con, $_POST['mobile']);
$subject = mysqli_real_escape_string($con, $_POST['subject']);
$message1 = mysqli_real_escape_string($con, $_POST['message']);
//exit();

if (($fname != '' ) && ($lname != '' ) && ($email != '' ) && ($mobile != '') && ($subject != '') && ($message1 != '')) {

    $to = $admin_email;
    $subject = $subject;

    $message = '<br>Name: ' . '<strong>' . $fname . ' ' . $lname . '</strong>' .
            '<br>Email: ' . '<strong>' . $email . '</strong>' .
            '<br>Mobile: ' . '<strong>' . $mobile . '</strong>' . 
                '<br>Subject: ' . '<strong>' . $subject . '</strong>' . '
                
<br>------------------------
<br><strong>Message: </strong><br>' . $message1 . '' . '

<br>------------------------
 
';


    $headers = 'From:' . $fname. ''. $lname . '<info@disseminare.com>' . "\r\n" // Set from headers
            . "MIME-Version: 1.0" . "\r\n"
            . "Content-type:text/html;charset=UTF-8" . "\r\n"
    ;

    if (mail($to, $subject, $message, $headers)) {
        $_SESSION['mail_succ'] = 'Your message has been sent successfully.';
        header('Location:' . $base_url . 'index.php');
    } else {
        $_SESSION['mail_fail'] = 'Sorry, error occured this time sending your message.';
        header('Location:' . $base_url . 'index.php');
    }
} else {
    $_SESSION['mail_fail'] = 'Form is not filled up properly.';
    header('Location:' . $base_url . 'index.php');
}
}else{
    $_SESSION['mail_fail'] = 'You\'re a robot';
    header("location: index.php");
    exit();
}