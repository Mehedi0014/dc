<?php

error_reporting(E_ALL);
ob_start();
session_start();
include("includes/conn.php");

$user_name = mysqli_real_escape_string($con, $_POST['user_name']);

$newpass = md5(mysqli_real_escape_string($con, $_POST['pwd']));
$pass = $newpass;

$sql = "SELECT * FROM `setting` WHERE user_login='$user_name' AND user_pass='$pass'";
$res = mysqli_query($con, $sql) or trigger_error("Query Failed! SQL: $sql - Error: " . mysqli_error(), E_USER_ERROR);
$chk = mysqli_num_rows($res);
$row = mysqli_fetch_array($res);
//exit();

//$sql1 = "SELECT * FROM `department` WHERE email='$user_name' AND password='$pass'";
////exit();
//$res1 = mysqli_query($con, $sql1) or trigger_error("Query Failed! SQL: $sql1 - Error: " . mysqli_error(), E_USER_ERROR);
//$chk1 = mysqli_num_rows($res1);
//$row1 = mysqli_fetch_array($res1);

/**
 * Authenticating user and admin separeately with session
 */
$cid = $row['id'];
$status = $row['status'];
$email = $row['email'];

//$cid1 = $row1['id'];

if ($chk > 0) {
    $_SESSION['username'] = $user_name;
    $_SESSION['id'] = $cid;
    $_SESSION['admin_ststus'] = $status;
    $_SESSION['admin_email'] = $email;
    $_SESSION['user_role'] = 0;
    header("Location: dashboard.php");
} 
//else if ($chk1 > 0) {
//    $_SESSION['username'] = $user_name;
//    $_SESSION['id'] = $cid1;
//    $_SESSION['user_role'] = 1;
//    header("Location: dashboard.php");
//} 
else {
    header("Location:index.php?log_in=false");
}
ob_end_flush();
