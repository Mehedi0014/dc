<?php
include('../includes/conn.php');

if(isset($_POST['submit']) || !empty($_POST)){
    
    $id = $_POST['id'];
    
    $date = $_POST['cur_date'];   
    $st_name = mysqli_real_escape_string($con,$_POST['st_name']);
//    $company = $_POST['company'];
//    $phone = $_POST['phone'];

    $map = mysqli_real_escape_string($con,$_POST['map']);
    $sort = mysqli_real_escape_string($con,$_POST['sort']);
    $body = trim($_POST['editor1']);
    $body = htmlentities($body);
    
    
   

    $publish = $_POST['publish'];
    if (!isset($_POST['publish'])) {
        $publish = '1';
    } else {
        $publish = '0';
    }
    
 
    
    //file upload (Page Image)

//    $original_nm_photo = $_FILES['logo']['name'];
//    $allowedexts = array("JPEG", "JPG", "PNG", "jpeg", "jpg", "png", "GIF", "gif","pdf","PDF");
//    $document_path = dirname(__DIR__) . $document_path_upload_companylogo;
//    $extension = explode(".", $original_nm_photo);
//    $exts = end($extension);
//    $move_status = false;
//    //$default_logo = 'default-logo.png';
//    
//    $qry_img1 = "select * from outlet where id = '$id'";
//    $res_img1 = mysqli_query($con,$qry_img1);
//    $row_img1 = mysqli_fetch_array($res_img1) or trigger_error("Query Failed! SQL: $res_img1 - Error: " . mysqli_error(), E_USER_ERROR);
//    
//    $default_logo = $row_img1['logo'];
//    
//    //exit();
//    if (($_FILES['logo']['size'] < 500000000) && in_array($exts, $allowedexts)) {
//        $newname = date('d-m-y') . "_" . time() . "." . $exts;
//        $destination = $document_path . $newname;
//        $move_status = move_uploaded_file($_FILES['logo']['tmp_name'], $destination);
//        $page_image = $newname;
//    }
//     $page_image = $move_status == TRUE ? $page_image : $default_logo;
     
    
   
   $sql1 = "UPDATE `locator` SET `name`= '$st_name',  `address` = '$body', "
            . " `map`= '$map', `sort`= '$sort', `status`= '$publish' WHERE `id`= '$id'";
            
        $res1 = mysqli_query($con,$sql1) or trigger_error("Query Failed! SQL: $qry_img - Error: " . mysqli_error(), E_USER_ERROR);
    if($res1){
        header("Location: list_locator.php?editmsg=Successfully Updated");
    }else{
        header("Location: list_locator.php?editmsg=Error");
    }
    
   
}else{
    header("Location: list_locator.php?insertmsg=General Error");
}