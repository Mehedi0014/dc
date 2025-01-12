<?php

error_reporting(E_ALL);
include('../includes/conn.php');

if (isset($_POST['submit']) || !empty($_POST)) {

    $date = $_POST['cur_date'];
    $med_title = mysqli_real_escape_string($con,$_POST['med_title']);
    

    
    //exit();
    //file upload (Media File)

    $original_nm_photo = $_FILES['med_file']['name'];
    $allowedexts = array("JPEG", "JPG", "PNG", "jpeg", "jpg", "png", "GIF", "gif", "pdf", "PDF", "docx", "svg","doc", "txt", "xls");
    
    //$document_path = dirname(__DIR__) . $document_path_upload_media;
    $document_path = realpath(__DIR__ . '/../..') . $document_path_upload_media;
    
    $extension = explode(".", $original_nm_photo);
    $exts = end($extension);
    $move_status = false;
    $default_logo = 'inner_banner1.jpg';
    if (($_FILES['med_file']['size'] < 5000000000) && in_array($exts, $allowedexts)) {
        $newname = date('d-m-y') . "_" . time() . "." . $exts;
        $destination = $document_path . $newname;
        $move_status = move_uploaded_file($_FILES['med_file']['tmp_name'], $destination);
        $med_file = $newname;
    }
    $med_file = $move_status == TRUE ? $med_file : $default_logo;




    $sql1 = "INSERT INTO media(id, title, file, added_on"
            . " ) VALUES('', '$med_title', '$med_file', '$date')";
    
    $res1 = mysqli_query($con, $sql1) or trigger_error("Query Failed! SQL: $sql1 - Error: " . mysqli_error(), E_USER_ERROR);
    
    
    

    if ($res1) {
        header("Location: media.php?insertmsg=success");
    } else {
        header("Location: media.php?insertmsg=faliure");
    }
}



