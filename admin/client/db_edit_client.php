<?php
include('../includes/conn.php');

if(isset($_POST['submit']) || !empty($_POST)){
    
    $id = $_POST['id'];
    
    $date = $_POST['cur_date'];    
    $client_name = mysqli_real_escape_string($con,$_POST['client_name']);
    $sort = mysqli_real_escape_string($con,$_POST['sort']);
    //file upload (Page Image)

    $original_nm_photo = $_FILES['logo']['name'];
    $allowedexts = array("JPEG", "JPG", "PNG", "jpeg", "jpg", "png", "GIF", "gif","pdf","PDF");
    $document_path = realpath(__DIR__ . '/../..') . $document_path_client;
    $extension = explode(".", $original_nm_photo);
    $exts = end($extension);
    $move_status = false;
    //$default_logo = 'default-logo.png';
    
    $qry_img1 = "select * from client where id = '$id'";
    $res_img1 = mysqli_query($con,$qry_img1);
    $row_img1 = mysqli_fetch_array($res_img1) or trigger_error("Query Failed! SQL: $res_img1 - Error: " . mysqli_error(), E_USER_ERROR);
    
    $default_logo = $row_img1['logo'];
    
    //exit();
    if (($_FILES['logo']['size'] < 500000000) && in_array($exts, $allowedexts)) {
        $newname = date('d-m-y') . "_" . time() . "." . $exts;
        $destination = $document_path . $newname;
        $move_status = move_uploaded_file($_FILES['logo']['tmp_name'], $destination);
        $page_image = $newname;
    }
     $page_image = $move_status == TRUE ? $page_image : $default_logo;
     
    
   
   $sql1 = "UPDATE `client` SET `name`= '$client_name', `logo` = '$page_image', `sort` = '$sort'"
            . " WHERE `id`= '$id'";
            
        $res1 = mysqli_query($con,$sql1) or trigger_error("Query Failed! SQL: $qry_img - Error: " . mysqli_error(), E_USER_ERROR);
    if($res1){
        header("Location: list_client.php?editmsg=Successfully Updated");
    }else{
        header("Location: list_client.php?editmsg=Error");
    }
    
   
}else{
    header("Location: list_client.php?insertmsg=General Error");
}