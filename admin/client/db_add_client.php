<?php

error_reporting(E_ALL);
include('../includes/conn.php');

if (isset($_POST['submit']) || !empty($_POST)) {

    $date = $_POST['cur_date'];
    $client_name = mysqli_real_escape_string($con,$_POST['client_name']);
    $sort = mysqli_real_escape_string($con,$_POST['sort']);

    //file upload (Page Banner)

    $original_nm_photo = $_FILES['logo']['name'];
    $allowedexts = array("JPEG", "JPG", "PNG", "jpeg", "jpg", "png", "GIF", "gif");
    $document_path = realpath(__DIR__ . '/../..') . $document_path_client;
    $extension = explode(".", $original_nm_photo);
    $exts = end($extension);
    $move_status = false;
    $default_logo = '';
    if (($_FILES['logo']['size'] < 500000000) && in_array($exts, $allowedexts)) {
        $newname = date('d-m-y') . "_" . time() . "." . $exts;
        $destination = $document_path . $newname;
        $move_status = move_uploaded_file($_FILES['logo']['tmp_name'], $destination);
        $logo_image = $newname;
    }
    $logo_image = $move_status == TRUE ? $logo_image : $default_logo;




    $sql1 = "INSERT INTO client(id, name, logo, sort, date"
            . " ) VALUES('', '$client_name', '$logo_image', '$sort', '$date')";
    
    $res1 = mysqli_query($con, $sql1) or trigger_error("Query Failed! SQL: $sql1 - Error: " . mysqli_error(), E_USER_ERROR);
    
    
    

    if ($res1) {
        header("Location: list_client.php?insertmsg=success");
    } else {
        header("Location: list_client.php?insertmsg=faliure");
    }
}



