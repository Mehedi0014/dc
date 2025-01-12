<?php include_once 'common/header.php'; ?>
<style>
    @media only screen and (min-width: 576px){
        .about-left-content ul li {
            width: 100%;
        }
    }
</style>
<?php
$sql_content1 = "SELECT * FROM `page` WHERE `alias` = '$page_key' and status = '0'";
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
                        <?php
                        if ($page_key == 'disseminare-singapore' || $page_key == 'disseminare-bangladesh') {
                            ?>
                            <li><a href="#">Global</a></li>
                            <?php
                        } elseif($page_key == 'partners') {
                            ?>
                            
                            <?php
                        }else{
                        ?>
                        <li><a href="#">About Us</a></li>
                        <?php
                        }?>
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
                    <?php
                    echo html_entity_decode($row_content1['body']);
                    ?>
                     <?php 
                        if(!empty($row_content1['button_link']))
                        {
                    ?>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 col-lg-12-col-xs-12 text-center">
                                <div class="why_training">
                                    <h4><?php echo $row_content1['button_text'];?></h4>
                                    <br>
                                    <button class="button2"><a href="<?php echo '\\\\'.$row_content1['button_link'];?>" target="_blank">Click here</a></button>
                                </div>
                            </div>
                        </div>
                    
                    <?php
                        }
                    ?>
                    <!--         <h3>OUR COMPANY QUALITY</h3>
                             <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis, quasi perspiciatis quo illo aspernatur aut.</p>
                             <ul>
                                 <li>Our Company Growth</li>
                                 <li>Risk Management</li>
                                 <li>Customer Relationship</li>
                                 <li>Our Company Growth</li>
                                 <li>Risk Management</li>
                                 <li>Customer Relationship</li>
                             </ul>-->
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