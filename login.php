<?php
include_once 'common/header.php';
if (isset($_SESSION['cust_user'])) {
    header('Location:' . $base_url . 'all_courses.php');
    exit();
}
?>
<?php
$sql_content1 = "SELECT * FROM `page` WHERE `alias` = 'login' and status = '0'";
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
                        <li class="active"><a href="<?php echo $base_url; ?>page/<?php echo $row_content1['alias'] ?>"><?php echo $row_content1['title'] ?></a></li>
                    </ol>
                </div>
            </div>
            <!-- Page Title End -->
        </div>
    </div>
</section>
<!--== Page Header Area End ==-->


<section id="lgoin-page-wrap" class="section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-md-8 m-auto">
                <div class="login-page-content">
                    <div class="login-form">
                        <h2>Sign In.</h2>

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
                                case 'passreset_success':
                                    $message = 'Password Reset Successful';
                                    $alert_type = 'alert-success';
                                    break;
                                case 'passreset_error':
                                    $message = 'Password Reset Operation Error';
                                    $alert_type = 'alert-danger';
                                    break;
                                case 'email_verified':
                                    $message = 'Email is not Verified please check your mail and also check your spam folder';
                                    $alert_type = 'alert-danger';
                                    break;
                                case 'email_verified23':
                                    $message = 'Email is Verified.';
                                    $alert_type = 'alert-success';
                                    break;
                                case 'verifyyouraccount':
                                    $message = 'Please check your inbox and verify your account within 2 hours also check spam folder';
                                    $alert_type = 'alert-success';
                                    break;
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
                            <?php
                        }
                        ?>

                        <p class="col-lg-6 m-auto">Please <a href="<?php echo $base_url; ?>registration.php">Sign up</a> if not Registered.</p>


                        
                        <form id="signinForm" method="post" action="<?php echo $base_url; ?>db-login.php">


                            <div class="username">
                                <input type="email" name="email" id="email" placeholder="Email *" required>
                            </div>
                            <div class="username">
                                <input type="password" name="password" id="password" placeholder="Password *" required>
                            </div>
                            <div class="username">
                                <button class="theme-btn" id="submit_reg" type="submit">Login</button>
                            </div>



                        </form>


                    </div>
                    <div class="login-other">
                        <p>Forget Password? Click <a href="<?php echo $base_url; ?>forget-password.php">Here</a>.</p>
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
                email: {
                    required: true,
                    email: true
                }
            },
            messages: {
                password: {
                    required: "Please provide a password",
                    minlength: "Your password must be at least 5 characters long"
                },
                email: {
                    required: "Please provide a Email-id",
                    email: "Please provide a valid Email-id"
                }
            }
        });
    });
</script>