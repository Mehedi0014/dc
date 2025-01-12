<?php

date_default_timezone_set('Asia/Kolkata');

//define environment - change only here for server credentials
//$environment = 'dev';
//$environment='demo';
$environment = 'dev';

if ($environment == 'dev') {
    define('DB_SERVER', 'localhost');
    define('DB_USERNAME', 'dissemin_user18');
    define('DB_PASSWORD', 'sWos$v=;f1!?');
    define('DB_DATABASE', 'dissemin_db2018');
    
//    define('DB_SERVER', 'localhost');
//    define('DB_USERNAME', 'root');
//    define('DB_PASSWORD', '');
//    define('DB_DATABASE', 'genohr');

    $db_name = 'sbihmco_payment';
} elseif ($environment == 'demo') {
    $data_server = 'localhost';
    $db_user = '';
    $db_pwd = '';
    $db_name = '';
} else {
    $data_server = 'localhost';
    $db_user = '';
    $db_pwd = '';
    $db_name = '';
}

$con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$db = mysqli_select_db($con, $db_name);

//$con = mysql_connect($data_server, $db_user, $db_pwd);
//$db = mysql_select_db($db_name, $con);
// $base_url = "http://localhost/disseminare/";
$base_url = "https://disseminare.com/";

// $admin_base_url = "http://localhost/disseminare/admin/";
$admin_base_url = "https://disseminare.com/admin/";

//'Define Dynamic Paths'
$application_name = "SBIHM Online Payment";
$css_path = "theme/css/";
$js_path = "theme/js/";
$jquery_plugin = "theme/jquery/";
$image_path = "img/";
$document_page_banner = "/upload/page_banner/";
$document_path_site_logo = "/upload/website_logo/";
//$document_path_upload_media = "/upload/media/";
//$document_path_gallery = "/upload/gallery/";
//$document_path_service = "/upload/service/";
//$document_path_course = "/upload/course/";
//$document_path_announcement = "/upload/announcement/";
//$document_path_training = "/upload/training/";
//$document_path_testimonial = "/upload/testimonial/";
//$document_path_application = "/upload/application/";
//$document_page_blog = "/upload/blog/";
//$document_path_management = "/upload/management/";
//$document_path_client = "/upload/client/";
//$document_path_slider = "/upload/slider/";
//$document_path_events = "/upload/news/";
$developer_url = 'www.keylines.net';
$developer_name = 'Keyline Creative Services';
$message_type = "nothing";
$only_date = "Y-m-d";
