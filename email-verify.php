<?php

session_start();
include('admin/includes/conn.php');
include_once("emailverification.php");

	function redirect() {
		header('Location:' . $base_url . 'registration.php');
		exit();
	}

	if (!isset($_GET['email']) || !isset($_GET['token'])) {
		redirect();
	} else {

        $email = mysqli_real_escape_string($con, $_GET['email']);
        $email = strip_tags($email);
        $email = htmlspecialchars($email);
        
        $token = mysqli_real_escape_string($con, $_GET['token']);
        $token = strip_tags($token);
        $token = htmlspecialchars($token);

        $qry_update_uinfo = "SELECT * from `customer_registration` WHERE email = '$email' AND token = '$token' AND hash = '$token' AND validation = 0";
        $res_update_uinfo = mysqli_query($con, $qry_update_uinfo);
        $row_count_uinfo = mysqli_num_rows($res_update_uinfo);
		if ($row_count_uinfo === 0) {
		    redirect();
		} else{
		    $token1 = genHash(12);
		    $token2 = genHash(10);
		    $resID = mysqli_fetch_assoc($res_update_uinfo);
		    $id = $resID['id'];
		    
            $qry_user_valid = "UPDATE `customer_registration` SET `validation`='852', `hash`='$token2',`token`='$token1' WHERE email = '$email' AND id = '$id'";
            // $qry_user_valid = "UPDATE `customer_registration` SET `validation`= '852',`token`='$token2', `hash` = $token1 WHERE email = '$email' AND id = '$id'";
            $res_user_valid = mysqli_query($con, $qry_user_valid);
            header('Location:' . $base_url . 'login.php?result=email_verified23');
            
		}

	}
?>