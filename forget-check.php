<?php

include('admin/includes/conn.php');
session_start();
$email = $_POST['email'];

//if (check_valid_customeremail($email)) {

$qry_chk = "SELECT * from customer_registration where email = '$email'";
$res_chk = mysqli_query($con, $qry_chk);
$num_chk = mysqli_num_rows($res_chk);

if ($num_chk > 0) {


    $qry_sel = "SELECT * from customer_registration where email = '$email'";
    $res_sel = mysqli_query($con, $qry_sel);
    $row_sel = mysqli_fetch_array($res_sel);

    $name = $row_sel['name'];
    $username = $name;

    $ulength = 6;
    $user_hash = GeraHash($ulength);

    $hashlink = $base_url . 'reset.php?email=' . $email . '&hash=' . $user_hash;

//    $qry_em = "SELECT * from settings where id = '1'";
//    $res_em = mysqli_query($con, $qry_em);
//    $row_em = mysqli_fetch_array($res_em);

    $to = $email ;

//
//$get_mail = get_particular_email('Forgot Password');
//$cf = html_entity_decode($get_mail['content']);
    $subject = 'Forgot Password for ' . $username;
//$subject = str_replace(array('{name}'), array($username), $sub);
//$message = str_replace(array('{name}', '{customer_email}', '{forgot_link}'), array($username, $email, $hashlink), $cf);

    $message = '<p>Hello <strong>' . $username . '</strong>,<br />
<br />
You have requested to change your Password.<br />
Please click the link below to chage your password<br />
<strong><a href="'.$hashlink.'">' . $hashlink . '</a></strong><br />
<br />
</p>
';

    $qry1 = "update customer_registration set hash = '$user_hash' "
            . "where email = '$email'";
    $res_qry1 = mysqli_query($con, $qry1);


//$emailname = 'RASAGALLERY';
//send_mail($to, $subject, $message, $emailname);

    $headers = 'From: Disseminare<info@disseminare.com>' . "\r\n"
            . "MIME-Version: 1.0" . "\r\n"
            . "Content-type:text/html;charset=UTF-8" . "\r\n";

    $status = mail($to, $subject, $message, $headers); // Send our email

    //$_SESSION['reg-success'] = "Please follow mail to reset password.";
    header("Location: forget-password.php?result=success_forgot");
    
    //goto_location('login-register.php');
} else {
    //$_SESSION['forgot-error'] = "Wrong Email";
    header("Location: forget-password.php?result=fail_forgot");
    //goto_location(SITE_URL . '/forget-password.php');
}

function GeraHash($qtd) {
//Under the string $Caracteres you write all the characters you want to be used to randomly generate the code. 
    $Caracteres = 'ABCDEFGHIJKLMOPQRSTUVXWYZ0123456789';
    $QuantidadeCaracteres = strlen($Caracteres);
    $QuantidadeCaracteres--;

    $Hash = NULL;
    for ($x = 1; $x <= $qtd; $x++) {
        $Posicao = rand(0, $QuantidadeCaracteres);
        $Hash .= substr($Caracteres, $Posicao, 1);
    }

    return $Hash;
}
