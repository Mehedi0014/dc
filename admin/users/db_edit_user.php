<?php

include('../includes/conn.php');

if (isset($_POST['submit']) || !empty($_POST)) {

    $id = $_POST['id'];

    $date = $_POST['cur_date'];
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $address = mysqli_real_escape_string($con, $_POST['address']);
    $type = $_POST['type'];
    $oldtype = $_POST['oldtype'];
    $publish = $_POST['publish'];
    if (!isset($_POST['publish'])) {
        $publish = '1';
    } else {
        $publish = '0';
    }



    $sql1 = "UPDATE `customer_registration` SET `name`= '$name', `email` = '$email', "
            . "`phone` = '$phone', `address` = '$address', `user_type` = '$type', "
            . "`status`= '$publish' WHERE `id`= '$id'";
    
    $res1 = mysqli_query($con, $sql1) or trigger_error("Query Failed! SQL: $sql1 - Error: " . mysqli_error(), E_USER_ERROR);
    
    if($type != $oldtyp){
        
        
        $sql_usertype = "INSERT INTO `user_folder` "
                    . "(`id`, `userid`, `folderid`, `added_on`, `modified_on`) "
                . "VALUES ('', '$id', '$type', '$date', '$date')";
            
            $res_usertype = mysqli_query($con, $sql_usertype);
        
    }
    
    
    if ($res1) {
        header("Location: list_user.php?editmsg=Successfully Updated");
    } else {
        header("Location: list_user.php?editmsg=Error");
    }
} else {
    header("Location: list_user.php?insertmsg=General Error");
}