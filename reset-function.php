<?php

include('admin/includes/conn.php');
session_start();

$email = $_POST['user'];
$hash = $_POST['hash'];
$password = $_POST['password'];
$re_password = $_POST['re_password'];
if ($password != $re_password) {
    $_SESSION['error-pass-forgot'] = 'Re Entered Wrong Password';
    //goto_location('reset.php?email=' . $email . '&hash=' . $hash);

    header("Location: reset.php?email=" . $email . "&hash=" . $hash . '&?result=error-pass-forgot');
} else {

    $qry_chk = "SELECT * from customer_registration where `email`='$email' and hash ='$hash' and status = '0'";
    $res_chk = mysqli_query($con, $qry_chk);
    $num_chk = mysqli_num_rows($res_chk);

    if ($num_chk > 0) {


        $md5_pass = md5($password);

        $qry1 = "update customer_registration set password = '$md5_pass', hash = '' "
                . "where email = '$email'";
        $res_qry = mysqli_query($con, $qry1);
        //$_SESSION['succ-pass-reset'] = 'Password is reset. Please Login';

        header("Location: login.php?result=passreset_success");
        //goto_location('login-register.php');
    } else {

        header("Location: login.php?result=passreset_error");
    }
}