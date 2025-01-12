<?php include_once 'common/header.php'; ?>
<?php
$sql_content1 = "SELECT * FROM `page` WHERE `alias` = 'cancellation-policy' and status = '0'";
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

                <h2 class="mb-4">Cancellation Policy</h2>

                <p>
                    At Disseminare Consulting, we want to ensure that our customers are fully satisfied with their e-learning experience. 
                    If you need to cancel your purchase, please review our cancellation policy below.
                </p>

                <h4 class="mt-4 mb-2">Cancellation Guidelines</h4>

                <ul class="list-group mb-4">
                    <li class="list-group-item">
                        <strong>Eligibility for Cancellation</strong>
                        <ul>
                            <li>You may cancel your course purchase within 7 days of the transaction date for a full refund, provided you have not accessed any course materials.</li>
                        </ul>
                    </li>
                    <li class="list-group-item">
                        <strong>How to Cancel</strong>
                        <ul>
                            <li>To initiate a cancellation, please contact our support team at 
                                <a href="mailto:support@disseminare.com">support@disseminare.com</a> 
                                with your order details. We’ll process your request as quickly as possible.
                            </li>
                        </ul>
                    </li>
                    <li class="list-group-item">
                        <strong>Refund Process</strong>
                        <ul>
                            <li>Refunds will be processed back to the original payment method within 5-7 business days once your cancellation is confirmed.</li>
                        </ul>
                    </li>
                    <li class="list-group-item">
                        <strong>Exceptions</strong>
                        <ul>
                            <li>Courses that have been partially accessed or downloaded are not eligible for refunds.</li>
                        </ul>
                    </li>
                </ul>

                <h4 class="mt-4 mb-2">Customer Support</h4>

                <p>
                    If you have any questions or need assistance with your cancellation, please reach out to our customer support team 
                    at <a href="mailto:support@disseminare.com">support@disseminare.com</a> or call us at 
                    <a href="tel:+919230678970">+91 92306 78970</a>. We’re here to help!
                </p>
                <br>

                <p>
                    Thank you for choosing Disseminare Consulting. We appreciate your understanding.
                </p>
                <br>

                <p><strong>Contact:</strong> Subham Sur (+91 92306 78970)</p>
                <p><strong>Email:</strong> <a href="mailto:subham@disseminare.com">subham@disseminare.com</a></p>

            </div>
        </div>
    </div>

</section>


<?php include_once 'common/footer.php'; ?> 