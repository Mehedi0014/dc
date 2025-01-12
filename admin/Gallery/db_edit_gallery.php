<?php

include('../includes/conn.php');

if (isset($_POST['submit']) || !empty($_POST)) {

    $id = $_POST['id'];

    $date = $_POST['cur_date'];
    $cat_title = mysqli_real_escape_string($con,$_POST['cat_title']);

    $publish = $_POST['publish'];
    if (!isset($_POST['publish'])) {
        $publish = '1';
    } else {
        $publish = '0';
    }

    $sql1 = "UPDATE `gallery_category` SET `category_name` = '$cat_title', `status` = '$publish'"
            . "  WHERE `id`= '$id'";
    $res1 = mysqli_query($con, $sql1) or trigger_error("Query Failed! SQL: $sql1 - Error: " . mysqli_error(), E_USER_ERROR);


    if ($res1) {
        header("Location: info_gallery.php?editmsg=Successfully Edited");
    } else {
        header("Location: info_gallery.php?&editmsg=error");
    }
} else {
    header("Location: info_gallery.php?editmsg=general_error");
}