<?php

session_start();
include('admin/includes/conn.php');
/*
 * Check user already exist
 */

$email = mysqli_real_escape_string($con, $_POST['email']);
$password = mysqli_real_escape_string($con, $_POST['password']);
//$hash_password = md5($password);
if (isset($_POST) && $email != '' && $password != '') {

    /*
     * Get activation result
     */
    $sql_actv = "SELECT count(*) AS count FROM `customer_registration` WHERE `email` = '$email' and `status` = '0'";
    $res_actv = mysqli_query($con, $sql_actv);
    $count = mysqli_fetch_row($res_actv);
    $count = $count[0];
    $md5_pass = md5($password);
    $sql_check = "SELECT `id`,`email`,`password`,`user_type`,`name` FROM `customer_registration` WHERE `email` = '$email' and `password` = '$md5_pass'";
    $check_res = mysqli_query($con, $sql_check);
    $row = mysqli_fetch_assoc($check_res);
    $p = $row['password'];
    $u = $row['email'];
    $user_type = $row['user_type'];
    $cust_id = $row['id'];
    //if($count){
    if ($check_res) {
        if (($p == $md5_pass) && ($u == $email)) {
            $_SESSION['cust_user'] = $u;
            $_SESSION['cust_id'] = $cust_id;
            $_SESSION['cust_name'] = $row['name'];
            
            ($user_type === '1' ) ? header('Location:' . $base_url . 'UserDashboard.php') : header('Location:' . $base_url . 'all_courses.php');
            
        } else {
            header('Location:' . $base_url . 'registration.php?result=login_error');
        }
    } else {
        header('Location:' . $base_url . 'registration.php?result=login_error_register');
    }

}