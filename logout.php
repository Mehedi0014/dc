<?php

session_start();
include('admin/includes/conn.php');
$lastLogin = date('Y-m-d H:s:i');
$user = $_SESSION['cust_id'];
$qry_lastLogin = "update customer_registration set last_login = '$lastLogin' where id = '$user'";
$res_lastLogin = mysqli_query($con, $qry_lastLogin);


session_destroy();
header('Location:' . $base_url . 'index.php');