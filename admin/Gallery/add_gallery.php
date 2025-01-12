<?php
session_start();
include_once('../includes/header.php');
include_once('../includes/menu.php');
include_once ('../includes/conn.php');

if (isset($_SESSION['user_role']) || $_SESSION['user_role'] != '' || isset($_GET['id'])) {
    $user = $_SESSION['user_role'];
    $college_id = $_GET['id'];
    $id = $_SESSION['id'];
    
            
    
    
    ?>
    <li class="active">Gallery</li>
    </ul>
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">                                
                <h3 class="panel-title">List Of Images</h3>

                <ul class="panel-controls">
                    <li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>                   
                </ul>                                
            </div>
            <div class="panel-body">
                <table class="table dataTable table-bordered table-hover table-responsive">
                    <thead>
                        <tr>
                            <th width="75" class="text-center">#</th>
                            <th>Title</th>
                            <th>Image</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody style="font-size: 11px">
                        <?php
                        include("includes/conn.php");
                        
                            $res_gal = mysql_query("SELECT * FROM `aksee_gallery` WHERE `gallery_college_id`='$college_id' ");
                        
                        $i = 1;
                        while ($row_gal = mysql_fetch_assoc($res_gal)) {
                            ?>                                          
                            <tr>

                                <td class="text-center"><?php echo $i ?></td>
                                <td class="text-center"><?php echo $row_gal['gallery_title']; ?></td>
                                <td class="text-center"><?php echo "<img src='gallery/".$row_gal['gallery_img']."' alt='image' width='50' height='50' />"; ?></td>
                                <td>
                                <a href="add_gallery.php?id=<?php echo $row_gal['gallery_id']; ?>&deletemsg=true" ><span class="fa fa-trash-o text-primary"></span></a>
                            </td>

                            </tr>
                            <?php
                            $i++;
                        }
                        ?>
                    </tbody>
                </table>
                <?php
                $deletemsg = '';
                if (isset($_GET['deletemsg'])) {
                    $deletemsg = $_GET['deletemsg'];
                }
                ?>
                
            </div>
        </div>


        <div>&nbsp;</div>
        <div id="maindiv">

            <div id="formdiv">
                
                <form enctype="multipart/form-data" action="" method="post" id="gallery-add">
                    
                    <hr/>
                    <div id="filediv"><input name="file[]" type="file" id="file"/></div><br/>
                    <input type="text" name="title[]" id="title" value=""/>

                    <input type="button" id="add_more" class="upload" value="Add More Files"/>
                    <input type="submit" value="Upload File" name="submit" id="upload" class="upload"/>
                    <input type="hidden" name="college_id" value="<?php echo $college_id; ?>"/>
                </form>
                <br/>
                <br/>
                <!-------Including PHP Script here------>
                <?php include "gallery_upload.php"; ?>
            </div>
        </div>
        <?php
    }//closing of Outer if
    ?>
</div>
</div>
<?php include('includes/footer.php'); ?>

<?php include '../includes/scripts.php'; ?>
<script type="text/javascript" src="<?php echo $admin_base_url.$js_path; ?>plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js"></script> 
<script type="text/javascript" src="<?php echo $admin_base_url.$js_path; ?>/add-gallery.js"></script>
<script type="text/javascript" src="<?php echo $admin_base_url.$js_path; ?>plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js"></script> 
<script type="text/javascript" src="<?php echo $admin_base_url.$js_path; ?>plugins/datatables/jquery.dataTables.min.js"></script>

