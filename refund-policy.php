<?php include_once 'common/header.php'; ?>
<?php
$sql_content1 = "SELECT * FROM `page` WHERE `alias` = 'refund-policy' and status = '0'";
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
                        <li class="active"><a href="<?php echo $base_url; ?>refund-policy.php"><?php echo $row_content1['title'] ?></a></li>
                    </ol>
                </div>
            </div>
            <!-- Page Title End -->
        </div>
    </div>
</section>


<section id="page-content-wrapper">
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-8 offset-md-2">

                <h2 class="mb-4">Refund Policy</h2>

                <p>
                    At Disseminare Consulting, we strive to provide quality e-learning courses and customer satisfaction. 
                    If you are not completely satisfied with your purchase, please review our refund policy below.
                </p>

                <h4 class="mt-4 mb-2">Refund Eligibility</h4>

                <ul class="list-group mb-4">
                    <li class="list-group-item">
                        <strong>Refund Requests</strong>
                        <ul>
                            <li>You may request a refund within 7 days of your purchase date, provided you have not accessed any course materials.</li>
                        </ul>
                    </li>
                    <li class="list-group-item">
                        <strong>Conditions for Refund</strong>
                        <ul>
                            <li>If you have accessed or downloaded any course content, the purchase is non-refundable.</li>
                        </ul>
                    </li>
                </ul>

                <h4 class="mt-4 mb-2">How to Request a Refund</h4>

                <ul class="list-group mb-4">
                    <li class="list-group-item">
                        <strong>Submit a Request</strong>
                        <ul>
                            <li>To request a refund, please contact our support team at 
                                <a href="mailto:support@disseminare.com">support@disseminare.com</a> 
                                with your order details and reason for the refund.
                            </li>
                        </ul>
                    </li>
                    <li class="list-group-item">
                        <strong>Processing Time</strong>
                        <ul>
                            <li>Refund requests will be processed within 5-7 business days once approved.</li>
                        </ul>
                    </li>
                </ul>

                <h4 class="mt-4 mb-2">Customer Support</h4>

                <p>
                    For any questions or further assistance regarding refunds, please reach out to our customer support team 
                    at <a href="mailto:support@disseminare.com">support@disseminare.com</a> or call us at 
                    <a href="tel:+919230678970">+91 92306 78970</a>. We’re here to assist you!
                </p>

                <p>
                    Thank you for choosing Disseminare Consulting. Your satisfaction is our priority.
                </p>

                <p><strong>Contact:</strong> Subham Sur (+91 92306 78970)</p>
                <p><strong>Mail ID:</strong> <a href="mailto:subham@disseminare.com">subham@disseminare.com</a></p>

            </div>
        </div>
    </div>
</section>







<?php include_once 'common/footer.php'; ?> 