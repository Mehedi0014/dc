<?php

include('../includes/conn.php');

if (isset($_POST['submit']) || !empty($_POST)) {

    $id = $_POST['id'];

    $date = $_POST['cur_date'];
    $display = mysqli_real_escape_string($con, $_POST['display']);
    $foldername = mysqli_real_escape_string($con, $_POST['folder']);
    $oldfolder = mysqli_real_escape_string($con, $_POST['oldfolder']);

    $publish = $_POST['publish'];
    if (!isset($_POST['publish'])) {
        $publish = '1';
    } else {
        $publish = '0';
    }


    if ($oldfolder != $foldername) {

        $foldername = str_replace(' ', '', trim($foldername));
        $foldername = preg_replace('/[^A-Za-z0-9\-]/', '', trim($foldername));

        //exit;
        $qryCheckFolder = "select * from folder where foldername = '$foldername'";
        $resCheckFolder = mysqli_query($con, $qryCheckFolder);
        $numCheckFolder = mysqli_num_rows($resCheckFolder);


        if ($numCheckFolder == '0') {

            if (!file_exists($folderpath)) {




                $sql1 = "UPDATE `folder` SET `display`= '$display', `foldername` = '$foldername', "
                        . "`status`= '$publish', `modified_on`= '$date' WHERE `id`= '$id'";

                $res1 = mysqli_query($con, $sql1) or trigger_error("Query Failed! SQL: $qry_img - Error: " . mysqli_error(), E_USER_ERROR);


                $folderpath = realpath(__DIR__ . '/../..') . $document_userupload . $foldername;

                $oldpath = realpath(__DIR__ . '/../..') . $document_userupload . $oldfolder;

                rename($oldpath, $folderpath);

                if ($res1) {
                    header("Location: info_folder.php?editmsg=Successfully Updated");
                } else {
                    header("Location: info_folder.php?editmsg=Error");
                }
            }
        } else {
            header("Location: info_folder.php?insertmsg=Folder Already Exists");
        }
    } else {

        $sql1 = "UPDATE `folder` SET `display`= '$display', `foldername` = '$foldername', "
                . "`status`= '$publish', `modified_on`= '$date' WHERE `id`= '$id'";

        $res1 = mysqli_query($con, $sql1) or trigger_error("Query Failed! SQL: $qry_img - Error: " . mysqli_error(), E_USER_ERROR);
        if ($res1) {
            header("Location: info_folder.php?editmsg=Successfully Updated");
        } else {
            header("Location: info_folder.php?editmsg=Error");
        }
    }
} else {
    header("Location: info_folder.php?insertmsg=General Error");
}