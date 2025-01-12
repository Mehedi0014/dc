<?php

error_reporting(E_ALL);
include('../includes/conn.php');

//if (isset($_POST['submit']) || !empty($_POST)) {

$id = $_GET['id'];


$sql = "DELETE FROM `video` WHERE `id`= '$id'";
$res = mysqli_query($con, $sql) or trigger_error("Query Failed! SQL: $sql - Error: " . mysqli_error(), E_USER_ERROR);

if ($res) {
    
    header("Location: list_video.php?insertmsg=Deleted");
} else {
    header("Location: list_video.php?insertmsg=faliure");
}
//}



