<?php
ini_set('post_max_size', '64M');
ini_set('upload_max_filesize', '64M');
//error_reporting(E_ALL);
include('../includes/conn.php');
//echo 'adsfsda';exit;
//$original_nm_photo = $_FILES['files']['name'];
//var_dump($original_nm_photo);exit;
if (!empty($_POST)) {
    $date = $_POST['cur_date'];
    $status = mysqli_real_escape_string($con,$_POST['status']);
    //echo 'fadsfadfsdafsa';exit;
    
    
    //exit();
    //file upload (Media File)
    
    $original_nm_photo = $_FILES['file']['name'];
    $allowedexts = array("JPEG", "JPG", "PNG", "jpeg", "jpg", "png", "GIF", "gif", "pdf", "PDF", "docx", "svg","doc", "txt", "xls","mp4");
    
    //$document_path = dirname(__DIR__) . $document_path_upload_media;
    $document_path = realpath(__DIR__ . '/../..') . $document_path_upload_media;
    
    $extension = explode(".", $original_nm_photo);
    
    $exts = end($extension);
    $move_status = false;
    $default_logo = 'inner_banner1.jpg';
    
    if (($_FILES['file']['size'] < 5000000000) && in_array($exts, $allowedexts)) {
        
        $newname = date('d-m-y') . "_" . time() . "." . $exts;
        $destination = $document_path . $newname;
        
        $move_status = move_uploaded_file($_FILES['file']['tmp_name'], $destination);              
        $med_file = $newname;
    }
    $med_file = $move_status == TRUE ? $med_file : $default_logo;

    $sql1 = "INSERT INTO about_us_video(id,file,status,added_on"
            . " ) VALUES('','$med_file','$status','$date')";
    
    $res1 = mysqli_query($con, $sql1) or trigger_error("Query Failed! SQL: $sql1 - Error: " . mysqli_error(), E_USER_ERROR);
    
    
    

    if ($res1) {
        header("Location: aboutus.php?insertmsg=success");
    } else {
        header("Location: aboutus.php?insertmsg=faliure");
    }
}



