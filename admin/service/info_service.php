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

        <li class="active">Services</li>
        </ul>
        <div class="row">
            <div class="col-md-12">

                <!--Gallery addition start here-->

                <div id="Add_collegeInfo_form" class="row" style="display: none;">
                    <div class="col-md-12">
                        <form class="form-horizontal" name="add_collegeCMS" id="add_collegeCMS" method="post" action="db_add_service.php" enctype="multipart/form-data">
                            <div class="panel panel-primary">
                                <div class="panel-heading ui-draggable-handle">
                                    <h3 class="panel-title"><?php echo $newname; ?></h3>
                                </div>
                                <div class="panel-body"> 
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Service Name</label>
                                        <div class="col-md-6 col-xs-12">
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <input type="text" name="service_name" class="form-control" id="dept_name" required/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Description</label>
                                        <div class="col-md-6 col-xs-12">
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <textarea name="editor1" id="editor1" rows="10" cols="80">
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
        <!--                                                <span>Image Size 1200 x 226</span>-->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Homepage Image</label>
                                        <div class="col-md-6 col-xs-12">
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <input type="file" name="homepage_image" id="college_logo" class="form-control"/>
        <!--                                                <span>Image Size 1200 x 226</span>-->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Service Image</label>
                                        <div class="col-md-6 col-xs-12">
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <input type="file" name="service_image" id="college_logo" class="form-control"/>
        <!--                                                <span>Image Size 1200 x 226</span>-->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Show in Homepage</label>
                                        <div class="col-md-6 col-xs-12">
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>&nbsp;&nbsp;
                                                <input type="checkbox" name="home" value="Yes" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Sort Order</label>
                                        <div class="col-md-6 col-xs-12">
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <input type="text" name="sort" class="form-control" id="dept_name" required/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Meta Title</label>
                                        <div class="col-md-6 col-xs-12">
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <input type="text" name="meta_title" class="form-control" id="page_title"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Keyword</label>
                                        <div class="col-md-6 col-xs-12">
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <input type="text" name="keyword" class="form-control" id="page_title"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Meta Description</label>
                                        <div class="col-md-6 col-xs-12">
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <input type="text" name="description" class="form-control" id="page_title"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Custom Button Text</label>
                                        <div class="col-md-6 col-xs-12">
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <input type="text" name="button_text" class="form-control" id="page_title"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Custom Button Link</label>
                                        <div class="col-md-6 col-xs-12">
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <input type="text" name="button_link" class="form-control" id="page_title"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Publish</label>
                                        <div class="col-md-6 col-xs-12">
                                            <label class="switch">
                                                <?php
                                                echo '<input type="checkbox" name="publish"'
                                                . '';
                                                echo '/>';
                                                ?>
                                                <span></span>
                                            </label>
                                        </div>
                                    </div>
                                    <input type="hidden" name="cur_date" value="<?php echo date('Y-m-d H:i:s'); ?>" />

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

            <!--Gallery addition end here-->

            <div class="panel panel-default">
                <div class="panel-heading">                                
                    <h3 class="panel-title">List Of Services</h3>
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
                    <?php
                    if (isset($_GET['editmsg'])) {
                        $msg2 = $_GET['editmsg'];
                        ?>
                        <h6 style="color:#C00;">
                            <?php
                            echo $msg2;
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
                                <th>Service Name</th>
                                <th>Show in Homepage</th>
                                <th>Key</th>
                                <th>Sort Order</th>
                                <th>No of Images</th>
                                <th>Status</th>
                                <th width="50">Edit</th>
                                <th width="50">Add Image</th>
                            </tr>
                        </thead>
                        <tbody style="font-size: 11px">
                            <?php
                            // include("includes/conn.php");
                            $qry_tbl = "SELECT * FROM `service` ORDER BY `sort`";
                            $res_tbl = mysqli_query($con, $qry_tbl) or trigger_error("Query Failed! SQL: $qry_tbl - Error: " . mysqli_error(), E_USER_ERROR);
                            $i = 1;
                            while ($row_tbl = mysqli_fetch_assoc($res_tbl)) {
                                ?>                                          
                                <tr>
                                    <td class="text-left"><?php echo $i ?></td>
                                    <td class="text-left"><?php echo strtoupper($row_tbl['name']); ?></td>
                                    <td class="text-left"><?php echo $row_tbl['homepage']; ?></td>
                                    <td class="text-left"><?php echo $row_tbl['alias']; ?></td>
                                    <td class="text-left"><?php echo $row_tbl['sort']; ?></td>
                                    <td class="text-left">
                                        <?php
                                        $qry_tot = "select count(*) from service_images where service_id = '" . $row_tbl['id'] . "'";
                                        $res_tot = mysqli_query($con, $qry_tot) or trigger_error("Query Failed! SQL: $qry_tot - Error: " . mysqli_error(), E_USER_ERROR);
                                        $row_tot = mysqli_fetch_array($res_tot);
                                        echo $row_tot[0];
                                        ?>
                                    </td> 
                                    <?php if (!$row_tbl['status']) { ?>
                                        <td><h4><span class="label label-success">Active</span></h4></td>
                                        <?php
                                    } else {
                                        ?>
                                        <td><h4><span class="label label-danger">Inactive</span></h4></td>
                                    <?php } ?>
                                    <td>
                                        <a href="edit_service.php?id=<?php echo $row_tbl['id']; ?>&action=Edit" ><span class="fa fa-pencil text-primary"></span></a>
                                    </td>
                                    <td>
                                        <a href="info_image.php?id=<?php echo $row_tbl['id']; ?>&action=Edit" ><span class="fa fa-pencil text-primary"></span></a>
                                    </td>
                                </tr>

                                <?php
                                $i++;
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="btn btn-primary" onclick="ShowContainer('Add_collegeInfo_form')"><span class="fa fa-plus"></span>Add Service here</div>
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



