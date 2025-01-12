<?php include_once 'common/header.php'; ?>
<?php
$sql_content1 = "SELECT * FROM `page` WHERE `alias` = 'blog' and status = '0'";
$res_content1 = mysqli_query($con, $sql_content1) or trigger_error("Query Failed! SQL: $sql_content1 - Error: " . mysqli_error(), E_USER_ERROR);
$row_content1 = mysqli_fetch_assoc($res_content1);
?>

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
                        <li><a href="#">Knowledge Center</a></li>
                        <li class="active"><a href="<?php echo $base_url; ?>blog.php"><?php echo $row_content1['title'] ?></a></li>
                    </ol>
                </div>
            </div>
            <!-- Page Title End -->
        </div>
    </div>
</section>
<!--== Page Header Area End ==-->

<!--== Page Content Start ==-->
<section id="blog-page" class="section-padding">
    <div class="container">
        <div class="row">

            <?php
            $q = "SELECT count(*) as `numrows` FROM blog where status = '0' order by sort";
                $c = mysqli_query($con, $q);
                if ($c) {
                    if ($t = mysqli_fetch_assoc($c)) {
                        $numrows = $t['numrows'];
                    }
                }
                //$numrows = 0;
                $rowsperpage = 9;
                $currpage = isset($_REQUEST['currpageno']) && $_REQUEST['currpageno'] != 0 ? $_REQUEST['currpageno'] : 1;
                $numpages = ceil($numrows / $rowsperpage);
                $startrow = ($currpage - 1) * $rowsperpage;
                if ($startrow > $numrows) {
                    $startrow = $numrows - $rowsperpage;
                }
                if ($startrow < 0) {
                    $startrow = 0;
                }


                $qry_blog = "select * from blog where status = '0' order by sort LIMIT " . $startrow . "," . $rowsperpage . "";
                $res_blog = mysqli_query($con, $qry_blog);

                while ($row_blog = mysqli_fetch_array($res_blog)) {
                ?>

                <!-- Single Blog Start -->

                <div class="col-md-4">
                    <div class="latest-single-blog">
                        <div class="latest-blog-thum latest-blog-thum-<?php echo $row_blog['id']; ?>" style="background-image: url(<?php echo $base_url . $document_page_blog . $row_blog['banner_img'] ?>)"></div>
                        <div class="latest-blog-content">
                            <h3><a href="<?php echo $base_url; ?>post/<?php echo $row_blog['alias']; ?>"><?php echo $row_blog['title']; ?></a></h3>
                            <div class="latest-blog-meta">
                                <a href="#"><?php echo $row_blog['blog_date']; ?></a>
                                
                            </div>
                            <?php
                            /**
                                echo substr(html_entity_decode($row_blog['body']), 0, 200);
                                ?>
                                */?>
                            <br>
                            <a href="<?php echo $base_url; ?>post/<?php echo $row_blog['alias']; ?>" class="theme-btn">Read More</a>
                        </div>
                    </div>
                </div>
                <!-- Single Blog End -->
                <?php
            }
            ?>


        </div>
         <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-xs-12 text-center">
                <!-- Page Pagination Start -->
                <div class="page-pagi">
                    <nav aria-label="Page navigation example" style="display:inline-block">
                        <ul class="pagination">
                            <li class="page-item"><a class="page-link" href="<?php echo $base_url; ?>blog.php?currpageno=1"><span class="sr-only">Prev</span><i class="fa fa-angle-left" aria-hidden="true"></i></a></li>

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
                                    <li class="page-item <?php echo $act_cls; ?>"><a class="page-link" href="<?php echo $base_url; ?>blog.php?currpageno=<?php echo $pgno; ?>"><?php echo $pgno; ?> </a></li>

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
                                    <li class="page-item <?php echo $act_cls; ?>"><a class="page-link" href="<?php echo $base_url; ?>blog.php?currpageno=<?php echo $pgno; ?>"><?php echo $pgno; ?> </a></li>

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
                                <li class="page-item <?php echo $act_cls; ?>"><a class="page-link" href="<?php echo $base_url; ?>blog.php?currpageno=<?php echo $pgno; ?>"><?php echo $pgno; ?> </a></li>

                                <?php
                            }
                        }
                        ?>
                        <li class="page-item"><a class="page-link" href="<?php echo $base_url; ?>blog.php?currpageno=<?php echo $numpages; ?>"><span class="sr-only">Next</span><i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
                    
                        </ul>
                    </nav>
                </div>
                <!-- Page Pagination End -->
            </div>
        </div>
         </div>
    </div>
</section>
<!--== Page Content End ==-->
<?php include_once 'common/footer.php'; ?> 