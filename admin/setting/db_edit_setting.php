<?php

include('../includes/conn.php');

if (isset($_POST['submit']) || !empty($_POST)) {

    $id = $_POST['id'];

    $date = $_POST['cur_date'];
    $web_name = mysqli_real_escape_string($con,$_POST['web_name']);
    $web_email = mysqli_real_escape_string($con,$_POST['web_email']);
    $userid = $_POST['userid'];
    $pass = mysqli_real_escape_string($con,$_POST['pass']);
    if ($_POST['old_pass'] != $_POST['pass']) {
        $pass_hash = md5($pass);
    } else {
        $pass_hash = $_POST['old_pass'];
    }
    
    
    $key = ($_POST['key']);
    $desc = ($_POST['desc']);
    $visit = ($_POST['visit']);
    
    
    //file upload (Logo)

    $original_nm_photo = $_FILES['logo']['name'];
    $allowedexts = array("JPEG", "JPG", "PNG", "jpeg", "jpg", "png", "GIF", "gif");
    $document_path = realpath(__DIR__ . '/../..') . $document_path_site_logo;
    $extension = explode(".", $original_nm_photo);
    $exts = end($extension);
    $move_status = false;

    $qry_img1 = "select * from setting where id = '$id'";
    $res_img1 = mysqli_query($con, $qry_img1);
    $row_img1 = mysqli_fetch_array($res_img1) or trigger_error("Query Failed! SQL: $res_img1 - Error: " . mysqli_error(), E_USER_ERROR);

    $default_logo = $row_img1['logo'];
    $default_footerlogo = $row_img1['footer_logo'];
    $default_faviconlogo = $row_img1['favicon'];

    if (($_FILES['logo']['size'] < 500000000) && in_array($exts, $allowedexts)) {
        $newname = 'headerlogo_'.date('d-m-y') . "_" . time() . "." . $exts;
        $destination = $document_path . $newname;
        $move_status = move_uploaded_file($_FILES['logo']['tmp_name'], $destination);
        $logo = $newname;
    }
    $logo = $move_status == TRUE ? $logo : $default_logo;


    
    
    //file upload (Footer Logo)

    $original_nm_photo2 = $_FILES['footer_logo']['name'];
    $allowedexts2 = array("JPEG", "JPG", "PNG", "jpeg", "jpg", "png", "GIF", "gif");
    $document_path2 = realpath(__DIR__ . '/../..') . $document_path_site_logo;
    $extension2 = explode(".", $original_nm_photo2);
    $exts2 = end($extension2);
    $move_status2 = false;
    
    if (($_FILES['footer_logo']['size'] < 500000000) && in_array($exts2, $allowedexts2)) {
        $newname2 = 'footerlogo_'.date('d-m-y') . "_" . time() . "." . $exts2;
        $destination2 = $document_path2 . $newname2;
        $move_status2 = move_uploaded_file($_FILES['footer_logo']['tmp_name'], $destination2);
        $footer_logo = $newname2;
    }
    $footer_logo = $move_status2 == TRUE ? $footer_logo : $default_footerlogo;
    
    
    
    
     //file upload (Favicon)

    $original_nm_photo3 = $_FILES['favicon']['name'];
    $allowedexts3 = array("JPEG", "JPG", "PNG", "jpeg", "jpg", "png", "GIF", "gif");
    $document_path3 = realpath(__DIR__ . '/../..') . $document_path_site_logo;
    $extension3 = explode(".", $original_nm_photo3);
    $exts3 = end($extension3);
    $move_status3 = false;
    
    if (($_FILES['favicon']['size'] < 500000000) && in_array($exts3, $allowedexts3)) {
        $newname3 = 'favicon_'.date('d-m-y') . "_" . time() . "." . $exts3;
        $destination3 = $document_path3 . $newname3;
        $move_status3 = move_uploaded_file($_FILES['favicon']['tmp_name'], $destination3);
        $favicon_logo = $newname3;
    }
    $favicon_logo = $move_status3 == TRUE ? $favicon_logo : $default_faviconlogo;
    
    
    
    
    

    $sql1 = "UPDATE `setting` SET `user_login` = '$userid', `user_pass`= '$pass_hash', `website_name` = '$web_name', `email` = '$web_email', `logo` = '$logo', "
            . "`footer_logo` = '$footer_logo', `favicon` = '$favicon_logo', `keyword` = '$key', `description` = '$desc', `total_visited` = '$visit'"
            . "  WHERE `id`= '$id'";
    $res1 = mysqli_query($con, $sql1) or trigger_error("Query Failed! SQL: $sql1 - Error: " . mysqli_error(), E_USER_ERROR);

 
    if ($res1) {
        header("Location: info_setting.php?editmsg=success");
    } else {
        header("Location: info_setting.php?editmsg=error");
    }
} else {
    header("Location: info_setting.php?insertmsg=general_error");
}