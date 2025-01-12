<?php// include('../common/header.php'); 

?>

<?php
//echo $document_page_blog;
echo $sql_content1 = "SELECT * FROM `page` WHERE `alias` = 'payment-failure' and status = '0'";
//$res_content1 = mysqli_query($con, $sql_content1) or trigger_error("Query Failed! SQL: $sql_content1 - Error: " . mysqli_error(), E_USER_ERROR);
//$row_content1 = mysqli_fetch_assoc($res_content1);
?>

<!--== Page Header Area Start ==-->
<!--<section id="page-header" style="background-image: url(<?php// echo $base_url . $document_page_banner . $row_content1['banner_img']; ?>)">
    <div class="container">
        <div class="row">
             Page Title Start 
            <div class="col-lg-12 text-center">
                <div class="page-title">
                    <h2><?php// echo $row_content1['title'] ?></span></h2>
                </div>

                <div class="page-breadcrum">
                    <ol>
                        <li><a href="<?php //echo $base_url; ?>">Home</a></li>

                        <li class="active"><a href="#"><?php// echo $row_content1['title'] ?></a></li>
                    </ol>
                </div>
            </div>
             Page Title End 
        </div>
    </div>
</section>-->
<!--== Page Header Area End ==-->
<section id="blog-page" class="section-padding">
    <div class="container">
        <div class="row">
            <?php
//print_r($_POST);
//exit();
include_once ('../admin/includes/conn.php');
            $status = $_POST["status"];
            $name = $_POST["name"];
            $amount = $_POST["amount"];
            $txnid = $_POST["txnid"];

            $posted_hash = $_POST["hash"];
            $key = $_POST["key"];
            $productinfo = $_POST["productinfo"];
            $email = $_POST["email"];
            $udf1 = $_POST["udf1"];
            // $salt = "DxySMAbYKy";
            $salt = "iPAwec4awo";

            If (isset($_POST["additionalCharges"])) {
                $additionalCharges = $_POST["additionalCharges"];
                $retHashSeq = $additionalCharges . '|' . $salt . '|' . $status . '||||||||||' . $udf1 . '|' . $email . '|' . $name . '|' . $productinfo . '|' . $amount . '|' . $txnid . '|' . $key;
            } else {

                $retHashSeq = $salt . '|' . $status . '||||||||||' . $udf1 . '|' . $email . '|' . $name . '|' . $productinfo . '|' . $amount . '|' . $txnid . '|' . $key;
            }
            $hash = hash("sha512", $retHashSeq);

            if ($hash != $posted_hash) {
                echo "Invalid Transaction. Please try again";
            } else {

                echo "<h3>Your order status is " . $status . ".</h3>";
                echo "<h4>Your transaction id for this transaction is " . $txnid . ". You may try making the payment by clicking the link below.</h4>";
            }
            switch ($status) {


                case 'failure':
                    $qry = "UPDATE `payment` SET `status` = '0' WHERE `txnid` = '$txnid'";
                    $res = mysqli_query($con, $qry);
                    break;
            }
            ?>
            <!--Please enter your website homepagge URL -->
            <p><a href="<?php echo $base_url; ?>all_course.php"> Try Again</a></p>

        </div>

    </div>



</section>

<?php //include('../common/footer.php'); ?>