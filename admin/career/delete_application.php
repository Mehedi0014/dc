<?php

error_reporting(E_ALL);
include('../includes/conn.php');

//if (isset($_POST['submit']) || !empty($_POST)) {


$id = $_GET['id'];


$qry_sel_file = "select * from `applications` WHERE `id`= '$id'";
$res_sel_file = mysqli_query($con, $qry_sel_file) or trigger_error("Query Failed! SQL: $qry_sel_file - Error: " . mysqli_error(), E_USER_ERROR);
$row_sel_file = mysqli_fetch_array($res_sel_file);
$cv = $row_sel_file['cv'];
//exit();
$sql = "DELETE FROM `applications` WHERE `id`= '$id'";

$res = mysqli_query($con, $sql) or trigger_error("Query Failed! SQL: $sql - Error: " . mysqli_error(), E_USER_ERROR);

    $document_path = realpath(__DIR__ . '/../..') . $document_path_cv;

    if ($res) {
         unlink($document_path . $cv);
        header("Location: application_list.php?insertmsg=Deleted");
    } else {
        header("Location: application_list.php?insertmsg=faliure");
    }
//}



