<?php include_once 'common/header.php'; ?>
<?php
$course = trim($_GET['crs']);
if(isset($_GET['crs']) && empty($_GET['crs'])){
    $_SESSION['error_msg1'] = "Invalid data passing";
    header("Location: e-learning.php");
    exit;
}
// $qry_course_check = "SELECT * from elearning_courses Order by name ASC";
// $res_course_check = mysqli_query($con, $qry_course_check);
$qry_course_check = "SELECT * from elearning_courses where id = '$course'";
$res_course_check = mysqli_query($con, $qry_course_check);
$row_course_cnt = mysqli_num_rows($res_course_check);
if($row_course_cnt === 0){
    $_SESSION['error_msg1'] = "This course is not exists.";
    header("Location: e-learning.php");
    exit;
}
$sql_content1 = "SELECT * FROM `page` WHERE `alias` = 'course-details' and status = '0'";
$res_content1 = mysqli_query($con, $sql_content1) or trigger_error("Query Failed! SQL: $sql_content1 - Error: " . mysqli_error(), E_USER_ERROR);
$row_content1 = mysqli_fetch_assoc($res_content1);
?>


<style>
    .button2 {
    	
    	box-shadow: 3px 3px 5px #999;
    }
    @media screen and (max-width: 700px) {
        video {
        	width: 100% !important;
        	height: auto;
        }
        .button2 {
        	font-size: 15px !important;
        }
        
    }
    
</style>
  <section id="page-header" style="background-image: url(<?php echo $base_url . $document_page_banner . $row_content1['banner_img']; ?>)">
    <div class="container">
        <div class="row">
            <!-- Page Title Start -->
            <div class="col-lg-12 text-center">
                <div class="page-title">
                    <h2>E-learning Course Details</h2>
                </div>

                <div class="page-breadcrum">
                    <ol>
                        <li><a href="<?php echo $base_url; ?>">Home</a></li>
                        <li><a href="<?php echo $base_url; ?>e-learning_courses.php">E-learning</a></li>
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
                    <h2>Course <span>Details</span></h2>
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
                        
                        <!-- <h5>Price(INR) <?=$result_course['price'];?></h5> -->
                        <p><br></p>
                            <a href="#">
                              <img class="not-img img-res" src="<?=$result_course['image'];?>">
                            </a>
                    <p><br></p>
                    <p><?=$result_course['details'];?></p>
                    
                    <?php 
                        if($result_course['video'] != null){
                    ?>
                    <video width="560" height="315" controls>
                    <source src="<?=$result_course['video'];?>" type="video/mp4"></video>
                    <!--<div class="embed-responsive embed-responsive-16by9 w-50">-->
                    <!--  <iframe class="embed-responsive-item" src="<?=$result_course['video'];?>?autostart=0" allowfullscreen></iframe>-->
                    <!--</div>-->
                    <?php
                        }
                    ?>
                    </div>
                </div>
                
                    <p><br></p>
                    </div>
                    
                    <!-- <a href="<?php
                        /* if($result_course['id'] === "942"){
                            echo "https://youtube.com/playlist?list=PLt1cMpqMskmL42Vd4vFsxG_VQW-ngpLCG";
                        }else{
                            echo $base_url."buy_course.php";
                        } */
                    ?>" class="button button2">To get the course click here</a> -->
                    
                    <br/>
                     <!--<a href="https://youtube.com/playlist?list=PLt1cMpqMskmL42Vd4vFsxG_VQW-ngpLCG" class="button button2">To get the course click here</a><br/>-->
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
                    <h3>Author</h3>
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
