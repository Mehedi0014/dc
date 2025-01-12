<?php

error_reporting(E_ALL);
include('../includes/conn.php');

if (isset($_POST['submit']) || !empty($_POST)) {



    $date = $_POST['cur_date'];
    $display = mysqli_real_escape_string($con, $_POST['display']);
    $foldername = mysqli_real_escape_string($con, $_POST['folder']);

    $publish = $_POST['publish'];
    if (!isset($_POST['publish'])) {
        $publish = '1';
    } else {
        $publish = '0';
    }
    //echo $foldername = preg_replace("/[^a-zA-Z]+/", "", $foldername);

    $foldername = str_replace(' ', '', trim($foldername));
    $foldername = preg_replace('/[^A-Za-z0-9\-]/', '', trim($foldername));

    //exit;
    $qryCheckFolder = "select * from folder where foldername = '$foldername'";
    $resCheckFolder = mysqli_query($con, $qryCheckFolder);
    $numCheckFolder = mysqli_num_rows($resCheckFolder);

    if ($numCheckFolder == '0') {
        if (!file_exists($folderpath)) {
            $sql1 = "INSERT INTO folder(id, display, foldername, status, added_on, modified_on"
                    . " ) VALUES('', '$display', '$foldername', '$publish', '$date', '$date')";

            $res1 = mysqli_query($con, $sql1) or trigger_error("Query Failed! SQL: $sql1 - Error: " . mysqli_error(), E_USER_ERROR);


            $folderpath = realpath(__DIR__ . '/../..') . $document_userupload . $foldername;


            mkdir($folderpath, 0755, true);
        }


        if ($res1) {
            header("Location: info_folder.php?insertmsg=success");
        } else {
            header("Location: info_folder.php?insertmsg=faliure");
        }
    } else {
        header("Location: info_folder.php?insertmsg=Folder Already Exists");
    }
}



