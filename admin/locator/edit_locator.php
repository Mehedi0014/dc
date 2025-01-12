<?php
session_start();
include_once ('../includes/conn.php');
if (isset($_SESSION['user_role']) || $_SESSION['user_role'] != '') {

    $user = $_SESSION['user_role'];
   // $cat_id = $_GET['id'];
    if ($user == '0') {

        include_once('../includes/header.php');
        include_once('../includes/menu.php');
    $artc_id = $_GET['id'];
    

        $qry_artc = "SELECT * FROM `locator` WHERE `id`= '$artc_id'";
        $res_artc = mysqli_query($con, $qry_artc) or trigger_error("Query Failed! SQL: $qry_artc - Error: " . mysqli_error(), E_USER_ERROR);
        $row_artc = mysqli_fetch_assoc($res_artc);
        ?>
        <li class="active">Location</li>
        </ul>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">                                
                        <h3 class="panel-title">Edit Location</h3>
                        <ul class="panel-controls">
                            <li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>                   
                        </ul>                                
                    </div>
                    <div class="panel-body">
                        <div id="edit_cms_form" class="row" >
                            <div class="col-md-12">
                                <form class="form-horizontal" name="editCMS" id="editCMS" method="post" action="db_edit_locator.php" enctype="multipart/form-data">
                                    <div class="panel panel-primary">
                                        <div class="panel-heading ui-draggable-handle">
                                            <?php
//                                            $qry_store1 = "select * from store_logo where id = '" . $row_artc['company'] . "'";
//                                            $res_store1 = mysqli_query($con, $qry_store1);
//                                            $row_store1 = mysqli_fetch_array($res_store1);
                                            ?>
                                            <h3 class="panel-title"><?php echo $row_artc['name'] ?></h3>
                                        </div>
                                        <div class="panel-body"> 
                                            <div class="form-group">
                                                <label class="col-md-3 col-xs-12 control-label">Customer-Vendor Name</label>
                                                <div class="col-md-6 col-xs-12">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                        <input type="text" name="st_name" class="form-control" id="page_title" value="<?php echo isset($row_artc['name']) ? $row_artc['name'] : ''; ?>"/>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="form-group">
                                                <label class="col-md-3 col-xs-12 control-label">Address</label>
                                                <div class="col-md-6 col-xs-12">
                                                    <div class="input-group">
                                                        <textarea name="editor1" id="editor1" rows="20" cols="100">
                                                            <?php echo isset($row_artc['address']) ? htmlspecialchars_decode($row_artc['address']) : ''; ?>                                                      
                                                        </textarea>
                                                    </div>

                                                </div>
                                            </div>

                                           
                                            <div class="form-group">
                                                <label class="col-md-3 col-xs-12 control-label">Google Map</label>
                                                <div class="col-md-6 col-xs-12">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                        <input type="text" name="map" class="form-control" id="page_title" value='<?php echo $row_artc['map']; ?>' >
        
                                                    </div>
                                                </div>
                                            </div>
                                          
                                            <div class="form-group">
                                                <label class="col-md-3 col-xs-12 control-label">Sort Number</label>
                                                <div class="col-md-6 col-xs-12">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                        <input type="text" name="sort" class="form-control" id="page_title" value="<?php echo isset($row_artc['sort']) ? $row_artc['sort'] : ''; ?>"/>
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

//    $(document).ready(function ()
//    {
//        //alert('Hello');
//
//        if ($("#site").val() == "gallery") {
//            $("#other2").show();
//
//        } else {
//            $("#other2").hide();
//
//        }
//
//        $("#site").change(function () {
//
//            if ($(this).val() == "gallery") {
//                $("#other2").show();
//
//            } else {
//                $("#other2").hide();
//
//            }
//        });
//    });


</script>   
<script type="text/javascript">
    $(document).ready(function () { /* PREPARE THE SCRIPT */
        default_city_dropdown();
        $("#all_state").change(function () { /* WHEN YOU CHANGE AND SELECT FROM THE SELECT FIELD */
            //var des = $("#des-id").val();

            var state = $("#all_state").val(); /* GET THE VALUE OF THE SELECTED DATA */
            var old_city = $("#old_city").val();
            var old_state = $("#old_state").val();
            //alert(state);
            var dataString = "state=" + state + "&old_city=" + old_city + "&old_state=" + old_state; /* STORE THAT TO A DATA STRING */

            $.ajax({/* THEN THE AJAX CALL */
                type: "POST", /* TYPE OF METHOD TO USE TO PASS THE DATA */
                url: "edit-city-filter.php", /* PAGE WHERE WE WILL PASS THE DATA */
                data: dataString, /* THE DATA WE WILL BE PASSING */
                success: function (result) { /* GET THE TO BE RETURNED DATA */
                    $("#city_choose").html(result); /* THE RETURNED DATA WILL BE SHOWN IN THIS DIV */
                }
            });

        });


    });
    function default_city_dropdown() {

        var city_id = $("#old_city").val();
        var state_id = $("#old_state").val();
        var new_state = $("#all_state").val();
        $.ajax({/* THEN THE AJAX CALL */
            type: "POST", /* TYPE OF METHOD TO USE TO PASS THE DATA */
            url: "edit-city-filter.php", /* PAGE WHERE WE WILL PASS THE DATA */
            data: {old_city: city_id, old_state: state_id, state: new_state}, /* THE DATA WE WILL BE PASSING */
            success: function (result) { /* GET THE TO BE RETURNED DATA */
                $("#city_choose").html(result); /* THE RETURNED DATA WILL BE SHOWN IN THIS DIV */
            }
        });
    }


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
