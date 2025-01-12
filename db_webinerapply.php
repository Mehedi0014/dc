<?php

session_start();
include('admin/includes/conn.php');

// var_dump($_POST['course']);




if ($_POST != '') {

// $name = mysqli_real_escape_string($con, $_POST['name']);
// $mobile = mysqli_real_escape_string($con, $_POST['mobile']);
// $email = mysqli_real_escape_string($con, $_POST['email']);
// $qualifications = mysqli_real_escape_string($con, $_POST['qualification']);
// $message = mysqli_real_escape_string($con, $_POST['message']);



$crs = implode(",",$_POST['course']);

// var_dump($crs);
// exit();
// $crs1 = (explode(" ",$crs));
// var_dump($crs1[0]);

// $crsString = array();

// foreach($crs1 as $c){

// $qry = "SELECT * FROM `webiner` WHERE id = $c";
// $res = mysqli_query($con, $qry);
// $result  = mysqli_fetch_assoc($res);

// $name = $result['name'];


// array_push($crsString, $name);


// }
// var_dump($name);
// var_dump($crsString);


// exit();


$date = date("Y-m-d H:i:s");



$custIDForSave = (isset($_SESSION['cust_id'])) ? $_SESSION['cust_id'] : "";

if (isset($_SESSION['cust_id'])) {

            $query = "SELECT * FROM `webinar_apply` WHERE user_id = '$custIDForSave'";
            $response = mysqli_query($con, $query);
            $row = mysqli_num_rows($response);
            if($row === 0){

                $qry_ins_use_crs = "INSERT INTO `webinar_apply`(`user_id`, `course_id`, `created_on`) VALUES ('$custIDForSave','$crs','$date')";
                $response = mysqli_query($con, $qry_ins_use_crs);
                $row = mysqli_num_rows($response);
                
                
                $qry_slt = "SELECT * FROM `customer_registration` WHERE id = '$custIDForSave'";
                $res_slt = mysqli_query($con, $qry_slt);
                $row_slt = mysqli_fetch_assoc($res_slt);

                $firstname = $row_slt['first_name'];
                $lastname = $row_slt['last_name'];
                $email = $row_slt['email'];
                $phone = $row_slt['phone'];
                
                // var_dump($custIDForSave);
                // var_dump($qry_slt);
                // var_dump($firstname);
                // var_dump($lastname);
                // var_dump($email);
                // var_dump($phone);
                // exit();
                
                $crs1 = (explode(",",$crs));


                
                $crsString = array();
                
                    foreach($crs1 as $c => $cvs){
                    
                    $qry = "SELECT * FROM `webiner` WHERE id = $cvs";
                    $res = mysqli_query($con, $qry);
                    $result  = mysqli_fetch_assoc($res);
                    
                    $name = $result['name'];
    
                    
                    array_push($crsString, $name);
                    
                    }
                    
                    $msg_send = "";

                    
                    
                    
                if ($row !== 0) {
                    
                    
                        $subject = 'Thanks you for Registering for Webinar ' . $firstname;
                        
                        foreach ($crsString as $k => $v ){
                            $msg_send .= $k+1 . ". " .$v .'<br>'; 
                        }
                    
                        $actual_msg = "Thank you for registering <strong>" . $firstname . "</strong><br>"
                                . "<label><strong>Mobile:</strong> </label>" . $mobile . "&nbsp;<br>"
                                . "<label><strong>Email:</strong> </label>" . $email . "&nbsp;<br>"

                                // . "<label><strong>CV:</strong> </label><br><a href='" . $htmlFileLinks . "'>" . $htmlFileLinks . "</a><br>";
                                . "<label><strong>Webinar:</strong> </label><br>" . $msg_send. "<br><br><br><br>"
                                . "<label><strong>We will reach you soon. Stay Connected. <br> for any questiong email us at info@disseminare.com</strong> </label><br><br>";

                        $to = $email;
                    
                        $headers = 'From: <support@disseminare.com>' . "\r\n" // Set from headers
                                . "MIME-Version: 1.0" . "\r\n"
                                . "Content-type:text/html;charset=UTF-8" . "\r\n"
                        ;
                    
                    
                        if (mail($to, $subject, $actual_msg, $headers)) {
                            
                        $subject = 'Webinar Request ' . $name;
                    
                        $actual_msg = "Webinar Request from <strong>" . $name . "</strong><br>"
                                . "<label><strong>Mobile:</strong> </label>" . $mobile . "&nbsp;<br>"
                                . "<label><strong>Email:</strong> </label>" . $email . "&nbsp;<br>"

                                // . "<label><strong>CV:</strong> </label><br><a href='" . $htmlFileLinks . "'>" . $htmlFileLinks . "</a><br>";
                                . "<label><strong>Course:</strong> </label><br>" . $crs. "<br><br><br><br>";
                                // . "<label><strong>We will reach you soon. Stay Connected. <br> for any questiong email us at info@disseminare.com</strong> </label><br><br>";
                    
                        $qry_email = "SELECT * FROM setting WHERE user_login = 'dc_email'";
                        $res_email = mysqli_query($con, $qry_email);
                        $row_email = mysqli_fetch_array($res_email);
                        $admin_email = $row_email['email'];
                    
                    
                    
                        $to = $admin_email;
                        // var_dump($to);
                        // var_dump($name);
                        // var_dump($mobile);
                        // var_dump($email);
                        // var_dump($qualifications);
                        // var_dump($message);
                        // var_dump($crs);
                        // exit();
                        
                        // $to = "info@disseminare.com";
                            $headers = 'From: <support@disseminare.com>' . "\r\n" // Set from headers
                                . "MIME-Version: 1.0" . "\r\n"
                                . "Content-type:text/html;charset=UTF-8" . "\r\n"
                        ;
                        if (mail($to, $subject, $actual_msg, $headers)) {
                    
                            header("Location:" . $base_url . "webinar.php?success=Successfully Registered for Webinar, Kindly Check you mail box");
                        }else {
                            header("Location:" . $base_url . "webinar.php?error=There was a problem kindly apply again 1");
                        }
                            
                        }
                         else {
                            header("Location:" . $base_url . "webinar.php?error=There was a problem kindly apply again 2");
                        }
                    } else {
                        header("Location:" . $base_url . "webinar.php?result=There was a problem filling up the form");
                    }
                    
                    // exit();
                    
                    

                

                
                
                

            } else{

                
                while($row = mysqli_fetch_assoc($response)){
                    
                    
                     $webinar_id = $row['course_id'];
                       $webinar_explode = explode(",",$row['course_id']);  
                       $crs_new = $webinar_id.",".$crs;

                    
                }
                
                
                $qry_upd_course = "UPDATE `webinar_apply` SET course_id = '$crs_new' WHERE user_id = '$custIDForSave'";
                $res_upd_course = mysqli_query($con, $qry_upd_course);
                
                
                
                
                $qry_slt = "SELECT * FROM `customer_registration` WHERE id = '$custIDForSave'";
                $res_slt = mysqli_query($con, $qry_slt);
                $row_slt = mysqli_fetch_assoc($res_slt);

                $firstname = $row_slt['first_name'];
                $lastname = $row_slt['last_name'];
                $email = $row_slt['email'];
                $phone = $row_slt['phone'];
                
                // var_dump($custIDForSave);
                // var_dump($qry_slt);
                // var_dump($firstname);
                // var_dump($lastname);
                // var_dump($email);
                // var_dump($phone);
                // exit();
                
                $crs1 = (explode(",",$crs));


                
                $crsString = array();
                $crsString_date = array();
                
                    foreach($crs1 as $c => $cvs){
                    
                    $qry = "SELECT * FROM `webiner` WHERE id = $cvs";
                    $res = mysqli_query($con, $qry);
                    $result  = mysqli_fetch_assoc($res);
                    
                    $name = $result['name'];
                    $date = $result['date'];
                    
    
                    
                    array_push($crsString, $name);
                    array_push($crsString_date, $date);
                    
                    }
                    
                    $msg_send = "";

                    
                    
                    
                if ($row !== 0) {
                    
                    
                        $subject = 'Thanks you for Registering for Webinar ' . $firstname;
                        
                        foreach ($crsString as $k => $v ){
                            $msg_send .= $k+1 . ". " .$v .'<br>'; 
                        }
                        foreach ($crsString_date as $k1 => $v1 ){
                            $msg_send1 .= $k1+1 . ". " .$v1 .'<br>'; 
                        }
                    
                        $actual_msg = "Thank you  <strong>" . $firstname ." ". $lastname . "</strong> for registering <br>"
                                      . "<label><strong>Mobile:</strong> </label>" . $mobile . "&nbsp;<br>"
                                . "<label><strong>Email:</strong> </label>" . $email . "&nbsp;<br>"

                                . "<label><strong>For the Webinar:</strong> </label><br>" . $msg_send. "<br><br>"
                                . "<label><strong>The webinar will be held on</strong> </label><br>" . $msg_send1. "<br><br>"
                                . "<label><strong>We will reach you soon with the Zoom details . Stay Connected. <br> For any queries please email us at info@disseminare.com</strong> </label><br><br>"
                                . "<label><strong>Regards, <br>  DC Support Team </strong> </label><br><br>";

                        $to = $email;
                    
                        $headers = 'From: <support@disseminare.com>' . "\r\n" // Set from headers
                                . "MIME-Version: 1.0" . "\r\n"
                                . "Content-type:text/html;charset=UTF-8" . "\r\n"
                        ;
                    
                    
                        if (mail($to, $subject, $actual_msg, $headers)) {
                            
                        $subject = 'Webinar Request From ' . $firstname;
                    
                        $actual_msg = "Webinar Request from <strong>" . $firstname ." ". $lastname ."</strong><br>"
                                . "<label><strong>Mobile:</strong> </label>" . $phone . "&nbsp;<br>"
                                . "<label><strong>Email:</strong> </label>" . $email . "&nbsp;<br>"

                                . "<label><strong>Course:</strong> </label><br>" . $msg_send. "<br><br><br><br>";

                    
                        $qry_email = "SELECT * FROM setting WHERE user_login = 'dc_email'";
                        $res_email = mysqli_query($con, $qry_email);
                        $row_email = mysqli_fetch_array($res_email);
                        $admin_email = $row_email['email'];
                    
                    
                    
                        $to = $admin_email;
                        // var_dump($to);
                        // var_dump($name);
                        // var_dump($mobile);
                        // var_dump($email);
                        // var_dump($qualifications);
                        // var_dump($message);
                        // var_dump($crs);
                        // exit();
                        
                        // $to = "info@disseminare.com";
                            $headers = 'From: <support@disseminare.com>' . "\r\n" // Set from headers
                                . "MIME-Version: 1.0" . "\r\n"
                                . "Content-type:text/html;charset=UTF-8" . "\r\n"
                        ;
                        if (mail($to, $subject, $actual_msg, $headers)) {
                    
                            header("Location:" . $base_url . "webinar.php?success=Successfully Registered for Webinar, Kindly Check you mail box");
                        }else {
                            header("Location:" . $base_url . "webinar.php?error=There was a problem kindly apply again 1");
                        }
                            
                        }
                         else {
                            header("Location:" . $base_url . "webinar.php?error=There was a problem kindly apply again 2");
                        }
                    } else {
                        header("Location:" . $base_url . "webinar.php?result=There was a problem filling up the form");
                    }
                
                
                
                
            }
    
}

// $query = "INSERT INTO `webiner_apply`(`name`, `email`, `phone_no`, `course`, `qual`, `msg`, `date`) VALUES ('$name','$email','$mobile','$crs','$qualifications','$message','$date')";

// var_dump($query);
// exit();

// $query = "INSERT INTO `webiner_apply`(id, name, email, phone_no, course, qual, msg, date)"
//         . " VALUES ('','$name', '$email', '$mobile','$crs','$qualifications','$message','$date')";
        
//exit();

} else {
header("Location:" . $base_url . "webinar.php?result=There was a problem filling up the form");
}


?>
