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
        <li class="active">Setting</li>
        </ul>
        <div class="row">

            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">                                
                        <h3 class="panel-title">Edit Setting</h3>
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
                                 * Getting CMS content for colleges to edit
                                 */
                                $get_cms_qry = "SELECT * FROM `setting` WHERE `id` = '$id'";
                                $res = mysqli_query($con, $get_cms_qry) or trigger_error("Query Failed! SQL: $get_cms_qry - Error: " . mysqli_error(), E_USER_ERROR);

                                $row = mysqli_fetch_assoc($res);
                                ?>
                                <form class="form-horizontal" name="edit_collegeCMS" id="edit_collegeCMS" method="post" action="db_edit_setting.php" enctype="multipart/form-data">
                                    <div class="panel panel-primary">
                                        <div class="panel-heading ui-draggable-handle">
                                            <h3 class="panel-title"><?php echo $row['website_name']; ?></h3>
                                        </div>
                                        <div class="panel-body"> 

                                            <div class="form-group">
                                                <label class="col-md-3 col-xs-12 control-label">Website Name</label>
                                                <div class="col-md-6 col-xs-12">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                        <input type="text" name="web_name" class="form-control" id="dept_name" value="<?php echo $row['website_name']; ?>" required/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 col-xs-12 control-label">Email</label>
                                                <div class="col-md-6 col-xs-12">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                        <input type="text" name="web_email" class="form-control" id="dept_name" value="<?php echo $row['email']; ?>" required/>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-3 col-xs-12 control-label">Userid</label>
                                                <div class="col-md-6 col-xs-12">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                        <input type="text" name="userid" class="form-control" id="fac_phone" value="<?php echo $row['user_login']; ?>" required/>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="form-group">
                                                <label class="col-md-3 col-xs-12 control-label">Password</label>
                                                <div class="col-md-6 col-xs-12">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                        <input type="hidden" name="old_pass" value="<?php echo $row['user_pass']; ?>" class="form-control" required>
                                                        <input type="password" name="pass" class="form-control" id="dept_name" value="<?php echo $row['user_pass']; ?>" required/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 col-xs-12 control-label">Keyword</label>
                                                <div class="col-md-6 col-xs-12">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                        <input type="text" name="key" class="form-control" id="dept_name" value="<?php echo $row['keyword']; ?>" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 col-xs-12 control-label">Description</label>
                                                <div class="col-md-6 col-xs-12">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                        <input type="text" name="desc" class="form-control" id="dept_name" value="<?php echo $row['description']; ?>" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 col-xs-12 control-label">Total Visited</label>
                                                <div class="col-md-6 col-xs-12">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                        <input type="text" name="visit" class="form-control" id="dept_name" value="<?php echo $row['total_visited']; ?>" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 col-xs-12 control-label">Logo</label>
                                                <div class="col-md-6 col-xs-12">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                        <input type="file" name="logo" id="college_logo" class="form-control"/>
                                                        <img src="<?php echo $base_url . $document_path_site_logo . $row['logo']; ?>" width="205" height="200" />
                                                    </div>
                                                </div>
                                            </div>                                          

                                            <div class="form-group">
                                                <label class="col-md-3 col-xs-12 control-label">Footer Logo</label>
                                                <div class="col-md-6 col-xs-12">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                        <input type="file" name="footer_logo" id="college_logo" class="form-control"/>
                                                        <img src="<?php echo $base_url . $document_path_site_logo . $row['footer_logo']; ?>" width="205" height="200" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 col-xs-12 control-label">Favicon</label>
                                                <div class="col-md-6 col-xs-12">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                        <input type="file" name="favicon" id="college_logo" class="form-control"/>
                                                        <img src="<?php echo $base_url . $document_path_site_logo . $row['favicon']; ?>" width="205" height="200" />
                                                    </div>
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

                CKEDITOR.replace('editor1');
                CKEDITOR.replace('editor2');
                CKEDITOR.replace('editor3');
                CKEDITOR.replace('editor4');
                CKEDITOR.replace('editor5');
                CKEDITOR.replace('editor6');
                CKEDITOR.replace('editor7');
                CKEDITOR.replace('editor8');
                CKEDITOR.replace('editor9');
                CKEDITOR.replace('editor10');
                CKEDITOR.replace('editor11');
                CKEDITOR.replace('editor12');
                CKEDITOR.replace('editor13');
                CKEDITOR.replace('editor14');
                CKEDITOR.replace('editor15');
                CKEDITOR.replace('editor16');
                CKEDITOR.replace('editor17');
                CKEDITOR.replace('editor18');
                CKEDITOR.replace('editor19');
                CKEDITOR.replace('editor20');
                CKEDITOR.replace('editor21');
                CKEDITOR.replace('editor22');
                CKEDITOR.replace('editor23');
                CKEDITOR.replace('editor24');
                CKEDITOR.replace('editor25');
                CKEDITOR.replace('editor26');



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
