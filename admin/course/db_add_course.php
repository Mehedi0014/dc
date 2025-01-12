<?php

error_reporting(E_ALL);
include('../includes/conn.php');

if (isset($_POST['submit']) || !empty($_POST)) {

    $date = $_POST['cur_date'];
    $course_name = mysqli_real_escape_string($con, $_POST['course_name']);
    $meta_title = mysqli_real_escape_string($con, $_POST['meta_title']);
    $keyword = mysqli_real_escape_string($con, $_POST['keyword']);
    $description = mysqli_real_escape_string($con, $_POST['description']);
    
    $fee = mysqli_real_escape_string($con, $_POST['fee']);
    $seat = mysqli_real_escape_string($con, $_POST['seat']);
    
    $sort = mysqli_real_escape_string($con, $_POST['sort']);
    $body = trim($_POST['editor1']);
    $body = htmlentities($body);

    $shortbody = trim($_POST['editor2']);
    $shortbody = htmlentities($shortbody);
    
    $course_date = mysqli_real_escape_string($con, $_POST['course_date']);
    
    $course_day = date('d', strtotime($course_date));
    $course_month = date('m', strtotime($course_date));
    $course_year = date('Y', strtotime($course_date));
    
    $publish = $_POST['publish'];
    if (!isset($_POST['publish'])) {
        $publish = '1';
    } else {
        $publish = '0';
    }


    $qry_check = "select * from course where `name` = '$service_name' and `date_added` = (select max(date_added) from course where `name` = '$service_name')";
    $res_check = mysqli_query($con, $qry_check) or trigger_error("Query Failed! SQL: $qry_check - Error: " . mysqli_error(), E_USER_ERROR);
    $row_check = mysqli_fetch_array($res_check);
    $num_check = mysqli_num_rows($res_check);
    if ($num_check <= 0) {
        $alias = str_replace(' ', '-', trim($course_name));
        $alias = preg_replace('/[^A-Za-z0-9\-]/', '', trim($alias));
//        $alias = eregi_replace("[^a-z0-9\040]", "", str_replace("-", " ", $course_name));
//        $alias = eregi_replace("[\040]+", "-", trim($alias));
        $alias = strtolower($alias);
    } else {
        $key = $row_check['alias'];
        $last = substr($key, -1);

        if (is_numeric($last)) {
            $alias = str_replace(' ', '-', trim($course_name));
            $alias = preg_replace('/[^A-Za-z0-9\-]/', '', trim($alias));
//            $alias = eregi_replace("[^a-z0-9\040]", "", str_replace("-", " ", $course_name));
//            $alias = eregi_replace("[\040]+", "-", trim($alias));
            $last = $last + 1;
            $alias = $alias . $last;
            $alias = strtolower($alias);
        } else {
            $alias = str_replace(' ', '-', trim($course_name));
            $alias = preg_replace('/[^A-Za-z0-9\-]/', '', trim($alias));
//            $alias = eregi_replace("[^a-z0-9\040]", "", str_replace("-", " ", $course_name));
//            $alias = eregi_replace("[\040]+", "-", trim($alias));
            $alias = $alias . '1';
            $alias = strtolower($alias);
        }
    }

    //banner image

    $original_nm_photo = $_FILES['page_image']['name'];
    $allowedexts = array("JPEG", "JPG", "PNG", "jpeg", "jpg", "png", "GIF", "gif");
    $document_path = realpath(__DIR__ . '/../..') . $document_path_course;
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
    $document_path2 = realpath(__DIR__ . '/../..') . $document_path_course;
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


    $sql1 = "INSERT INTO course(id, name, alias, description, banner_img, short_description, homepage_image, "
            . "course_date, course_day, course_month, course_year, course_fee, seat, meta_title, keyword, description2, sort, status, date_added"
            . " ) VALUES('', '$course_name', '$alias', '$body', '$page_image', '$shortbody', '$home_image', '$course_date', "
            . "'$course_day', '$course_month', '$course_year', '$fee', '$seat', '$meta_title', '$keyword', '$description', '$sort', '$publish', '$date')";
    //exit();
    $res1 = mysqli_query($con, $sql1) or trigger_error("Query Failed! SQL: $sql1 - Error: " . mysqli_error(), E_USER_ERROR);


    if ($res1) {

        header("Location: info_course.php?insertmsg=success");
    } else {
        header("Location: info_course.php?insertmsg=faliure");
    }
} else {
    header("Location: info_course.php?insertmsg=duplicate_email");
}




