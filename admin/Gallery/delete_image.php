<?php

error_reporting(E_ALL);
include('../includes/conn.php');

//if (isset($_POST['submit']) || !empty($_POST)) {

    $id = $_GET['id'];

    $cat_id = $_GET['cat_id'];

  
$qry_sel_file = "select * from `gallery` WHERE `id`= '$id'";
$res_sel_file = mysqli_query($con, $qry_sel_file) or trigger_error("Query Failed! SQL: $qry_sel_file - Error: " . mysqli_error(), E_USER_ERROR);
$row_sel_file = mysqli_fetch_array($res_sel_file);

//exit();
$sql = "DELETE FROM `gallery` WHERE `id`= '$id'";
$res = mysqli_query($con, $sql) or trigger_error("Query Failed! SQL: $sql - Error: " . mysqli_error(), E_USER_ERROR);

    $document_path = realpath(__DIR__ . '/../..') . $document_path_gallery;

    if ($res) {
         unlink($document_path . $row_sel_file['gallery_img']);
        header("Location: info_image.php?id=".$cat_id."&action=Edit&insertmsg=Deleted");
    } else {
        header("Location: info_image.php?id=".$cat_id."&action=Edit&insertmsg=faliure");
    }
//}



