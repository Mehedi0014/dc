<?php
include_once 'common/header.php';
if (isset($_GET['email']) && isset($_GET['hash'])) {
    $user = $_GET['email'];
    $hash = $_GET['hash'];
} else {
    header("Location: login.php?result=fail_forgot");
}
?>
<?php
$sql_content1 = "SELECT * FROM `page` WHERE `alias` = 'reset-password' and status = '0'";
$res_content1 = mysqli_query($con, $sql_content1) or trigger_error("Query Failed! SQL: $sql_content1 - Error: " . mysqli_error(), E_USER_ERROR);
$row_content1 = mysqli_fetch_assoc($res_content1);
?>
<style>
    .error{
        color: red;
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
                        <li class="active"><a href="<?php echo $base_url; ?>reset.php"><?php echo $row_content1['title'] ?></a></li>
                    </ol>
                </div>
            </div>
            <!-- Page Title End -->
        </div>
    </div>
</section>
<!--== Page Header Area End ==-->


<section id="carrer-page" class="section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="carrer-page-content">

                    <div class="carrer-hire-me">
                        <div class="section-title text-center">
                            <h2>Reset Password.</h2>

                            <?php
                            $message = "";
                            if (isset($_GET['result'])) {
                                $message_type = $_GET['result'];
                                $alert_type = "";
                                switch ($message_type) {

                                    case 'customer_data_submit_error':
                                        $message = 'Please fill up form carefully, data entered not correct.';
                                        $alert_type = 'alert-danger';
                                        break;
                                    case 'customer_registration_success':
                                        $message = 'Thanks for your registration, Please follow your mail.';
                                        $alert_type = 'alert-success';
                                        break;

                                    case 'error_registration':
                                        $message = 'You are alredy registered!! please login';
                                        $alert_type = 'alert-danger';
                                        break;
                                    case 'success_forgot':
                                        $message = 'Please follow mail to reset password.';
                                        $alert_type = 'alert-success';
                                        break;
                                    case 'fail_forgot':
                                        $message = 'The Email Id is not registered.';
                                        $alert_type = 'alert-danger';
                                        break;
                                    case 'error-pass-forgot':
                                        $message = 'Re Entered Wrong Password';
                                        $alert_type = 'alert-danger';
                                        break;
                                }
                            }
                            ?>

                            <div id="alert" class="alert <?php echo $alert_type; ?>" role="alert" style="font-size: 18px">

                                <h3><?php echo $message; ?></h3>
                                <br>
                                <?php
                                if (isset($_SESSION['error'])) {
                                    $array_error = $_SESSION['error'];
                                    //print_r($_SESSION);
                                    for ($x = 0, $max = count($array_error); $x < $max; ++$x) {
                                        echo $array_error[$x] . '<br>';
                                    }
                                    //$array_error = '';
                                    unset($_SESSION['error']);
                                }
                                ?>
                            </div>


                        </div>

                        <div class="carrer-hire-form">
                            <form id="signinForm" method="post" action="<?php echo $base_url; ?>reset-function.php">
                                <div class="hire-form-item">
                                    <div class="row">
                                        <input type="hidden" name="user" value="<?php echo $user; ?>" >
                                        <input type="hidden" name="hash" value="<?php echo $hash; ?>" >
                                        <div class="col-lg-4 col-md-4 m-t-40">
                                            <input type="password" name="password" id="password" placeholder="Password *" required>
                                        </div>
                                        <div class="col-lg-4 col-md-4 m-t-40">
                                            <input type="password" name="re_password" id="password" placeholder="Re-Type Password *" required>
                                        </div>
                                        <div class="col-lg-4 col-md-4">
                                            <button class="theme-btn" id="submit_reg" type="submit">Reset</button>
                                        </div>

                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include_once 'common/footer.php'; ?> 


<script src="<?php echo $base_url; ?>assets/js/jquery.validate.js"></script>

<script>
//	$.validator.setDefaults({
//		submitHandler: function() {
//			alert("submitted!");
//		}
//	});

    $().ready(function () {
        // validate the comment form when it is submitted

        // validate signup form on keyup and submit
        $("#signinForm").validate({
            rules: {
                password: {
                    required: true,
                    minlength: 5
                },
                re_password: {
                    required: true,
                    minlength: 5,
                    equalTo: "#password"
                }
            },
            messages: {
                password: {
                    required: "Please provide a password",
                    minlength: "Your password must be at least 5 characters long"
                },
                re_password: {
                    required: "Please provide a password",
                    minlength: "Your password must be at least 5 characters long",
                    equalTo: "Please enter the same password as above"
                }
            }
        });
    });
</script>