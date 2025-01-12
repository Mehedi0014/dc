<?php 
session_start();
include('admin/includes/conn.php');
ob_start();


if(isset($_SESSION['username'])){
    header("Location:" .$base_url);
}else{
    function emailSend($username, $email, $token, $conn = null){
        // $hashLen = 12;
        // $user_hash = genHash($hashLen);
        // $qry_hsh_upd = "UPDATE users set hash='$user_hash', validation='0' WHERE username='$username' and email='$email'";
        // $res_hsh_upd = mysqli_query($conn, $qry_hsh_upd);

        $to = $email;
        $subject = "Verify Disseminare Consulting account for ".$username;
        $message = "Dear <strong> '$username' </strong>
                    Please click or copy the link below to verify your email:<br><br>
                    
                    http://disseminare.com/email-verify.php?email=$email&token=$token<br><br>

                    
                    Thanks from Disseminare Team.
                    
                ";
        // $message = "Dear ".$username.",<br>Thank you for subscribing us. As per security reason, please validate account.<br>".
        // "click this Link = <a href='http://disseminare.com/validate.php?hash=".$user_hash."&email=".$email;

        $header = 'From: support@disseminare.com'."\r\n".
                    'MIME-Version: 1.0'. "\r\n".
                    'Content-type:text/html;charset=UTF-8'."\r\n";
        
        $status = mail($to, $subject, $message, $header);

        return $status;
    }

    function genHash($len){
        $char = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
        $charlen = strlen($char);
        $Hash = null;

        for($i= 0;$i<= $len; $i++){
            $ranGen = rand(0, $charlen);
            $Hash .= substr($char, $ranGen, 1);
        }

        return $Hash;
    }
}
ob_end_flush();
?>