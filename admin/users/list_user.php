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
        <li class="active">Registered User</li>
        </ul>
        <div class="row">

            <div class="col-md-12">
                <!--Page addition start here-->


                <!--Page addition end here-->

                <div class="panel panel-default">
                    <div class="panel-heading">                                
                        <h3 class="panel-title">List of Registered User</h3>
                        <?php
                        if (isset($_GET['update'])) {
                            $msg = $_GET['update'];
                            if ($msg) {
                                ?>
                                <h6 style="color:#C00;">
                                    <?php
                                    echo 'Update successfull';
                                } else {
                                    echo 'Update not possible';
                                }
                            }
                            ?>
                        </h6>
                        <?php
                        if (isset($_GET['editmsg'])) {
                            $msg = $_GET['editmsg'];
                            ?>
                            <h6 style="color:#C00;">
                                <?php
                                echo $msg;
                            }
                            ?>
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
                        <table class="table dataTable table-bordered table-hover table-responsive">
                            <thead>
                                <tr>
                                    <th width="75" class="text-left">#</th>
                                    <th>Name</th>
                                    <th>User Type</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th>Status</th>
                                    <th>Edit User</th>
            <!--                                <th>Delete Banner Image</th>-->
                                </tr>
                            </thead>
                            <tbody style="font-size: 11px">
                                <?php
//                                include("includes/conn.php");
                                $qry_artc = "SELECT * FROM `customer_registration`";
                                $res_artc = mysqli_query($con, $qry_artc);
                                $i = 1;
                                while ($row_artc = mysqli_fetch_assoc($res_artc)) {
                                    ?>                                          
                                    <tr>
                                        <td class="text-left"><?php echo $i ?></td>
                                        <td class="text-left"><?php echo $row_artc['name']; ?></td>
                                        <td class="text-left"><?php echo ($row_artc['user_type'] == '1') ? 'DRA' : 'General'; ?></td>
                                        
                                        <td class="text-left"><?php echo $row_artc['email']; ?></td>
                                        <td class="text-left"><?php echo $row_artc['phone'] ?></td>
                                        <td class="text-left"><?php echo $row_artc['address'] ?></td>
                                        <?php if (!$row_artc['status']) { ?>
                                            <td><h4><span class="label label-success">Active</span></h4></td>
                                            <?php
                                        } else {
                                            ?>
                                            <td><h4><span class="label label-danger">Inactive</span></h4></td>
                                        <?php } ?>
                                        <td>
                                            <a href="edit_user.php?id=<?php echo $row_artc['id']; ?>&action=Edit" ><span class="fa fa-pencil text-primary">&nbsp;</span>Edit</a>
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
<!--                <div class="btn btn-primary" onclick="ShowContainer('Add_collegeInfo_form')"><span class="fa fa-plus"></span>Add Page here</div>
                <div>&nbsp;</div>-->
            </div>
        </div>
     
<script language="JavaScript" type="text/javascript">

    $(document).ready(function ()
    {
        //alert('Hello');
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