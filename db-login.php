<?php

ob_start();
session_start();
include('admin/includes/conn.php');


                            // print_r($_SESSION["shopping_cart"]);
                            // echo '</pre>';
              
/*
 * Check user already exist
 */

$email = mysqli_real_escape_string($con, $_POST['email']);
$password = mysqli_real_escape_string($con, $_POST['password']);
//$hash_password = md5($password);
if (isset($_POST) && !empty($email) && !empty($password)) {

    /*
     * Get activation result
     */
    $sql_actv = "SELECT count(*) AS count FROM `customer_registration` WHERE `email` = '$email' and `status` = '0'";
    $res_actv = mysqli_query($con, $sql_actv);
    $count = mysqli_fetch_row($res_actv);
    $count = $count[0];
    $md5_pass = md5($password);
    $sql_check = "SELECT `id`,`email`,`password`,`user_type`,`first_name`, `last_name`, `validation` FROM `customer_registration` WHERE `email` = '$email' and `password` = '$md5_pass'";
    $check_res = mysqli_query($con, $sql_check);
    $row = mysqli_fetch_assoc($check_res);
    $p = $row['password'];
    $u = $row['email'];
    $validate = $row['validation'];
    $user_type = $row['user_type'];
    $cust_id = $row['id'];
    //if($count){
    if ($check_res) {
        if (($p == $md5_pass) && ($u == $email)) {
            if($validate == 852){
                $_SESSION['cust_user'] = $u;
                $_SESSION['cust_id'] = $cust_id;
                $_SESSION['cust_name'] = $row['first_name']." ".$row['last_name'];
                
                // if ($_SESSION["shopping_cart"] !==0){
                //     header('Location:' . $base_url . 'buy_course.php');
                // }
                if(!empty($_SESSION["shopping_cart"])){
                    header('Location:' . $base_url . 'buy_course.php#cart_list');
                }
                else{
                    header('Location:' . $base_url . 'e-learning_courses.php');
                }
            }else{
                header('Location:' . $base_url . 'login.php?result=email_verified');
            }
            
            
            // ($user_type === '1' ) ? header('Location:' . $base_url . 'UserDashboard.php') : header('Location:' . $base_url . 'e-learning_courses.php');
            // ($_SESSION["shopping_cart"] === 'True' ) ? header('Location:' . $base_url . 'e-learning_courses.php') : header('Location:' . $base_url . 'buy_course.php');
            // ($_SESSION["shopping_cart"] === 'True' ) ? header('Location:' . $base_url . 'buy_course.php') : header('Location:' . $base_url . 'e-learning_courses.php');
            
        } else {
            header('Location:' . $base_url . 'registration.php?result=login_error');
        }
    } else {
        // header('Location:' . $base_url . 'registration.php?result=login_error_register');
        header('Location:' . $base_url . 'registration.php?result=verify_email');
        echo 'Please varify your email';
    }

}
ob_end_flush();