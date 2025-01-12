<?php

error_reporting(E_ALL);
include('../includes/conn.php');

if (isset($_POST['submit']) || !empty($_POST)) {

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


    $sql1 = "INSERT INTO job(id, title, description, status"
            . " ) VALUES('', '$title', '$body', '$publish')";
    
    $res1 = mysqli_query($con, $sql1) or trigger_error("Query Failed! SQL: $sql1 - Error: " . mysqli_error(), E_USER_ERROR);
    
    
    

    if ($res1) {
        header("Location: job_list.php?insertmsg=success");
    } else {
        header("Location: job_list.php?insertmsg=faliure");
    }
}



