<?php

error_reporting(E_ALL);
include('../includes/conn.php');

if (isset($_POST['submit']) || !empty($_POST)) {

    $date = $_POST['cur_date'];
    $page_title = mysqli_real_escape_string($con, $_POST['page_title']);
    $blog_date = mysqli_real_escape_string($con, $_POST['blog_date']);
    $meta_title = mysqli_real_escape_string($con, $_POST['meta_title']);
    $keyword = mysqli_real_escape_string($con, $_POST['keyword']);
    $description = mysqli_real_escape_string($con, $_POST['description']);
    $sort = mysqli_real_escape_string($con, $_POST['sort']);
    $body = trim($_POST['editor1']);
    $body = htmlentities($body);



    $publish = $_POST['publish'];
    if (!isset($_POST['publish'])) {
        $publish = '1';
    } else {
        $publish = '0';
    }

    $qry_check = "select * from blog where `title` = '$page_title' and `creation_date` = (select max(creation_date) from blog where `title` = '$page_title')";

    $res_check = mysqli_query($con, $qry_check) or trigger_error("Query Failed! SQL: $qry_check - Error: " . mysqli_error(), E_USER_ERROR);
    $row_check = mysqli_fetch_array($res_check);
    $num_check = mysqli_num_rows($res_check);

    if ($num_check <= 0) {
        $alias = str_replace(' ', '-', trim($page_title));
        $alias = preg_replace('/[^A-Za-z0-9\-]/', '', trim($alias));
//        $alias = eregi_replace("[^a-z0-9\040]", "", str_replace("-", " ", $page_title));
//        $alias = eregi_replace("[\040]+", "-", trim($alias));
        $alias = strtolower($alias);
    } else {
        $key = $row_check['alias'];
        $last = substr($key, -1);

        if (is_numeric($last)) {
            $alias = str_replace(' ', '-', trim($page_title));
            $alias = preg_replace('/[^A-Za-z0-9\-]/', '', trim($alias));
//            $alias = eregi_replace("[^a-z0-9\040]", "", str_replace("-", " ", $page_title));
//            $alias = eregi_replace("[\040]+", "-", trim($alias));
            $last = $last + 1;
            $alias = $alias . $last;
            $alias = strtolower($alias);
        } else {
            $alias = str_replace(' ', '-', trim($page_title));
            $alias = preg_replace('/[^A-Za-z0-9\-]/', '', trim($alias));
//            $alias = eregi_replace("[^a-z0-9\040]", "", str_replace("-", " ", $page_title));
//            $alias = eregi_replace("[\040]+", "-", trim($alias));
            $alias = $alias . '1';
            $alias = strtolower($alias);
        }
    }

    //exit();
    //file upload (Page Banner)

    $original_nm_photo = $_FILES['page_image']['name'];

    $allowedexts = array("JPEG", "JPG", "PNG", "jpeg", "jpg", "png", "GIF", "gif", "pdf", "PDF");
    $document_path = realpath(__DIR__ . '/../..') . $document_page_blog;
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




    $sql1 = "INSERT INTO blog(id, title, banner_img, body, alias, blog_date, meta_title, keyword, description, sort, status, creation_date, last_update"
            . " ) VALUES('', '$page_title', '$page_image', '$body', '$alias', '$blog_date', '$meta_title', '$keyword', '$description', '$sort', '$publish', '$date', '$date')";

    $res1 = mysqli_query($con, $sql1) or trigger_error("Query Failed! SQL: $sql1 - Error: " . mysqli_error(), E_USER_ERROR);




    if ($res1) {
        header("Location: list_blog.php?insertmsg=success");
    } else {
        header("Location: list_blog.php?insertmsg=faliure");
    }
}



