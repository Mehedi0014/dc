

<?php
$username = $_SESSION['username'];
$cid = $_SESSION['id'];
$newname = '';
?>
<body>
    <!-- START PAGE CONTAINER -->
    <div class="page-container">
        <!-- START PAGE SIDEBAR -->
        <div class="page-sidebar">
            <!-- START X-NAVIGATION -->

            <ul class="x-navigation">
                <li class="xn-logo">
                    <a href="<?php echo $admin_base_url; ?>dashboard.php"><?php echo $application_name ?></a>
                    <a href="javascript:void();" class="x-navigation-control"></a>
                </li>
                <!--<li class="xn-title">Navigation</li>-->
                <li>
                    <a href="<?php echo $admin_base_url; ?>dashboard.php"><span class="fa fa-desktop"></span> <span class="xn-text">Dashboard</span></a>                        
                </li>
                <li class="xn-openable" >
                    <a href=""><span class="fa fa-pencil-square-o"></span> <span class="xn-text">Setting</span></a>
                    <ul>                           
                        <ul>
                            <li><a href="<?php echo $admin_base_url; ?>setting/info_setting.php"><span class="glyphicon glyphicon-user"></span>Edit Setting</a></li>
                        </ul> 

                    </ul>
                </li>
                <li class="xn-openable" >
                    <a href=""><span class="fa fa-pencil-square-o"></span> <span class="xn-text">Content Management</span></a>
                    <ul>                       
                        <ul>
                            <li><a href="<?php echo $admin_base_url; ?>cms/list_cms.php"><span class="glyphicon glyphicon-user"></span>Main Site Content</a></li>
                        </ul>

                    </ul>
                </li> 
                   <li class="xn-openable" >
                    <a href=""><span class="fa fa-pencil-square-o"></span> <span class="xn-text">Career Application</span></a>
                    <ul>                       
                        <ul>
                            <li><a href="<?php echo $admin_base_url; ?>career/job_list.php"><span class="glyphicon glyphicon-user"></span>List of Jobs</a></li>
                            <li><a href="<?php echo $admin_base_url; ?>career/application_list.php"><span class="glyphicon glyphicon-user"></span>List of Applications</a></li>
                        </ul>

                    </ul>
                </li>
                <li class="xn-openable" >
                    <a href=""><span class="fa fa-pencil-square-o"></span> <span class="xn-text">Slider</span></a>
                    <ul>                       
                        <ul>
                            <li><a href="<?php echo $admin_base_url; ?>slider/slider.php"><span class="glyphicon glyphicon-user"></span>List of Sliders</a></li>
                        </ul>

                    </ul>
                </li> 
                <li class="xn-openable" >
                    <a href=""><span class="fa fa-pencil-square-o"></span> <span class="xn-text">Management team</span></a>
                    <ul>                       
                        <ul>
                            <li><a href="<?php echo $admin_base_url; ?>management/list_management.php"><span class="glyphicon glyphicon-user"></span>List of Management</a></li>
                        </ul>

                    </ul>
                </li> 
                <li class="xn-openable" >
                    <a href=""><span class="fa fa-pencil-square-o"></span> <span class="xn-text">Users</span></a>
                    <ul>                       
                        <ul>

                            <li><a href="<?php echo $admin_base_url; ?>users/list_user.php"><span class="glyphicon glyphicon-user"></span>User List</a></li>
                            <li><a href="<?php echo $admin_base_url; ?>users/succ_payment.php"><span class="glyphicon glyphicon-user"></span>Successful Payment List</a></li>
                            <li><a href="<?php echo $admin_base_url; ?>users/all_payment.php"><span class="glyphicon glyphicon-user"></span>All Payment List</a></li>
                        </ul>

                    </ul>
                </li>
                <li class="xn-openable" >
                    <a href=""><span class="fa fa-pencil-square-o"></span> <span class="xn-text">Video Folder</span></a>
                    <ul>                       
                        <ul>
                            <li><a href="<?php echo $admin_base_url; ?>folder/info_folder.php"><span class="glyphicon glyphicon-user"></span>Video Folder List</a></li>
                        </ul>
                    </ul>
                </li> 
                <li class="xn-openable" >
                    <a href=""><span class="fa fa-pencil-square-o"></span> <span class="xn-text">Course</span></a>
                    <ul>                       
                        <ul>

                            <li><a href="<?php echo $admin_base_url; ?>course/info_course.php"><span class="glyphicon glyphicon-user"></span>Course List</a></li>
                        </ul>

                    </ul>
                </li> 
                <li class="xn-openable" >
                    <a href=""><span class="fa fa-pencil-square-o"></span> <span class="xn-text">Service</span></a>
                    <ul>                       
                        <ul>

                            <li><a href="<?php echo $admin_base_url; ?>service/info_service.php"><span class="glyphicon glyphicon-user"></span>Service List</a></li>
                        </ul>

                    </ul>
                </li> 
                <li class="xn-openable" >
                    <a href=""><span class="fa fa-pencil-square-o"></span> <span class="xn-text">Location</span></a>
                    <ul>                       
                        <ul>
                            <li><a href="<?php echo $admin_base_url; ?>locator/list_locator.php"><span class="glyphicon glyphicon-user"></span>List of Locations</a></li>
                        </ul>

                    </ul>
                </li> 
                <li class="xn-openable" >
                    <a href=""><span class="fa fa-pencil-square-o"></span> <span class="xn-text">Gallery</span></a>
                    <ul>                       
                        <ul>
                            <li><a href="<?php echo $admin_base_url; ?>Gallery/info_gallery.php"><span class="glyphicon glyphicon-user"></span>Image Gallery Categories List</a></li>
                        </ul>

                    </ul>
                </li> 
                <li class="xn-openable" >
                    <a href=""><span class="fa fa-pencil-square-o"></span> <span class="xn-text">Training</span></a>
                    <ul>                       
                        <ul>
                            <li><a href="<?php echo $admin_base_url; ?>training/info_training.php"><span class="glyphicon glyphicon-user"></span>List of Trainings</a></li>
                        </ul>

                    </ul>
                </li> 
                <li class="xn-openable" >
                    <a href=""><span class="fa fa-pencil-square-o"></span> <span class="xn-text">Announcement</span></a>
                    <ul>                       
                        <ul>
                            <li><a href="<?php echo $admin_base_url; ?>announcement/list_announcement.php"><span class="glyphicon glyphicon-user"></span>List of Announcements</a></li>
                        </ul>

                    </ul>
                </li> 

                <li class="xn-openable" >
                    <a href=""><span class="fa fa-pencil-square-o"></span> <span class="xn-text">Clients</span></a>
                    <ul>                       
                        <ul>
                            <li><a href="<?php echo $admin_base_url; ?>client/list_client.php"><span class="glyphicon glyphicon-user"></span>List of Clients</a></li>
                        </ul>

                    </ul>
                </li> 

                <li class="xn-openable" >
                    <a href=""><span class="fa fa-pencil-square-o"></span> <span class="xn-text">Blog</span></a>
                    <ul>                       
                        <ul>
                            <li><a href="<?php echo $admin_base_url; ?>blog/list_blog.php"><span class="glyphicon glyphicon-user"></span>List of Posts</a></li>
                        </ul>

                    </ul>
                </li> 


                <li class="xn-openable" >
                    <a href=""><span class="fa fa-pencil-square-o"></span> <span class="xn-text">Reviews</span></a>
                    <ul>                       
                        <ul>
                            <li><a href="<?php echo $admin_base_url; ?>testimonial/list-testimonial.php"><span class="glyphicon glyphicon-user"></span>List of Reviews</a></li>
                        </ul>

                    </ul>
                </li> 

                <li class="xn-openable" >
                    <a href=""><span class="fa fa-pencil-square-o"></span> <span class="xn-text">Media</span></a>
                    <ul>                        
                        <ul>
                            <li><a href="<?php echo $admin_base_url; ?>media/media.php"><span class="glyphicon glyphicon-user"></span>Upload Media</a></li>
                        </ul>

                    </ul>
                </li>
                
                <li class="xn-openable" >
                    <a href=""><span class="fa fa-pencil-square-o"></span> <span class="xn-text">Abount us video</span></a>
                    <ul>                        
                        <ul>
                            <li><a href="<?php echo $admin_base_url; ?>aboutus/aboutus.php"><span class="glyphicon glyphicon-user"></span>Upload video</a></li>
                        </ul>

                    </ul>
                </li>
                
                <li class="xn-openable" >
                    <a href=""><span class="fa fa-pencil-square-o"></span> <span class="xn-text">Visitors Analytics</span></a>
                    <ul>                        
                        <ul>
                            <li><a href="<?php echo $admin_base_url; ?>visitor_ip/info_ip.php"><span class="glyphicon glyphicon-user"></span>List of Visitors</a></li>
                        </ul>

                    </ul>
                </li>
            </ul>
            <?php
            //    }
            ?>
            <!-- END X-NAVIGATION -->
        </div>
        <!-- END PAGE SIDEBAR -->
        <!-- PAGE CONTENT -->
        <div class="page-content">
            <!-- START X-NAVIGATION VERTICAL -->
            <ul class="x-navigation x-navigation-horizontal x-navigation-panel">
                <!-- TOGGLE NAVIGATION -->
                <li class="xn-icon-button">
                    <a href="javascript:void();" class="x-navigation-minimize"><span class="fa fa-dedent"></span></a>
                </li>
                <!-- END TOGGLE NAVIGATION -->

                <!-- SIGN OUT -->
                <li class="xn-icon-button pull-right">
                        <!--<a href="logout.php"><span class="fa fa-sign-out"></span><input name="logout" type="button" value="Logout"></a>-->
                    <!--<a href="logout.php" class="mb-control" data-box="#mb-signout"><span class="fa fa-sign-out"></span></a>-->
                    <a href="javascript:void();" class="mb-control" data-box="#mb-signout"><span class="fa fa-sign-out"></span></a>
                    <!--<a href="logout.php"><span class="fa fa-sign-out"></span></a>-->                      
                </li> 
            </ul>
            <!-- END X-NAVIGATION VERTICAL -->                     
            <!-- START BREADCRUMB -->
            <ul class="breadcrumb">                   
                <li><a href="<?php echo $admin_base_url; ?>dashboard.php">Dashboard</a></li>