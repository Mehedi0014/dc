<?php
session_start();
include_once ('../includes/conn.php');
if (isset($_SESSION['user_role']) || $_SESSION['user_role'] != '') {

    $user = $_SESSION['user_role'];
    // $cat_id = $_GET['id'];
    if ($user == '0') {

        include_once('../includes/header.php');
        include_once('../includes/menu.php');
        $artc_id = $_GET['id'];


        $qry_artc = "SELECT * FROM `management` WHERE `id`= '$artc_id'";
        $res_artc = mysqli_query($con, $qry_artc) or trigger_error("Query Failed! SQL: $qry_artc - Error: " . mysqli_error(), E_USER_ERROR);
        $row_artc = mysqli_fetch_assoc($res_artc);
        ?>
        <li class="active">Management Team</li>
        </ul>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">                                
                        <h3 class="panel-title">Edit Management</h3>
                        <ul class="panel-controls">
                            <li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>                   
                        </ul>                                
                    </div>
                    <div class="panel-body">
                        <div id="edit_cms_form" class="row" >
                            <div class="col-md-12">
                                <form class="form-horizontal" name="editCMS" id="editCMS" method="post" action="db_edit_management.php" enctype="multipart/form-data">
                                    <div class="panel panel-primary">
                                        <div class="panel-heading ui-draggable-handle">
                                            <h3 class="panel-title"><?php echo $row_artc['title']; ?></h3>
                                        </div>
                                        <div class="panel-body"> 
                                            <div class="form-group">
                                                <label class="col-md-3 col-xs-12 control-label">Name</label>
                                                <div class="col-md-6 col-xs-12">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                        <input type="text" name="management_title" class="form-control" id="page_title" value="<?php echo isset($row_artc['title']) ? $row_artc['title'] : ''; ?>" required/>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 col-xs-12 control-label">Designation</label>
                                                <div class="col-md-6 col-xs-12">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                        <input type="text" name="designation" class="form-control" id="page_title" value="<?php echo isset($row_artc['designation']) ? $row_artc['designation'] : ''; ?>" required/>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 col-xs-12 control-label">Description</label>
                                                <div class="col-md-6 col-xs-12">
                                                    <div class="input-group">

                                                        <textarea name="editor1" id="editor1" rows="20" cols="100">
                                                            <?php echo isset($row_artc['body']) ? htmlspecialchars_decode($row_artc['body']) : ''; ?>                                                      
                                                        </textarea>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 col-xs-12 control-label">Image</label>
                                                <div class="col-md-6 col-xs-12">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                        <input type="file" name="management_image" id="college_logo" class="form-control"/>
                                                        <img src="<?php echo $base_url . $document_path_management . $row_artc['banner_img']; ?>" width="400px"  />
        <!--                                                        <br><span>Image Size 2600 x 500</span>-->
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-3 col-xs-12 control-label">Publish</label>
                                                <div class="col-md-6 col-xs-12">
                                                    <label class="switch">
                                                        <?php
                                                        echo '<input type="checkbox" name="publish" value="' .
                                                        $row_artc['status'] . '"';
                                                        if (!$row_artc['status']) {
                                                            echo 'checked="checked"/>';
                                                        } else {
                                                            echo '/>';
                                                        }
                                                        ?>
                                                        <!--<input name="publish" type="checkbox" value="" checked="checked">-->
                                                        <span></span>
                                                    </label>
                                                </div>
                                            </div>
                                            <input type="hidden" name="cur_date" value="<?php echo date('Y-m-d H:i:s'); ?>" />
                                            <input type="hidden" name="id" value="<?php echo $artc_id; ?>"
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

        <script language="JavaScript" type="text/javascript">

            $(document).ready(function ()
            {
                //alert('Hello');

                if ($("#site").val() == "gallery") {
                    $("#other2").show();

                } else {
                    $("#other2").hide();

                }

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
