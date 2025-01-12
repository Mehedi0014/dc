<?php include_once 'common/header.php'; ?>
<?php
$sql_content1 = "SELECT * FROM `page` WHERE `alias` = 'training' and status = '0'";
$res_content1 = mysqli_query($con, $sql_content1) or trigger_error("Query Failed! SQL: $sql_content1 - Error: " . mysqli_error(), E_USER_ERROR);
$row_content1 = mysqli_fetch_assoc($res_content1);
?>
<style>
    /*    ul li {
        list-style-type: disc;
    }*/
</style>

<!--== Page Header Area Start ==-->
<section id="page-header" style="background-image: url(<?php echo $base_url . $document_page_banner . $row_content1['banner_img']; ?>)">
    <div class="container">
        <div class="row">
            <!-- Page Title Start -->
            <div class="col-lg-12 text-center">
                <div class="page-title">
                    <h2><?php echo $row_content1['title'] ?></span></h2>
                </div>

                <div class="page-breadcrum">
                    <ol>
                        <li><a href="<?php echo $base_url; ?>">Home</a></li>

                        <li class="active"><a href="<?php echo $base_url; ?>training.php"><?php echo $row_content1['title'] ?></a></li>
                    </ol>
                </div>
            </div>
            <!-- Page Title End -->
        </div>
    </div>
</section>
<!--== Page Header Area End ==-->

<!--== Service Area Start ==-->
<section id="home2-service" class="section-padding">
    <div class="container">
        <div class="row">

            <?php
            if (isset($_SESSION['mail_succ'])) {
                echo '<p style="color: green;">' . $_SESSION['mail_succ'] . '</p>';
                unset($_SESSION['mail_succ']);
            }
            if (isset($_SESSION['mail_fail'])) {
                echo '<p style="color: red;">' . $_SESSION['mail_fail'] . '</p>';
                unset($_SESSION['mail_fail']);
            }
            ?>
            <?php
            $q = "SELECT count(*) as `numrows` FROM training where status = '0' ORDER BY `sort`";
            $c = mysqli_query($con, $q);
            if ($c) {
                if ($t = mysqli_fetch_assoc($c)) {
                    $numrows = $t['numrows'];
                }
            }
            //$numrows = 0;
            $rowsperpage = 6;
            $currpage = isset($_REQUEST['currpageno']) && $_REQUEST['currpageno'] != 0 ? $_REQUEST['currpageno'] : 1;
            $numpages = ceil($numrows / $rowsperpage);
            $startrow = ($currpage - 1) * $rowsperpage;
            if ($startrow > $numrows) {
                $startrow = $numrows - $rowsperpage;
            }
            if ($startrow < 0) {
                $startrow = 0;
            }


            $qry_training = "select * from training where status = '0' order by sort LIMIT " . $startrow . "," . $rowsperpage . "";
            $res_training = mysqli_query($con, $qry_training);

            while ($row_training = mysqli_fetch_array($res_training)) {
                ?>
                <!-- Single Service Start -->
                <div class="col-lg-6 col-md-6 ">
                    <div class="home2-single-service">
                        <div class="row">
                            <!-- Single Service Thumb -->

                            <!-- Single Service Thumb -->

                            <!-- Single Service Content -->

                            <div class="col-lg-12 col-md-12">
                                <div class="display-table">
                                    <div class="display-table-cell">
                                        <div class="service-content">
                                            <h3 class="training_h3">
                                                <?php echo $row_training['name'] ?>
                                            </h3>
                                            <?php
                                            echo html_entity_decode($row_training['description']);
                                            ?>
                                            <br>
                                            <a class="theme-btn" data-toggle="modal" href="#inquiry_<?php echo $row_training['id'] ?>">Know More</a>

                                            <!--------START MODAL FOR ADD BANK FORM-------->
                                            <div class="modal fade" id="inquiry_<?php echo $row_training['id'] ?>" tabindex="-1" role="basic" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                            <h4 class="modal-title"><?php echo $row_training['name'] ?></h4>
                                                        </div>
                                                        <form method="post" action="<?php echo $base_url; ?>training_inquiry.php" enctype="multipart/form-data">
                                                            <div class="modal-body"> 

                                                                <table class="table">
                                                                    <tr>
                                                                        <td>Name: </td>
                                                                        <td>
                                                                            <input type="hidden" name="training" value="<?php echo $row_training['name'] ?>" required="required">
                                                                            <input type="text" name="name" required="required"> </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Email: </td>
                                                                        <td><input type="email" name="email" required="required"> </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Message: </td>
                                                                        <td><textarea type="text" name="message" required="required"></textarea> </td>
                                                                    </tr>


                                                                </table>


                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn green" name="Submit">Submit</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <!-- /.modal-content -->
                                                </div>
                                                <!-- /.modal-dialog -->
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Single Service Content -->
                        </div>
                    </div>
                </div>
                <!-- Single Service End -->

                <?php
            }
            ?>
            <!--            </div>-->

            <!-- Single Service End -->
        </div>


        <div class="container">   
            <div class="row">
                <div class="col-lg-12 col-md-12 col-xs-12 text-center">
                    <!-- Page Pagination Start -->
                    <div class="page-pagi">
                        <nav aria-label="Page navigation example" style="display:inline-block">
                            <ul class="pagination">
                                <li class="page-item"><a class="page-link" href="<?php echo $base_url; ?>training.php?currpageno=1"><span class="sr-only">Prev</span><i class="fa fa-angle-left" aria-hidden="true"></i></a></li>

                                <?php
                                if (!isset($_GET['currpageno']) || ($_GET['currpageno'] <= '5')) {

                                    if ($numpages < 6) {

                                        for ($pgno = 1; $pgno <= $numpages; $pgno++) {
                                            if (isset($_GET['currpageno'])) {
                                                if ($_GET['currpageno'] == $pgno) {
                                                    $act_cls = 'active';
                                                } else {
                                                    $act_cls = '';
                                                }
                                            }
                                            ?>
                                            <li class="page-item <?php echo $act_cls; ?>"><a class="page-link" href="<?php echo $base_url; ?>training.php?currpageno=<?php echo $pgno; ?>"><?php echo $pgno; ?> </a></li>

                                            <?php
                                        }
                                    } else {
                                        for ($pgno = 1; $pgno <= 6; $pgno++) {
                                            if (isset($_GET['currpageno'])) {
                                                if ($_GET['currpageno'] == $pgno) {
                                                    $act_cls = 'active';
                                                } else {
                                                    $act_cls = '';
                                                }
                                            }
                                            ?>
                                            <li class="page-item <?php echo $act_cls; ?>"><a class="page-link" href="<?php echo $base_url; ?>training.php?currpageno=<?php echo $pgno; ?>"><?php echo $pgno; ?> </a></li>

                                            <?php
                                        }
                                    }
                                } else {
                                    $pgno1 = $_GET['currpageno'] - 3;


                                    // if( ($_GET['currpageno'] + 3 != $numpages) || ($_GET['currpageno'] + 2 != $numpages) || ($_GET['currpageno'] + 1 != $numpages) || ($_GET['currpageno'] != $numpages) ){

                                    if (( $numpages >= ($_GET['currpageno'] + 3))) {

                                        $numpages = $_GET['currpageno'] + 3;
                                    }

                                    for ($pgno = $pgno1; $pgno <= $numpages; $pgno++) {
                                        if (isset($_GET['currpageno'])) {
                                            if ($_GET['currpageno'] == $pgno) {
                                                $act_cls = 'active';
                                            } else {
                                                $act_cls = '';
                                            }
                                        }
                                        ?>
                                        <li class="page-item <?php echo $act_cls; ?>"><a class="page-link" href="<?php echo $base_url; ?>training.php?currpageno=<?php echo $pgno; ?>"><?php echo $pgno; ?> </a></li>

                                        <?php
                                    }
                                }
                                ?>
                                <li class="page-item"><a class="page-link" href="<?php echo $base_url; ?>training.php?currpageno=<?php echo $numpages; ?>"><span class="sr-only">Next</span><i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
                            </ul>
                        </nav>
                    </div>
                    <!-- Page Pagination End -->
                </div>
            </div>

        </div>

    </div>


</section>







<!--== Service Area End ==-->
<?php include_once 'common/footer.php'; ?> 