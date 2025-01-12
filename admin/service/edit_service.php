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
        ?>
        <li class="active">Product</li>
        </ul>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">                                
                        <h3 class="panel-title">Edit Service</h3>
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
                                $get_cms_qry = "SELECT * FROM `service` WHERE `id` = '$id'";
                                $res = mysqli_query($con, $get_cms_qry) or trigger_error("Query Failed! SQL: $get_cms_qry - Error: " . mysqli_error(), E_USER_ERROR);

                                $row = mysqli_fetch_assoc($res);
                                ?>
                                <form class="form-horizontal" name="edit_collegeCMS" id="edit_collegeCMS" method="post" action="db_edit_service.php" enctype="multipart/form-data">
                                    <div class="panel panel-primary">
                                        <div class="panel-heading ui-draggable-handle">
                                            <h3 class="panel-title"><?php echo $row['name']; ?></h3>
                                        </div>
                                        <div class="panel-body"> 
                                            <div class="form-group">
                                                <label class="col-md-3 col-xs-12 control-label">Service Name</label>
                                                <div class="col-md-6 col-xs-12">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                        <input type="text" name="service_name" class="form-control" id="dept_name" value="<?php echo $row['name']; ?>" required/>
                                                        <input type="hidden" name="old_page" class="form-control" id="page_title" value="<?php echo $row['name']; ?>"/>
                                                        <input type="hidden" name="old_alias" class="form-control" id="page_title" value="<?php echo $row['alias']; ?>"/>
                                                    </div>
                                                </div>
                                            </div>       

                                            <div class="form-group">
                                                <label class="col-md-3 col-xs-12 control-label">Description</label>
                                                <div class="col-md-6 col-xs-12">
                                                    <div class="input-group">

                                                        <textarea name="editor1" id="editor1" rows="20" cols="100">
                                                            <?php echo isset($row['description']) ? htmlspecialchars_decode($row['description']) : ''; ?>                                                      
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
                                                        <img src="<?php echo $base_url . $document_path_service . $row['banner_img']; ?>" width="400px"  />
        <!--                                                        <br><span>Image Size 2600 x 500</span>-->
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-3 col-xs-12 control-label">Homepage Image</label>
                                                <div class="col-md-6 col-xs-12">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                        <input type="file" name="homepage_image" id="college_logo" class="form-control"/>
                                                        <img src="<?php echo $base_url . $document_path_service . $row['homepage_image']; ?>" width="400px"  />
        <!--                                                        <br><span>Image Size 2600 x 500</span>-->
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 col-xs-12 control-label">Service Image</label>
                                                <div class="col-md-6 col-xs-12">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                        <input type="file" name="service_image" id="college_logo" class="form-control"/>
                                                        <img src="<?php echo $base_url . $document_path_service . $row['other_image']; ?>" width="400px"  />
        <!--                                                        <br><span>Image Size 2600 x 500</span>-->
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 col-xs-12 control-label">Show in Homepage</label>
                                                <div class="col-md-6 col-xs-12">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                        <input type="checkbox" name="home" <?php echo $row['homepage'] == 'Yes' ? 'checked' : ''; ?> value="Yes"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 col-xs-12 control-label">Sort Order</label>
                                                <div class="col-md-6 col-xs-12">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                        <input type="text" name="sort" class="form-control" id="dept_name" value="<?php echo $row['sort']; ?>" required/>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 col-xs-12 control-label">Meta Title</label>
                                                <div class="col-md-6 col-xs-12">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                        <input type="text" name="meta_title" class="form-control" id="page_title" value="<?php echo isset($row['meta_title']) ? $row['meta_title'] : ''; ?>"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 col-xs-12 control-label">Keyword</label>
                                                <div class="col-md-6 col-xs-12">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                        <input type="text" name="keyword" class="form-control" id="page_title" value="<?php echo isset($row['keyword']) ? $row['keyword'] : ''; ?>"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 col-xs-12 control-label">Meta Description</label>
                                                <div class="col-md-6 col-xs-12">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                        <input type="text" name="description" class="form-control" id="page_title" value="<?php echo isset($row['description2']) ? $row['description2'] : ''; ?>"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 col-xs-12 control-label">Custom Button Text</label>
                                                <div class="col-md-6 col-xs-12">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                        <input type="text" name="button_text" value="<?php echo isset($row['button_text']) ? $row['button_text']:'';?>" class="form-control" id="page_title"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 col-xs-12 control-label">Custom Button Link</label>
                                                <div class="col-md-6 col-xs-12">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                        <input type="text" name="button_link" value="<?php echo isset($row['button_link']) ? $row['button_link']:''?>" class="form-control" id="page_title"/>
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

            window.onload = function () {
                CKEDITOR.replace('editor1');
                CKEDITOR.replace('editor2');
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