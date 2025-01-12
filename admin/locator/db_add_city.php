<?php

error_reporting(E_ALL);
include('../includes/conn.php');

if (isset($_POST['submit_city']) || !empty($_POST)) {

    $date = $_POST['cur_date'];
    $state = $_POST['state'];
    $city = mysqli_real_escape_string($con, $_POST['city']);

    $chk_city = "select * from city where city = '$city'";
    
    $res_check = mysqli_query($con, $chk_city);
    $row_check = mysqli_fetch_array($res_check);
    $num_check = mysql_num_rows($res_check);
            
    if ($city != '' && $num_check <= 0) {
        

        $sql1 = "INSERT INTO city(id, state, city"
                . " ) VALUES('', '$state', '$city')";
                
        $res1 = mysqli_query($con, $sql1) or trigger_error("Query Failed! SQL: $sql1 - Error: " . mysqli_error(), E_USER_ERROR);




        if ($res1) {
            header("Location: list_outlet.php?insertmsg=success");
        } else {
            header("Location: list_outlet.php?insertmsg=faliure");
        }
    } else {
        header("Location: list_outlet.php?insertmsg=City Insertion Error");
    }
}



