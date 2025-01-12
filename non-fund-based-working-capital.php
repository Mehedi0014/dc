<?php include_once 'common/header.php'; ?>
<style>
    @media only screen and (min-width: 576px){
        .about-left-content ul li {
            width: 100%;
        }
    }
</style>
<?php
$sql_content1 = "SELECT * FROM `page` WHERE `alias` = 'non-fund-based-working-capital' and status = '0'";
$res_content1 = mysqli_query($con, $sql_content1) or trigger_error("Query Failed! SQL: $sql_content1 - Error: " . mysqli_error(), E_USER_ERROR);
$row_content1 = mysqli_fetch_assoc($res_content1);
?>
<!--== Page Header Area Start ==-->
<section id="page-header" style="background-image: url(<?php echo $base_url . $document_page_banner . $row_content1['banner_img']; ?>)">
    <div class="container">
        <div class="row">
            <!-- Page Title Start -->
            <div class="col-lg-12 text-center">
                <div class="page-title">
                    <h2><?php echo $row_content1['title'] ?></h2>
                </div>

                <div class="page-breadcrum">
                    <ol>
                        <li><a href="<?php echo $base_url; ?>">Home</a></li>
                        <li><a href="#">Knowledge Center</a></li>
                        <li class="active"><a href="<?php echo $base_url; ?>page/<?php echo $row_content1['alias'] ?>"><?php echo $row_content1['title'] ?></a></li>
                    </ol>
                </div>
            </div>
            <!-- Page Title End -->
        </div>
    </div>
</section>
<!--== Page Header Area End ==-->

<!--== About Area Start ==-->
<section id="about-area" class="section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="about-left-content">
                    <h3><?php echo $row_content1['title'] ?></h3>
                    <br>
                    <div class="text-center">

                        <embed onmousedown="disableRightclick()" id="stopRightclick" src="<?php echo $base_url . $document_path_upload_media; ?>23-11-18_1542954543.pdf#toolbar=0" width="800" height="575">
                    </div>
                </div>
            </div>

            <!--            <div class="col-lg-5">
                            <div class="about-right-content">
                                <img src="assets/img/about-content-bg.jpg" alt="" class="image-down">
                                <img src="assets/img/about-video.jpg" alt="" class="image-up">
                            </div>
                        </div>-->
        </div>
    </div>
</section>
<!--== About Area End ==-->
<?php include_once 'common/footer.php'; ?> 
<script>
//    $(document).ready(function () {
//        $('body').bind('contextmenu', function (e) {
//            return false;
//        });
//    });
</script>

<script type="text/javascript">
    $(document).ready(function () {
        //   window.frames["#stopRightclick"].document.oncontextmenu = function(){ return false; };.


        document.onmousedown = disableRightclick;
        var message = "Right click not allowed !!";
        function disableRightclick(evt) {
            //alert('hello');
            if (evt.button == 2) {
                alert(message);
                return false;
            }
            
        }
    });
</script>