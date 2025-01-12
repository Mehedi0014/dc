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

        <li class="active">Setting</li>
        </ul>
        <div class="row">
            <div class="col-md-12">


                <div class="panel panel-default">
                    <div class="panel-heading">                                
                        <h3 class="panel-title">Setting Details</h3>
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
                        <div class="table-responsive">
                            <table class="table dataTable table-bordered table-hover table-responsive">
                                <thead>
                                    <tr>
                                        <th width="75" class="text-left">#</th>
                                        <th>Website Name</th>
                                        <th>Edit Setting</th>
                                        <th>Email</th>
                                        <th>Website Logo</th>
                                        <th>Footer Logo</th>
                                        <th>Favicon</th>
                                        <th>Userid</th>
                                        <th>Keyword</th>
                                        <th>Description</th>
                                        <th>Total Visited</th>


                                    </tr>
                                </thead>
                                <tbody style="font-size: 11px">
                                    <?php
                                    // include("includes/conn.php");
                                    $qry_tbl = "SELECT * FROM `setting`";
                                    $res_tbl = mysqli_query($con, $qry_tbl) or trigger_error("Query Failed! SQL: $qry_tbl - Error: " . mysqli_error(), E_USER_ERROR);
                                    $i = 1;
                                    while ($row_tbl = mysqli_fetch_assoc($res_tbl)) {
                                        ?>                                          
                                        <tr>
                                            <td class="text-left"><?php echo $i ?></td>
                                            <td class="text-left"><?php echo $row_tbl['website_name']; ?></td>
                                            <td>
                                                <a href="edit_setting.php?id=<?php echo $row_tbl['id']; ?>&action=Edit" ><span class="fa fa-pencil text-primary"></span></a>
                                            </td>
                                            <td class="text-left"><?php echo $row_tbl['email']; ?></td>
                                            <td class="text-left">
                                                <img src="<?php echo $base_url . $document_path_site_logo . $row_tbl['logo']; ?>" width="155" height="110" />
                                            </td> 
                                            <td class="text-left">
                                                <img src="<?php echo $base_url . $document_path_site_logo . $row_tbl['footer_logo']; ?>" width="155" height="110" />
                                            </td>
                                            <td class="text-left">
                                                <img src="<?php echo $base_url . $document_path_site_logo . $row_tbl['favicon']; ?>" width="155" height="110" />
                                            </td>


                                            <td class="text-left"><?php echo $row_tbl['user_login']; ?></td>
            <!--                                    <td class="text-left"><?php //echo $row_tbl['user_pass'];   ?></td> -->
                                            <td class="text-left"><?php echo $row_tbl['keyword']; ?></td> 
                                            <td class="text-left"><?php echo $row_tbl['description']; ?></td> 
                                            <td class="text-left"><?php echo $row_tbl['total_visited']; ?></td> 

                                        </tr>

                                        <?php
                                        $i++;
                                    }
                                    ?>
                                </tbody>
                            </table>
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



