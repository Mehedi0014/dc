<?php include_once 'common/header.php'; ?>
<?php
$sql_content1 = "SELECT * FROM `page` WHERE `alias` = 'courses' and status = '0'";
$res_content1 = mysqli_query($con, $sql_content1) or trigger_error("Query Failed! SQL: $sql_content1 - Error: " . mysqli_error(), E_USER_ERROR);
$row_content1 = mysqli_fetch_assoc($res_content1);

if (isset($_SESSION['cust_id'])) {

    $qry_cust = "select * from customer_registration where id = '" . $_SESSION['cust_id'] . "'";
    $res_cust = mysqli_query($con, $qry_cust);
    $row_cust = mysqli_fetch_array($res_cust);
    $phone = $row_cust['phone'];
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

                        <li class="active"><a href="<?php echo $base_url; ?>all_courses.php"><?php echo $row_content1['title'] ?></a></li>
                    </ol>
                </div>
            </div>
            <!-- Page Title End -->
        </div>
    </div>
</section>
<!--== Page Header Area End ==-->

<!--== Service Area Start ==-->
<section id="blog-page" class="section-padding">
    <div class="container">
        <div class="row">

            <div class="course_all">
                <!--<div class="float-right"><a href="http://disseminare.com/page/past-assignment" class="theme-btn">Past Assignments</a></div>-->
                <div class="float-right"><a href="http://disseminare.com/past_assignment.php" class="theme-btn">Past Assignments</a></div>
                
                
                <?php
                $qry_courseYear = "select distinct course_year,course_month from course where status = '0' order by course_year,course_month ";
                $res_courseYear = mysqli_query($con, $qry_courseYear);

                while ($row_courseYear = mysqli_fetch_array($res_courseYear)) {
                    $monthNum = $row_courseYear['course_month'];
                    $monthName = date("F", mktime(0, 0, 0, $monthNum, 10));
                    ?>
                    <div>
                        <h2 style="padding-left: 15px; padding-bottom: 30px"><?php echo $monthName; ?> - <?php echo $row_courseYear['course_year']; ?></h2>
                    </div>

                    <div class="container">
                        <div class="row">
                            <?php
                            $qry_course = "select * from course where status = '0' and course_year='" . $row_courseYear['course_year'] . "' and course_month='" . $row_courseYear['course_month'] . "'  order by course_day ";
                            $res_course = mysqli_query($con, $qry_course);

                            while ($row_course = mysqli_fetch_array($res_course)) {
                                $txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
                                ?>
                                <div class="col-lg-4 col-md-4 col-xs-12">


                                    <div class="latest-single-blog">

                                        <div class="latest-blog-content">
                                            <h4 style="background: #000000; color: #ffffff; padding: 10px; font-size: 16px"><?php
                                                echo $new_date = date('dS F Y', strtotime($row_course['course_date']));
                                                ?></h4>


                                            <h4 style="font-size:16px; padding-top: 10px; padding-bottom: 10px"><?php echo $row_course['name'] ?></h4>
                                            <?php echo $row_course['course_fee'] != '0' ? '<p><strong>Course Fee: Rs.' . $row_course['course_fee'] . '</strong></p>' : '' ?>
                                            <?php
                                            echo substr(html_entity_decode($row_course['short_description']), 0, 255);
                                            ?>
                                            <br>
                                            <a href="<?php echo $base_url; ?>course/<?php echo $row_course['alias']; ?>" class="theme-btn">View More</a>
                                            <?php if (isset($_SESSION['cust_user'])) {
                                                ?>

                                                <form id="fees" class="fees" method="POST" action="<?php echo $base_url; ?>payment/PayUMoney_form.php">
                                                    <input type="hidden" name="key" value = "pkgaAHXV"/>
                                                    <input type="hidden" name="txnid" value = "<?php echo $txnid; ?>"/>
                                                    <input type="hidden" name="amount" value = "<?php echo $row_course['course_fee']; ?>"/>
                                                    <input type="hidden" name="name" value = "<?php echo $_SESSION['cust_name']; ?>"/>
                                                    <input type="hidden" name="email" value ="<?php echo $_SESSION['cust_user']; ?>"/>
                                                    <input type="hidden" name="phone" value ="<?php //echo $phone;   ?>"/>
                                                    <input type="hidden" name="productinfo" value ="Disseminare Course Apply"/>
                                                    <input type="hidden" name="service_provider" value ="payu_paisa"/>
                                                    <input type="hidden" name="udf1" value ="<?php echo $_SESSION['cust_id']; ?>"/>



                                                    <input type="hidden" name="surl" value ="<?php echo $base_url; ?>success.php"/>
                                                    <input type="hidden" name="furl" value ="<?php echo $base_url; ?>failure.php"/>


                                                    <!--<div class='pm-button'><a href='https://www.payumoney.com/paybypayumoney/#/51DDC261360A5FB3C270A5CB8239FFF4'><img src='https://www.payumoney.com/media/images/payby_payumoney/new_buttons/23.png' /></a></div> -->


                                                    <button type="submit" name="submit" role="button" class="theme-btn"> Apply</button>
                                                    <!--<button type="button" name="bank-draft" class="btn btn-success"> Bank Draft</button>
                                                    <a href="#myModal" role="button" class="btn btn-large btn-primary" data-toggle="modal">Pay via Bank Draft</a> -->


                                                </form> 

                                                <!--                                            <a href="#" class="theme-btn">Apply</a>-->




                                                <?php
                                            } else {
                                                ?>
                                                <a href="<?php echo $base_url; ?>registration.php" class="theme-btn">Register</a>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                    </div>


                                </div>
                                <?php
                            }
                            ?>


                        </div>

                    </div>
                    <?php
                }
                ?>

            </div>
        </div>

    </div>
    <!-- Single Service End -->



</section>







<!--== Service Area End ==-->
<?php include_once 'common/footer.php'; ?> 