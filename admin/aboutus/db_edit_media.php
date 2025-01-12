<?php
include_once ('../includes/conn.php');

if(isset($_POST['submit']) || !empty($_POST)){
    $status = mysqli_real_escape_string($con,$_POST['status']);
    $med_id= $_POST['id'];
    /**
     * Banner image upload
     */
    //exit();
    
    
    $original_nm_photo = $_FILES['file']['name'];
    //exit();
    $allowedexts = array("JPEG", "JPG", "PNG", "jpeg", "jpg", "png", "GIF", "gif", "pdf", "svg", "PDF", "docx", "doc", "txt", "xls","mp4");
    $document_path = realpath(__DIR__ . '/../..') . $document_path_upload_media;
    
    $extension = explode(".", $original_nm_photo);
    $exts = end($extension);
    $move_status = false;
    
    $qry_img1 = "select * from about_us_video where id = '$med_id'";
    $res_img1 = mysqli_query($con, $qry_img1) or trigger_error("Query Failed! SQL: $qry_img1 - Error: " . mysqli_error(), E_USER_ERROR);
    $row_img1 = mysqli_fetch_array($res_img1);
   
    $default_logo = $row_img1['file'];
    
    
    
    
    //$default_logo = 'default-logo.png';
    if (($_FILES['file']['size'] < 500000000) && in_array($exts, $allowedexts)) {
        
        $newname = date('d-m-y') . "_" . time() . "." . $exts;
        $destination = $document_path . $newname;
        $move_status = move_uploaded_file($_FILES['file']['tmp_name'], $destination);
        $med_file = $newname;
    }
    $med_file = $move_status == TRUE ? $med_file : $default_logo;
    
    $qry_artc = "UPDATE `about_us_video` SET `file` = '$med_file',`status` ='$status'"
            . " WHERE `id` = '$med_id'";
    $res_artc = mysqli_query($con, $qry_artc) or trigger_error("Query Failed! SQL: $qry_artc - Error: " . mysqli_error(), E_USER_ERROR);
    if($res_artc){
        header("Location: aboutus.php?insertmsg=Successfully Edited");
    }else{
        header("Location: aboutus.php?insertmsg=Error");
    }
}