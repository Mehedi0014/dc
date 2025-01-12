<?php

error_reporting(E_ALL);
include('../includes/conn.php');

if (isset($_POST['submit']) || !empty($_POST)) {

    $date = $_POST['cur_date'];
    $title = mysqli_real_escape_string($con,$_POST['title']);
    $sort = mysqli_real_escape_string($con,$_POST['sort']);
    $body = trim($_POST['editor1']);
    $body = htmlentities($body);
    
    //exit();
    //file upload (Media File)

    $original_nm_photo = $_FILES['file']['name'];
    $allowedexts = array("JPEG", "JPG", "PNG", "jpeg", "jpg", "png", "GIF", "gif");
    
    //$document_path = dirname(__DIR__) . $document_path_upload_media;
    $document_path = realpath(__DIR__ . '/../..') . $document_path_slider;
    
    $extension = explode(".", $original_nm_photo);
    $exts = end($extension);
    $move_status = false;
    $default_logo = '';
    if (($_FILES['file']['size'] < 5000000000) && in_array($exts, $allowedexts)) {
        $newname = date('d-m-y') . "_" . time() . "." . $exts;
        $destination = $document_path . $newname;
        $move_status = move_uploaded_file($_FILES['file']['tmp_name'], $destination);
        $med_file = $newname;
    }
    $med_file = $move_status == TRUE ? $med_file : $default_logo;




    $sql1 = "INSERT INTO slider(id, name, body, image, sort"
            . " ) VALUES('', '$title', '$body', '$med_file', '$sort')";
    
    $res1 = mysqli_query($con, $sql1) or trigger_error("Query Failed! SQL: $sql1 - Error: " . mysqli_error(), E_USER_ERROR);
    
    
    

    if ($res1) {
        header("Location: slider.php?insertmsg=success");
    } else {
        header("Location: slider.php?insertmsg=faliure");
    }
}



