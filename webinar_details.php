<?php include_once 'common/header.php'; ?>
<?php
$course = trim($_POST['crs']);
// $qry_course_check = "SELECT * from elearning_courses Order by name ASC";
// $res_course_check = mysqli_query($con, $qry_course_check);
$qry_course_check = "SELECT * from webiner where id = '$course'";
$res_course_check = mysqli_query($con, $qry_course_check);



?>



  <section id="page-header" style="background-image: url(<?php echo $base_url . $document_page_banner . $row_content1['banner_img']; ?>)">
    <div class="container">
        <div class="row">
            <!-- Page Title Start -->
            <div class="col-lg-12 text-center">
                <div class="page-title">
                    <h2>Webiner Details</h2>
                </div>

                <div class="page-breadcrum">
                    <ol>
                        <li><a href="<?php echo $base_url; ?>">Home</a></li>
						<li class="active"><a href="#"><?php echo $row_content1['title'] ?></a></li>
                    </ol>
                </div>
            </div>
            <!-- Page Title End -->
        </div>
    </div>
</section>
<?php
	while($result_course  = mysqli_fetch_assoc($res_course_check)){
	   
?>
<!--== About Area Start ==-->
<section id="about-area" class="section-padding">
    <div class="container">
        <div class="row">
            <!-- Section Title Start -->
            <div class="col-lg-12 text-center">
                <div class="section-title">
                    <h2>Webinar <span>Details</span></h2>
                </div>
            </div>
            <!-- Section Title End -->
        </div>
    </div>

    <!-- About Content Start -->

    <div class="about-content-wrap">
        <div class="container">
            <div class="row">
                <!-- About Text Area -->
                <div class="col-lg">
                    <div class="about-text-area">
                        <h2><?=$result_course['name'];?></h2>
                        
                        <h5> Free</h5>
                        <p><br></p>
                            <a href="#">
                              <img class="not-img img-res" src="
                              <?
                              //=$result_course['image'];
                              ?>
                              ">
                            </a>
                    <p><br></p>
                    <p><?
                    // =$result_course['details'];
                    ?></p>
                    <iframe src="<?=$result_course['pdf'];?>" width="100%" height="1200px">
                    </iframe>

                    </div>
                </div>
                
                    <p><br></p>
                    </div>
                    <a href="<?=$base_url?>webinar.php" class="button button2">Go back to Webinar Page</a><br/>
                <!-- About Text Area v-popup -->
            </div>
        </div>
    </div>
    <!-- About Content End -->

</section>
<!--== About Area End ==-->


<?php
}
?>
<section id="team-area" class="section-padding">
    <div class="container">
        <div class="row">
            <!-- Team Member Content -->
            <div class="col-lg">
                <div class="tab-content" id="myTabContent">
                    <?php
                    $qry_management2 = "select * from author where id= '1'  order by id";
                    $res_management2 = mysqli_query($con, $qry_management2);
                    while ($row_management2 = mysqli_fetch_array($res_management2)) {
                        ?>
                    <h3>Presenter</h3>
                    <div class="col-lg">
                        <img src="<?php echo $base_url . $document_path_management . $row_management2['img']; ?>"style="width:100px;height:100px;">
                    </div>
                    <div class="col-lg">
                    <!--<h5>PRALOY MAJUMDER </h5>-->
                    <h5><?=$row_management2['name'];?></h5>
                    <!--<p><b>Founder & CEO</b><br> Disseminare Consulting</p>-->
                    <p><b><?=$row_management2['designation'];?></b></p>
                    <?php
                    echo html_entity_decode($row_management2['about']);
                    ?>
	                <a class = "btn btn-primary" href="<?=$base_url?>management.php">More Details about Author</a>
	                </div>
	                <?php
	                }
	                ?>
                </div>
            </div>
            <!-- Team Member Content -->
        </div>
    </div>
</section>
<!--== Team Area End ==-->








  <script>
$('a[rel=popover]').popover();


</script>
  
  
  <?php include_once 'common/footer.php'; ?> 
