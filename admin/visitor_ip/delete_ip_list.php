<?php

error_reporting(E_ALL);
include('../includes/conn.php');

//if (isset($_POST['submit']) || !empty($_POST)) {

$from_dt = $_POST['from_dt'];
$to_dt = $_POST['to_dt'];
if ($from_dt > $to_dt) {
    header("Location: info_ip.php?insertmsg=From Date cannot be greater than To Date");
} else {

    $del_from_dt = $from_dt . ' 00:00:00';


    $del_to_dt = $to_dt . ' 23:59:59';

    $sql_ip = "DELETE from `ip_track` where date_visited >= '$del_from_dt' and date_visited <= '$del_to_dt'";
    
    $res_ip = mysqli_query($con, $sql_ip) or trigger_error("Query Failed! SQL: $sql_ip - Error: " . mysqli_error(), E_USER_ERROR);


    if ($res_ip) {

        header("Location: info_ip.php?insertmsg=Deleted");
    } else {
        header("Location: info_ip.php?insertmsg=faliure");
    }
}
//}



