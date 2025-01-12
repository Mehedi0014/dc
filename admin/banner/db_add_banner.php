<?php

error_reporting(E_ALL);
include('../includes/conn.php');

if (isset($_POST['submit']) || !empty($_POST)) {

    $date = $_POST['cur_date'];
    $page_title = mysqli_real_escape_string($con,$_POST['page_title']);
    $text = mysqli_real_escape_string($con,$_POST['text']);

    //exit();
    //file upload (Page Banner)

    $original_nm_photo = $_FILES['page_image']['name'];
    $allowedexts = array("JPEG", "JPG", "PNG", "jpeg", "jpg", "png", "GIF", "gif", "pdf", "PDF");
    $document_path = realpath(__DIR__ . '/../..') . $document_path_banner;
    $extension = explode(".", $original_nm_photo);
    $exts = end($extension);
    $move_status = false;
    $default_logo = '';
    if (($_FILES['page_image']['size'] < 500000000) && in_array($exts, $allowedexts)) {
        $newname = date('d-m-y') . "_" . time() . "." . $exts;
        $destination = $document_path . $newname;
        $move_status = move_uploaded_file($_FILES['page_image']['tmp_name'], $destination);
        $page_image = $newname;
    }
    $page_image = $move_status == TRUE ? $page_image : $default_logo;




    $sql1 = "INSERT INTO innerpage_banner(id, page_name, text, banner_img, added_date"
            . " ) VALUES('', '$page_title', '$text', '$page_image', '$date')";
    
    $res1 = mysqli_query($con, $sql1) or trigger_error("Query Failed! SQL: $sql1 - Error: " . mysqli_error(), E_USER_ERROR);
    
    
    

    if ($res1) {
        header("Location: list_banner.php?insertmsg=success");
    } else {
        header("Location: list_banner.php?insertmsg=faliure");
    }
}



