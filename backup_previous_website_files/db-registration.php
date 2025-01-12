<?php

session_start();
include('admin/includes/conn.php');


//  print "<pre>";
//  print_r($_POST);
//  print_r($_FILES);
//  print "</pre>";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $errors = array();
    $name = mysqli_real_escape_string($con, $_POST['name']);

    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);

    $address = mysqli_real_escape_string($con, $_POST['address']);

    $password = mysqli_real_escape_string($con, $_POST['password']);
    $re_password = mysqli_real_escape_string($con, $_POST['re_password']);
    //$user_type = mysqli_real_escape_string($con, $_POST['userType']);
    $user_type = 2;


    $date = date($only_date);

    $fulldate = date('Y-m-d H:i:s');

//POST error validation


    if ($name == '') {
        $errors[] = "Please type your Name.";
    }

    if ($email == '') {
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
//print_r($file_name);
//print_r($errors);
//exit();

    if (empty($errors)) {

        /*
         * Check if student already registerd with email address
         */

        $sql_check = "SELECT count(*) AS count FROM `customer_registration` WHERE `email` = '$email' and status = '0'";
        $check_res = mysqli_query($con, $sql_check);
        $count = mysqli_fetch_assoc($check_res);
        $count = $count['count'];

        $md5_password = md5($password);


        $sql_cust = "INSERT INTO `customer_registration` (`id`, `name`, `phone`, `email`, `address`, `password`, `user_type`,`status`,"
                . "`date_registration`,`last_login`,`hash`) "
                . "VALUES ('', '$name', '$phone', '$email', '$address', '$md5_password',$user_type,"
                . " '0', '$date', '','')";



        if ($count == 0) {

            $res = mysqli_query($con, $sql_cust);
            
            
            $qryGetuser = "select max(id) lastid from `customer_registration` where email='$email'";
            $resGetuser = mysqli_query($con, $qryGetuser);
            $rowGetuser = mysqli_fetch_array($resGetuser);
            $lastid = $rowGetuser['lastid'];
            
            $sql_usertype = "INSERT INTO `user_folder` "
                    . "(`id`, `userid`, `folderid`, `added_on`, `modified_on`) "
                . "VALUES ('', '$lastid', '0', '$fulldate', '$fulldate')";
            
            $res_usertype = mysqli_query($con, $sql_usertype);
            

            if ($res) {
                $activation_status = send_mail_user($email, $name);
                //}

                if ($activation_status && $res) {

                    // $activation_status = send_mail_user($email, $unique_id, $name);
                    header("Location:" . $base_url . "registration.php?result=customer_registration_success");
                }
            }
        } else {
            header("Location:" . $base_url . "registration.php?result=error_registration");
        }
    } else {

        header("Location:" . $base_url . "registration.php?result=customer_data_submit_error");
    }
}



/*
 * send activation link to user mail 
 */

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
