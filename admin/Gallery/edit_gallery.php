<?php
session_start();
include_once ('../includes/conn.php');
if (isset($_SESSION['user_role']) || $_SESSION['user_role'] != '') {

    $user = $_SESSION['user_role'];
    $id = $_GET['id'];
    if ($user == '0') {

        include_once('../includes/header.php');
        include_once('../includes/menu.php');
        ?>
        <li class="active">Gallery</li>
        </ul>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">                                
                        <h3 class="panel-title">Edit Gallery</h3>
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
                        <div id="Edit_collegeInfo_form" class="row">
                            <div class="col-md-12">
                                <?php
                                /**
                                 * Getting Image to edit
                                 */
                                $get_cms_qry = "SELECT * FROM `gallery_category` WHERE `id` = '$id'";
                                $res = mysqli_query($con, $get_cms_qry) or trigger_error("Query Failed! SQL: $get_cms_qry - Error: " . mysqli_error(), E_USER_ERROR);

                                $row = mysqli_fetch_assoc($res);
                                ?>
                                <form class="form-horizontal" name="edit_collegeCMS" id="edit_collegeCMS" method="post" action="db_edit_gallery.php" enctype="multipart/form-data">
                                    <div class="panel panel-primary">
                                        <div class="panel-heading ui-draggable-handle">
                                            <h3 class="panel-title"><?php // echo $row['gallery_title'];  ?></h3>
                                        </div>
                                        <div class="panel-body"> 
                                            <div class="form-group">
                                                <label class="col-md-3 col-xs-12 control-label">Category Title</label>
                                                <div class="col-md-6 col-xs-12">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                        <input type="text" name="cat_title" class="form-control" id="dept_name" value="<?php echo $row['category_name']; ?>" required/>

                                                    </div>
                                                </div>
                                            </div>                                           

                                            <div class="form-group">
                                                <label class="col-md-3 col-xs-12 control-label">Publish</label>
                                                <div class="col-md-6 col-xs-12">
                                                    <label class="switch">
                                                        <?php
                                                        echo '<input type="checkbox" name="publish" value="' .
                                                        $row['status'] . '"';
                                                        if (!$row['status']) {
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
                                            <input type="hidden" name="cur_date" value="<?php echo date('Y-m-d'); ?>" />
                                            <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                                            <input type="hidden" name="file_logo" value="<?php echo $row['img']; ?>"/>
                                        </div>
                                        <div class="panel-footer">
                                            <input name="submit" type="submit" class="btn btn-primary col-md-offset-5" value="Submit"/>                          
                                        </div>
                                    </div>
                            </div>
                            </form>
                        </div>
                    </div>
                    <!--End of editing CMS content-->  
                </div>
            </div>
            <div>&nbsp;</div>
        </div>
        </div>

        <?php include('../includes/footer.php'); ?>

        <?php include '../includes/scripts.php'; ?>

        <script type="text/javascript" src="<?php echo $admin_base_url . $js_path; ?>plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js"></script> 
        <script type="text/javascript" src="<?php echo $admin_base_url . $js_path; ?>plugins/ckeditor/ckeditor.js"></script>
        <script type="text/javascript" src="<?php echo $admin_base_url . $js_path; ?>plugins/bootstrap/bootstrap-select.js"></script>

        <script language="javascript" type="text/javascript">
            function HideContainer(container_name) {
                document.getElementById(container_name).style.display = 'none';
            }


            window.onload = function () {

                CKEDITOR.replace('editor5');
                CKEDITOR.replace('editor6');

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

