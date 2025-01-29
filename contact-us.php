<?php include_once 'common/header.php'; ?>
<?php
$sql_content1 = "SELECT * FROM `page` WHERE `alias` = 'contact-us' and status = '0'";
$res_content1 = mysqli_query($con, $sql_content1) or trigger_error("Query Failed! SQL: $sql_content1 - Error: " . mysqli_error(), E_USER_ERROR);
$row_content1 = mysqli_fetch_assoc($res_content1);
?>
<style>
    iframe{
        height: 278px;
        width: 100%;
    }
</style>
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
                        <li class="active"><a href="<?php echo $base_url; ?>contact-us.php"><?php echo $row_content1['title'] ?></a></li>
                    </ol>
                </div>
            </div>
            <!-- Page Title End -->
        </div>
    </div>
</section>
<!--== Page Header Area End ==-->



<!--<section>
    <div class="container">
        

    </div>

</section>-->


<section id="contact-page" class="section-padding">


    <div class="container">
        
        <div class="row">

            <?php
            $qry_locator = "select * from locator where status = '0' order by sort";
            $res_locator = mysqli_query($con, $qry_locator);

            while ($row_locator = mysqli_fetch_array($res_locator)) {
                ?>

                <div class="col-md-4 col-lg-4 col-xs-12">
                    <div class="contact_info">
                        <div class="contact_aria">
                            <div class="row">

                                <div class="col-md-3 col-lg-3 col-xs-12 contact_icon">

                                    <i class="fa fa-map-marker" aria-hidden="true"></i>

                                </div>

                                <div class="col-md-9 col-lg-9 col-xs-12 contact_add">             

                                    <?php
                                    echo html_entity_decode($row_locator['address']);
                                    ?>
        <!--                                <p>Registered Office: : 4, Gouranga Mandir Lane,</p>
                                        <p>Kolkata - 700086, India</p>
                                        <p>Phone: : 9831195208</p>
                                        <p> Email: : info@disseminare.com</p>-->


                                </div>

                            </div>
                        </div>
                        <div class="last">
                            <?php
                            echo $row_locator['map'];
                            ?>
    <!--                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d29496.887061544556!2d88.37270096103475!3d22.46246711497033!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a0271a00d52ca53%3A0x84c91e76a182e37a!2sGaria%2C+Kolkata%2C+West+Bengal!5e0!3m2!1sen!2sin!4v1540648082102" width="100%" height="278px"  frameborder="0" style="border:0" allowfullscreen></iframe>-->

                        </div>
                    </div>
                </div>
                <?php
            }
            ?> 

        </div>

        <div class="row">
            <div class="col-lg-10 m-auto">
                <div class="contact-form-contant">
                    <h3>Contact Us</h3>
                    <?php /*<form method="post" action="<?php echo $base_url; ?>contactpage_mail.php">*/ ?>
                    <form method="post" action="<?php echo $base_url; ?>php_mailer_setup.php">
                        <div class="row">
                            <!-- Name Input Start -->
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <input class="form-control" id="name" name="name" type="text" placeholder="Your Name *" required>
                                </div>
                            </div>
                            <!-- Name Input End -->

                            <!-- Email Input Start -->
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <input class="form-control" id="email" name="email" type="email" placeholder="Your Email *" required>
                                </div>
                            </div>
                            <!-- Email Input End -->

                            <!-- Subject Input Start -->
                            <div class="col-lg-6  col-md-6">
                                <div class="form-group">
                                    <input class="form-control" id="mobile" name="mobile" type="text" placeholder="Phone *" required>
                                </div>
                            </div>
                            <!-- Subject Input End -->

                            <!-- City Input Start -->
                            <div class="col-lg-6  col-md-6">
                                <div class="form-group">
                                    <input class="form-control" id="subject" type="text" name="subject" placeholder="Subject *" required>
                                </div>
                            </div>
                            <!-- City Input End -->

                            <!-- Message Input Start -->
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <textarea rows="7" class="form-control" name="message" id="message" placeholder="Your Message *" required></textarea>
                                </div>
                            </div>

                            <!-- Submit Input Start -->
                            <div class="col-lg-12 text-center">
                                <div id="success">
                                    <?php
                                    /* if (isset($_SESSION['mail_succ'])) {
                                        echo '<p style="color: green;">' . $_SESSION['mail_succ'] . '</p>';
                                        unset($_SESSION['mail_succ']);
                                    }
                                    if (isset($_SESSION['mail_fail'])) {
                                        echo '<p style="color: red;">' . $_SESSION['mail_fail'] . '</p>';
                                        unset($_SESSION['mail_fail']);
                                    } */

                                    if (isset($_SESSION['message_success'])) {
                                        echo '<p style="color: green; background: #fff; padding: 7px 10px; margin-top: 20px; font-weight: bold;">' . $_SESSION['message_success'] . '</p>';
                                        unset($_SESSION['message_success']);
                                    }
                                    if (isset($_SESSION['message_failed'])) {
                                        echo '<p style="color: red; background: #fff; padding: 7px 10px; margin-top: 20px; font-weight: bold;">' . $_SESSION['message_failed'] . '</p>';
                                        unset($_SESSION['message_failed']);
                                    }
                                    ?>
                                </div>
                                <button id="sendMessageButton" class="theme-btn" type="submit" name="submitContactUsPage">Send Now <i class="fa fa-send-o"></i></button>
                                
                                <div class="footer-icons">
                            <h6>Follow us-</h6>
                            <a target="_blank" rel="nofollow" href="https://www.facebook.com/Disseminare-Consulting-127941044618492/"><i class="fa fa-facebook"></i></a>
                            <a target="_blank" rel="nofollow" href="https://www.linkedin.com/company/disseminare-consulting/"><i class="fa fa-linkedin"></i></a>
                            <!--<a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-behance"></i></a>-->
                        </div>
                            </div>
                            <!-- Submit Input End -->
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
    </div>
</section>



<?php include_once 'common/footer.php'; ?> 