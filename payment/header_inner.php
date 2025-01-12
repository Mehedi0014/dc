<!DOCTYPE html>
<?php
session_start();
?>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>All Karnataka Scholarship Entrance Examination</title>

        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!--  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>  -->
        <?php include('../common/conn.php'); ?>
        <?php $host = "http://".$_SERVER['HTTP_HOST']."/"; ?>
        <link href="<?php echo $host.$css_path; ?>bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo $host.$css_path; ?>bootstrap-theme.css" rel="stylesheet">
        <link href="<?php echo $host.$css_path; ?>custom.css" rel="stylesheet">
        <link href="<?php echo $host.$css_path; ?>font-awesome.css" rel="stylesheet">
        <link href="<?php echo $host.$css_path; ?>font-awesome.min.css" rel="stylesheet">
        <link href="<?php echo $host.$css_path; ?>datepicker.css" rel="stylesheet">
<!--        <link href="<?php echo $host.$css_path; ?>regn_steps_style.css" rel="stylesheet">-->
        <link href="<?php echo $host.$css_path; ?>style.css" rel="stylesheet">
        <link href="<?php echo $host.$css_path; ?>form-elements.css" rel="stylesheet">
        <link href="<?php echo $host.$js_path; ?>lightbox2-master/css/lightbox.min.css" rel="stylesheet">
        
        <!--for registration steps forms styling-->
        <!--<link href="<?php echo $host.$css_path; ?>regn_steps.css" rel="stylesheet">-->

        <!--Google font--> 
        <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,700|Roboto:400,700,300' rel='stylesheet' type='text/css'>

        <!--Slick slider-->
        <link rel="stylesheet" type="text/css" href="<?php echo $host.$jquery_plugin; ?>slick/slick.css">
        <link rel="stylesheet" type="text/css" href="<?php echo $host.$jquery_plugin; ?>slick/slick-theme.css">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->


        <!--Full slider-->
        <link rel="shortcut icon" href="<?php echo $image_path; ?>favicon.ico"> 
        <link rel="stylesheet" type="text/css" href="<?php echo $host.$jquery_plugin; ?>FullscreenSlitSlider/css/demo.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo $host.$jquery_plugin; ?>FullscreenSlitSlider/css/style.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo $host.$jquery_plugin; ?>FullscreenSlitSlider/css/custom.css" />
        <script type="text/javascript" src="<?php echo $host.$jquery_plugin; ?>FullscreenSlitSlider/js/modernizr.custom.79639.js"></script>
        <noscript>
        <link rel="stylesheet" type="text/css" href="<?php echo $host.$jquery_plugin; ?>FullscreenSlitSlider/css/styleNoJS.css" />
        </noscript>




    </head>
    <body>



        <!--Content-->
        <div class="container header-top-inner">
            <div class="gray-background">
                <div class="col-md-8">
                    <img class="img-responsive" src="<?php echo $host.$image_path; ?>logo.svg" style="width: 85px; float: left; padding: 10px 10px 0px 0px">
                    <div class="site-title">All Karnataka Scholarship Entrance Examination</div>
                    <div class="site-sub-title">Dr APJ Abdul Kalam Educational Trust</div>
                </div>
                <div class="col-md-4">
                    <input class="top-search"type="text" placeholder="Search Registration Number"><span class="btn btn-info">GO</span>

                </div>
                <div class="clearfix"></div>
            </div>
            <nav class="navbar navbar-default">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">

                        <li class=""><a href="http://aksee.org/index.php">Home <span class="sr-only">(current)</span></a></li>
                        <!--<li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Scholarship <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="http://aksee.org/page.php?pid=1" >Scholarship</a></li>
                                <li><a href="http://aksee.org/page.php?pid=14">Scholarship Procedure</a></li>
                                <li><a href="http://aksee.org/page.php?pid=15">Layout of College Scholarship</a></li>
                            </ul>
                        </li>-->
                        <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">List of Institute<span class="caret"></span></a>
                        <ul class="dropdown-menu">
<!--                                <li><a href="http://aksee.org/college-list.php" >List of all Institutes</a></li>-->
                                <li><a href="http://aksee.org/engineering-college-list.php" >Engineer College</a></li>
                                <li><a href="http://aksee.org/medical-college-list.php">Medical College</a></li>
                            </ul>
                                                
                        </li>
                        <li><a href="http://aksee.org/page.php?pid=2">Important Dates</a></li>
                        <li class="dropdown">
                            <a href="#">Syllabus<span class="caret"></span></a>
                            <ul class="dropdown-menu" class="dropdown-toggle" data-toggle="dropdown">
                                <li><a href="http://aksee.org/document/Engineering.pdf" target="_blank">Engineering</a></li>
                                <li><a href="http://aksee.org/document/Medical.pdf" target="_blank">Medical</a></li>

                            </ul>
                        </li>
                        <li><a href="http://aksee.org/page.php?pid=4">Faq</a></li>
                        <li><a href="http://aksee.org/page.php?pid=5">Members</a></li>
<!--                        <li><a href="http://aksee.org/page.php?pid=6">Contact us</a></li>
                        <li><a href="http://aksee.org/registration.php">Registration</a></li>-->
                        
                        
                        
                        <li>
                            <?php
                            if (!isset($_SESSION['student_user']) && $_SESSION['std_id'] == '') {
                                ?>
                                <a href="http://aksee.org/registration.php">Register</a>
                                <?php
                            } else {
                                                           
                            ?>
                             <a href="http://aksee.org/student-dashboard.php">Dashboard</a>   
                                
                            <?php
                            }
                                                           
                            ?>    
                                
                        </li>
                         <li>
                             <?php
                             if (isset($_SESSION['student_user']) && $_SESSION['std_id'] != '') {
                             ?>
                             <a href="http://aksee.org/logout.php">Logout</a>
                             <?php
                             }
                             else{
                             ?>
                             <a href="http://aksee.org/student-login.php">Login</a>
                             <?php
                             }
                             ?>
                         </li>
                        
                        


                    </ul>

                </div><!-- /.navbar-collapse -->
            </nav>
        </div> <!-- /.navbar-collapse -->
                <img class="img-responsive" src="<?php echo $host.$image_path?>inner_banner_8.png">
                <br>