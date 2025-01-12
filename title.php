
<?php

if (strpos($link, 'page/') == true) {
    $qry_chk_pg = "SELECT * FROM `page` WHERE `alias` = '$page_key' and status = '0'";
    $res_chk_pg = mysqli_query($con, $qry_chk_pg) or trigger_error("Query Failed! SQL: $qry_chk_pg - Error: " . mysqli_error(), E_USER_ERROR);
    $row_chk_pg = mysqli_fetch_array($res_chk_pg);
    $title = $row_chk_pg['meta_title'];
    $keyword = $row_chk_pg['keyword'];
    $description = $row_chk_pg['description'];
} else if (strpos($link, 'post/') == true) {
    $qry_chk_pg = "SELECT * FROM `blog` WHERE `alias` = '$post_key' and status = '0'";
    $res_chk_pg = mysqli_query($con, $qry_chk_pg) or trigger_error("Query Failed! SQL: $qry_chk_pg - Error: " . mysqli_error(), E_USER_ERROR);
    $row_chk_pg = mysqli_fetch_array($res_chk_pg);
    $title = $row_chk_pg['meta_title'];
    $keyword = $row_chk_pg['keyword'];
    $description = $row_chk_pg['description'];
} else if (strpos($link, 'training/') == true) {
    $qry_chk_pg = "SELECT * FROM `training` WHERE `alias` = '$training_key' and status = '0'";
    $res_chk_pg = mysqli_query($con, $qry_chk_pg) or trigger_error("Query Failed! SQL: $qry_chk_pg - Error: " . mysqli_error(), E_USER_ERROR);
    $row_chk_pg = mysqli_fetch_array($res_chk_pg);
    $title = $row_chk_pg['meta_title'];
    $keyword = $row_chk_pg['keyword'];
    $description = $row_chk_pg['description2'];
} else if (strpos($link, 'course/') == true) {
    $qry_chk_pg = "SELECT * FROM `course` WHERE `alias` = '$course_key' and status = '0'";
    $res_chk_pg = mysqli_query($con, $qry_chk_pg) or trigger_error("Query Failed! SQL: $qry_chk_pg - Error: " . mysqli_error(), E_USER_ERROR);
    $row_chk_pg = mysqli_fetch_array($res_chk_pg);
    $title = $row_chk_pg['meta_title'];
    $keyword = $row_chk_pg['keyword'];
    $description = $row_chk_pg['description2'];
} else if (strpos($link, 'service/') == true) {
    $qry_chk_pg = "SELECT * FROM `service` WHERE `alias` = '$service_key' and status = '0'";
    $res_chk_pg = mysqli_query($con, $qry_chk_pg) or trigger_error("Query Failed! SQL: $qry_chk_pg - Error: " . mysqli_error(), E_USER_ERROR);
    $row_chk_pg = mysqli_fetch_array($res_chk_pg);
    $title = $row_chk_pg['meta_title'];
    $keyword = $row_chk_pg['keyword'];
    $description = $row_chk_pg['description2'];
} else if (strpos($link, 'management') == true) {
    $qry_chk_pg = "SELECT * FROM `page` WHERE `alias` = 'management-team' and status = '0'";
    $res_chk_pg = mysqli_query($con, $qry_chk_pg) or trigger_error("Query Failed! SQL: $qry_chk_pg - Error: " . mysqli_error(), E_USER_ERROR);
    $row_chk_pg = mysqli_fetch_array($res_chk_pg);
    $title = $row_chk_pg['meta_title'];
    $keyword = $row_chk_pg['keyword'];
    $description = $row_chk_pg['description'];
} else if (strpos($link, 'contact-us') == true) {
    $qry_chk_pg = "SELECT * FROM `page` WHERE `alias` = 'contact-us' and status = '0'";
    $res_chk_pg = mysqli_query($con, $qry_chk_pg) or trigger_error("Query Failed! SQL: $qry_chk_pg - Error: " . mysqli_error(), E_USER_ERROR);
    $row_chk_pg = mysqli_fetch_array($res_chk_pg);
    $title = $row_chk_pg['meta_title'];
    $keyword = $row_chk_pg['keyword'];
} else if (strpos($link, 'training') == true) {
    $qry_chk_pg = "SELECT * FROM `page` WHERE `alias` = 'training' and status = '0'";
    $res_chk_pg = mysqli_query($con, $qry_chk_pg) or trigger_error("Query Failed! SQL: $qry_chk_pg - Error: " . mysqli_error(), E_USER_ERROR);
    $row_chk_pg = mysqli_fetch_array($res_chk_pg);
    $title = $row_chk_pg['meta_title'];
    $keyword = $row_chk_pg['keyword'];
} else if (strpos($link, 'all_courses') == true) {
    $qry_chk_pg = "SELECT * FROM `page` WHERE `alias` = 'courses' and status = '0'";
    $res_chk_pg = mysqli_query($con, $qry_chk_pg) or trigger_error("Query Failed! SQL: $qry_chk_pg - Error: " . mysqli_error(), E_USER_ERROR);
    $row_chk_pg = mysqli_fetch_array($res_chk_pg);
    $title = $row_chk_pg['meta_title'];
    $keyword = $row_chk_pg['keyword'];
} else if (strpos($link, 'announcement') == true) {
    $qry_chk_pg = "SELECT * FROM `page` WHERE `alias` = 'announcement' and status = '0'";
    $res_chk_pg = mysqli_query($con, $qry_chk_pg) or trigger_error("Query Failed! SQL: $qry_chk_pg - Error: " . mysqli_error(), E_USER_ERROR);
    $row_chk_pg = mysqli_fetch_array($res_chk_pg);
    $title = $row_chk_pg['meta_title'];
    $keyword = $row_chk_pg['keyword'];
} else if (strpos($link, 'registration') == true) {
    $qry_chk_pg = "SELECT * FROM `page` WHERE `alias` = 'registration' and status = '0'";
    $res_chk_pg = mysqli_query($con, $qry_chk_pg) or trigger_error("Query Failed! SQL: $qry_chk_pg - Error: " . mysqli_error(), E_USER_ERROR);
    $row_chk_pg = mysqli_fetch_array($res_chk_pg);
    $title = $row_chk_pg['meta_title'];
    $keyword = $row_chk_pg['keyword'];
} else if (strpos($link, 'login') == true) {
    $qry_chk_pg = "SELECT * FROM `page` WHERE `alias` = 'login' and status = '0'";
    $res_chk_pg = mysqli_query($con, $qry_chk_pg) or trigger_error("Query Failed! SQL: $qry_chk_pg - Error: " . mysqli_error(), E_USER_ERROR);
    $row_chk_pg = mysqli_fetch_array($res_chk_pg);
    $title = $row_chk_pg['meta_title'];
    $keyword = $row_chk_pg['keyword'];
} else if (strpos($link, 'success') == true) {
    $qry_chk_pg = "SELECT * FROM `page` WHERE `alias` = 'payment-success' and status = '0'";
    $res_chk_pg = mysqli_query($con, $qry_chk_pg) or trigger_error("Query Failed! SQL: $qry_chk_pg - Error: " . mysqli_error(), E_USER_ERROR);
    $row_chk_pg = mysqli_fetch_array($res_chk_pg);
    $title = $row_chk_pg['meta_title'];
    $keyword = $row_chk_pg['keyword'];
} else if (strpos($link, 'failure') == true) {
    $qry_chk_pg = "SELECT * FROM `page` WHERE `alias` = 'payment-failure' and status = '0'";
    $res_chk_pg = mysqli_query($con, $qry_chk_pg) or trigger_error("Query Failed! SQL: $qry_chk_pg - Error: " . mysqli_error(), E_USER_ERROR);
    $row_chk_pg = mysqli_fetch_array($res_chk_pg);
    $title = $row_chk_pg['meta_title'];
    $keyword = $row_chk_pg['keyword'];
} else if (strpos($link, 'forget-password') == true) {
    $qry_chk_pg = "SELECT * FROM `page` WHERE `alias` = 'forget-password' and status = '0'";
    $res_chk_pg = mysqli_query($con, $qry_chk_pg) or trigger_error("Query Failed! SQL: $qry_chk_pg - Error: " . mysqli_error(), E_USER_ERROR);
    $row_chk_pg = mysqli_fetch_array($res_chk_pg);
    $title = $row_chk_pg['meta_title'];
    $keyword = $row_chk_pg['keyword'];
} else if (strpos($link, 'reset') == true) {
    $qry_chk_pg = "SELECT * FROM `page` WHERE `alias` = 'reset-password' and status = '0'";
    $res_chk_pg = mysqli_query($con, $qry_chk_pg) or trigger_error("Query Failed! SQL: $qry_chk_pg - Error: " . mysqli_error(), E_USER_ERROR);
    $row_chk_pg = mysqli_fetch_array($res_chk_pg);
    $title = $row_chk_pg['meta_title'];
    $keyword = $row_chk_pg['keyword'];
} else if (strpos($link, 'blog') == true) {
    $qry_chk_pg = "SELECT * FROM `page` WHERE `alias` = 'blog' and status = '0'";
    $res_chk_pg = mysqli_query($con, $qry_chk_pg) or trigger_error("Query Failed! SQL: $qry_chk_pg - Error: " . mysqli_error(), E_USER_ERROR);
    $row_chk_pg = mysqli_fetch_array($res_chk_pg);
    $title = $row_chk_pg['meta_title'];
    $keyword = $row_chk_pg['keyword'];
} else {

    $title = $row_setting['website_name'];
    $keyword = $row_setting['keyword'];
    $description = $row_setting['description'];
}
