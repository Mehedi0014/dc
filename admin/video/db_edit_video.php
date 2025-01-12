<?php
include('../includes/conn.php');

if(isset($_POST['submit']) || !empty($_POST)){
    
    $id = $_POST['id'];
    
    $date = $_POST['cur_date'];    
    $vid_title = mysqli_real_escape_string($con,$_POST['vid_title']);
    $video = mysqli_real_escape_string($con,$_POST['video']);
    $sort = mysqli_real_escape_string($con,$_POST['sort']);
    $publish = $_POST['publish'];
    if (!isset($_POST['publish'])) {
        $publish = '1';
    } else {
        $publish = '0';
    } 
    
   
   $sql1 = "UPDATE `video` SET `name`= '$vid_title', `video` = '$video', `sort` = '$sort', "
            . "`status`= '$publish' WHERE `id`= '$id'";
            
        $res1 = mysqli_query($con,$sql1) or trigger_error("Query Failed! SQL: $qry_img - Error: " . mysqli_error(), E_USER_ERROR);
    if($res1){
        header("Location: list_video.php?editmsg=Successfully Updated");
    }else{
        header("Location: list_video.php?editmsg=Error");
    }
    
   
}else{
    header("Location: list_video.php?insertmsg=General Error");
}