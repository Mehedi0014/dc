<!DOCTYPE html>
<?php include_once ('admin/includes/conn.php'); ?>
<?php 
    include_once("cleanGarbageDB.php"); 
    deletedatabase($con);
?>
<?php
session_start();
header("Expires: Tue, 01 Jan 2000 00:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
$qry_setting = "select * from setting";
$res_setting = mysqli_query($con, $qry_setting) or trigger_error("Query Failed! SQL: $qry_setting - Error: " . mysqli_error(), E_USER_ERROR);
$row_setting = mysqli_fetch_assoc($res_setting);
?>
<?php include('collect_ip.php'); ?>
<?php
if (isset($_GET['key'])) {
    $page_key = $_GET['key'];
}

if (isset($_GET['blog'])) {
    $post_key = $_GET['blog'];
}

if (isset($_GET['service'])) {
    $service_key = $_GET['service'];
}

if (isset($_GET['training'])) {
    $training_key = $_GET['training'];
}

if (isset($_GET['course'])) {
    $course_key = $_GET['course'];
}
?>
<?php include('title.php'); ?>
<html class="no-js" lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="<?php echo $description; ?>">
        <meta name="keywords" content="<?php echo $keyword; ?>">
        <!--=== Favicon ===-->
        <link rel="shortcut icon" href="<?php echo $base_url . $document_path_site_logo . $row_setting['favicon']; ?>" type="image/x-icon" />

        <title><?php echo $title; ?></title>

        <!--=== Bootstrap CSS ===-->
        <link href="<?php echo $base_url; ?>assets/css/bootstrap.min.css" rel="stylesheet">
        <!--=== Magnific PopUp CSS ===-->
        <link href="<?php echo $base_url; ?>assets/css/plugins/magnific-popup.css" rel="stylesheet">
        <!--=== Animate CSS ===-->
        <link href="<?php echo $base_url; ?>assets/css/plugins/animate.css" rel="stylesheet">
        <!--=== NiceSelect CSS ===-->
        <link href="<?php echo $base_url; ?>assets/css/plugins/nice-select.css" rel="stylesheet">
        <!--=== Slicknav CSS ===-->
        <link href="<?php echo $base_url; ?>assets/css/plugins/slicknav.min.css" rel="stylesheet">
        <!--=== Owl Carousel CSS ===-->
        <link href="<?php echo $base_url; ?>assets/css/plugins/owl.carousel.css" rel="stylesheet">
        <!--=== Font-Awesome CSS ===-->
        <link href="<?php echo $base_url; ?>assets/css/font-awesome.css" rel="stylesheet">
        <!--=== Theme Reset CSS ===-->
        <link href="<?php echo $base_url; ?>assets/css/reset.css" rel="stylesheet">
        <!--=== Main Style CSS ===-->
        <link href="<?php echo $base_url; ?>style.css" rel="stylesheet">
        <!--=== Responsive CSS ===-->
        <link href="<?php echo $base_url; ?>assets/css/responsive.css" rel="stylesheet">

        <link href="<?php echo $base_url; ?>assets/css/ekko-lightbox.css" rel="stylesheet">
        <link href="<?php echo $base_url; ?>assets/css/prettyPhoto.css" rel="stylesheet">

        <script src="https://www.google.com/recaptcha/api.js" async defer></script>

        <script type="application/ld+json">
            { "@context" : "https://schema.org",
            "@type" : "Organization",
            "name" : "Disseminare Consulting",
            "url" : "https://www.disseminare.com",
            "sameAs" : ["https://www.facebook.com/pages/category/Education/Disseminare-Consulting-127941044618492/",
            "https://in.linkedin.com/company/disseminare-consulting"]
            }
        </script>
    </head>

    <body>
        <!-- Preloader -->
            <!-- <div id="preloader">
                <div class="spinner"></div>
            </div> -->
        <!-- End Preloader -->
         
        <!-- PreHeader Start -->
        <div class="preheader-area">
            <div class="container">
                <div class="row">
                    <!--  PreHeader Left Start -->
                    <div class="col-lg-6 d-none d-lg-block">
                        <div class="header-top-left">
                            <a href="tel:+9831195208"><i class="fa fa-phone"></i> +91-9820301067</a>
                            <a href="mailto:info@disseminare.com"><i class="fa fa-envelope"></i> info@disseminare.com</a>
                        </div>
                    </div>
                    <!--  PreHeader Left End -->

                    <!--  PreHeader Left Start -->
                    <div class="col-lg-6 text-right">
                        <div class="header-top-right">
                            <div class="header-icons">
                                <a target="_blank" rel="nofollow" href="https://www.facebook.com/Disseminare-Consulting-127941044618492/"><i class="fa fa-facebook"></i></a>
                                <a target="_blank" rel="nofollow" href="https://www.linkedin.com/company/disseminare-consulting/"><i class="fa fa-linkedin"></i></a>
                            </div>
                            <!-- <div class="login-reg">
                                <?php
                                if (isset($_SESSION['cust_user'])) {
                                    ?>
                                    <a href="UserDashboard.php"><i class="fa fa-user"></i><?php echo $_SESSION['cust_name'] ?></a>
                                    <a href="<?php echo $base_url; ?>logout.php"> Logout</a>
                                    <?php
                                } else {
                                    ?>
                                    <a href="<?php echo $base_url; ?>login.php"><i class="fa fa-user"></i> Login</a>
                                    <a href="<?php echo $base_url; ?>registration.php"><i class="fa fa-user-plus"></i> Register</a>
                                    <a href="<?php echo $base_url; ?>page/partners"><i class="fa fa-users"></i> Partners</a>
                                    <?php
                                }
                                ?>
                            </div> -->
                        </div>
                    </div>
                    <!--  PreHeader Left End -->
                </div>
            </div>
        </div>
        <!-- PreHeader Top End -->

        <!--== Header Area Start ==-->
        <header id="header-area">
            <!-- Header Top Start -->
            <div class="header-top-area">
                <div class="container">
                    <div class="row">                        
                        <div class="col-md-3 col-xs-12 col-lg-3 text-center text-lg-left">
                            <a href="<?php echo $base_url; ?>" class="logo-area">
                                <img src="<?php echo $base_url . $document_path_site_logo . $row_setting['logo']; ?>" alt="Logo" class="img-responsive">
                            </a>
                        </div>
                        
                        <div class="col-xs-12 col-lg-9 col-md-9 d-flex justify-content-end align-items-center">
                            <!-- <div class="headertop-info-right">
                                <a href="<?php echo $base_url; ?>career.php">
                                    <img src="<?php echo $base_url; ?>dis_image/apply-now.png">
                                </a>
                                <a href="<?php echo $base_url; ?>webinar.php">
                                    <img src="<?php echo $base_url; ?>dis_image/training-calender.png">
                                </a>
                            </div> -->
                            <div class="headertop-info-right">
                                <h5>17+ Years of Global Excellence in BFS Training & Consulting!!</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Header Top End -->
            

            <!-- Header Bottom Start -->
            <div class="header-bottom">
                <div class="container">
                    <div class="row">                        
                        <!-- Main Menu Start -->
                        <div class="col-lg-12 text-center">
                            <nav class="mainmenu">
                                <ul>
                                    <li><a href="<?php echo $base_url; ?>">Home</a></li>
                                    <li>
                                        <a href="#">About Us</a>
                                        <i class="fa fa-caret-down" aria-hidden="true"></i>
                                        <ul>
                                            <li><a href="<?php //echo $base_url; ?>why-us">Why Us</a></li>
                                            <!-- <li><a href="<?php //echo $base_url; ?>learning-methodology">Learning Methodology</a></li> -->
                                            <!--  <?php
                                                $qry_artc = "SELECT * FROM `page` WHERE `parent_id` = '1' AND `status` = '0'";
                                                $res_artc = mysqli_query($con, $qry_artc);
                                                
                                                while($row_artc = mysqli_fetch_assoc($res_artc)) 
                                                {
                                            ?>
                                                <li><a href="<?php echo $base_url; ?>page/<?php echo $row_artc['alias'];?>"><?php echo $row_artc['title'];?></a></li>
                                            <?php
                                                }
                                            ?> -->
                                            
                                            <li><a href="<?php echo $base_url; ?>management.php">Management Team</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="<?php echo $base_url; ?>esteemed-clients.php">Esteemed Clients</a></li>
                                    <!-- <li>
                                        <a href="#">Explore Products</a>
                                        <i class="fa fa-caret-down" aria-hidden="true"></i>
                                        <ul>
                                            <?php
                                                $qry_artc = "SELECT * FROM `service` WHERE `status` = '0'";
                                                $res_artc = mysqli_query($con, $qry_artc);
                                                
                                                while($row_artc = mysqli_fetch_assoc($res_artc)) 
                                                {
                                            ?>
                                                <li><a href="<?php echo $base_url; ?>service/<?php echo $row_artc['alias']?>"><?php echo $row_artc['name']?></a></li>
                                            <?php
                                                }
                                            ?>
                                            <li><a href="<?php //echo $base_url; ?>service/training">Training</a></li>
                                            <li><a href="<?php //echo $base_url; ?>service/public-workshop">Public Workshop</a></li>
                                            <li><a href="<?php //echo $base_url; ?>service/digital-learning">Digital Learning</a></li>
                                            <li><a href="<?php //echo $base_url; ?>service/consulting">Consulting</a></li>
                                            <li><a href="<?php //echo $base_url; ?>service/vulnerability">Vulnerability Assessment</a></li>
                                        </ul>
                                    </li> -->
                                    <li>
                                        <a href="#">Knowledge Center</a>
                                        <i class="fa fa-caret-down" aria-hidden="true"></i>
                                        <ul>
                                            <li><a href="<?php echo $base_url; ?>latest-banking.php">Latest@ Banking</a></li>
                                            <!--<li><a href="<?php echo $base_url; ?>page/reading-material">Reading Material</a>-->
                                            <!--<li><a href="<?php echo $base_url; ?>retail-banking.php">Retail Banking</a></li>-->
                                            <!--<li><a href="<?php echo $base_url; ?>non-fund-based-working-capital.php">Non Fund Based Working Capital</a></li>-->
                                            <!--<li><a href="#">Reading Material</a>
                                                    <ul>
                                                        <li><a href="<?php echo $base_url; ?>service/consulting">Consulting</a></li>
                                                        <li><a href="<?php echo $base_url; ?>service/consulting">Consulting</a></li>
                                                    </ul>                                        
                                                </li>-->
                                        
                                            
                                            <li><a href="<?php echo $base_url; ?>blog.php">Blogs</a></li>
                                            <?php
                                            $qry_artc = "SELECT * FROM `page` WHERE `parent_id` = '2' AND `status` = '0'";
                                            $res_artc = mysqli_query($con, $qry_artc);
                                            
                                            while($row_artc = mysqli_fetch_assoc($res_artc)) 
                                            {
                                            ?>
                                            <li><a href="<?php echo $base_url; ?>page/<?php echo $row_artc['alias'];?>"><?php echo $row_artc['title'];?></a></li>
                                            <?php
                                            }
                                            ?>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="#">Explore Products</a>
                                        <i class="fa fa-caret-down" aria-hidden="true"></i>
                                        <ul>
                                            <li><a href="<?php echo $base_url; ?>training.php">Classroom Training</a></li>
                                            <li><a href="<?php echo $base_url; ?>e-learning_courses.php">Virtual training</a></li>
                                            <?php
                                                    $qry_artc = "SELECT * FROM `page` WHERE `parent_id` = '3' AND `status` = '0'";
                                                    $res_artc = mysqli_query($con, $qry_artc);
                                                    
                                                    while($row_artc = mysqli_fetch_assoc($res_artc)) 
                                                    {
                                                ?>
                                                <li><a href="<?php echo $base_url; ?>page/<?php echo $row_artc['alias'];?>"><?php echo $row_artc['title'];?></a></li>
                                                <?php
                                                    }
                                            ?>    
                                        </ul>
                                    </li>
                                    <li><a href="<?php echo $base_url; ?>gallery.php">Gallery</a></li>
                                    <!--<li><a href="#">Global</a>
                                    
                                        <ul>
                                            <li><a href="<?php // echo $base_url;    ?>page/disseminare-singapore">Disseminare@ Singapore</a></li>
                                        <li><a href="<?php //echo $base_url;    ?>page/disseminare-bangladesh">Disseminare@ Bangladesh</a></li>    
                                            
                                        </ul>
                                    </li>-->
                                    <li><a href="<?php echo $base_url; ?>career.php">Career</a></li>
                                    <!--<li><a href="#">Calender</a>
                                        <ul>
                                            <li><a href="<?php echo $base_url; ?>gallery.php">Gallery</a></li>
                                            <li><a href="career.html">Past Assignments</a></li>
                                            <li><a href="testimonial.html">Current Assignments</a></li>
                                            <li><a href="<?php echo $base_url; ?>all_courses.php">Upcoming Assignments</a></li>
                                        </ul>
                                    </li>-->
                                    <li><a href="<?php echo $base_url; ?>certification.php">Certification</a></li>
                                    <li><a href="<?php echo $base_url; ?>contact-us.php">Contact Us</a></li>
                                </ul>
                            </nav>
                        </div>
                        <!-- Main Menu End -->

                        <!-- Header Bottom Right -->
                        <div class="col-lg-3 text-right">
                            <div class="header-b-right">
                                <!--<ul>
                                    <li><a class="search-icon" href="#"><i class="fa fa-search"></i></a>
                                        <div class="search-form-box">
                                            <form action="index.html">
                                                <input type="search" placeholder="Type Here">
                                                <button><i class="fa fa-search"></i></button>
                                            </form>
                                        </div>
                                    </li>
                                        <li><a class="menubar-icon" href="#"><i class="fa fa-bars"></i></a></li> 
                                </ul>-->
                            </div>
                        </div>
                        <!-- Header Bottom Right -->
                    </div>
                </div>
            </div>
            <!-- Header Bottom End -->
        </header>
        <!--== Header Area End ==-->