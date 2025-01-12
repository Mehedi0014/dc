<?php
// function create_image(){
//     $image= imagecreate(200, 100);
//     $backword = imagecolorallocate($image, 0, 0, 0);
//     $forward = imagecolorallocate($image, 255, 255, 255);
//     imagestring($image, 0, 55, 55,rand(100000, 999999),  $forward);
//     header("Content-type: image/jpeg");
//     imagejpeg($image);
//     imagedestroy($image);
// }
include_once 'common/header.php';
if (isset($_SESSION['cust_user'])) {
    header('Location:' . $base_url . 'all_courses.php');
    exit();
}



?>
<?php

include_once('emailverification.php');

$sql_content1 = "SELECT * FROM `page` WHERE `alias` = 'registration' and status = '0'";
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
                        <h2>Register Now.</h2>
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

                                case 'login_error':
                                    $message = 'You have entered wrong Email-Id and Password';
                                    $alert_type = 'alert-danger';
                                    break;
                                case 'login_error_register':
                                    $message = 'You have entered wrong Email-Id and Password';
                                    $alert_type = 'alert-danger';
                                    break;
                                case 'verify_email':
                                    $message = 'Kindly Verify you email';
                                    $alert_type = 'alert-danger';
                                    break;
                                case 'error_capcha':
                                    $message = 'Check The capcha';
                                    $post_data = $_SESSION['post_data'];
                                    unset($_SESSION['post_data']);
                                    $alert_type = 'alert-danger';
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
                        
                        /**/
                        ?>

                        <!--<p> Maintaince in process</p>-->
                        
                        <form id="signupForm" method="post" action="<?php echo $base_url; ?>db-registration.php" onSubmit="return formValidation();">
                        
                            <div class="username">
                                <input type="text" name="first_name" id="first_name" placeholder="First Name *" value="<?=((isset($post_data['first_name'])) ? $post_data['first_name']: "" )?>" required>
                            </div>
                            <div class="username">
                                <input type="text" name="last_name" id="last_name" placeholder="Last Name *" value="<?=((isset($post_data['last_name'])) ? $post_data['last_name']: "" )?>" required>
                            </div>
                            <div class="username">
                                <input type="number" name="phone" id="phone"  size = "10" onblur="phone_validation(7,12)" placeholder="Phone*" value="<?=((isset($post_data['phone'])) ? $post_data['phone']: "" )?>"  required>
                            </div>
                            <div class="username">
                                <input type="email" name="email" id="email" placeholder="Email *" value="<?=((isset($post_data['email'])) ? $post_data['email']: "" )?>" required>
                            </div>

                            <div class="username">
                                <input type="text" name="address" id="address" placeholder="Address" value="<?=((isset($post_data['address'])) ? $post_data['address']: "" )?>">
                            </div>
                            <div class="username">
                                <input type="password" name="password" id="password" placeholder="Password *" required>
                            </div>
                            <div class="username">
                                <input type="password" name="re_password" id="re_password" placeholder="Retype Password*" required>
                            </div>
                            <div class="username">
                                <div class="g-recaptcha" data-sitekey="6LexbeAZAAAAAHiATrG1buOrmL3srgZbkp0XIjuD"></div>
                            </div>
                            <!-- <div class="username">
                                <input type="number" name="captchanumber" id="captchanumber" placeholder="Enter Capcha number*" required>
                            </div> -->
                            <div class="username">
                                <button class="theme-btn" id="submit_reg" type="submit">Submit</button>
                            </div>

                        </form>
                            
                            <?php
                            /**/
                        ?>
                        <!--<h5>We're maintaining our website.</h5>-->
                        <!--<h6>Thanks for your patience.</h6>-->
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
        $("#signupForm").validate({
            rules: {
                first_name: {
                    required: true,
                    minlength: 3
                },
                last_name: {
                    required: true,
                    minlength: 3
                },
                phone: {
                    required: true,
                    minlength: 10
                },
                password: {
                    required: true,
                    minlength: 5
                },
                re_password: {
                    required: true,
                    minlength: 5,
                    equalTo: "#password"
                },
                email: {
                    required: true,
                    email: true
                }
                address: {
                    minlength: 5,
                    required: true
                }
            },
            messages: {
                firstname: {
                    required: "Please enter Name",
                    minlength: "Your Name must consist of at least 3 characters"
                },
                lastname: {
                    required: "Please enter Name",
                    minlength: "Your Name must consist of at least 3 characters"
                },
                phone: {
                    required: "Please enter phone",
                    minlength: "Your phone number is not valid."
                },
                password: {
                    required: "Please provide a password",
                    minlength: "Your password must be at least 5 characters long"
                },
                re_password: {
                    required: "Please provide a password",
                    minlength: "Your password must be at least 5 characters long",
                    equalTo: "Please re type the same Password"
                },
                email: {
                    required: "Please provide a Email-id",
                    email: "Please provide a valid Email-id"
                }
                address: {
                    required: "Please provide address",
                    minlength: "Your address is not valid"
                }
            }
        });
    });
</script>
<script>

function validate()
{

var phone = document.getElementById('phone')

  if (phone.value.length < 10) {
    alert('phone must be longer than 10 characters');
    return false;
  }
  else{
      return true;
  }



}
</script>  