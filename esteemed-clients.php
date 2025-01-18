<?php include_once 'common/header.php'; ?>
<?php
$sql_content1 = "SELECT * FROM `page` WHERE `alias` = 'why-us' and status = '0'";
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
                    <h2>Our Clients</h2>
                </div>

                <div class="page-breadcrum">
                    <ol>
                        <li><a href="<?php echo $base_url; ?>">Home</a></li>
                        <!-- <li><a href="#">Our clients</a></li> -->
                        <li class="active"><a href="<?php echo $base_url; ?>management.php">Our Clients</a></li>
                    </ol>
                </div>
            </div>
            <!-- Page Title End -->
        </div>
    </div>
</section>
<!--== Page Header Area End ==-->

<!--== Team Area Start ==-->
<section id="esteemed-clients-main-area" class="section-padding">
    <div class="container my-2">
        <div class="row mb-3">
            <div class="col-12 text-center top-text">
                <h4 class="text-primary font-weight-bold pb-2">Our client consists of Regulators, Academic Institutions/Bodies and Regulated Entities like Banks and NBFCs.</h4>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-12 text-center">                
                <h5 class="mb-2">An illustrative list of our clients is given below:</h5>                
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-lg-12 text-center">
                <div class="section-title">
                    <h4>Regulators</h4>
                </div>
            </div>
            <div class="offset-sm-2 col-md-4 mb-3">
                <img src="<?php echo $base_url; ?>\upload\esteemed-clients\01.png" alt="" class="img-fluid img-thumbnail h-100 w-100">
            </div>
            <div class="col-md-4 mb-3">
                <img src="<?php echo $base_url; ?>\upload\esteemed-clients\02.png" alt="" class="img-fluid img-thumbnail h-100 w-100">
            </div>    
        </div>

        <div class="row mt-5">
            <div class="col-lg-12 text-center">
                <div class="section-title">
                    <h4>Academic Institutions and Bodies</h4>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <img src="<?php echo $base_url; ?>\upload\esteemed-clients\03.png" alt="" class="img-fluid img-thumbnail h-100 w-100">
            </div>
            <div class="col-md-4 mb-3">
                <img src="<?php echo $base_url; ?>\upload\esteemed-clients\04.png" alt="" class="img-fluid img-thumbnail h-100 w-100">
            </div>
            <div class="col-md-4 mb-3">
                <img src="<?php echo $base_url; ?>\upload\esteemed-clients\05.png" alt="" class="img-fluid img-thumbnail h-100 w-100">
            </div> 
        </div>



        <div class="section mt-5" id="regulated-entities">        
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="section-title">
                        <h4>Regulated Entities</h4>
                    </div>
                </div>
            </div>
            <div class="row">            
                <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                    <figure><img class="img-fluid img-thumbnail" src="<?php echo $base_url; ?>\upload\esteemed-clients\06.png" alt="logo"></figure>    
                </div>

                <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                    <figure><img class="img-fluid img-thumbnail" src="<?php echo $base_url; ?>\upload\esteemed-clients\07.png" alt="logo"></figure>    
                </div>

                <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                    <figure><img class="img-fluid img-thumbnail" src="<?php echo $base_url; ?>\upload\esteemed-clients\08.png" alt="logo"></figure>    
                </div>

                <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                    <figure><img class="img-fluid img-thumbnail" src="<?php echo $base_url; ?>\upload\esteemed-clients\09.png" alt="logo"></figure>    
                </div>

                <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                    <figure><img class="img-fluid img-thumbnail" src="<?php echo $base_url; ?>\upload\esteemed-clients\10.png" alt="logo"></figure>    
                </div>

                <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                    <figure><img class="img-fluid img-thumbnail" src="<?php echo $base_url; ?>\upload\esteemed-clients\11.png" alt="logo"></figure>    
                </div>

                <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                    <figure><img class="img-fluid img-thumbnail" src="<?php echo $base_url; ?>\upload\esteemed-clients\12.png" alt="logo"></figure>    
                </div>

                <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                    <figure><img class="img-fluid img-thumbnail" src="<?php echo $base_url; ?>\upload\esteemed-clients\13.png" alt="logo"></figure>    
                </div>

                <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                    <figure><img class="img-fluid img-thumbnail" src="<?php echo $base_url; ?>\upload\esteemed-clients\14.png" alt="logo"></figure>    
                </div>

                <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                    <figure><img class="img-fluid img-thumbnail" src="<?php echo $base_url; ?>\upload\esteemed-clients\15.png" alt="logo"></figure>    
                </div>

                <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                    <figure><img class="img-fluid img-thumbnail" src="<?php echo $base_url; ?>\upload\esteemed-clients\16.png" alt="logo"></figure>    
                </div>

                <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                    <figure><img class="img-fluid img-thumbnail" src="<?php echo $base_url; ?>\upload\esteemed-clients\17.png" alt="logo"></figure>    
                </div>

                <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                    <figure><img class="img-fluid img-thumbnail" src="<?php echo $base_url; ?>\upload\esteemed-clients\18.png" alt="logo"></figure>    
                </div>

                <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                    <figure><img class="img-fluid img-thumbnail" src="<?php echo $base_url; ?>\upload\esteemed-clients\19.png" alt="logo"></figure>    
                </div>

                <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                    <figure><img class="img-fluid img-thumbnail" src="<?php echo $base_url; ?>\upload\esteemed-clients\20.png" alt="logo"></figure>    
                </div>

                <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                    <figure><img class="img-fluid img-thumbnail" src="<?php echo $base_url; ?>\upload\esteemed-clients\21.png" alt="logo"></figure>    
                </div>

                <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                    <figure><img class="img-fluid img-thumbnail" src="<?php echo $base_url; ?>\upload\esteemed-clients\22.png" alt="logo"></figure>    
                </div>

                <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                    <figure><img class="img-fluid img-thumbnail" src="<?php echo $base_url; ?>\upload\esteemed-clients\23.png" alt="logo"></figure>    
                </div>

                <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                    <figure><img class="img-fluid img-thumbnail" src="<?php echo $base_url; ?>\upload\esteemed-clients\24.png" alt="logo"></figure>    
                </div>

                <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                    <figure><img class="img-fluid img-thumbnail" src="<?php echo $base_url; ?>\upload\esteemed-clients\25.png" alt="logo"></figure>    
                </div>
            </div>
            <!-- <div class="row regulated-entities-logo-gallery">            
                <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                    <a href="<?php echo $base_url; ?>\upload\esteemed-clients\06.png">
                        <figure><img class="img-fluid img-thumbnail" src="<?php echo $base_url; ?>\upload\esteemed-clients\06.png" alt="logo"></figure>
                    </a>
                </div>

                <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                    <a href="<?php echo $base_url; ?>\upload\esteemed-clients\07.png">
                        <figure><img class="img-fluid img-thumbnail" src="<?php echo $base_url; ?>\upload\esteemed-clients\07.png" alt="logo"></figure>
                    </a>
                </div>

                <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                    <a href="<?php echo $base_url; ?>\upload\esteemed-clients\08.png">
                        <figure><img class="img-fluid img-thumbnail" src="<?php echo $base_url; ?>\upload\esteemed-clients\08.png" alt="logo"></figure>
                    </a>
                </div>

                <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                    <a href="<?php echo $base_url; ?>\upload\esteemed-clients\09.png">
                        <figure><img class="img-fluid img-thumbnail" src="<?php echo $base_url; ?>\upload\esteemed-clients\09.png" alt="logo"></figure>
                    </a>
                </div>

                <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                    <a href="<?php echo $base_url; ?>\upload\esteemed-clients\10.png">
                        <figure><img class="img-fluid img-thumbnail" src="<?php echo $base_url; ?>\upload\esteemed-clients\10.png" alt="logo"></figure>
                    </a>
                </div>

                <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                    <a href="<?php echo $base_url; ?>\upload\esteemed-clients\11.png">
                        <figure><img class="img-fluid img-thumbnail" src="<?php echo $base_url; ?>\upload\esteemed-clients\11.png" alt="logo"></figure>
                    </a>
                </div>

                <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                    <a href="<?php echo $base_url; ?>\upload\esteemed-clients\12.png">
                        <figure><img class="img-fluid img-thumbnail" src="<?php echo $base_url; ?>\upload\esteemed-clients\12.png" alt="logo"></figure>
                    </a>
                </div>

                <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                    <a href="<?php echo $base_url; ?>\upload\esteemed-clients\13.png">
                        <figure><img class="img-fluid img-thumbnail" src="<?php echo $base_url; ?>\upload\esteemed-clients\13.png" alt="logo"></figure>
                    </a>
                </div>

                <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                    <a href="<?php echo $base_url; ?>\upload\esteemed-clients\14.png">
                        <figure><img class="img-fluid img-thumbnail" src="<?php echo $base_url; ?>\upload\esteemed-clients\14.png" alt="logo"></figure>
                    </a>
                </div>

                <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                    <a href="<?php echo $base_url; ?>\upload\esteemed-clients\15.png">
                        <figure><img class="img-fluid img-thumbnail" src="<?php echo $base_url; ?>\upload\esteemed-clients\15.png" alt="logo"></figure>
                    </a>
                </div>

                <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                    <a href="<?php echo $base_url; ?>\upload\esteemed-clients\16.png">
                        <figure><img class="img-fluid img-thumbnail" src="<?php echo $base_url; ?>\upload\esteemed-clients\16.png" alt="logo"></figure>
                    </a>
                </div>

                <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                    <a href="<?php echo $base_url; ?>\upload\esteemed-clients\17.png">
                        <figure><img class="img-fluid img-thumbnail" src="<?php echo $base_url; ?>\upload\esteemed-clients\17.png" alt="logo"></figure>
                    </a>
                </div>

                <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                    <a href="<?php echo $base_url; ?>\upload\esteemed-clients\18.png">
                        <figure><img class="img-fluid img-thumbnail" src="<?php echo $base_url; ?>\upload\esteemed-clients\18.png" alt="logo"></figure>
                    </a>
                </div>

                <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                    <a href="<?php echo $base_url; ?>\upload\esteemed-clients\19.png">
                        <figure><img class="img-fluid img-thumbnail" src="<?php echo $base_url; ?>\upload\esteemed-clients\19.png" alt="logo"></figure>
                    </a>
                </div>

                <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                    <a href="<?php echo $base_url; ?>\upload\esteemed-clients\20.png">
                        <figure><img class="img-fluid img-thumbnail" src="<?php echo $base_url; ?>\upload\esteemed-clients\20.png" alt="logo"></figure>
                    </a>
                </div>

                <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                    <a href="<?php echo $base_url; ?>\upload\esteemed-clients\21.png">
                        <figure><img class="img-fluid img-thumbnail" src="<?php echo $base_url; ?>\upload\esteemed-clients\21.png" alt="logo"></figure>
                    </a>
                </div>

                <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                    <a href="<?php echo $base_url; ?>\upload\esteemed-clients\22.png">
                        <figure><img class="img-fluid img-thumbnail" src="<?php echo $base_url; ?>\upload\esteemed-clients\22.png" alt="logo"></figure>
                    </a>
                </div>

                <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                    <a href="<?php echo $base_url; ?>\upload\esteemed-clients\23.png">
                        <figure><img class="img-fluid img-thumbnail" src="<?php echo $base_url; ?>\upload\esteemed-clients\23.png" alt="logo"></figure>
                    </a>
                </div>

                <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                    <a href="<?php echo $base_url; ?>\upload\esteemed-clients\24.png">
                        <figure><img class="img-fluid img-thumbnail" src="<?php echo $base_url; ?>\upload\esteemed-clients\24.png" alt="logo"></figure>
                    </a>
                </div>

                <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                    <a href="<?php echo $base_url; ?>\upload\esteemed-clients\25.png">
                        <figure><img class="img-fluid img-thumbnail" src="<?php echo $base_url; ?>\upload\esteemed-clients\25.png" alt="logo"></figure>
                    </a>
                </div>
            </div> -->
        </div>

    </div>


</section>
<!--== Team Area End ==-->

<?php include_once 'common/footer.php'; ?> 