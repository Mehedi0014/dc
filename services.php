<?php include_once 'common/header.php'; ?>
<?php
$sql_content1 = "SELECT * FROM `service` WHERE `alias` = '$service_key' and status = '0'";
$res_content1 = mysqli_query($con, $sql_content1) or trigger_error("Query Failed! SQL: $sql_content1 - Error: " . mysqli_error(), E_USER_ERROR);
$row_content1 = mysqli_fetch_assoc($res_content1);
?>
<style>
    @media only screen and (min-width: 576px){
        .about-left-content ul li {
            width: 100%;
        }
    }
</style>
<!--== Page Header Area Start ==-->
<section id="page-header" style="background-image: url(<?php echo $base_url . $document_path_service . $row_content1['banner_img']; ?>)">
    <div class="container">
        <div class="row">
            <!-- Page Title Start -->
            <div class="col-lg-12 text-center">
                <div class="page-title">
                    <h2><?php echo $row_content1['name'] ?></span></h2>
                </div>

                <div class="page-breadcrum">
                    <ol>
                        <li><a href="<?php echo $base_url; ?>">Home</a></li>
                        <li><a href="#">Services</a></li>
                        <li class="active"><a href="<?php echo $base_url; ?>service/<?php echo $row_content1['alias'] ?>"><?php echo $row_content1['name'] ?></a></li>
                    </ol>
                </div>
            </div>
            <!-- Page Title End -->
        </div>
    </div>
</section>
<!--== Page Header Area End ==-->

<!--== Service Area Start ==-->
<section id="about-area" class="section-padding">
    <div class="container">
        <div class="row">
            <!-- Single Service Start -->
            <div class="col-lg-10 col-md-12 m-auto">
                <div class="about-left-content">
                    <div class="row">
                        <!-- Single Service Thumb -->
                        <!--                        <div class="col-lg-6 col-md-6">
                                                    <div class="service-thumb">
                                                        <img src="<?php echo $base_url . $document_path_service . $row_content1['other_image']; ?>" alt="">
                                                    </div>
                                                </div>-->
                        <!-- Single Service Thumb -->

                        <!-- Single Service Content -->
                        <div class="col-lg-12 col-md-12">
                            <div class="display-table">
                                <div class="display-table-cell">
                                    <div class="service-content">
                                        <h3><?php echo $row_content1['name'] ?></h3>
                                        <?php
                                        echo html_entity_decode($row_content1['description']);
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
                                        <!--                                            <a href="#" class="theme-btn">View More</a>-->



                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>

                        <?php
                        if ($service_key == 'public-workshop') {
                            ?>
<!--                            <br>
                            <br>
                            <a href="../all_courses.php">
                                <button class="button2">Please refer to our Upcoming Workshop calendar to learn more about our upcoming training's.
                                </button>
                            </a>
                            <a style="margin-top: 20px;" href="<?php echo $base_url; ?>all_courses.php" class="btn btn-info btn-sm">
                                Please refer to our Upcoming Workshop calendar to learn more about our upcoming training's.
                            </a>-->
                            <?php
                        }
                        ?>
                        <!-- Single Service Content -->
                    </div>
                </div>
            </div>
            <!-- Single Service End -->


            <!-- Single Service End -->
        </div>
    </div>
</section>
<!--== Service Area End ==-->
<?php include_once 'common/footer.php'; ?> 