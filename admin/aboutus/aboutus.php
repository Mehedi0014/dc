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
        <li class="active">About us</li>
        </ul>
        <div class="row">

            <div class="col-md-12">
                <!--Page addition start here-->

                <div id="Add_collegeInfo_form" class="row" style="display: none;">
                    <div class="col-md-12">
                        <form class="form-horizontal" name="add_collegeCMS" id="add_collegeCMS" method="post" action="db_add_media.php" enctype="multipart/form-data">
                            <div class="panel panel-primary">
                                <div class="panel-heading ui-draggable-handle">
                                    <h3 class="panel-title"><?php echo $newname; ?></h3>
                                </div>
                                <div class="panel-body"> 
                                    
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Upload Video File</label>
                                        <div class="col-md-6 col-xs-12">
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <input type="file" name="files" id="college_logo" class="form-control" required/>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label" style="padding-top:0px;">Status</label>
                                        <div class="col-md-6 col-xs-12">
                                            <div class="input-group">                                                
                                                <input type="checkbox" name="status" value="1" id="college_logo"/>
                                            </div>
                                        </div>
                                    </div>                                

                                    <input type="hidden" name="cur_date" value="<?php echo date('Y-m-d H:i:s'); ?>" />
                                    <input type="hidden" name="college_id" value="<?php echo $id; ?>">
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

            <!--Page addition end here-->

            <div class="panel panel-default">
                <div class="panel-heading">                                
                    <h3 class="panel-title">List About Us</h3>
                    <?php
                    if (isset($_GET['insertmsg'])) {
                        $msg = $_GET['insertmsg'];
                        if ($msg) {
                            ?>
                            <h6 style="color:#C00;">
                                <?php
                                echo 'Update successfull';
                            } else {
                                echo 'Update not possible';
                            }
                        }
                        ?>
                    </h6>
                    <?php
                    if (isset($_GET['editmsg'])) {
                        $msg = $_GET['editmsg'];
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
                                
                                <th>File</th>
                                <th>Puslish</th>
                                <th>Date</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody style="font-size: 11px">
                            <?php
//                                include("includes/conn.php");
                            $qry_artc = "SELECT * FROM `about_us_video`";
                            $res_artc = mysqli_query($con, $qry_artc);
                            $i = 1;
                            if(!empty($res_artc))
                            {
                            while ($row_artc = mysqli_fetch_assoc($res_artc)) {
                                ?>                                          
                                <tr>
                                    <td class="text-left"><?php echo $i ?></td>                                   
                                    <td class="text-left"><?php echo $row_artc['file']; ?></td>
                                    <?php 
                                    if($row_artc['status'] == '1')
                                    {
                                    ?>
                                    <td class="text-left">
                                        <h4><span class="label label-success">Active</span></h4>
                                    </td>
                                    <?php
                                    }else{
                                    ?>
                                    <td class="text-left">
                                    <h4><span class="label label-danger">Inactive</span></h4>
                                    </td>
                                    <?php
                                    }
                                    ?>
                                    <td class="text-left"><?php echo $row_artc['added_on']; ?></td>
                                    <td>
                                        <a href="edit_media.php?id=<?php echo $row_artc['id']; ?>&action=Edit" ><span class="fa fa-pencil text-primary">Edit</span></a>
                                    </td>  
                                    <td>
                                        <a href="delete_media.php?id=<?php echo $row_artc['id']; ?>&action=Delete" ><span class="fa fa-trash-o text-primary"></span></a>
                                    </td>
                                </tr>
                                <?php
                                $i++;
                            }
                        }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>    
            <div class="btn btn-primary" onclick="ShowContainer('Add_collegeInfo_form')"><span class="fa fa-plus"></span>Add Aboutus here</div>
            <div>&nbsp;</div>
        </div>
        </div>

        <?php include('../includes/footer.php'); ?>

        <?php include '../includes/scripts.php'; ?>

        <script type="text/javascript" src="<?php echo $admin_base_url . $js_path; ?>plugins/datatables/jquery.dataTables.min.js"></script>

        <script type="text/javascript" src="<?php echo $admin_base_url . $js_path; ?>plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js"></script> 

        <script type="text/javascript" src="<?php echo $admin_base_url . $js_path; ?>plugins/ckeditor/ckeditor.js"></script>

        <script type="text/javascript" src="<?php echo $admin_base_url . $js_path; ?>plugins/bootstrap/bootstrap-select.js"></script>



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