<?php 
include('admin/includes/conn.php');
ob_start();
    $send_email_check=false;
    $fulldate = date('Y-M-d H:I:s');
    var_dump($fulldate);
//     $dt1 = new \DateTime( '2014/12/31' );
// $dt1->modify( '-1 month' );
// $m = (int) $dt1->format( 'm' );
// var_dump( $m ); // still 12 !!!

// $dt2 = new \DateTime( '2014/12/30' );
// $dt2->modify( '-1 month' );
// $m = (int) $dt2->format( 'm' );
// var_dump( $m ); // 11

    // $admin_email = "soumyadg@disseminare.com";
    // $admin_email1 = "praloy@disseminare.com";
    // $admin_email3 = "praloy66@gmail.com";
    // $admin_email4 = "subham@disseminare.com";
    
    // if($admin_email === "soumyadg@disseminare.com"){
    // if($row_usr['email'] == "dibyaprokash@gmail.com" || $row_usr['email'] == "praloy@disseminare.com" || $row_usr['email'] == "praloy66@gmail.com" || $row_usr['email'] == "subham@disseminare.com" || $row_usr['email'] == "soumyadg@disseminare.com"){
        
            $qry_ecrs = "SELECT * FROM `elearning_courses` WHERE `tnlt_course_id` = 209";
            $res_ecrs = mysqli_query($con, $qry_ecrs);
            $row_ecrs_num = mysqli_num_rows($res_ecrs);
            $row_ecrs = mysqli_fetch_assoc($res_ecrs);
            if($row_ecrs_num > 0){
                $fulldate = date("Y-m-d"); 
                $qry_course_paid = "SELECT * FROM `user_course_paid` WHERE `created_on` = '$fulldate'";
                $res_course_paid = mysqli_query($con, $qry_course_paid);
                $row_course_paid = mysqli_num_rows($res_course_paid);
                
                $message = "Dear <strong> '$username' </strong>,  Here is the list<br>";
                $message .= "<h2>New user registration.</h2>";
                $ism = 0;
                while($result_course_paid = mysqli_fetch_assoc($res_course_paid)){
                    $ism++;
                    $paidCourses = $result_course_paid["course_id"];
                    $paidCourses_result = json_decode($paidCourses, true);
                    // var_dump($paidCourses_result);
                    
                    $chek = array_search("209", $paidCourses_result);
                    
                    if($chek !== false){
                        $send_email_check = true;
                        $usr_ID = $result_course_paid['user_id'];
                        
                        $qry_course_paid1 = "SELECT * FROM `customer_registration` WHERE `id` = '$usr_ID'";
                        $res_course_paid1 = mysqli_query($con, $qry_course_paid1);
                        $row_course_paid1 = mysqli_fetch_assoc($res_course_paid1);
        
                                
                        
                        
                        $message .= "<h3>User $ism.</h3>";
                        $message .= "<p><strong>Name: </strong>".$row_course_paid1['first_name']." ".$row_course_paid1['last_name']."</p>";
                        $message .= "<p><strong>Email: </strong>".$row_course_paid1['email']."</p>";
                        $message .= "<p><strong>Phone Number: </strong>".$row_course_paid1['phone']."</p><br><br>";
                        
                    }
                }
                    
                    
                        $admin_emails = array("soumyadg@disseminare.com", "praloy@disseminare.com", "subham@disseminare.com");
                        
                        foreach($admin_emails as $admin_email){
                            $to = $admin_email;
                            $subject = "New user registration information to Finance for Non-Finance Course. ";
                            $header = 'From: support@disseminare.com'."\r\n".
                                        'MIME-Version: 1.0'. "\r\n".
                                        'Content-type:text/html;charset=UTF-8'."\r\n";
                                        
                            $time = date("H:i:s");
                            if($time > "08:00:00" && $time < "23:00:00"){
                                $status = mail($to, $subject, $message, $header);
                                // $status = mail($to, $subject, $message, $header);
                            }
                        }
            }
            
        // }

ob_end_flush();
    
    
    // function emailSend($username, $email, $conn = null){
    //     // $hashLen = 12;
    //     // $user_hash = genHash($hashLen);
    //     // $qry_hsh_upd = "UPDATE users set hash='$user_hash', validation='0' WHERE username='$username' and email='$email'";
    //     // $res_hsh_upd = mysqli_query($conn, $qry_hsh_upd);

    //     $to = $email;
    //     $subject = "Verify Disseminare Consulting account for ".$username;
    //     $message = "Dear <strong> '$username' </strong>
    //                 Please click or copy the link below to verify your email:<br><br>
                    
    //                 http://disseminare.com/email-verify.php?email=$email&token=$token<br><br>

                    
    //                 Thanks from Disseminare Team.
                    
    //             ";
    //     // $message = "Dear ".$username.",<br>Thank you for subscribing us. As per security reason, please validate account.<br>".
    //     // "click this Link = <a href='http://disseminare.com/validate.php?hash=".$user_hash."&email=".$email;

    //     $header = 'From: support@disseminare.com'."\r\n".
    //                 'MIME-Version: 1.0'. "\r\n".
    //                 'Content-type:text/html;charset=UTF-8'."\r\n";
        
    //     $status = mail($to, $subject, $message, $header);

    //     return $status;
    // }
?>