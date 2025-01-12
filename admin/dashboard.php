<?php
include_once 'includes/conn.php';
session_start();
if (isset($_SESSION['user_role']) || $_SESSION['user_role'] != '') {

    $user = $_SESSION['user_role'];

    if ($user == '0') {

        $username = $_SESSION['username'];
        $cid = $_SESSION['id'];
        $newname = '';
        include_once('includes/header.php');
        include_once('includes/menu.php');
        ?>
        </ul>
        <!-- END BREADCRUMB -->

        <!-- PAGE CONTENT WRAPPER -->
        <div class="row">

            <div class="row-fluid">
                <!--UNIQUE VISITOR-->
                <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                    <div class="widget <?php echo ($total_non_scheduled > 0) ? "widget-warning" : "widget-default"; ?> widget-item-icon" data-toggle="tooltip" data-placement="bottom" data-original-title="Click For Details" onclick="location.href = 'visitor_ip/info_ip.php';">
                        <div class="widget-item-left">
                            <span class="fa fa-user"></span>
                        </div>
                        <div class="widget-data">
                            <div class="widget-int num-count"></div>
                            <div class="widget-title">Unique Visitor</div>                        
                            <div class="widget-subtitle"></div>
                            <?php
                            $qry_cntip = "select count(a.all_ip) count_ip from ( select count(ip) all_ip from ip_track group by ip ) a";
                            $res_cntip = mysqli_query($con, $qry_cntip) or trigger_error("Query Failed! SQL: $qry_cntip - Error: " . mysqli_error(), E_USER_ERROR);
                            $row_clntip = mysqli_fetch_row($res_cntip);
                            ?>
                            <div class="widget-subtitle"><h1><?php echo $row_clntip[0]; ?></h1></div>                        
                        </div>
                    </div>
                </div> 
                <!--Total Page View-->
                <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                    <div class="widget widget-default widget-item-icon" data-toggle="tooltip" data-placement="bottom" data-original-title="Click For Details"  onclick="location.href = 'visitor_ip/info_ip.php';">
                        <div class="widget-item-left">
                            <span class="fa fa-user"></span>
                        </div>
                        <div class="widget-data">
                            <div class="widget-int num-count"></div>
                            <div class="widget-title">Total Page View</div>
                            <div class="widget-subtitle"></div>                       
                            <?php
                            $qry_ip = "select count(ip) all_ip from ip_track";
                            $res_ip = mysqli_query($con, $qry_ip) or trigger_error("Query Failed! SQL: $qry_ip - Error: " . mysqli_error(), E_USER_ERROR);
                            $row_ip = mysqli_fetch_row($res_ip);
                            ?>
                            <div class="widget-subtitle"><h1><?php echo $row_ip[0]; ?></h1></div>                        
                        </div>
                    </div>
                </div>
                <!--Applications-->
                <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                    <div class="widget <?php echo ($tot_unresolved > 0) ? "widget-warning" : "widget-success"; ?> widget-item-icon" data-toggle="tooltip" data-placement="bottom" data-original-title="Click For Details"  onclick="location.href = 'service/info_service.php';">  
                        <div class="widget-item-left">
                            <div class="danger"><span class="fa fa-bell-o"></span></div>
                        </div>
                        <div class="widget-data">
                            <div class="widget-int num-count"></div>
                            <div class="widget-title">Courses</div>
                            <div class="widget-subtitle">Total</div>
                            <?php
                            $qry_course = "select count(*) from course where status = '0'";
                            $res_course = mysqli_query($con, $qry_course) or trigger_error("Query Failed! SQL: $qry_course - Error: " . mysqli_error(), E_USER_ERROR);

                            $row_course = mysqli_fetch_row($res_course);
                            ?>
                            <div class="widget-subtitle"><h1><?php echo $row_course[0]; ?></h1></div>
                        </div>
                    </div>
                </div>
                <!--Jobs-->
                <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                    <div class="widget <?php echo ($tot_report_pending > 0) ? "widget-warning" : "widget-success"; ?> widget-item-icon" data-toggle="tooltip" data-placement="bottom" data-original-title="Click For Details" onclick="location.href = 'training/info_training.php';">  
                        <div class="widget-item-left">
                            <div class="danger"><span class="fa fa-tasks"></span></div>
                        </div>
                        <div class="widget-data">
                            <div class="widget-int num-count"></div>
                            <div class="widget-title">Training</div>
                            <div class="widget-subtitle">Total</div>                        
                            <?php
                            $qry_training = "select count(*) from training where status = '0'";
                            $res_training = mysqli_query($con, $qry_training) or trigger_error("Query Failed! SQL: $qry_training - Error: " . mysqli_error(), E_USER_ERROR);

                            $row_training = mysqli_fetch_row($res_training);
                            ?>
                            <div class="widget-subtitle"><h1><?php echo $row_training[0]; ?></h1></div>                                              
                        </div>
                    </div>
                </div>
                <!--Country wise visit count-->
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">                                
                            <h3 class="panel-title">Country wise visit count</h3>

                            <ul class="panel-controls">
                                <li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>                   
                            </ul>                                
                        </div>
                        <div class="panel-body">
                            <table class="table dataTable table-bordered table-hover table-responsive">
                                <thead>
                                    <tr>
                                        <th width="75" class="text-left">#</th>
                                        <th>Country</th>
                                        <th>Count</th>
                                    </tr>
                                </thead>
                                <tbody style="font-size: 11px">
                                    <?php
                                    $qry_artc = "select country,count(ip) all_ip from ip_track group by country order by count(ip) desc limit 10";
                                    $res_artc = mysqli_query($con, $qry_artc);
                                    $i = 1;
                                    while ($row_artc = mysqli_fetch_assoc($res_artc)) {
                                        ?>                                          
                                        <tr>
                                            <td class="text-left"><?php echo $i ?></td>
                                            <td class="text-left"><?php echo $row_artc['country']; ?></td>
                                            <td class="text-left"><?php echo $row_artc['all_ip']; ?></td>
                                        </tr>
                                        <?php
                                        $i++;
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!--City wise visit count-->
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">                                
                            <h3 class="panel-title">City wise visit count</h3>

                            <ul class="panel-controls">
                                <li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>                   
                            </ul>                                
                        </div>
                        <div class="panel-body">
                            <table class="table dataTable table-bordered table-hover table-responsive">
                                <thead>
                                    <tr>
                                        <th width="75" class="text-left">#</th>
                                        <th>City</th>
                                        <th>Count</th>
                                    </tr>
                                </thead>
                                <tbody style="font-size: 11px">
                                    <?php
                                    $qry_artc2 = "select city,count(ip) all_ip from ip_track group by city order by count(ip) desc limit 10";
                                    $res_artc2 = mysqli_query($con, $qry_artc2);
                                    $i = 1;
                                    while ($row_artc2 = mysqli_fetch_assoc($res_artc2)) {
                                        ?>                                          
                                        <tr>
                                            <td class="text-left"><?php echo $i ?></td>
                                            <td class="text-left"><?php echo $row_artc2['city']; ?></td>
                                            <td class="text-left"><?php echo $row_artc2['all_ip']; ?></td>
                                        </tr>
                                        <?php
                                        $i++;
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>


        </div>

        <!--Footer-->
        <?php include 'includes/scripts.php'; ?>

        <script type="text/javascript" src="<?php echo $js_path; ?>plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js"></script>
        <script type="text/javascript" src="<?php echo $js_path; ?>plugins/morris/raphael-min.js"></script>
        <script type="text/javascript" src="<?php echo $js_path; ?>plugins/morris/morris.min.js"></script>
        <script type="text/javascript" src="<?php echo $js_path; ?>demo_charts_morris.js"></script>



        <?php
        include "includes/footer.php";
        ?>

        <script type="text/javascript" src="<?php echo $js_path; ?>plugins/datatables/jquery.dataTables.min.js"></script>

        <script type="text/javascript" src="<?php echo $js_path; ?>plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js"></script> 

        <script type="text/javascript" src="<?php echo $js_path; ?>plugins/ckeditor/ckeditor.js"></script>

        <script type="text/javascript" src="<?php echo $js_path; ?>plugins/bootstrap/bootstrap-select.js"></script>
        <?php
    }
    ?>      
    <?php
} else {
    header("Location: " . $admin_base_url . "index.php");
}
?>