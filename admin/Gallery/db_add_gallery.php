<?php

error_reporting(E_ALL);
include('../includes/conn.php');

if (isset($_POST['submit']) || !empty($_POST)) {

    //$id = $_POST['college_id'];
    $date = $_POST['cur_date'];

    $cat_name = mysqli_real_escape_string($con,$_POST['cat_name']);
    $publish = $_POST['publish'];
    if (!isset($_POST['publish'])) {
        $publish = '1';
    } else {
        $publish = '0';
    }



        $sql1 = "INSERT INTO gallery_category(id, category_name, status"
                . " ) VALUES('', '$cat_name', '$publish')";
        //exit();
        $res1 = mysqli_query($con, $sql1) or trigger_error("Query Failed! SQL: $sql1 - Error: " . mysqli_error(), E_USER_ERROR);


        if (res1) {

            header("Location: info_gallery.php?insertmsg=success");
        } else {
            header("Location: info_gallery.php?insertmsg=faliure");
        }
    } else {
        header("Location: info_gallery.php?insertmsg=duplicate_email");
    }




