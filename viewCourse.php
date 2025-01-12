<?php 

session_start();
include_once("admin/includes/conn.php");
require_once("e-learningCoursesfunctionalities.php");
    if (isset($_SESSION['cust_user'])) {
        $customer = $_SESSION['cust_id'];
        $course = trim($_GET['crs']);
        
        $qry_usr_cren = "SELECT * FROM `customer_registration` WHERE id = '$customer'";
        $res_usr_cren = mysqli_query($con, $qry_usr_cren);

        $row_usr_cren = mysqli_fetch_assoc($res_usr_cren);
        
        $tlntid = $row_usr_cren['tlntid'];
        
        $url = "https://disseminare.talentlms.com/api/v1/gotocourse/user_id:$tlntid,course_id:$course,course_completed_redirect:disseminare.com,logout_redirect:disseminare.com";
                $request = "GET";
                $getResponse = new APIFunctionalities();

                $response = $getResponse->setupCurlConnection($url, $request);
                $response = json_decode($response, true);

                header("Location: ".$response['goto_url']);

    }else { 
        header ("Location: login.php");
    }
?>