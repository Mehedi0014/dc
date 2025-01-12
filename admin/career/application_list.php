<?php
session_start();
include("../includes/conn.php");
include_once('../includes/header.php');
include_once('../includes/menu.php');


if (isset($_SESSION['user_role']) || $_SESSION['user_role'] != '') {
    $user = $_SESSION['user_role'];
    if ($user == '0') {
        ?>
        <li class="active">Job Applications</li>
        </ul>
        <div class="row">

            <div class="col-md-12">
                <!--Page addition start here-->


            </div>

            <!--Page addition end here-->

            <div class="panel panel-default">
                <div class="panel-heading">                                
                    <h3 class="panel-title">Job Applications</h3>
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
                    <div class="row">
                        <button id="downloadIntermidiate" class="dwn-btn" style="text-align:center;">download All</button>
                        
                    </div>
                    <div class="table-responsive">
                        <table class="table dataTable table-bordered table-hover table-responsive">
                            <thead>
                                <tr>
                                    <th width="75" class="text-left">#</th>
                                    <th>Posts</th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Qualification</th>
                                    <th>Job Exp.</th>
                                    <th>Lang. Proficiency</th>
                                    <th>Comment</th>
                                    <th>Date</th>
                                    <th>CV</th>
                                    <th>Delete Application</th>
            <!--                                <th>Delete Banner Image</th>-->
                                </tr>
                            </thead>
                            <tbody style="font-size: 11px">
                                <?php
//                                include("includes/conn.php");
                                $qry_artc = "SELECT * FROM `applications` order by id desc";
                                $res_artc = mysqli_query($con, $qry_artc);
                                $i = 1;
                                while ($row_artc = mysqli_fetch_assoc($res_artc)) {
                                    ?>                                          
                                    <tr>
                                        <td class="text-left"><?php echo $i ?></td>
                                        <?php
                                        if ($row_artc['job'] != 0) {
                                            $qry_list = "select * from job where id = '" . $row_artc['job'] . "'";
                                            $res_list = mysqli_query($con, $qry_list);
                                            $row_list = mysqli_fetch_array($res_list);
                                        }
                                        ?>
                                        <td class="text-left"><?php echo strtoupper($row_list['title']) ?></td>
                                        <td class="text-left"><?php echo strtoupper($row_artc['name']) ?></td>
                                        <td class="text-left"><?php echo $row_artc['phone'] ?></td>
                                        <td class="text-left"><?php echo $row_artc['email'] ?></td>
                                         <td class="text-left"><?php echo $row_artc['qualification'] ?></td>
                                          <td class="text-left"><?php echo $row_artc['job_experience'] ?></td>
                                           <td class="text-left"><?php echo $row_artc['language_p'] ?></td>
                                        <td class="text-left"><?php echo $row_artc['comment'] ?></td>
                                        <td class="text-left"><?php echo $row_artc['date'] ?></td>

                                        <td>
                                            <a href="<?php echo $base_url . $document_cv_path . $row_artc['cv']; ?>" target="_blank"><span class="fa fa-pencil text-primary">&nbsp;</span>Download</a>
                                        </td>
                                        <td>
                                            <a href="delete_application.php?id=<?php echo $row_artc['id']; ?>"><span class="fa fa-trash-o text-primary">&nbsp;</span>Delete</a>
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
            </div>    

            <div>&nbsp;</div>
        </div>
        </div>
        <?php
    }//colsing of outer if
}//closing of inner if
?>
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
<script src="<?php echo $base_url; ?>assets/js/jquery.table2excel.js"></script>



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

    $("#downloadIntermidiate").click(function(){
                        
                        $.ajax({
                    type: "POST",
                    url: "export.php",
                    data: {action: "exportData"},
                    cache: false,
                    dataType: "json",
                    success: function(data){
                            var $a = $("<a>");
                            $a.attr("href",data.file);
                             $("body").append($a);
                            $a.attr("download","file.xls");
                            $a[0].click();
                            $a.remove();
                    
                   },
                   error: function (jqXHR, status, err) {
                        $("#error_message").show().html("Invalid Request made");
                        setTimeout(function() {
					$('#error_message').fadeOut("slow");
				}, 2000 );
                    },
                   complete: function (jqXHR, status) {
                     
                    }
                });
                        
                         });



</script>

