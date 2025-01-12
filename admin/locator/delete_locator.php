<?php

error_reporting(E_ALL);
include('../includes/conn.php');

//if (isset($_POST['submit']) || !empty($_POST)) {

$id = $_GET['id'];

//$cat_id = $_POST['cat_id'];


$qry_sel_file = "select * from `locator` WHERE `id`= '$id'";
$res_sel_file = mysqli_query($con, $qry_sel_file) or trigger_error("Query Failed! SQL: $qry_sel_file - Error: " . mysqli_error(), E_USER_ERROR);
$row_sel_file = mysqli_fetch_array($res_sel_file);

//$old_banner = $row_sel_file['logo'];

//$dept_id = $row_sel_file['department_id'];
//exit();
$sql_people = "DELETE from `locator` "
        . "  WHERE `id`= '$id'";
$res_people = mysqli_query($con, $sql_people) or trigger_error("Query Failed! SQL: $sql_people - Error: " . mysqli_error(), E_USER_ERROR);

//$document_path_profile = dirname(__DIR__) . $document_path_upload_companylogo;




if ($res_people) {
   
        header("Location: list_locator.php?insertmsg=Deleted");
   
} else {
    header("Location: list_locator.php?insertmsg=faliure");
}
//}



