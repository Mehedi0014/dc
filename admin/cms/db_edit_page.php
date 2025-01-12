<?php

include('../includes/conn.php');

if (isset($_POST['submit']) || !empty($_POST)) {

    $id = $_POST['id'];

    $date = $_POST['cur_date'];
    $parent_id = mysqli_real_escape_string($con, $_POST['parent_id']);
    $page_title = mysqli_real_escape_string($con, $_POST['page_title']);
    $meta_title = mysqli_real_escape_string($con, $_POST['meta_title']);
    $keyword = mysqli_real_escape_string($con, $_POST['keyword']);
    $description = mysqli_real_escape_string($con, $_POST['description']);
    
    $button_text = mysqli_real_escape_string($con, $_POST['button_text']);
    $button_link = mysqli_real_escape_string($con, $_POST['button_link']);
    
    $body = trim($_POST['editor1']);
    $body = htmlentities($body);


    $publish = $_POST['publish'];
    if (!isset($_POST['publish'])) {
        $publish = '1';
    } else {
        $publish = '0';
    }

    $old_page = $_POST['old_page'];
    $old_alias = $_POST['old_alias'];
    //$old_template = $_POST['old_template'];


    if ($old_page != $page_title) {


        $qry_check = "select * from page where `title` = '$page_title' and `creation_date` = (select max(creation_date) from page where `title` = '$page_title')";
        $res_check = mysqli_query($con, $qry_check) or trigger_error("Query Failed! SQL: $qry_check - Error: " . mysqli_error(), E_USER_ERROR);
        $row_check = mysqli_fetch_array($res_check);
        $num_check = mysqli_num_rows($res_check);
        if ($num_check <= 0) {
            $alias = str_replace(' ', '-', trim($page_title));
            $alias = preg_replace('/[^A-Za-z0-9\-]/', '-', trim($alias));
//        $alias = eregi_replace("[^a-z0-9\040]", "", str_replace("-", " ", $page_title));
//        $alias = eregi_replace("[\040]+", "-", trim($alias));
            $alias = strtolower($alias);
        } else {
            $key = $row_check['alias'];
            $last = substr($key, -1);

            if (is_numeric($last)) {
                $alias = str_replace(' ', '-', trim($page_title));
                $alias = preg_replace('/[^A-Za-z0-9\-]/', '-', trim($alias));
//            $alias = eregi_replace("[^a-z0-9\040]", "", str_replace("-", " ", $page_title));
//            $alias = eregi_replace("[\040]+", "-", trim($alias));
                $last = $last + 1;
                $alias = $alias . $last;
                $alias = strtolower($alias);
            } else {
                $alias = str_replace(' ', '-', trim($page_title));
                $alias = preg_replace('/[^A-Za-z0-9\-]/', '-', trim($alias));
//            $alias = eregi_replace("[^a-z0-9\040]", "", str_replace("-", " ", $page_title));
//            $alias = eregi_replace("[\040]+", "-", trim($alias));
                $alias = $alias . '1';
                $alias = strtolower($alias);
            }
        }
    } else {
        $alias = $old_alias;
    }

    //file upload (Page Image)

    $original_nm_photo = $_FILES['page_image']['name'];
    $allowedexts = array("JPEG", "JPG", "PNG", "jpeg", "jpg", "png", "GIF", "gif");
    $document_path = realpath(__DIR__ . '/../..') . $document_page_banner;
    $extension = explode(".", $original_nm_photo);
    $exts = end($extension);
    $move_status = false;
    //$default_logo = 'default-logo.png';

    $qry_img1 = "select * from page where id = '$id'";
    $res_img1 = mysqli_query($con, $qry_img1);
    $row_img1 = mysqli_fetch_array($res_img1) or trigger_error("Query Failed! SQL: $res_img1 - Error: " . mysqli_error(), E_USER_ERROR);

    $default_logo = $row_img1['banner_img'];

    //exit();
    if (($_FILES['page_image']['size'] < 500000000) && in_array($exts, $allowedexts)) {
        $newname = 'banner_' . date('d-m-y') . "_" . time() . "." . $exts;
        $destination = $document_path . $newname;
        $move_status = move_uploaded_file($_FILES['page_image']['tmp_name'], $destination);
        $page_image = $newname;
    }
    $page_image = $move_status == TRUE ? $page_image : $default_logo;





    //file upload (Other Image)

    $original_nm_photo2 = $_FILES['other_image']['name'];
    $allowedexts2 = array("JPEG", "JPG", "PNG", "jpeg", "jpg", "png", "GIF", "gif");
    $document_path2 = realpath(__DIR__ . '/../..') . $document_page_banner;
    $extension2 = explode(".", $original_nm_photo2);
    $exts2 = end($extension2);
    $move_status2 = false;
    //$default_logo = 'default-logo.png';


    $default_logo2 = $row_img1['other_image'];

    //exit();
    if (($_FILES['other_image']['size'] < 500000000) && in_array($exts2, $allowedexts2)) {
        $newname2 = 'other_' . date('d-m-y') . "_" . time() . "." . $exts2;
        $destination2 = $document_path2 . $newname2;
        $move_status2 = move_uploaded_file($_FILES['other_image']['tmp_name'], $destination2);
        $other_image = $newname2;
    }
    $other_image = $move_status2 == TRUE ? $other_image : $default_logo2;




    $sql1 = "UPDATE `page` SET `title`= '$page_title',`parent_id`='$parent_id',`banner_img` = '$page_image', `other_image` = '$other_image', `body` = '$body', `meta_title` = '$meta_title', `keyword` = '$keyword',`button_text` = '$button_text',`button_link`='$button_link',`description` = '$description',"
            . "`status`= '$publish', `last_update`= '$date' WHERE `id`= '$id'";

    $res1 = mysqli_query($con, $sql1) or trigger_error("Query Failed! SQL: $qry_img - Error: " . mysqli_error(), E_USER_ERROR);
    if ($res1) {
        header("Location: list_cms.php?editmsg=Successfully Updated");
    } else {
        header("Location: list_cms.php?editmsg=Error");
    }
} else {
    header("Location: list_cms.php?insertmsg=General Error");
}