<?php
include('../includes/conn.php');

if(isset($_POST['submit']) || !empty($_POST)){
    
    $id = $_POST['id'];
    
    $date = $_POST['cur_date'];    
    $tes_name = $_POST['tes_name'];
    $desg = $_POST['desg'];  
    $sort = $_POST['sort'];
    $body = trim($_POST['editor5']);
    $body = htmlentities($body); 
 
     if(!isset($_POST['publish'])){
        $publish = '1';
    }else{
        $publish = '0';
    }
    
    if (!isset($_POST['home'])) {
        $home = 'No';
    } else {
        $home = $_POST['home'];
    }

    //file upload (Image)

    $original_nm_photo = $_FILES['page_image']['name'];
    $allowedexts = array("JPEG", "JPG", "PNG", "jpeg", "jpg", "png", "GIF", "gif");
    $document_path = realpath(__DIR__ . '/../..') . $document_path_testimonial;
    $extension = explode(".", $original_nm_photo);
    $exts = end($extension);
    $move_status = false;
    //$default_logo = 'default-logo.png';
    
    $qry_img1 = "select * from testimonial where id = '$id'";
    $res_img1 = mysqli_query($con,$qry_img1);
    $row_img1 = mysqli_fetch_array($res_img1) or trigger_error("Query Failed! SQL: $res_img1 - Error: " . mysqli_error(), E_USER_ERROR);
    
    $default_logo = $row_img1['image'];
    
    //exit();
    if (($_FILES['page_image']['size'] < 500000000) && in_array($exts, $allowedexts)) {
        $newname = date('d-m-y') . "_" . time() . "." . $exts;
        $destination = $document_path . $newname;
        $move_status = move_uploaded_file($_FILES['page_image']['tmp_name'], $destination);
        $page_image = $newname;
    }
     $page_image = $move_status == TRUE ? $page_image : $default_logo;
     
    
   
   $sql1 = "UPDATE `testimonial` SET `name`= '$tes_name', `image`= '$page_image', `designation` = '$desg', `body` = '$body', `homepage` = '$home', `sort` = '$sort', "
            . "`status` = '$publish' WHERE `id`= '$id'";
        $res1 = mysqli_query($con,$sql1) or trigger_error("Query Failed! SQL: $qry_img - Error: " . mysqli_error(), E_USER_ERROR);
    if($res1){
        header("Location: list-testimonial.php?editmsg=success");
    }else{
        header("Location: list-testimonial.php?editmsg=error");
    }
    
   
}else{
    header("Location: list-posts.php?insertmsg=general_error");
}