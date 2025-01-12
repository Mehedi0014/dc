<?php

error_reporting(E_ALL);
include('../includes/conn.php');

if (isset($_POST['submit']) || !empty($_POST)) {

    $date = $_POST['cur_date'];
    $training_name = mysqli_real_escape_string($con, $_POST['training_name']);
    $meta_title = mysqli_real_escape_string($con, $_POST['meta_title']);
    $keyword = mysqli_real_escape_string($con, $_POST['keyword']);
    $description = mysqli_real_escape_string($con, $_POST['description']);
    $sort = mysqli_real_escape_string($con, $_POST['sort']);
    $ficon = mysqli_real_escape_string($con, $_POST['ficon']);
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

    $qry_check = "select * from training where `name` = '$training_name' and `date_added` = (select max(date_added) from training where `name` = '$training_name')";
    $res_check = mysqli_query($con, $qry_check) or trigger_error("Query Failed! SQL: $qry_check - Error: " . mysqli_error(), E_USER_ERROR);
    $row_check = mysqli_fetch_array($res_check);
    $num_check = mysqli_num_rows($res_check);
    if ($num_check <= 0) {
        $alias = str_replace(' ', '-', trim($training_name));
        $alias = preg_replace('/[^A-Za-z0-9\-]/', '', trim($alias));
//        $alias = eregi_replace("[^a-z0-9\040]", "", str_replace("-", " ", $training_name));
//        $alias = eregi_replace("[\040]+", "-", trim($alias));
        $alias = strtolower($alias);
    } else {
        $key = $row_check['alias'];
        $last = substr($key, -1);

        if (is_numeric($last)) {
            $alias = str_replace(' ', '-', trim($training_name));
            $alias = preg_replace('/[^A-Za-z0-9\-]/', '-', trim($alias));
//            $alias = eregi_replace("[^a-z0-9\040]", "", str_replace("-", " ", $training_name));
//            $alias = eregi_replace("[\040]+", "-", trim($alias));
            $last = $last + 1;
            $alias = $alias . $last;
            $alias = strtolower($alias);
        } else {
            $alias = str_replace(' ', '-', trim($training_name));
            $alias = preg_replace('/[^A-Za-z0-9\-]/', '-', trim($alias));
//            $alias = eregi_replace("[^a-z0-9\040]", "", str_replace("-", " ", $training_name));
//            $alias = eregi_replace("[\040]+", "-", trim($alias));
            $alias = $alias . '1';
            $alias = strtolower($alias);
        }
    }

    //banner image

    $original_nm_photo = $_FILES['page_image']['name'];
    $allowedexts = array("JPEG", "JPG", "PNG", "jpeg", "jpg", "png", "GIF", "gif");
    $document_path = realpath(__DIR__ . '/../..') . $document_path_training;
    $extension = explode(".", $original_nm_photo);
    $exts = end($extension);
    $move_status = false;
    $default_logo = 'inner_banner1.png';
    if (($_FILES['page_image']['size'] < 500000000) && in_array($exts, $allowedexts)) {
        $newname = 'banner_' . date('d-m-y') . "_" . time() . "." . $exts;
        $destination = $document_path . $newname;
        $move_status = move_uploaded_file($_FILES['page_image']['tmp_name'], $destination);
        $page_image = $newname;
    }
    $page_image = $move_status == TRUE ? $page_image : $default_logo;


    //homepage image

    $original_nm_photo2 = $_FILES['homepage_image']['name'];
    $allowedexts2 = array("JPEG", "JPG", "PNG", "jpeg", "jpg", "png", "GIF", "gif");
    $document_path2 = realpath(__DIR__ . '/../..') . $document_path_training;
    $extension2 = explode(".", $original_nm_photo2);
    $exts2 = end($extension2);
    $move_status2 = false;
    $default_logo2 = '';
    if (($_FILES['homepage_image']['size'] < 500000000) && in_array($exts2, $allowedexts2)) {
        $newname2 = 'homepage_' . date('d-m-y') . "_" . time() . "." . $exts2;
        $destination2 = $document_path2 . $newname2;
        $move_status2 = move_uploaded_file($_FILES['homepage_image']['tmp_name'], $destination2);
        $home_image = $newname2;
    }
    $home_image = $move_status2 == TRUE ? $home_image : $default_logo2;



    //service image


    $original_nm_photo3 = $_FILES['training_image']['name'];
    $allowedexts3 = array("JPEG", "JPG", "PNG", "jpeg", "jpg", "png", "GIF", "gif");
    $document_path3 = realpath(__DIR__ . '/../..') . $document_path_training;
    $extension3 = explode(".", $original_nm_photo3);
    $exts3 = end($extension3);
    $move_status3 = false;
    $default_logo3 = '';
    if (($_FILES['course_image']['size'] < 500000000) && in_array($exts3, $allowedexts3)) {
        $newname3 = 'training_' . date('d-m-y') . "_" . time() . "." . $exts3;
        $destination3 = $document_path3 . $newname3;
        $move_status3 = move_uploaded_file($_FILES['training_image']['tmp_name'], $destination3);
        $training_image = $newname3;
    }
    $training_image = $move_status3 == TRUE ? $training_image : $default_logo3;


    $sql1 = "INSERT INTO training(id, name, alias, description, f_icon, banner_img, other_image, homepage_image, homepage, meta_title, keyword, description2, sort, status, date_added"
            . " ) VALUES('', '$training_name', '$alias', '$body', '$ficon', '$page_image', '$training_image', '$home_image', '$home', '$meta_title', '$keyword', '$description', '$sort', '$publish', '$date')";
    //exit();
    $res1 = mysqli_query($con, $sql1) or trigger_error("Query Failed! SQL: $sql1 - Error: " . mysqli_error(), E_USER_ERROR);


    if ($res1) {

        header("Location: info_training.php?insertmsg=success");
    } else {
        header("Location: info_training.php?insertmsg=faliure");
    }
} else {
    header("Location: info_training.php?insertmsg=duplicate_email");
}




