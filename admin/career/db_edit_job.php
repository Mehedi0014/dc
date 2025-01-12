<?php
include('../includes/conn.php');

if(isset($_POST['submit']) || !empty($_POST)){
    
    $id = $_POST['id'];
    
    $date = $_POST['cur_date'];    
    $title = $_POST['title'];
   
    $body = trim($_POST['editor1']);
    $body = htmlentities($body);
    

    $publish = $_POST['publish'];
    if (!isset($_POST['publish'])) {
        $publish = '1';
    } else {
        $publish = '0';
    }
    
   
   $sql1 = "UPDATE `job` SET `title`= '$title', `description` = '$body',"
            . "`status`= '$publish' WHERE `id`= '$id'";
            
        $res1 = mysqli_query($con,$sql1) or trigger_error("Query Failed! SQL: $qry_img - Error: " . mysqli_error(), E_USER_ERROR);
    if($res1){
        header("Location: job_list.php?editmsg=Successfully Updated");
    }else{
        header("Location: job_list.php?editmsg=Error");
    }
    
   
}else{
    header("Location: job_list.php?insertmsg=General Error");
}