<?php
include_once 'common/header.php'; ?>

<style>
    #blink {
        color: #0000D1;
        font-size: 20px;
        font-weight: bold;
        transition: 1s;
    }
</style>



<!--== Slider Area Start ==-->
<!-- <section id="slider-area-backup">
    <?php
    $qry_slider = "select * from slider order by sort";
    $res_slider = mysqli_query($con, $qry_slider);
    $i = 1;
    while ($row_slider = mysqli_fetch_array($res_slider)) {
        ?>

        <div class="single-slide slider-img-<?php echo $i; ?>" style="background-image: url(<?php echo $base_url . $document_path_slider . $row_slider['image']; ?>)">
            <div class="container-fluid h-100">
                <div class="row h-100">                    
                    <div class="col-lg-6 m-auto text-center">
                        <div class="slider-slide-text">
                            <?php
                            echo html_entity_decode($row_slider['body']);
                            ?>
                        </div>
                    </div>
                    <div class="col-lg-6"></div>                  
                </div>
            </div>
        </div>

        <?php
        $i++;
    }
    ?>
</section> -->
<!--== Slider Area End ==-->




<!--== Slider Area Start ==-->
<section id="slider-area">
    <div class="single-slide slider-img-1" style="background-image: url(<?php echo $base_url . $document_path_slider; ?>slider-Experienced-Professionals.png)">
        <div class="container-fluid h-100">
            <div class="row h-100">                    
                <div class="col-lg-6 m-auto text-center">
                    <div class="slider-slide-text">
                        <h3>Welcoming <br/> <span class="sliderHighlightText">Dr. Rabi Narayan Mishra</span> <br /> As Our Distinguished Advisor</h3>

                        <p>We are honored to welcome Dr. Rabi Narayan Mishra, former Executive Director (Supervision & SupTech) and Founding Director of the College of Supervisors, RBI, as our Distinguished Advisor.</p>
                        <p>Fondly known as the 'Resilience Guru,' Dr. Mishra brings decades of expertise in the space of  governance, risk management, Compliance and Leadership Styles.</p>

                        
                        <h5 class="commingSoonOffered">Sessions Offered (Coming Soon):</h5>

                        <p>Strategic Programs for C-Suite Professionals</p>
                        <p>Upskilling for Officials</p>
                        <!-- <a class="btn btn-primary">Coming Soon</a> -->
                    </div>
                </div>
                <div class="col-lg-6"></div>                  
            </div>
        </div>
    </div>
    <div class="single-slide slider-img-2" style="background-image: url(<?php echo $base_url . $document_path_slider; ?>slider-Experienced-Professionals.jpg)">
        <div class="container-fluid h-100">
            <div class="row h-100">                    
                <div class="col-lg-6 m-auto text-center">
                    <div class="slider-slide-text">
                        <h3>Programs for Experienced Banking Professionals in <span class="sliderHighlightText">Credit and Risk management</span></h3>

                        <p>Our flagship course is tailored for banking executives and finance professionals aiming to excel in credit or risk roles within the SME and Corporate Banking Credit segment. Trusted by leading financial institutions in India and abroad, this program sets the benchmark for career advancement.</p>
                        <a href="<?php echo $base_url; ?>training.php" class="btn btn-primary">Explore</a>
                    </div>
                </div>
                <div class="col-lg-6"></div>                  
            </div>
        </div>
    </div>
    <div class="single-slide slider-img-3" style="background-image: url(<?php echo $base_url . $document_path_slider; ?>slider-C-Suite-Professionals.jpg)">
        <div class="container-fluid h-100">
            <div class="row h-100">                    
                <div class="col-lg-6 m-auto text-center">
                    <div class="slider-slide-text">
                        <h3>Strategic Programs for <span class="sliderHighlightText">C-Suite Professionals</span></h3>

                        <p>Empowering Boards of Directors, CROs, CCOs, and CAOs (and their teams) to navigate new-age risks, regulatory complexities, and the evolving banking and lending landscape. Our programs guide leadership teams toward building “Distress-Free” and “Future-Ready” organizations.</p>

                        <h5 class="commingSoonOffered">Coming Soon</h5>
                        <!-- <a class="btn btn-primary">Coming Soon</a> -->
                    </div>
                </div>
                <div class="col-lg-6"></div>                  
            </div>
        </div>
    </div>
    <div class="single-slide slider-img-4" style="background-image: url(<?php echo $base_url . $document_path_slider; ?>slider-Entry-Level-Professionals.jpg)">
        <div class="container-fluid h-100">
            <div class="row h-100">                    
                <div class="col-lg-6 m-auto text-center">
                    <div class="slider-slide-text">
                        <h3>Job-Ready Programs for <span class="sliderHighlightText">Entry-Level Professionals</span> (Interview Assured)</h3>

                        <p>A comprehensive program designed for beginners aspiring to work in banks and financial institutions. Gain all the essential skills required by the industry, with interviews arranged with leading financial institutions upon program completion.</p>
                        <!-- <a class="btn btn-primary">Coming Soon</a> -->

                        <h5 class="commingSoonOffered">Coming Soon</h5>
                    </div>
                </div>
                <div class="col-lg-6"></div>                  
            </div>
        </div>
    </div>
    <div class="single-slide slider-img-5" style="background-image: url(<?php echo $base_url . $document_path_slider; ?>slider-IIBF.jpg)">
        <div class="container-fluid h-100">
            <div class="row h-100">                    
                <div class="col-lg-6 m-auto text-center">
                    <div class="slider-slide-text">
                        <h3>Leading <span class="sliderHighlightText">Debt Recovery Agent</span> (DRA) Training Partner</h3>

                        <p>Indian Institute of Banking & Finance (IIBF) Accredited Debt Recovery Agent (DRA) training institute in Kolkata.</p>
                        <a class="btn btn-primary" href="<?php $base_url;?>contact-us.php">Contact Us</a>
                    </div>
                </div>
                <div class="col-lg-6"></div>                  
            </div>
        </div>
    </div>  
</section>
<!--== Slider Area End ==-->



<!-- <div class="popular_program_area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section_title text-center">
                    <p><br></p> -->


                    
                    <!-- <a href="https://youtube.com/playlist?list=PLt1cMpqMskmL42Vd4vFsxG_VQW-ngpLCG" id="blink"> Click here for training on Finance for Non Finance folks!</a>
                    <script type="text/javascript">
                        var blink = document.getElementById('blink');
                        setInterval(function() {
                            blink.style.opacity = (blink.style.opacity == 0 ? 1 : 0);
                        }, 1500);
                    </script> -->


                    
                    <!-- <marquee  id="blink" scrollamount="12" direction="right">
                        <a href="<?=$base_url?>course_details.php?crs=942<?=$result_course['id']?>">
                        Click here for training on Finance for Non Finance folks!
                        </a>
                    </marquee>
                    <p><br></p> -->


                <!--  </div>
            </div>
        </div>
    </div>
</div> -->



<!--== About Area Start ==-->
<!-- <section id="about-area" class="section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="section-title">
                    <h2>About <span>Us</span></h2>
                </div>
            </div>
        </div>
    </div>

    <?php
    $sql_content1 = "SELECT * FROM `page` WHERE `alias` = 'home'";
    $res_content1 = mysqli_query($con, $sql_content1) or trigger_error("Query Failed! SQL: $sql_content1 - Error: " . mysqli_error(), E_USER_ERROR);
    $row_content1 = mysqli_fetch_assoc($res_content1);
    ?>
    <div class="about-content-wrap">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="about-video-area" style="background-image: url(<?php echo $base_url . $document_page_banner . $row_content1['other_image']; ?>)">
                        <a class="video-click v-popup" href="https://www.youtube.com/watch?v=IdKDIYMFnlo"><i class="fa fa-play"></i></a>
                    </div>
                </div>

                <div class="col-lg-5">
                    <div class="about-text-area">
                        <h2>Beautiful &amp; Useful Solutitons</h2>
                        <?php
                        echo html_entity_decode($row_content1['body']);
                        ?>
                        <a href="<?php echo $base_url; ?>page/why-us" class="theme-btn">READ MORE</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> -->
<!--== About Area End ==-->




<!--== Right Think Area Start ==-->
<!-- <section id="right-think" class="section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="right-think-top mb-10">
                    <h3><span>OUR </span>SERVICES</h3>
                    <p>Our team at Disseminare possesses the crucial combination of theory<br> as well as practical experience to guide your team to successful outcomes.
                    </p>
                </div>
            </div>
        </div>

        <div class="row">
            <?php
            $qry_service = "select * from service where status = '0' and homepage = 'Yes' order by sort";
            $res_service = mysqli_query($con, $qry_service);
            while ($row_service = mysqli_fetch_array($res_service)) {
                ?>
                <div class="col-lg-3 col-md-3">
                    <div class="single-right-think">
                        <div class="right-think-thumb">
                            <img src="<?php echo $base_url . $document_path_service . $row_service['homepage_image']; ?>" alt="<?php echo $row_service['name']; ?>">
                        </div>
                        <div class="right-think-text">
                            <h3><a href="<?php echo $base_url; ?>service/<?php echo $row_service['alias']; ?>"><?php echo $row_service['name']; ?></a></h3>
                            
                            <?php
                            // echo substr(html_entity_decode($row_service['description']), 0, 35);
                            ?>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</section> -->
<!--== Right Think Area End ==-->




<!--== Starts here Digital Learning video Area==-->
<!-- <section id="right-think" class="section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="right-think-top mb-10">
                    <h3><span>Digital </span>Learning</h3>
                    <p>Digital Learning Solutions that combine convenience with efficacy</p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-4 col-md-4">
                <div class="single-right-think">
                    <div class="right-think-thumb">
                        <img src="./dis_image/digital-learning.png" alt="demo1">
                    </div>
                    <div class="right-think-text">
                        <h3><a href="../training-module/Cma/" target="_blank">Demo 1</a></h3>
        
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-4">
                <div class="single-right-think">
                    <div class="right-think-thumb">
                        <img src="./dis_image/digital-learning.png" alt="demo2">
                    </div>
                    <div class="right-think-text">
                        <h3><a href="../training-module/Forex/" target="_blank">Demo 2</a></h3>
        
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-4">
                <div class="single-right-think">
                    <div class="right-think-thumb">
                        <img src="./dis_image/digital-learning.png" alt="demo3">
                    </div>
                    <div class="right-think-text">
                        <h3><a href="../training-module/Non-fund/" target="_blank">Demo 3</a></h3>
        
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> -->




<!--== End here  Digital Learning video Area==-->
<!--== Partner Area Start ==-->
<div class="partner-area"  style="background-image: url(<?php echo $base_url; ?>dis_image/client_bg.jpg)">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="partner-content-wrap">
                    <!-- Single Partner Start -->

                    <?php
                    $qry_client = "select * from client order by sort";
                    $res_client = mysqli_query($con, $qry_client);

                    while ($row_client = mysqli_fetch_array($res_client)) {
                        ?>
                        <div class="single-partner">
                            <img src="<?php echo $base_url . $document_path_client . $row_client['logo']; ?>" alt="<?php echo $row_client['name']; ?>">
                        </div>
                        <?php
                    }
                    ?>

                </div>
            </div>
        </div>
    </div>
</div>
<!--== Partner Area End ==-->





<!--== Testimonial Area Start ==-->
<section id="testimonial-area" class="section-padding"  style="background-image: url(<?php echo $base_url; ?>dis_image/testimonial.jpg)">
    <div class="container">
        <div class="row">
            <!-- Section Title Start -->
            <div class="col-lg-12 text-center">
                <div class="section-title">
                    <h2>Client <span>Testimonial</span></h2>
                </div>
            </div>
            <!-- Section Title End -->
        </div>

        <div class="row">
            <div class="col-lg-9 m-auto text-center">
                <div class="testimonial-content">
                    <!-- Single Testimonial Start -->

                    <?php
                    $qry_testimonial = "select * from testimonial where status = '0' and homepage = 'Yes' order by sort";
                    $res_testimonial = mysqli_query($con, $qry_testimonial);

                    while ($row_testimonial = mysqli_fetch_array($res_testimonial)) {
                        ?>
                        <div class="single-testimonial">
                            <div class="client-thum">
                                <img src="<?php echo $base_url . $document_path_testimonial . $row_testimonial['image']; ?>" alt="<?php echo $row_testimonial['name']; ?>">
                            </div>
                            <div class="client-feedback">
                                <?php echo html_entity_decode($row_testimonial['body']); ?>
                            </div>
                            <h3 class="client-name"><?php echo $row_testimonial['name']; ?>, <?php echo $row_testimonial['designation']; ?></h3>
                        </div>
                        <?php
                    }
                    ?>

                </div>
            </div>
        </div>
    </div>
</section>
<!--== Testimonial Area End ==-->




<!--== Call Back Area Start ==-->
<section id="call-back-area" class="section-padding" style="background-image: url(<?php echo $base_url; ?>dis_image/drop-message.jpg)">
    <div class="container">
        <div class="row">
            <!-- Request Call Back Txt -->
            <div class="col-lg-5">
                <div class="display-table">
                    <div class="display-table-cell">
                        <div class="call-back-text">
                            <h2>Request A <span>Call</span> Back.</h2>
                            <!-- <p>Business is a marketing discipline focused on growing visibility in organic search engine results.encompasses both the technical and creative elements required to improve rankings, drive traffic, and increase awareness in search engines</p> -->

                            <p class="call-us"><b>Call Us</b> for immediate support at this number</p>
                            <h3>+91 9820301067</h3>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Request Call Back Txt -->

            <!-- Request a Message Form -->
            <div class="col-lg-7">
                <div class="request-message-form">
                    <h2>Drop Your Message</h2>
                    <form method="post" action="<?php echo $base_url; ?>php_mailer_setup.php">
                    <?php /*<form method="post" action="<?php echo $base_url; ?>homepage_mail.php"> */ ?>
                        <div class="single-input">
                            <div class="row">
                                <div class="col-lg-6 col-sm-6">
                                    <input type="text" name="fname" placeholder="First Name" required>
                                </div>

                                <div class="col-lg-6 col-sm-6">
                                    <input type="text" name="lname" placeholder="Last Name" required>
                                </div>
                            </div>
                        </div>

                        <div class="single-input">
                            <input type="email" name="email" placeholder="Email Address" required>
                        </div>

                        <div class="single-input">
                            <div class="row">
                                <div class="col-lg-6 col-sm-6">
                                    <input type="text" name="mobile" placeholder="Phone" required>
                                </div>

                                <div class="col-lg-6 col-sm-6">
                                    <input type="text" name="subject" placeholder="Subject" required>
                                </div>
                            </div>
                        </div>

                        <div class="single-input">
                            <textarea name="message" id="message" cols="30" rows="5" required></textarea>
                        </div>
                        <!-- <div class="single-input">
                            <div class="g-recaptcha" data-sitekey="6LexbeAZAAAAAHiATrG1buOrmL3srgZbkp0XIjuD"></div>
                        </div> -->

                        <div class="single-input">
                            <button class="theme-btn" type="submit" name="submitHomePage"> <i class="fa fa-send"></i> Send Message</button>
                        </div>
                    </form>
                    <?php
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
            </div>
            <!-- Request a Message Form -->
        </div>
    </div>
</section>
<!--== Call Back Area End ==-->




<!--== Service Area Start ==-->
<!-- <section id="service-area" class="service-bg section-padding" style="background-image: url(<?php echo $base_url; ?>dis_image/our-training-bg.png)">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="section-title">
                    <h2>Our <span>Courses</span></h2>
                </div>
            </div>
        </div>

        <div class="row">
            <?php $htmlCourse = getTrainingHTML($con); 
            echo (!empty($htmlCourse)) ? $htmlCourse : '';
            ?>
        </div>
    </div>
</section> -->
<!--== Service Area End ==-->




<!--== Project Area Start ==-->
<!-- <section id="project-area" class="section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="section-title">
                    <h2>Upcoming <span>Training</span></h2>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="project-filter-menu">
                    <ul>
                        <li class="active" data-filter="*">All</li>
                        <li data-filter=".con">Consulting</li>
                        <li data-filter=".fin">Finance</li>
                        <li data-filter=".mar">Marketing</li>
                        <li data-filter=".gro">Growth</li>
                        <li data-filter=".tech">Technical</li>
                    </ul>
                </div>
                <div class="row project-content-wrap">
                    <?php
                    $d_day = date('Y-m-d');
                    $qry_course = "select * from course where status = '0' and course_date > '$d_day' order by course_date LIMIT 3";
                    $res_course = mysqli_query($con, $qry_course);

                    while ($row_course = mysqli_fetch_array($res_course)) {
                        ?>
                        <div class="col-lg-4 col-sm-6 con gro">
                            <div class="single-project">
                                <div class="project-thumb p-thumb-1" style="background-image: url(<?php echo $base_url . $document_path_course . $row_course['homepage_image']; ?>)"></div>
                                <div class="project-hvr-content">
                                    <a href="<?php echo $base_url .'course/' .$row_course['alias']; ?>"><i class="fa fa-link"></i></a>
                                    <h3><?php echo $row_course['name'] ?></h3>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    ?>

                    <div class="row project-content-wrap">                                            
                        <div class="col-lg-4 col-sm-6 con gro">
                            <div class="single-project">
                                <div class="project-thumb p-thumb-1"></div>
                                <div class="project-hvr-content">
                                    <a href="#"><i class="fa fa-link"></i></a>
                                    <h3>Consulting &amp; Growth</h3>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-lg-4 col-sm-6 fin mar">
                            <div class="single-project">
                                <div class="project-thumb p-thumb-2"></div>
                                <div class="project-hvr-content">
                                    <a href="#"><i class="fa fa-link"></i></a>
                                    <h3>Finance &amp; Marketing</h3>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-lg-4 col-sm-6 tech gro">
                            <div class="single-project">
                                <div class="project-thumb p-thumb-3"></div>
                                <div class="project-hvr-content">
                                    <a href="#"><i class="fa fa-link"></i></a>
                                    <h3>Technical &amp; Growth</h3>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-lg-4 col-sm-6 fin con">
                            <div class="single-project">
                                <div class="project-thumb p-thumb-4"></div>
                                <div class="project-hvr-content">
                                    <a href="#"><i class="fa fa-link"></i></a>
                                    <h3>Finance &amp; Consulting</h3>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-lg-4 col-sm-6 gro mar">
                            <div class="single-project">
                                <div class="project-thumb p-thumb-5"></div>
                                <div class="project-hvr-content">
                                    <a href="#"><i class="fa fa-link"></i></a>
                                    <h3>Growth &amp; Marketing</h3>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-lg-4 col-sm-6 tech mar">
                            <div class="single-project">
                                <div class="project-thumb p-thumb-6"></div>
                                <div class="project-hvr-content">
                                    <a href="#"><i class="fa fa-link"></i></a>
                                    <h3>Technical &amp; Marketing</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> -->
<!--== Project Area End ==-->





<!--== Team Area Start ==-->
<!-- <section id="team-area" class="section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="section-title">
                    <h2>Management <span>Team</span></h2>
                </div>
            </div>
        </div>

        <div class="row">
            <?php
            $qry_management = "select * from management where status = '0'  order by id";
            $res_management = mysqli_query($con, $qry_management);

            while ($row_management = mysqli_fetch_array($res_management)) {
                ?>
                <div class="col-lg-3 col-sm-6">
                    <div class="single-team-member text-center">
                        <img src="<?php echo $base_url . $document_path_management . $row_management['banner_img']; ?>" alt="<?php echo $row_management['title']; ?>" class="img-fluid">
                        <div class="member-info">
                            <div class="display-table">
                                <div class="display-table-cell">
                                    <h3><?php echo $row_management['title']; ?> <span class="tagline"><?php echo $row_management['designation']; ?></span></h3>
                                    <span class="social-ico">
                                        <a href="#"><i class="fa fa-facebook"></i></a>
                                        <a href="#"><i class="fa fa-twitter"></i></a>
                                        <a href="#"><i class="fa fa-linkedin"></i></a>
                                        <a href="#"><i class="fa fa-dribbble"></i></a>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</section> -->
<!--== Team Area End ==-->






<?php include_once 'common/footer.php'; 
function getTrainingHTML($con=null, $html=null)
{
            $html = '<div class="col-lg-4 col-sm-6 text-center">
                    <div class="single-service">
                        <div class="service-icon">
                            <i class="fa %s"></i>
                        </div>
                        <h4>%s</h4>
                        <div class="comment more">%s</div>
                    </div>
                </div>';
            $finalHTMl='';
            $qry_training = "select * from training where status = '0' and homepage = 'Yes' order by sort";
            $res_training = mysqli_query($con, $qry_training);

            while ($row_training = mysqli_fetch_array($res_training)) {
                $fulltext = $row_training['description'];
				$icon = $row_training['f_icon'];
				$name = $row_training['name'];
				$body = substr(strip_tags($fulltext, '\n'), 0, strpos($fulltext, "\n"));
                                
                $finalHTMl .= sprintf($html, $icon, $name, html_entity_decode($body));
                
            }
            return $finalHTMl;
}
