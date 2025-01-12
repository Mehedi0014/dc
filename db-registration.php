<?php

session_start();
include('admin/includes/conn.php');
// include_once("emailverification.php");
// use PHPMailer\PHPMailer\PHPMailer;


// var_dump($_POST);
// exit();

//  print "<pre>";
//  print_r($_POST);
//  print_r($_FILES);
//  print "</pre>";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
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
        $_SESSION['post_data'] = $_POST; 
        header("location: registration.php?result=error_capcha");
        exit();
    }
    
    $errors = array();
    $first_name = mysqli_real_escape_string($con, $_POST['first_name']);
    $first_name = strip_tags($first_name);
    $first_name = htmlspecialchars($first_name);
    $first_name = filter_var($first_name, FILTER_SANITIZE_STRING);
   
    
    $last_name = mysqli_real_escape_string($con, $_POST['last_name']);
    $last_name = strip_tags($last_name);
    $last_name = htmlspecialchars($last_name);
    $last_name = filter_var($last_name, FILTER_SANITIZE_STRING);

    $email = mysqli_real_escape_string($con, $_POST['email']);
    $email = strip_tags($email);
    $email = htmlspecialchars($email);
    
    $phone = mysqli_real_escape_string($con, $_POST['phone']);

    $address = mysqli_real_escape_string($con, $_POST['address']);
    $address = strip_tags($address);
    $address = htmlspecialchars($address);

    $password = mysqli_real_escape_string($con, $_POST['password']);
    $password = strip_tags($password);
    $password = htmlspecialchars($password);
    $re_password = mysqli_real_escape_string($con, $_POST['re_password']);
    $re_password = strip_tags($re_password);
    $re_password = htmlspecialchars($re_password);
    $user_type = 2;


    $date = date($only_date);

    $fulldate = date('Y-m-d H:i:s');

//POST error validation


    if ($first_name == '' || strlen($first_name) > 20) {
        $errors[] = "Please type your First Name.";
    }
    
    // $f_name = preg_match("/[a-zA-Z]+/",$first_name);
    // var_dump($f_name);
    // exit();
    if ($last_name == '' || strlen($last_name) > 20) {
        $errors[] = "Please type your Last Name.";
    }

    if ($email == ''  || strlen($email) > 50) {
        $error[] = "Please type your Email.";
    }
//    if ($phone == '') {
//        $errors[] = "Please enter Phone Number.";
//    }
//    if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
//        $errors[] = "Please specify a valid email";
//    }
    if ($phone != '') {
        if (strlen($phone) != 10 && filter_var($phone, FILTER_VALIDATE_INT) === false) {
            $errors[] = "Invalid phone number.";
        }
    }

//    if ($address == '') {
//        $errors_chk[] = "Please enter Address.";
//    }


    if ($password == '') {
        $errors_chk[] = "Password is not entered correctly.";
    }
    if ($re_password == '') {
        $errors_chk[] = "Password is not entered correctly.";
    }

    if ($re_password != $password) {
        $errors[] = "Rewritten password is wrong.";
    }


    $_SESSION['error'] = $errors;


    if (empty($errors)) {

        /*
         * Check if student already registerd with email address
         */

        $sql_check = "SELECT count(*) AS count FROM `customer_registration` WHERE `email` = '$email' and status = '0'";
        $check_res = mysqli_query($con, $sql_check);
        $count = mysqli_fetch_assoc($check_res);
        $count = $count['count'];
        
        // var_dump($count);
        // exit();
        

        if ($count == 0) {
    
            $md5_password = md5($password);
            // var_dump($md5_password);
            
            
            
            $hash = genHash(20);
            
            // var_dump($hash);
            // exit();
            
            $sql_cust = "INSERT INTO `customer_registration` (`id`, `first_name`,`last_name`, `phone`, `email`, `address`, `password`, `user_type`,`status`,"
                    . "`date_registration`,`last_login`,`hash`,`token`) "
                    . "VALUES ('', '$first_name','$last_name', '$phone', '$email', '$address', '$md5_password', $user_type,"
                    . " '0', '$fulldate', '','$hash','$hash')";
            $res = mysqli_query($con, $sql_cust);
   
            
            $qryGetuser = "select max(id) lastid from `customer_registration` where email='$email'";
            $resGetuser = mysqli_query($con, $qryGetuser);
            $rowGetuser = mysqli_fetch_array($resGetuser);
            $lastid = $rowGetuser['lastid'];
            
            $sql_usertype = "INSERT INTO `user_folder` "
                    . "(`id`, `userid`, `folderid`, `added_on`, `modified_on`) "
                . "VALUES ('', '$lastid', '0', '$fulldate', '$fulldate')";
            
            $res_usertype = mysqli_query($con, $sql_usertype);
            
            $name = $first_name." ".$last_name;

            if ($res) { 
                
                $status = emailSend($first_name, $email, $hash, $con);
                

                if ($status)
                {
                    $msg = "You have been registered! Please verify your email!";
                    header("Location:" . $base_url . "login.php?result=verifyyouraccount");
                }
                else
                {
                    $msg = "Something wrong happened! Please try again!";
                    header("Location:" . $base_url . "registration.php?result=customer_registration_success");
                }
                
            }
        } else {
            header("Location:" . $base_url . "registration.php?result=error_registration");
        }
    } else {

        header("Location:" . $base_url . "registration.php?result=customer_data_submit_error");
    }
} else {

        header("Location:" . $base_url . "registration.php?result=customer_data_submit_error");
    }



    function genHash($len){
        $char = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
        $charlen = strlen($char);
        $Hash = null;

        for($i= 0;$i<= $len; $i++){
            $ranGen = rand(0, $charlen);
            $Hash .= substr($char, $ranGen, 1);
        }

        return $Hash;
    }

/*
 * send activation link to user mail 
 */
 
 function emailSend($username, $email, $token, $conn = null){
    // $hashLen = 12;
    // $user_hash = genHash($hashLen);
    // $qry_hsh_upd = "UPDATE users set hash='$user_hash', validation='0' WHERE username='$username' and email='$email'";
    // $res_hsh_upd = mysqli_query($conn, $qry_hsh_upd);

    $to = $email;
    $subject = "Verify Disseminare Consulting account for ".$username;
    $message = "Dear <strong> '$username' </strong>
                Please click or copy the link below to verify your email:<br><br>
                
                http://disseminare.com/email-verify.php?email=$email&token=$token<br><br>

                
                Thanks from Disseminare Team.
                
            ";
    // $message = "Dear ".$username.",<br>Thank you for subscribing us. As per security reason, please validate account.<br>".
    // "click this Link = <a href='http://disseminare.com/validate.php?hash=".$user_hash."&email=".$email;

    $header = 'From: support@disseminare.com'."\r\n".
                'MIME-Version: 1.0'. "\r\n".
                'Content-type:text/html;charset=UTF-8'."\r\n";
    
    $status = mail($to, $subject, $message, $header);

    return $status;
}

function send_mail_user($email, $name) {
    $customer_name = $name;

    $qry_em = "SELECT * from settings where id = '1'";
    $res_em = mysqli_query($con, $qry_em);
    $row_em = mysqli_fetch_array($res_em);

    $to = $email . ',' . $row_em['email'];
    $subject = 'New Sign Up in Disseminnare from ' . $customer_name;

    $message = 'Dear, <strong>' . $customer_name . '</strong>' .
            '<br>Thanks for Registering with Disseminnare' .
            '<br>It\'s a automated system generated email. Do not reply to this  email.
            
<br>------------------------
<br>Username: ' . $email . '
<br>------------------------
  ';


    $headers = 'From:' . $customer_name . '(Disseminare) <info@disseminare.com>' . "\r\n"
            . "MIME-Version: 1.0" . "\r\n"
            . "Content-type:text/html;charset=UTF-8" . "\r\n";
    $status = mail($to, $subject, $message, $headers); // Send our email

    return $status;
}

?>