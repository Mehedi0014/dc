<?php
session_start();
include_once ('../includes/conn.php');
if (isset($_SESSION['user_role']) || $_SESSION['user_role'] != '') {

    $user = $_SESSION['user_role'];
    if ($user == '0') {
        $artc_id = $_GET['id'];

        include_once('../includes/header.php');
        include_once('../includes/menu.php');
        $qry_artc = "SELECT * FROM `page` WHERE `id`= '$artc_id'";
        $res_artc = mysqli_query($con, $qry_artc) or trigger_error("Query Failed! SQL: $qry_artc - Error: " . mysqli_error(), E_USER_ERROR);
        $row_artc = mysqli_fetch_assoc($res_artc);
        ?>
        <li class="active">CMS</li>
        </ul>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">                                
                        <h3 class="panel-title">Edit Page</h3>
                        <ul class="panel-controls">
                            <li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>                   
                        </ul>                                
                    </div>
                    <div class="panel-body">
                        <div id="edit_cms_form" class="row" >
                            <div class="col-md-12">
                                <form class="form-horizontal" name="editCMS" id="editCMS" method="post" action="db_edit_page.php" enctype="multipart/form-data">
                                    <div class="panel panel-primary">
                                        <div class="panel-heading ui-draggable-handle">
                                            <h3 class="panel-title"><?php echo $row_artc['title']; ?></h3>
                                        </div>
                                        <div class="panel-body">
                                            <div class="form-group">
                                                <label class="col-md-3 col-xs-12 control-label">Select Menu</label>
                                                <div class="col-md-6 col-xs-12">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                        <select class="form-control" id="page_title" name="parent_id">
                                                            <option>Select One</option>
                                                            <option value="1" <?php echo $row_artc['parent_id'] == '1' ? 'selected':'';?>>About Us</option>
                                                            
                                                            <option value="3" <?php echo $row_artc['parent_id'] == '2' ? 'selected':'';?>>Knowledge Center</option>
                                                            <option value="4" <?php echo $row_artc['parent_id'] == '3' ? 'selected':'';?>>Courses</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div> 
                                            <div class="form-group">
                                                <label class="col-md-3 col-xs-12 control-label">Page Title</label>
                                                <div class="col-md-6 col-xs-12">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                        <input type="text" name="page_title" class="form-control" id="page_title" value="<?php echo isset($row_artc['title']) ? $row_artc['title'] : ''; ?>" required/>
                                                        <input type="hidden" name="old_page" class="form-control" id="page_title" value="<?php echo $row_artc['title']; ?>"/>
                                                        <input type="hidden" name="old_alias" class="form-control" id="page_title" value="<?php echo $row_artc['alias']; ?>"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 col-xs-12 control-label">Page body</label>
                                                <div class="col-md-6 col-xs-12">
                                                    <div class="input-group">

                                                        <textarea name="editor1" id="editor1" rows="20" cols="100">
                                                            <?php echo isset($row_artc['body']) ? htmlspecialchars_decode($row_artc['body']) : ''; ?>                                                      
                                                        </textarea>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 col-xs-12 control-label">Banner Image</label>
                                                <div class="col-md-6 col-xs-12">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                        <input type="file" name="page_image" id="college_logo" class="form-control"/>
                                                        <img src="<?php echo $base_url . $document_page_banner . $row_artc['banner_img']; ?>" width="400px"  />
        <!--                                                        <br><span>Image Size 2600 x 500</span>-->
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 col-xs-12 control-label">Other Image</label>
                                                <div class="col-md-6 col-xs-12">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                        <input type="file" name="other_image" id="college_logo" class="form-control"/>
                                                        <img src="<?php echo $base_url . $document_page_banner . $row_artc['other_image']; ?>" width="400px"  />
        <!--                                                        <br><span>Image Size 2600 x 500</span>-->
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 col-xs-12 control-label">Meta Title</label>
                                                <div class="col-md-6 col-xs-12">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                        <input type="text" name="meta_title" class="form-control" id="page_title" value="<?php echo isset($row_artc['meta_title']) ? $row_artc['meta_title'] : ''; ?>"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 col-xs-12 control-label">Keyword</label>
                                                <div class="col-md-6 col-xs-12">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                        <input type="text" name="keyword" class="form-control" id="page_title" value="<?php echo isset($row_artc['keyword']) ? $row_artc['keyword'] : ''; ?>"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 col-xs-12 control-label">Description</label>
                                                <div class="col-md-6 col-xs-12">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                        <input type="text" name="description" class="form-control" id="page_title" value="<?php echo isset($row_artc['description']) ? $row_artc['description'] : ''; ?>"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 col-xs-12 control-label">Custom Button Text</label>
                                                <div class="col-md-6 col-xs-12">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                        <input type="text" name="button_text" value="<?php echo isset($row_artc['button_text']) ? $row_artc['button_text']:'';?>" class="form-control" id="page_title"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 col-xs-12 control-label">Custom Button Link</label>
                                                <div class="col-md-6 col-xs-12">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                        <input type="text" name="button_link" value="<?php echo isset($row_artc['button_link']) ? $row_artc['button_link']:''?>" class="form-control" id="page_title"/>
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