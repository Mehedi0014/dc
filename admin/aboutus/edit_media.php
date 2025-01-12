<?php
session_start();
include_once ('../includes/conn.php');
if (isset($_SESSION['user_role']) || $_SESSION['user_role'] != '') {

    $user = $_SESSION['user_role'];
    // $cat_id = $_GET['id'];
    if ($user == '0') {

        include_once('../includes/header.php');
        include_once('../includes/menu.php');
        $id = $_GET['id'];


        $qry_artc = "SELECT * FROM `about_us_video` WHERE `id`= '$id'";
        $res_artc = mysqli_query($con, $qry_artc) or trigger_error("Query Failed! SQL: $qry_artc - Error: " . mysqli_error(), E_USER_ERROR);
        $row_artc = mysqli_fetch_assoc($res_artc);
        //var_dump($row_artc);exit;
        ?>
        <li class="active">Aboutus</li>
        </ul>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">                                
                        <h3 class="panel-title">Edit Aboutus</h3>
                        <ul class="panel-controls">
                            <li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>                   
                        </ul>                                
                    </div>
                    <div class="panel-body">
                        <div id="edit_cms_form" class="row" >
                            <div class="col-md-12">
                                <form class="form-horizontal" name="editCMS" id="editCMS" method="post" action="db_edit_media.php" enctype="multipart/form-data">
                                    <div class="panel panel-primary">
                                        <div class="panel-heading ui-draggable-handle">
                                            <h3 class="panel-title"><?php echo $row_artc['title']; ?></h3>
                                        </div>
                                        <div class="panel-body"> 
                                            

                                            <div class="form-group">
                                                <label class="col-md-3 col-xs-12 control-label">File</label>
                                                <div class="col-md-6 col-xs-12">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                        <input type="file" name="file" id="college_logo" class="form-control"/>
        <!--                                                        <img src="<?php //echo $base_url . $document_path_upload_media . $row_artc['file'];  ?>" width="175" height="200" />-->
                                                        <span><?php echo $row_artc['file']; ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 col-xs-12 control-label" style="padding-top:0px;">Status</label>
                                                <div class="col-md-6 col-xs-12">
                                                    <div class="input-group">                                                
                                                        <input type="checkbox" name="status" value="1" <?php echo $row_artc['status'] ? "Checked" : ""?> id="college_logo"/>
                                                       
                                                    </div>
                                                </div>
                                            </div>                                

                                            <input type="hidden" name="cur_date" value="<?php echo date('Y-m-d H:i:s'); ?>" />
                                            <input type="hidden" name="id" value="<?php echo $id; ?>"
                                        </div>
                                        <div class="panel-footer">
                                            <input name="submit" type="submit" class="btn btn-primary col-md-offset-5" value="Submit"/>                          
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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



            window.onload = function () {
                CKEDITOR.replace('editor1');


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
