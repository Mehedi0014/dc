<?php
session_start();
include ('admin/includes/conn.php');

if ($_POST != '') {
    $secret_key = "6LexbeAZAAAAAAE04KgQqr2EJ3im3y7azwUCTbyd";
    $response_key = $_POST['g-recaptcha-response'];
    $userIP = $_SERVER['REMOTE_ADDR'];
    
    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => "https://www.google.com/recaptcha/api/siteverify",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_POSTFIELDS => "secret=$secret_key&response=$response_key&remoteip=$userIP",
      CURLOPT_HTTPHEADER => array(
        "Content-Type: application/x-www-form-urlencoded"
      ),
    ));
    $response = curl_exec($curl);
    
    curl_close($curl);
    $respon = json_decode($response, true);
    if($respon['success'] === false){ 
        $_SESSION['mail_fail'] = 'Something went wrong. Please check again.';
        header("location: career.php");
        exit();
    }elseif($respon['success'] === true){
        $name = mysqli_real_escape_string($con, $_POST['name']);
        $mobile = mysqli_real_escape_string($con, $_POST['mobile']);
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $qua = mysqli_real_escape_string($con, $_POST['qualification']);
        $jobExp = mysqli_real_escape_string($con, $_POST['jobexp']);
        $langP = mysqli_real_escape_string($con, $_POST['langp']);
    
        $message = mysqli_real_escape_string($con, $_POST['message']);
    
       $jobid = (int) $_POST['jobindex'];
    
        $original_nm_photo = $_FILES['file']['name'];
    
        $allowedexts = array("JPEG", "JPG", "PNG", "jpeg", "jpg", "png", "GIF", "gif", "pdf", "PDF", "doc", "docx");
        $document_path = realpath(__DIR__) . $document_cv_path;
        
        $extension = explode(".", $original_nm_photo);
        $exts = end($extension);
       
        $move_status = false;
        $default_logo = '';
        if (($_FILES['file']['size'] < 500000000) && in_array($exts, $allowedexts)) {
            $newname = 'cv_' . date('d-m-y') . "_" . time() . "." . $exts;
            $destination = $document_path . $newname;
            $move_status = move_uploaded_file($_FILES['file']['tmp_name'], $destination);
            $cv = $newname;
        } else {
            $_SESSION['mail_fail'] = 'File type and size is not supported';
            header('Location:' . $base_url . 'career.php');
        }
    
        $cv = $move_status == TRUE ? $cv : $default_logo;
    
    
        $date = date("Y-m-d H:i:s");
        $query = "INSERT INTO `applications`(id, job, name,  phone, email, qualification, job_experience, language_p, comment, cv, date)"
                . " VALUES ('', '$jobid','$name', '$mobile', '$email', "
                . "'$qua','$jobExp','$langP','$message', '$cv', '$date')";
        //exit();
        if ($result = mysqli_query($con, $query)) {
    
            $htmlFileLinks = $base_url . $document_cv_path . $cv;
    
    
    
            $subject = 'Online Career Request from ' . $name;
    
            $actual_msg = "An career request has been made by <strong>" . $name . "</strong><br>"
                    . "<label><strong>Mobile:</strong> </label>" . $mobile . "&nbsp;<br>"
                    . "<label><strong>Email:</strong> </label>" . $email . "&nbsp;<br>"
                    . "<label><strong>Massage:</strong> </label><br>" . $message . "&nbsp;<br><br>"
                    . "<label><strong>CV:</strong> </label><br><a href='" . $htmlFileLinks . "'>" . $htmlFileLinks . "</a><br>";
    
            $qry_email = "select * from setting";
            $res_email = mysqli_query($con, $qry_email);
            $row_email = mysqli_fetch_array($res_email);
            $admin_email = $row_email['email'];
    
    
            $to = $admin_email;
    
            $headers = 'From:' . $name . ' <info@disseminare.com>' . "\r\n" // Set from headers
                    . "MIME-Version: 1.0" . "\r\n"
                    . "Content-type:text/html;charset=UTF-8" . "\r\n"
            ;
    
    
            if (mail($to, $subject, $actual_msg, $headers)) {
                $_SESSION['mail_succ'] = 'Resume submitted successfully.';
                header('Location:' . $base_url . 'career.php');
            } else {
                $_SESSION['mail_fail'] = 'Sorry, error occured this time sending your request.';
                header('Location:' . $base_url . 'career.php' );
            }
        } else {
            $_SESSION['mail_fail'] = 'Error, Please fill up the form again';
            header('Location:' . $base_url . 'career.php');
        }
    }else{
        $_SESSION['mail_fail'] = 'Something went wrong. Please check again.';
        header("location: career.php");
        exit();
    }
} else {
    $_SESSION['mail_fail'] = 'Error, Please fill up the form properly';
    header('Location:' . $base_url . 'career.php');
}