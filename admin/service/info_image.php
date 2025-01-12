
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<?php
session_start();
include_once ('../includes/conn.php');
if (isset($_SESSION['user_role']) || $_SESSION['user_role'] != '') {

    $user = $_SESSION['user_role'];
    // $cat_id = $_GET['id'];
    if ($user == '0') {

        include_once('../includes/header.php');
        include_once('../includes/menu.php');
        $cat_id = $_GET['id'];
        ?>

        <li class="active">Product Images</li>

        </ul>
        <div class="row">
            <div class="col-md-12">
                <!--Image start here-->
                <div id="Add_collegeInfo_form" class="row" style="display: none;">
                    <div class="col-md-12">
                        <form class="form-horizontal" name="add_collegeCMS" id="add_collegeCMS" method="post" action="db_add_image.php" enctype="multipart/form-data">
                            <div class="panel panel-primary">
                                <div class="panel-heading ui-draggable-handle">
                                    <h3 class="panel-title"><?php echo $newname; ?></h3>
                                </div>
                                <div class="panel-body"> 
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Image Name</label>
                                        <div class="col-md-6 col-xs-12">
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <input type="text" name="image_label" class="form-control" id="menu_label" required/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Upload Image</label>
                                        <div class="col-md-6 col-xs-12">
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <input type="file" name="image" id="college_logo" class="form-control" required/>
                                            </div>
                                        </div>
                                    </div> 

                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Sort Order</label>
                                        <div class="col-md-6 col-xs-12">
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <input type="text" name="sort" class="form-control" id="menu_label" required/>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" name="cur_date" value="<?php echo date('Y-m-d H:i:s'); ?>" />
                                    <input type="hidden" name="cat_id" value="<?php echo $cat_id; ?>"
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
            <!--Image addition end here-->
            <div class="panel panel-default">
                <div class="panel-heading">   
                    <?php
                    $qry_cat = "select * from service where id = '$cat_id'";
                    $res_cat = mysqli_query($con, $qry_cat) or trigger_error("Query Failed! SQL: $qry_cat - Error: " . mysqli_error(), E_USER_ERROR);
                    $row_cat = mysqli_fetch_array($res_cat);
                    ?>
                    <h3 class="panel-title">Image List of <?php echo $row_cat['name']; ?></h3>
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
                    if (isset($_GET['editmsgmenu'])) {
                        $msg1 = $_GET['editmsgmenu'];
                        ?>
                        <h6 style="color:#C00;">
                            <?php
                            echo $msg1;
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
                                <th>Image Title</th>
                                <th>Image</th>
                                <th>Sort Order</th>
                                <th width="50">Edit Image</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody style="font-size: 11px" id="sortThis">
                            <?php
                            // include("includes/conn.php");

                            $qry_tbl = "SELECT * FROM `service_images` where service_id = '$cat_id' ORDER BY `sort`";
                            $res_tbl = mysqli_query($con, $qry_tbl) or trigger_error("Query Failed! SQL: $qry_tbl - Error: " . mysqli_error(), E_USER_ERROR);
                            //if(is_resource($res_tbl)){
                            $i = 1;
                            while ($row_tbl = mysqli_fetch_assoc($res_tbl)) {
                                ?>                                          
                                <tr id="<?php echo $row_tbl['id']; ?>" >
                                    <td class="text-left"><?php echo $i ?></td>
                                    <td class="text-left"><?php echo $row_tbl['name']; ?></td>

                                    <td class="text-left">
                                        <img src="<?php echo $base_url . $document_path_service . $row_tbl['image']; ?>" height="50px" width="50px">
                                    </td>

                                    <td class="text-left"><?php echo $row_tbl['sort']; ?></td>
                                    <td>
                                        <a href="edit_image.php?id=<?php echo $row_tbl['id']; ?>&cat_id=<?php echo $cat_id; ?>&action=Edit" ><span class="fa fa-pencil text-primary"></span></a>
                                    </td>
                                    <td>
                                        <a href="delete_image.php?id=<?php echo $row_tbl['id']; ?>&cat_id=<?php echo $cat_id; ?>&action=Edit" ><span class="fa fa-trash-o text-primary"></span></a>
                                    </td>

                                </tr>
                                <?php
                                $i++;
                            }
                            //}
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="btn btn-primary" onclick="ShowContainer('Add_collegeInfo_form')"><span class="fa fa-plus"></span>Add Image here</div>
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
        <script language="JavaScript" type="text/javascript">


            $(document).ready(function ()
            {
                //alert('Hello');
                $("#sel").change(function () {
                    //alert('Hello');
                    if ($(this).val() == "link") {
                        $("#other1").show();
                    } else {
                        $("#other1").hide();
                    }
                });
            });



        </script>

        <?php
    }
    ?>      
    <?php
} else {
    header("Location: " . $admin_base_url . "index.php");
}
?>
