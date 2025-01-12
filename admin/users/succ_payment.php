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
        <li class="active">All Successful Payment</li>
        </ul>
        <div class="row">

            <div class="col-md-12">
                <!--Page addition start here-->


                <!--Page addition end here-->

                <div class="panel panel-default">
                    <div class="panel-heading">                                
                        <h3 class="panel-title">All Successful Payment of Users</h3>
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
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Transaction Id</th>
                                    <th>Amount</th>
                                    <th>Status</th>
                                    <th>Payment Date</th>
                                </tr>
                            </thead>
                            <tbody style="font-size: 11px">
                                <?php
//                                include("includes/conn.php");
                                $qry_artc = "SELECT cr.name,payment.email,cr.phone,payment.txnid,payment.amount,payment.status,payment.pay_date "
                                        . "FROM `payment`,`customer_registration` cr where cr.email = payment.email and payment.status = '2'";
                                $res_artc = mysqli_query($con, $qry_artc);
                                $i = 1;
                                while ($row_artc = mysqli_fetch_assoc($res_artc)) {
                                    ?>                                          
                                    <tr>
                                        <td class="text-left"><?php echo $i ?></td>
                                        <td class="text-left"><?php echo $row_artc['name']; ?></td>
                                        <td class="text-left"><?php echo $row_artc['email']; ?></td>
                                        <td class="text-left"><?php echo $row_artc['phone'] ?></td>
                                        <td class="text-left"><?php echo $row_artc['txnid'] ?></td>
                                        <td class="text-left"><?php echo $row_artc['amount'] ?></td>
                                        <td class="text-left">

                                            <?php
                                            if ($row_artc['status'] == 0) {
                                                ?>
                                                <span class="label label-danger">
                                                    <?php echo "Failure"; ?>
                                                </span>
                                                <?php
                                            } else if ($row_artc['status'] == 1) {
                                                ?>
                                                <span class="label label-default">
                                                    <?php echo "Initiated"; ?>
                                                </span>
                                                <?php
                                            } else {
                                                ?>
                                                <span class="label label-success">
                                                    <?php echo "Success"; ?>
                                                </span>
                                                <?php
                                            }
                                            ?>

                                        </td>
                                        <td class="text-left"><?php echo $row_artc['pay_date'] ?></td>  

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