<?php

error_reporting(E_ALL);
include('../includes/conn.php');

if (isset($_POST['submit']) || !empty($_POST)) {

    $date = $_POST['cur_date'];
    $title = mysqli_real_escape_string($con,$_POST['image_label']);
    $cat_id = $_POST['cat_id'];
    $sort = $_POST['sort'];
    
    
    //file upload

    $original_nm_photo = $_FILES['image']['name'];
    $allowedexts = array("JPEG", "JPG", "PNG", "jpeg", "jpg", "png", "GIF", "gif");
    $document_path = realpath(__DIR__ . '/../..') . $document_path_service;
    $extension = explode(".", $original_nm_photo);
    $exts = end($extension);
    $move_status = false;
    $default_logo = '';
    if (($_FILES['image']['size'] < 500000000) && in_array($exts, $allowedexts)) {
        $newname = date('d-m-y') . "_" . time() . "." . $exts;
        $destination = $document_path . $newname;
        $move_status = move_uploaded_file($_FILES['image']['tmp_name'], $destination);
        $image = $newname;
    }
    $image = $move_status == TRUE ? $image : $default_logo;




    $sql1 = "INSERT INTO service_images(id, name, service_id, image, sort"
            . " ) VALUES('','$title', '$cat_id', '$image', '$sort')";
    //exit();
    $res1 = mysqli_query($con, $sql1) or trigger_error("Query Failed! SQL: $sql1 - Error: " . mysqli_error(), E_USER_ERROR);
    
    
    

    if ($res1) {
        header("Location: info_image.php?id=".$cat_id."&action=Edit&insertmsg=success");
    } else {
        header("Location: info_image.php?id=".$cat_id."&action=Edit&insertmsg=faliure");
    }
}



