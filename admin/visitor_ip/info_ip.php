<?php
session_start();
include_once ('../includes/conn.php');
if (isset($_SESSION['user_role']) || $_SESSION['user_role'] != '') {

    $user = $_SESSION['user_role'];
    // $cat_id = $_GET['id'];
    if ($user == '0') {

        include_once('../includes/header.php');
        include_once('../includes/menu.php');
        ?>
        <li class="active">List of IP</li>
        </ul>
        <div class="row">

            <div class="col-md-12">
                <!--List deletion start here-->

                <div id="Add_collegeInfo_form" class="row" style="display: none;">
                    <div class="col-md-12">
                        <form class="form-horizontal" name="add_collegeCMS" id="add_collegeCMS" method="post" action="delete_ip_list.php" enctype="multipart/form-data">
                            <div class="panel panel-primary">
                                <div class="panel-heading ui-draggable-handle">
                                    <h3 class="panel-title"><?php echo $newname; ?></h3>
                                </div>
                                <div class="panel-body"> 
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">From Date</label>
                                        <div class="col-md-6 col-xs-12">
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <span class="fa fa-calendar"></span>
                                                </span>
                                                <input type="text" name="from_dt" class="form-control datepicker" id="page_title" required/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">To Date</label>
                                        <div class="col-md-6 col-xs-12">
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <span class="fa fa-calendar"></span>
                                                </span>
                                                <input type="text" name="to_dt" class="form-control datepicker" id="page_title" required/>
                                            </div>
                                        </div>
                                    </div>                                   
                                </div>
                                <div class="panel-footer">
                                    <input name="submit" type="submit" class="btn btn-primary col-md-offset-5 validate" value="Submit"/>                          
                                    <input name="reset" type="reset" value="Cancel" class="btn btn-default" onclick="HideContainer('Add_collegeInfo_form')" />
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!--List deletion end here-->

            <div class="panel panel-default">
                <div class="panel-heading">                                
                    <h3 class="panel-title">List of IP</h3>
                    <?php
                    if (isset($_GET['insertmsg'])) {
                        $msg = $_GET['insertmsg'];
                        ?>
                        <h6 style="color:#C00;">
                            <?php
                            echo $msg;
                        }
                        ?>
                    </h6>
                    <ul class="panel-controls">
                        <li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>                   
                    </ul>                                
                </div>
                <div class="panel-body">
                    <table class="table dataTable table-bordered table-hover table-responsive">
                        <thead>
                            <tr>
                                <th width="75" class="text-left">#</th>
                                <th>IP</th>
                                <th>Visited Link</th>
                                <th>Country</th>
                                <th>City</th>
                                <th>Date of Visit</th>

                            </tr>
                        </thead>
                        <tbody style="font-size: 11px">
                            <?php
//                                include("includes/conn.php");
                            $qry_artc = "SELECT * FROM `ip_track` order by id desc";
                            $res_artc = mysqli_query($con, $qry_artc);
                            $i = 1;
                            while ($row_artc = mysqli_fetch_assoc($res_artc)) {
                                ?>                                          
                                <tr>
                                    <td class="text-left"><?php echo $i ?></td>
                                    <td class="text-left"><?php echo $row_artc['ip'] ?></td>
                                    <td class="text-left"><?php echo $row_artc['link'] ?></td>
                                    <td class="text-left"><?php echo $row_artc['country'] ?></td>
                                    <td class="text-left"><?php echo $row_artc['city'] ?></td>
                                    <td class="text-left"><?php echo $row_artc['date_visited'] ?></td>

                                </tr>
                                <?php
                                $i++;
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>  
            <div class="btn btn-primary" onclick="ShowContainer('Add_collegeInfo_form')"><span class="fa fa-plus"></span>Delete list here</div>
            <div>&nbsp;</div>
        </div>
        </div>

        <script language="JavaScript" type="text/javascript">

            $(document).ready(function ()
            {
                //alert('Hello');
                $("#site").change(function () {

                    if ($(this).val() == "gallery") {
                        $("#other2").show();

                    } else {
                        $("#other2").hide();

                    }
                });
            });


        </script>
        <?php include('../includes/footer.php'); ?>

        <?php include '../includes/scripts.php'; ?>

        <script type="text/javascript" src="<?php echo $admin_base_url . $js_path; ?>plugins/datatables/jquery.dataTables.min.js"></script>

        <script type="text/javascript" src="<?php echo $admin_base_url . $js_path; ?>plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js"></script> 

        <script type="text/javascript" src="<?php echo $admin_base_url . $js_path; ?>plugins/ckeditor/ckeditor.js"></script>

        <script type="text/javascript" src="<?php echo $admin_base_url . $js_path; ?>plugins/bootstrap/bootstrap-select.js"></script>
        <script type="text/javascript" src="<?php echo $admin_base_url . $js_path; ?>plugins/bootstrap/bootstrap-datepicker.js"></script>   



        <script language="javascript" type="text/javascript">
            function ShowContainer(container_name) {
                document.getElementById(container_name).style.display = 'block';
            }
            function HideContainer(container_name) {
                document.getElementById(container_name).style.display = 'none';
            }
            window.onload = function () {
                CKEDITOR.replace('editor1');
                CKEDITOR.replace('editor2');
                CKEDITOR.replace('editor3');
                CKEDITOR.replace('editor4');
            };
        </script>

        <?php
    }
    ?>      
    <?php
} else {
    header("Location: " . $admin_base_url . "index.php");
}
?>