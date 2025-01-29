<!--== Fotter Widget Area Start ==-->
<?php
    if( !isset( $_SESSION ) ) 
    { 
        session_start(); 
    }
?>

<footer id="footer-area">
    <div id="fotter-widget" class="section-padding">
        <div class="container">
            <div class="row">
                <!-- Single Widget Start -->
                <div class="col-lg-4 col-sm-12">
                    <div class="single-widget">
                        <img src="<?php echo $base_url . $document_path_site_logo . $row_setting['footer_logo']; ?>" alt="">
                        <p style="text-align: justify;">Disseminare Consulting is a cutting edge knowledge based company that is focused on enabling companies to get more out of their teams through a process of ongoing training.</p>
                        <div class="newsletter-from">
                            <!--<form action="index.html">
                                <input type="email" placeholder="Subscribe Newsletter">
                                <button><i class="fa fa-send"></i></button>
                            </form>-->
                        </div>
                        <div class="footer-icons">
                            <h6>Follow us-</h6>
                            <a target="_blank" rel="nofollow" href="https://www.facebook.com/Disseminare-Consulting-127941044618492/"><i class="fa fa-facebook"></i></a>
                            <a target="_blank" rel="nofollow" href="https://www.linkedin.com/company/disseminare-consulting/"><i class="fa fa-linkedin"></i></a>
                            <!--<a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-behance"></i></a>-->
                        </div>
                    </div>
                </div>
                <!-- Single Widget End -->

                <!-- Single Widget Start -->
                <div class="col-lg-4 col-sm-12">
                    <!-- <div class="single-widget">
                        <div class="widget-title">
                            <h4>useful Links</h4>
                        </div>
                        <div class="widget-body">
                            <ul class="footer-list">
                                <li><a href="<?php echo $base_url; ?>">Home</a></li>
                                <li><a href="<?php echo $base_url; ?>why-us">About Us</a></li>
                                <li><a href="<?php echo $base_url; ?>service/training">Services</a></li>
                                <li><a href="<?php echo $base_url; ?>latest-banking.php"> Knowledge Center</a></li>
                                <li><a href="<?php echo $base_url; ?>training.php">Training</a></li>
                                <li><a href="<?php echo $base_url; ?>contact-us.php">Contact Us</a></li>
                                <li><a href="<?php echo $base_url; ?>course_terms.php">Terms</a></li>
                                <li><a href="<?php echo $base_url; ?>all_courses.php">Upcoming Workshops</a></li>
                                <li><a href="<?php echo $base_url; ?>terms_and_conditions.php">Terms and Conditions</a></li>
                                <li><a href="<?php echo $base_url; ?>privacy_statement.php">Privacy Statement</a></li>
                                <li><a href="<?php echo $base_url; ?>refund-policy.php">Refund Policy</a></li>
                                <li><a href="<?php echo $base_url; ?>cancellation-policy.php">Cancellation Policy</a></li>
                            </ul>
                        </div>
                    </div> -->
                </div>
                <!-- Single Widget End -->

                <!-- Single Widget Start -->
                <div class="col-lg-4 col-sm-12">
                    <!-- <div class="single-widget">
                        <div class="widget-title">
                            <h4>Register</h4>
                        </div>
                        <div class="widget-body">
                            <ul class="tags">
                                <?php
                                if (isset($_SESSION['cust_user'])) {
                                    ?>
                                    <li><a href="<?php echo $base_url; ?>logout.php"> Logout</a></li>
                                    <?php
                                } else {
                                    ?>
                                    <li><a href="<?php echo $base_url; ?>registration.php">Sign Up</a></li>
                                    <li><a href="<?php echo $base_url; ?>login.php">Login</a></li>
                                    <?php
                                }
                                ?>
                            </ul>
                        </div>
                    </div> -->
                </div>
                <!-- Single Widget End -->

                <!-- Single Widget Start -->
                
<!--                <div class="col-lg-3 col-sm-6">
                    <div class="single-widget">
                        <div class="widget-title">
                            <h4>News</h4>
                        </div>-->

                        <?php
                        /**
                        $qry_anc = "select * from announcement where status = '0' order by id desc limit 2";
                        $res_anc = mysqli_query($con, $qry_anc);

                        while ($row_anc = mysqli_fetch_array($res_anc)) {
                         * 
                         */
                            ?>


<!--                            <div class="widget-blog">
                                <div class="widget-blog-left">
                                    <img src="<?php// echo $base_url; ?>dis_image/letest-news_1.jpg" alt="Annoucement" />
                                </div>
                                <div class="widget-blog-right">
                                    <p><a href="<?php //echo $base_url; ?>#"><?php //echo $row_anc['name'] ?></a></p>
                                        <span><a href="#"><i class="fa fa-calendar"></i> 22 Feb 2018</a></span>
                                </div>
                            </div>-->


                            <?php
                            /**
                        }
                             * 
                             */
                        ?>  

                        <!--                        <div class="widget-blog">
                                                    <div class="widget-blog-left">
                                                        <img src="<?php //echo $base_url; ?>dis_image/letest-news_2.jpg" alt="widget" />
                                                    </div>
                                                    <div class="widget-blog-right">
                                                        <p><a href="#">Seminar for improve your business profit.</a></p>
                                                        <span><a href="#"><i class="fa fa-calendar"></i> 22 Feb 2018</a></span>
                                                    </div>
                                                </div>-->
<!--                    </div>
                </div>-->
                <!-- Single Widget End -->
            </div>
        </div>
    </div>

    <div id="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 text-center" >
                    <div class="footer-content" style="display: inline-block">
                        <p>Copyright ©<?php echo date('Y'); ?> Disseminare. All Rights Reserved</p>
                    </div>
                </div>
                <!--         <div class="col-lg-6 col-md-6 col-sm-12">
                           <div class="footer-menu">
                                <nav>
                                    <ul>
                                        <li><a href="#">Faq</a></li>
                                        <li><a href="#">Login</a></li>
                                        <li><a href="#">Support</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>-->
            </div>
        </div>
    </div>
</footer>
<!--== Fotter Widget Area End ==-->

<!--== Scroll Top Area Start ==-->
<div class="scroll-top">
    <i class="fa fa-angle-up"></i>
</div>
<!--== Scroll Top Area End ==-->


<!--== Section Area Start ==-->

<!--== Section Area End ==-->


<!--=======================Javascript============================-->
<!--=== Jquery Min Js ===-->
<script src="<?php echo $base_url; ?>assets/js/jquery-3.3.1.min.js"></script>
<!--=== Jquery Migrate Min Js ===-->
<script src="<?php echo $base_url; ?>assets/js/jquery-migrate.min.js"></script>
<!--=== Popper Min Js ===-->
<script src="<?php echo $base_url; ?>assets/js/popper.min.js"></script>
<!--=== Bootstrap Min Js ===-->
<script src="<?php echo $base_url; ?>assets/js/bootstrap.min.js"></script>
<!--=== Owl Carousel Min Js ===-->
<script src="<?php echo $base_url; ?>assets/js/plugins/owl.carousel.min.js"></script>
<!--=== Magnific PopUp Min Js ===-->
<script src="<?php echo $base_url; ?>assets/js/plugins/magnific-popup.min.js"></script>
<!--=== Waypoints Min Js ===-->
<script src="<?php echo $base_url; ?>assets/js/plugins/waypoints.min.js"></script>
<!--=== CounterUp Min Js ===-->
<script src="<?php echo $base_url; ?>assets/js/plugins/counterup.js"></script>
<!--=== Isotope Min Js ===-->
<script src="<?php echo $base_url; ?>assets/js/plugins/isotope.pkgd.min.js"></script>
<!--=== Slicknav Min Js ===-->
<script src="<?php echo $base_url; ?>assets/js/plugins/slicknav.min.js"></script>
<!--=== NiceSelect Min Js ===-->
<script src="<?php echo $base_url; ?>assets/js/plugins/nice-select.min.js"></script>
<script src="<?php echo $base_url; ?>assets/js/plugins/jquery.shorten.min.js"></script>

<!--=== Mian Js ===-->
<script src="<?php echo $base_url; ?>assets/js/main.js"></script>


<script src="<?php echo $base_url; ?>assets/js/ekko-lightbox.min.js"></script>
<script src="<?php echo $base_url; ?>assets/js/jquery.prettyPhoto.js"></script>

<script>
    $(document).ready(function () {
        jQuery("a[rel^='prettyPhoto']").prettyPhoto();
        // $('#lightgallery').lightGallery();
    });
    
    var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.maxHeight){
      panel.style.maxHeight = null;
    } else {
      panel.style.maxHeight = panel.scrollHeight + "px";
    } 
  });
}
    
    
    
</script>
<script type="text/javascript">
    $(document).ready(function() {
        
        $(".comment").shorten({
	moreText: 'read more',
	lessText: 'read less'
});

  $(".toggle-accordion").on("click", function() {
    var accordionId = $(this).attr("accordion-id"),
      numPanelOpen = $(accordionId + ' .collapse.in').length;
    
    $(this).toggleClass("active");

    if (numPanelOpen == 0) {
      openAllPanels(accordionId);
    } else {
      closeAllPanels(accordionId);
    }
  })

  openAllPanels = function(aId) {
    console.log("setAllPanelOpen");
    $(aId + ' .panel-collapse:not(".in")').collapse('show');
  }
  closeAllPanels = function(aId) {
    console.log("setAllPanelclose");
    $(aId + ' .panel-collapse.in').collapse('hide');
  }
     
});
    
</script>

</body>

</html>