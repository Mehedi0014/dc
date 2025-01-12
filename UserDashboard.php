<?php include_once 'common/header.php'; ?>

<?php
$sql_content1 = "SELECT * FROM `page` WHERE `alias` = 'user-dashboard' and status = '0'";
$res_content1 = mysqli_query($con, $sql_content1) or trigger_error("Query Failed! SQL: $sql_content1 - Error: " . mysqli_error(), E_USER_ERROR);
$row_content1 = mysqli_fetch_assoc($res_content1);

if (isset($_SESSION['cust_id'])) {

    $qry_cust = "select * from customer_registration where id = '" . $_SESSION['cust_id'] . "'";
    $res_cust = mysqli_query($con, $qry_cust);
    $row_cust = mysqli_fetch_array($res_cust);
    $phone = $row_cust['phone'];
    $user_type = $row_cust['user_type'];
}
?>
<!--== Page Header Area Start ==-->
<section id="page-header" style="background-image: url(<?php echo $base_url . $document_page_banner . $row_content1['banner_img']; ?>)">
    <div class="container">
        <div class="row">
            <!-- Page Title Start -->
            <div class="col-lg-12 text-center">
                <div class="page-title">
                    <h2><?php echo $row_content1['title'] ?></span></h2>
                </div>

                <div class="page-breadcrum">
                    <ol>
                        <li><a href="<?php echo $base_url; ?>">Home</a></li>

                        <li class="active"><a href="<?php echo $base_url; ?>UserDashboard.php"><?php echo $row_content1['title'] ?></a></li>
                    </ol>
                </div>
            </div>
            <!-- Page Title End -->
        </div>
    </div>
</section>
<!--== Page Header Area End ==-->
<section id="display-presentation" class="section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="presentation-content">
                    <?php
                    if ($user_type != '2' || $user_type != '0') {

                        $qryGetFolder = "select * from folder where id = '$user_type'";
                        $resGetFolder = mysqli_query($con, $qryGetFolder);
                        $rowGetFolder = mysqli_fetch_array($resGetFolder);
                        $foldername = $rowGetFolder['foldername'];


                        //if ($handle = opendir('/home/dissemin/public_html/LMS_videos/content')) {
                        if ($handle = opendir('/home/dissemin/public_html/LMS_videos/'.$foldername)) {
                            $html = '';
                            $blacklist = array('.', '..', 'somedir', 'somefile.php', '.htaccess', 'login.php', '.ftpquota', '.htpasswd', '*.zip');

                            while (false !== ($file = readdir($handle))) {
                                if (!in_array($file, $blacklist)) {
                                    //echo "$file\n";
                                    $html.= '<div class="card-header" id="headingTwo">';
                                    //$html .= '<i class="fa fa-file-powerpoint-o" style="font-size:30px;"></i><span style="padding-left: 10px;"><a target="_blank" href="http://disseminare.com/LMS_videos/content/' . $file . '">' . strtoupper($file) . '</a></span>';
                                    
                                    $html .= '<i class="fa fa-file-powerpoint-o" style="font-size:30px;"></i><span style="padding-left: 10px;"><a target="_blank" href="http://disseminare.com/LMS_videos/'.$foldername .'/' .$file . '">' . strtoupper($file) . '</a></span>';
                                    $html .= '</div>';
                                }
                            }

                            closedir($handle);
                        }
                        echo $html;
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!--== Service Area End ==-->
<?php include_once 'common/footer.php'; ?> 