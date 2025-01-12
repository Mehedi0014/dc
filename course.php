<?php include_once 'common/header.php'; ?>
<?php
$sql_content1 = "SELECT * FROM `course` WHERE `alias` = '$course_key' and status = '0'";
$res_content1 = mysqli_query($con, $sql_content1) or trigger_error("Query Failed! SQL: $sql_content1 - Error: " . mysqli_error(), E_USER_ERROR);
$row_content1 = mysqli_fetch_assoc($res_content1);
?>

<!--== Page Header Area Start ==-->
<section id="page-header" style="background-image: url(<?php echo $base_url . $document_path_course . $row_content1['banner_img']; ?>)">
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
                        <li><a href="<?php echo $base_url; ?>all_courses.php">Course</a></li>
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
<section id="home2-service" class="section-padding">
    <div class="container">
        <div class="row">
            <!-- Single Service Start -->
            <div class="col-lg-10 col-md-12 m-auto">
                <div class="home2-single-service">
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
                                        <?php $txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20); ?>
                                        <h3><?php echo $row_content1['name'] ?></h3>
                                        <?php echo $row_content1['course_fee'] != '0'?'<p><strong>Course Fee: Rs. '.$row_content1['course_fee'].'</strong></p>':''; ?>
                                        <?php echo trim($row_content1['seat'])!=''?'<p><strong>Seat: '.$row_content1['seat'].'</strong></p>':'' ?>
                                        <?php
                                        echo html_entity_decode($row_content1['description']);
                                        ?>
                                       <?php if (isset($_SESSION['cust_user'])) {
                                            ?>

                                            <form id="fees" class="fees" method="POST" action="<?php echo $base_url; ?>payment/PayUMoney_form.php">
                                                <input type="hidden" name="key" value = "pkgaAHXV"/>
                                                <input type="hidden" name="txnid" value = "<?php echo $txnid; ?>"/>
                                                <input type="hidden" name="amount" value = "<?php echo $row_content1['course_fee']; ?>"/>
                                                <input type="hidden" name="name" value = "<?php echo $_SESSION['cust_name']; ?>"/>
                                                <input type="hidden" name="email" value ="<?php echo $_SESSION['cust_user']; ?>"/>
                                                <input type="hidden" name="phone" value ="<?php //echo $row_course['phone']; ?>"/>
                                                <input type="hidden" name="productinfo" value ="Disseminare Course Apply"/>
                                                <input type="hidden" name="service_provider" value ="payu_paisa"/>
                                                <input type="hidden" name="udf1" value ="<?php echo $_SESSION['cust_id']; ?>"/>



                                                <input type="hidden" name="surl" value ="<?php echo $base_url; ?>success.php"/>
                                                <input type="hidden" name="furl" value ="<?php echo $base_url; ?>failure.php"/>



                                                <button type="submit" name="submit" role="button" class="theme-btn"> Apply</button>
                                                <!--<button type="button" name="bank-draft" class="btn btn-success"> Bank Draft</button>
                                                <a href="#myModal" role="button" class="btn btn-large btn-primary" data-toggle="modal">Pay via Bank Draft</a> -->


                                            </form> 

<!--                                            <a href="#" class="theme-btn">Apply</a>-->




                                            <?php
                                        } else {
                                            ?>
                                            <a href="<?php echo $base_url; ?>login.php" class="theme-btn">Apply</a>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
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