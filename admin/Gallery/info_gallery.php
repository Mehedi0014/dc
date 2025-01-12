<?php
session_start();
include_once ('../includes/conn.php');
if (isset($_SESSION['user_role']) || $_SESSION['user_role'] != '') {

    $user = $_SESSION['user_role'];
    $cat_id = $_GET['id'];
    if ($user == '0') {

        include_once('../includes/header.php');
        include_once('../includes/menu.php');
        ?>

        <li class="active">Gallery Category</li>
        </ul>
        <div class="row">
            <div class="col-md-12">

                <!--Gallery addition start here-->

                <div id="Add_collegeInfo_form" class="row" style="display: none;">
                    <div class="col-md-12">
                        <form class="form-horizontal" name="add_collegeCMS" id="add_collegeCMS" method="post" action="db_add_gallery.php" enctype="multipart/form-data">
                            <div class="panel panel-primary">
                                <div class="panel-heading ui-draggable-handle">
                                    <h3 class="panel-title"><?php echo $newname; ?></h3>
                                </div>
                                <div class="panel-body"> 
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Category Name</label>
                                        <div class="col-md-6 col-xs-12">
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <input type="text" name="cat_name" class="form-control" id="dept_name" required/>
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
                                    <input type="hidden" name="college_id" value="<?php echo $id; ?>"
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
                    <h3 class="panel-title">List Of Gallery Category</h3>
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
                                <th>Gallery name</th>
                                <th>Status</th>
                                <th>Total Number of Images</th>
                                <th width="50">Edit Gallery</th>
                                <th width="50">Add Image</th>
                            </tr>
                        </thead>
                        <tbody style="font-size: 11px">
                            <?php
                            // include("includes/conn.php");
                            $qry_tbl = "SELECT * FROM `gallery_category` ORDER BY `id`";
                            $res_tbl = mysqli_query($con, $qry_tbl) or trigger_error("Query Failed! SQL: $qry_tbl - Error: " . mysqli_error(), E_USER_ERROR);
                            $i = 1;
                            while ($row_tbl = mysqli_fetch_assoc($res_tbl)) {
                                ?>                                          
                                <tr>
                                    <td class="text-left"><?php echo $i ?></td>
                                    <td class="text-left"><?php echo strtoupper($row_tbl['category_name']); ?></td>
                                    <?php if (!$row_tbl['status']) { ?>
                                        <td><h4><span class="label label-success">Active</span></h4></td>
                                        <?php
                                    } else {
                                        ?>
                                        <td><h4><span class="label label-danger">Inactive</span></h4></td>
                                    <?php } ?>
                                    <td class="text-left">
                                        <?php
                                        $qry_tot = "select count(*) from gallery where category_id = '" . $row_tbl['id'] . "'";
                                        $res_tot = mysqli_query($con, $qry_tot) or trigger_error("Query Failed! SQL: $qry_tot - Error: " . mysqli_error(), E_USER_ERROR);
                                        $row_tot = mysqli_fetch_array($res_tot);
                                        echo $row_tot[0];
                                        ?>
                                    </td> 
                                    <td>
                                        <a href="edit_gallery.php?id=<?php echo $row_tbl['id']; ?>&action=Edit" ><span class="fa fa-pencil text-primary"></span></a>
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
            <div class="btn btn-primary" onclick="ShowContainer('Add_collegeInfo_form')"><span class="fa fa-plus"></span>Add Gallery Category here</div>
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

        //                                        $(".validate").on('click', function (event) {
        //                                            var name = $('input[name=col_name1]').val();
        //                                            if (name == null || name == '') {
        //                                                alert("Error : Please name should be written");
        //                                                event.preventDefault();
        //                                                return;
        //                                            }
        //                                        });

        //                                        $("input[name=col_email]").focusout(function () {
        //                                            var email = $('input[name=col_email]').val();
        //                                            var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
        //                                            if (!mailformat.test(email)) {
        //                                                alert("Error: Not a valid email format")
        //                                                event.preventDefault();
        //                                                return;
        //                                            }
        //                                            check_email_ajax(email);
        //                                        });



        //                                        function check_email_ajax(email) {
        //
        //                                            $.ajax({
        //                                                type: "POST", // type
        //
        //                                                url: "check-email.php", // request file the 'check_email.php'
        //
        //                                                data: {key: email}, // post the data
        //
        //                                                success: function (responseText) { // get the response
        //
        //
        //
        //                                                    if (responseText == 0) {
        //
        //                                                        alert('user already exists');
        //
        //                                                        $('input[name=col_email]').val("");
        //
        //                                                    } else if (responseText == 1) {
        //
        //                                                        //alert('register');
        //
        //                                                    }
        //
        //
        //
        //                                                } // end success
        //
        //                                            }); // ajax end
        //
        //                                        }





        </script>

        <?php
    }
    ?>      
    <?php
} else {
    header("Location: " . $admin_base_url . "index.php");
}
?>





