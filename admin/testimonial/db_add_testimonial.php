<?php

error_reporting(E_ALL);
include('../includes/conn.php');

if (isset($_POST['submit']) || !empty($_POST)) {

    $date = $_POST['cur_date'];
    $tes_name = $_POST['tes_name'];
    $desg = $_POST['desg'];
    $sort = $_POST['sort'];
    $body = trim($_POST['editor1']);
    $body = htmlentities($body);

    $publish = $_POST['publish'];
    if (!isset($_POST['publish'])) {
        $publish = '1';
    } else {
        $publish = '0';
    }
    if (!isset($_POST['home'])) {
        $home = 'No';
    } else {
        $home = $_POST['home'];
    }

//file upload (testimonial)

    $original_nm_photo = $_FILES['page_image']['name'];
    $allowedexts = array("JPEG", "JPG", "PNG", "jpeg", "jpg", "png", "GIF", "gif");
    $document_path = realpath(__DIR__ . '/../..') . $document_path_testimonial;
    $extension = explode(".", $original_nm_photo);
    $exts = end($extension);
    $move_status = false;
    $default_logo = '';
    if (($_FILES['page_image']['size'] < 500000000) && in_array($exts, $allowedexts)) {
        $newname = date('d-m-y') . "_" . time() . "." . $exts;
        $destination = $document_path . $newname;
        $move_status = move_uploaded_file($_FILES['page_image']['tmp_name'], $destination);
        $page_image = $newname;
    }
    $page_image = $move_status == TRUE ? $page_image : $default_logo;


    $sql1 = "INSERT INTO testimonial(id, name, image, designation, body, homepage, sort, status"
            . " ) VALUES('', '$tes_name', '$page_image', '$desg', '$body', '$home', '$sort','$publish')";
    //exit();
    $res1 = mysqli_query($con, $sql1) or trigger_error("Query Failed! SQL: $sql1 - Error: " . mysqli_error(), E_USER_ERROR);


    if ($res1) {
        header("Location: list-testimonial.php?insertmsg=success");
    } else {
        header("Location: list-testimonial.php?insertmsg=faliure");
    }
}



