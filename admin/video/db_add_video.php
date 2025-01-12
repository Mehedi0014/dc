<?php

error_reporting(E_ALL);
include('../includes/conn.php');

if (isset($_POST['submit']) || !empty($_POST)) {

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


    $sql1 = "INSERT INTO video(id, name, video, status, sort, date_added"
            . " ) VALUES('', '$vid_title', '$video', '$publish', '$sort', '$date')";
    
    $res1 = mysqli_query($con, $sql1) or trigger_error("Query Failed! SQL: $sql1 - Error: " . mysqli_error(), E_USER_ERROR);
    
    
    

    if ($res1) {
        header("Location: list_video.php?insertmsg=success");
    } else {
        header("Location: list_video.php?insertmsg=faliure");
    }
}



