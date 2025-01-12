<?php 

session_start();

include_once("admin/includes/conn.php");
require_once("e-learningCoursesfunctionalities.php");
 if (isset($_SESSION['cust_user'])) {
    

    $status = $_SESSION['payment_status'];

    $custIDForSave = (isset($_SESSION['cust_id'])) ? $_SESSION['cust_id'] : "";

    if($status === "success"){
        
        if(!empty($custIDForSave)) {
            $query = "SELECT * FROM `user_course_paid` WHERE user_id = '$custIDForSave'";
            $response = mysqli_query($con, $query);
            $row = mysqli_num_rows($response);
            if($row === 0){
                
                $courses = $_SESSION['shopping_cart'];
                $crsString = array();
                $date = date("y-m-d");
                foreach($courses as $k){
                    foreach($k as $k1 => $v){
                        if($k1 == "product_id"){
                            $item = $v;
                            array_push($crsString, $item);
                        }
                    }
                }
                $crsString = json_encode($crsString);
                $qry_upt_use_crs = "INSERT INTO `user_course_paid` (`course_id`, `user_id`, `created_on`) VALUES ('$crsString','$custIDForSave','$date')";
                $response = mysqli_query($con, $qry_upt_use_crs);
                
                // ! select Database information
                $qry_tlnt_sign = "SELECT * from `customer_registration` where id = '$custIDForSave'";
                $res_tlnt_sign = mysqli_query($con, $qry_tlnt_sign);

                $row_tlnt_sign = mysqli_fetch_assoc($res_tlnt_sign);

                $firstname = $row_tlnt_sign['first_name'];
                $lastname = $row_tlnt_sign['last_name'];
                $email = $row_tlnt_sign['email'];
                $login = strtolower($row_tlnt_sign['first_name'].$row_tlnt_sign['last_name']);
                $password = 123456;
                
                
                
                if(empty($lastname)){
                    $expl = explode(" ",$firstname);
                    $firstname = $expl[0];
                    $lastname = $expl[1];
                    $login = strtolower($firstname.$lastname);
                }
                
                // ! Talent LMS UserSignUp
                $url = "https://disseminare.talentlms.com/api/v1/usersignup";
                $request = "POST";
                $fields= array(
                    "first_name"    => $firstname,
                    "last_name"     => $lastname,
                    "email"         => $email,
                    "login"         => $login,
                    "password"      => $password
                );
                $getResponse = new APIFunctionalities();

                $response = $getResponse->setupCurlConnection($url, $request, $fields);
                $response = json_decode($response, true);
                
                
                if(!isset($response['error'])){
                    
                    $tlntid = $response['id'];
                    $qry_upd_user = "UPDATE `customer_registration` SET `tlntid`='$tlntid' WHERE `id` = '$custIDForSave'";
                    mysqli_query($con, $qry_upd_user);
                    
                    $courses = $_SESSION['shopping_cart'];
                    
                    foreach($courses as $k){
                        foreach($k as $k1 => $v){
                            if($k1 == "product_id"){
                                $url = "https://disseminare.talentlms.com/api/v1/addusertocourse";
                                $request = "POST";
                                $fields= array(
                                    "user_id"    => $tlntid,
                                    "course_id"     => $v,
                                    "role"         => 'learner'
                                );
                                $getResponse = new APIFunctionalities();

                                $response = $getResponse->setupCurlConnection($url, $request, $fields);
                                $response = json_decode($response, true);
                            }
                        }
                    }
                    
                }elseif($response['error']['message'] === "A user with the same email address already exists"){
                    
                    $url = "https://disseminare.talentlms.com/api/v1/users/email:$email";
                    $request = "GET";
                    $getResponse = new APIFunctionalities();
                    $response = $getResponse->setupCurlConnection($url, $request);
                    $response = json_decode($response, true);
                    
                    $tlntid = $response['id'];
                    $qry_upd_user = "UPDATE `customer_registration` SET `tlntid`='$tlntid' WHERE `id` = '$custIDForSave'";
                    mysqli_query($con, $qry_upd_user);
                    
                    $courses = $_SESSION['shopping_cart'];
                    
                    foreach($courses as $k){
                        foreach($k as $k1 => $v){
                            if($k1 == "product_id"){
                                $url = "https://disseminare.talentlms.com/api/v1/addusertocourse";
                                $request = "POST";
                                $fields= array(
                                    "user_id"    => $tlntid,
                                    "course_id"     => $v,
                                    "role"         => 'learner'
                                );
                                $getResponse = new APIFunctionalities();

                                $response = $getResponse->setupCurlConnection($url, $request, $fields);
                                $response = json_decode($response, true);
                                
                            }
                        }
                    }
                }
                unset($_SESSION['shopping_cart']);
                unset($_SESSION['payment_status']);
                header("Location:".$base_url."e-learning_courses.php?course=Course has been purchased");
                
            } else {
                $user_fetch = mysqli_fetch_assoc($response);
                // $user_id_for_upd = $user_fetch['id'];
                $prev = $user_fetch['course_id'];
                $decode = json_decode($prev, true);
                $courses = $_SESSION['shopping_cart'];
                $crsString = $decode;
                foreach($courses as $k){
                    foreach($k as $k1 => $v){
                        if($k1 == "product_id"){
                            $item = $v;
                            array_push($crsString, $item);
                        }
                    }
                }
                // $crsString = "1, 2";
                $crsString = json_encode($crsString);
                $qry_upd_course = "UPDATE `user_course_paid` SET course_id = '$crsString' WHERE user_id = '$custIDForSave'";
                $res_upd_course = mysqli_query($con, $qry_upd_course);

                // ! select Database information
                $qry_tlnt_sign = "SELECT * from `customer_registration` where id = '$custIDForSave'";
                $res_tlnt_sign = mysqli_query($con, $qry_tlnt_sign);

                $row_tlnt_sign = mysqli_fetch_assoc($res_tlnt_sign);


                $tlntid = $row_tlnt_sign['tlntid'];
                $courses = $_SESSION['shopping_cart'];
                    
                foreach($courses as $k){
                    foreach($k as $k1 => $v){
                        if($k1 == "product_id"){
                            $url = "https://disseminare.talentlms.com/api/v1/addusertocourse";
                            $request = "POST";
                            $fields= array(
                                "user_id"    => $tlntid,
                                "course_id"     => $v,
                                "role"         => 'learner'
                            );
                            $getResponse = new APIFunctionalities();

                            $response = $getResponse->setupCurlConnection($url, $request, $fields);
                            $response = json_decode($response, true);
                            
                            
                        }
                    }
                }

                unset($_SESSION['shopping_cart']);
                unset($_SESSION['payment_status']);
                header("Location:".$base_url."e-learning_courses.php?course=Course has been purchased");
            }

        }else{
            echo "Please Login!";
        }
    }else{
        header("Location:".$base_url."e-learning_courses.php?error=Payment Failed. Try Again Later.");
    }
        
    }else { 
        header ("Location: login.php");
    }

/*
 * send email to user
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

?>