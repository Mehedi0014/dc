<?php include_once 'common/header.php'; ?>
<?php
$sql_content2 = "SELECT * FROM `page` WHERE `alias` = 'blog' and status = '0'";
$res_content2 = mysqli_query($con, $sql_content2) or trigger_error("Query Failed! SQL: $sql_content2 - Error: " . mysqli_error(), E_USER_ERROR);
$row_content2 = mysqli_fetch_assoc($res_content2);

$sql_blog1 = "SELECT * FROM `blog` WHERE `alias` = '$post_key' and status = '0'";
$res_blog1 = mysqli_query($con, $sql_blog1) or trigger_error("Query Failed! SQL: $sql_blog1 - Error: " . mysqli_error(), E_USER_ERROR);
$row_blog1 = mysqli_fetch_assoc($res_blog1);
?>

<!--== Page Header Area Start ==-->
<section id="page-header" style="background-image: url(<?php echo $base_url . $document_page_banner . $row_content2['banner_img']; ?>)">
    <div class="container">
        <div class="row">
            <!-- Page Title Start -->
            <div class="col-lg-12 text-center">
                <div class="page-title">
                    <h2><?php echo $row_blog1['title'] ?></span></h2>
                </div>

                <div class="page-breadcrum">
                    <ol>
                        <li><a href="<?php echo $base_url; ?>">Home</a></li>
                        <li><a href="<?php echo $base_url; ?>blog.php">Blog</a></li>
                        <li class="active"><a href="<?php echo $base_url; ?>post/<?php echo $row_blog1['alias'] ?>"><?php echo $row_blog1['title'] ?></a></li>
                    </ol>
                </div>
            </div>
            <!-- Page Title End -->
        </div>
    </div>
</section>
<!--== Page Header Area End ==-->


<!--== Page Content Start ==-->
<section id="single-blog-page" class="section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-7 col-xs-12 text-justify">
                <div class="blog-details-content">
                    <h2><?php echo $row_blog1['title'] ?></h2>
                    <div class="blog-preview-crousel">
                        <div class="single-blog-preview">
                            <?php if ($row_blog1['banner_img'] != '') { ?>
                                <img src="<?php echo $base_url . $document_page_blog . $row_blog1['banner_img'] ?>" alt="<?php echo $row_blog1['title']; ?>"> 
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
                    <div class="blog-details-info blog-content">
                        <h4><?php 
                        echo $row_blog1['blog_date'];
                        //echo date('d-m-Y', strtotime($row_blog1['creation_date'])); ?></h4>
                        <?php
                        echo html_entity_decode($row_blog1['body']);
                        ?>

                    </div>
                </div>
            <div class="col-lg-5 col-md-5 col-xs-12 text-justify">
               
                <div class="post-details-content">
                    <h4>Blog Categories</h4>
                     </div>
                    
                    <div class="post-details-catagory">
                        <div class="row">
                          
                              <img data-wow-delay="0.2s" src="http://disseminare.com/newsite//upload/media/20-12-18_1545287944.jpg" alt="" class="img-responsive wow zoomIn animated">
                              &nbsp;
                       
                              <h6><a class="ex1" href="default.asp">Ways to solve Indian Banking Crisis.</a></h6>
                        
                    </div>
                        
                       
                        
                        
                </div>
            </div>
            
            </div>


        </div>
    </div>
</section>
<!--== Page Content End ==-->

<?php include_once 'common/footer.php'; ?> 