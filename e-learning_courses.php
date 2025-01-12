<?php include_once 'common/header.php'; ?>
<?php

require_once("e-learningCoursesfunctionalities.php");
$sql_content1 = "SELECT * FROM `page` WHERE `alias` = 'e-learning-course' and status = '0'";
$res_content1 = mysqli_query($con, $sql_content1) or trigger_error("Query Failed! SQL: $sql_content1 - Error: " . mysqli_error(), E_USER_ERROR);
$row_content1 = mysqli_fetch_assoc($res_content1);

// $user_id = $_SESSION['cust_id'];

if( !empty( $_SESSION && $_SESSION['cust_id'] != null ) ){
  $user_id = $_SESSION['cust_id'];
} else {
  $user_id = null;
}


$qry_course_paid = "SELECT * FROM `user_course_paid` WHERE `user_id` = '$user_id'";
$res_course_paid = mysqli_query($con, $qry_course_paid);
$row_course_paid = mysqli_num_rows($res_course_paid);
$result_course_paid = mysqli_fetch_assoc($res_course_paid);
if( is_null( $result_course_paid ) == false ) {
  $paidCourses = $result_course_paid["course_id"];
  $paidCourses = json_decode($paidCourses, true);
}

$date = date("y-m-d");
$qry_course_check = "SELECT * from elearning_courses WHERE updated_on = '$date'";
$res_course_check = mysqli_query($con, $qry_course_check);
$row_coures_count = mysqli_num_rows($res_course_check);



if($row_coures_count === 0){
    
    $url = "https://disseminare.talentlms.com/api/v1/courses/";
    $request = "GET";
    $getResponse = new APIFunctionalities();
    
    $response = $getResponse->setupCurlConnection($url, $request);
    $response = json_decode($response, true);
    
    // var_dump($response);
    // "<br>";

    if( is_null($response)  == false ) {
      foreach($response as $res){
          
          $tlnt_course_id_for = $res['id'];
          $qry_each_course = "SELECT * from elearning_courses WHERE tnlt_course_id = '$tlnt_course_id_for'";
          $res_each_course = mysqli_query($con, $qry_each_course);
          $row_each_course_count = mysqli_num_rows($res_each_course);
          if($row_each_course_count === 0){
              $tnlt_course_id = $res["id"];
              $name = $res["name"];
              $details = $res["description"];
              $price = filter_var($res["price"], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
              $created_on = $res["creation_date"]; 
              $status = $res["status"];
              $image = $res["big_avatar"];
              
              $qry_insert_course = "INSERT INTO `elearning_courses`(`tnlt_course_id`, `name`, `details`, `price`,`image`, `created_on`, `updated_on`, `status`) 
              VALUES ('$tnlt_course_id','$name','$details','$price','$image','$created_on', '$date','$status')";
              $res_insert_course = mysqli_query($con, $qry_insert_course);
          }
          else{
              $result = mysqli_fetch_assoc($res_each_course);
              $db_id = $result['id'];
              $tnlt_course_id = $res["id"];
              $name = $res["name"];
              $details = $res["description"];
              $price = filter_var($res["price"], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
              $created_on = $res["creation_date"]; 
              $status = $res["status"];
              $image = $res["big_avatar"];
              
              $qry_insert_course = " UPDATE `elearning_courses` SET `name`='$name',`details`='$details',`price`='$price',`image`='$image',`created_on`='$created_on',`updated_on`='$date',`status`='$status' WHERE id = '$db_id'";
              $res_insert_course = mysqli_query($con, $qry_insert_course);
          }
              
          }
      }
    }

$qry_course_check = "SELECT * from elearning_courses WHERE status ='active' Order by name ASC";
$res_course_check = mysqli_query($con, $qry_course_check);
?>




  <style>
    /**********************************
new design of course card
***********************************/
    .row-card-course {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      margin: 25px auto;
    }

    .row-card-course .course-card {
      margin-top: 15px;
      margin-bottom: 15px;
    }

    .row-card-course .course-card > .thumbnail {
      margin-left: 10px;
      margin-right: 10px;
    }

    .course-card .thumbnail {
      padding: 0;
      border: none;
      text-align: center;
      border-radius: 0;
      margin: 0 auto;
      width: 255px;
      background: transparent;
      font-family: "Open Sans", sans-serif;
      font-size: 14px;
      line-height: normal;
    }

    .course-card .thumbnail .full-length {
      height: 5px;
      width: 100%;
      background: #bcbcbc;
      display: block;
    }

    .course-card .thumbnail .current-length {
      height: 100%;
      width: 68%;
      background: red;
      display: block;
    }

    .course-card .course-card-image {
      width: auto;
      height: auto;
      margin-bottom: -40px;
      min-height: 190px;
    }

    .course-card .course-card-image > a {
      display: block;
      width: 100%;
      height: 100%;
      position: relative;
    }

    .course-card .course-card-image > a > img {
      width: 300px;
      height: 185px;
    }

    .course-card .course-card-image > a:before {
      position: absolute;
      content: "";
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      -moz-transition: 0.5s all;
      -o-transition: 0.5s all;
      -webkit-transition: 0.5s all;
      transition: 0.5s all;
    }

    .course-card .course-card-image > a:after {
      position: absolute;
      
      left: 0;
      top: 0;
      width: 100%;
      height: 166px;
      border: 0;
      background-image: url();
      background-repeat: no-repeat;
      background-position: center center;
      -moz-transition: 0.5s all;
      -o-transition: 0.5s all;
      -webkit-transition: 0.5s all;
      transition: 0.5s all;
      opacity: 0;
    }

    .course-card .course-card-image > a:hover:before {
      background-color: rgba(0, 0, 0, 0.5);
    }

    .course-card .course-card-image > a:hover:after {
      opacity: 1;
    }

    .course-card .thumbnail .caption {
      margin: 0 auto;
      width: 230px;
      /*min-height: 350px;*/
      padding: 10px;
      position: relative;
      box-sizing: border-box;
      background-color: #e9e9e9;
    }

    .course-card .course-title {
      min-height: 180px;
    }

    .course-title-heading {
      margin-top: 0;
      margin-bottom: 0;
    }

    .course-title-heading a {
      font-size: 22px;
      font-weight: 200;
      color: #444;
      text-decoration: none;
      display: inherit;
      line-height: 25px;
    }

    .course-title-heading a:hover {
      color: #222;
    }

    .course-card .btn-group {
      width: 100%;
    }

    .course-card .btn-group .course-card-btn {
      background: transparent;
      border-color: transparent;
      color: #444;
      font-size: 18px;
    }

    .course-card .course-fav-cost {
      border-top: 1px solid #bcbcbc;
      border-bottom: 1px solid #bcbcbc;
      width: 100%;
      height: auto;
      float: left;
      padding: 4px 0;
      text-align: left;
      margin: 10px auto;
    }

    .course-card .course-fav-cost .course-rating-star {
      padding-left: 0;
      width: 70%;
      float: left;
    }

    .course-card .course-fav-cost .course-rating-star img {
      height: 10px;
      width: auto;
    }

    .course-card .course-fav-cost .course-rating-star .course-rating {
      unicode-bidi: bidi-override;
      direction: rtl;
    }

    .course-card
      .course-fav-cost
      .course-rating-star
      .course-rating
      > span
      > span {
      display: inline-block;
      position: relative;
      width: auto;
      color: #2c5f00;
    }

    .course-card
      .course-fav-cost
      .course-rating-star
      .course-rating
      > span
      > span.active:before,
    .course-card
      .course-fav-cost
      .course-rating-star
      .course-rating
      > span
      > span.active
      ~ span:before {
      content: "\2605";
      position: absolute;
    }

    .course-card .course-fav-cost .course-fav-price {
      padding-right: 0;
      width: 30%;
      float: left;
    }

    .course-card .course-fav-cost .course-fav-price .price-dollar {
      color: #2c5f00;
      font-size: 15px;
      font-weight: 700;
      margin-top: 3px;
    }

    .course-card .course-fav-cost .price {
      padding-right: 0;
    }

    .course-card .course-fav-cost .price .price-dollar {
      color: #2c5f00;
      font-size: 12px;
      font-weight: 700;
      margin-top: 3px;
    }

    .course-card-foot img {
      width: 35px;
      height: 35px;
      padding: 0 10px 0 0;
      box-sizing: content-box;
    }

    .course-card-foot-name {
      text-align: left;
    }

    .course-card-foot .main-name {
      color: #444;
      font-size: 13px;
      height: 100%;
      line-height: 35px;
      text-align: left;
      display: table;
    }

    .course-card-foot .main-name:hover,
    .course-card-foot .main-name:focus {
      text-decoration: none;
    }
    /* new design of course card end */
    
    
    
    
    
    			.button {
			background-color: #4CAF50; /* Green */
			border: none;
			color: white;
			padding: 15px 32px;
			text-align: center;
			text-decoration: none;
			display: inline-block;
			font-size: 16px;
			/* margin: 4px 2px; */
			margin-right: auto;
			margin-left: auto;
			cursor: pointer;
			display: block;
			align: center;
			
			}
			.button2 {width: 50%;}
			.button3 {width: 10%;}
			
			
			
			
	
  </style>


  
  
  <section id="page-header" style="background-image: url(<?php echo $base_url . $document_page_banner . $row_content1['banner_img']; ?>)">
    <div class="container">
        <div class="row">
            <!-- Page Title Start -->
            <div class="col-lg-12 text-center">
                <div class="page-title">
                    <img src="<?php echo $base_url . $document_page_banner . $row_content1['banner_img']; ?>" style="display: none"/>
                    <h2>E-learning Course</h2>
                </div>

                <div class="page-breadcrum">
                    <ol>
                        <li><a href="<?php echo $base_url; ?>">Home</a></li>
						<li class="active"><a href="#">E-learning Courses</a></li>
						<!--<li class="active"><a href="#"><?php echo $row_content1['title'] ?></a></li>-->
                    </ol>
                </div>
            </div>
            <!-- Page Title End -->
        </div>
    </div>
</section>


<?php
	if(isset($_GET['course'])){
		?>
			<div class="alert alert-success alert-dismissible fade show" role="alert">
				<strong><?=$_GET['course']?></strong>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
		<?php
	}else if(isset($_GET['error'])){
		?>
			<div class="alert alert-danger alert-dismissible fade show" role="alert">
				<strong><?=$_GET['error']?></strong>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
		<?php
	}
?>
 
      <?php 
            if(isset($_SESSION['success_msg1'])){
                ?>
                <div class="container">
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                      <strong><?=$_SESSION['success_msg1'];?></strong>
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                </div>
                
                <?php
                
                unset($_SESSION['success_msg1']);
            }
          ?>
          <?php 
            if(isset($_SESSION['error_msg1'])){
                ?>
                <div class="container">
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                      <strong><?=$_SESSION['error_msg1'];?></strong>
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                </div>
                
                <?php
                
                unset($_SESSION['error_msg1']);
            }
          ?>
      
      
      <div class="row-card-course">
                        <?php
                        $modal_id = 0;
				while($result_course  = mysqli_fetch_assoc($res_course_check)){
				// foreach($response as $result_course){
				    $priceTotal =(float)(filter_var($result_course["price"], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION));
				    if($priceTotal !== 0.00 || $result_course["id"] === "942"){
				        ?>
  <div class="course-card">
    <div class="thumbnail">
      <div class="course-card-image">
        <a href="#">
          <img class="not-img img-res" src="<?=$result_course['image'];?>">
        </a>
        <br>
      </div>
      <div class="caption">
        <div class="course-title">
          <h3 class="course-title-heading">
            <a class="not-a"><?=$result_course['name'];?></a>
            <!--&nbsp;-->
          </h3>
          
        </div>
        <div class="course-fav-cost row">
          <div class="course-rating-star">
            <small></small>
            <br>
            <div class="course-rating">
              <!--<span><span> ☆</span><span class="active"> ☆</span><span> ☆</span><span> ☆</span><span> ☆</span></span>-->
            </div>
          </div>
          <div class="course-fav-price text-right">
            <!--<small>Price(&#8377)</small>-->
            <small>Price(INR)</small>
            <div class="price"><?=$result_course['price'];?></div>
          </div>
        </div>
        <div class="course-card-foot">
          <!--<img align="left" class="not-img course-card-foot-img" src="http://www.personalbrandingblog.com/wp-content/uploads/2017/08/blank-profile-picture-973460_640-300x300.png">-->
          <div class="course-card-foot-name main-name">
            Web Based Training <br/>
          </div>
          
          
          
          
          
            <!-- Trigger the modal with a button -->
  <a class="btn btn-info btn-lg" href="<?=$base_url?>course_details.php?crs=<?=$result_course['id']?>">View Details</a>
  <!--<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal<?=$modal_id?>">View Details</button>-->
  <!--<form action="<?=$base_url?>course_details.php" method="POST">-->
  <!--    <input type="hidden" name="crs" value="<?=$result_course['id']?>"/>-->
  <!--    <input type="submit" name="submit" value="View More" class="btn btn-primary"/>-->
      <!--<a class = "btn btn-primary" href="<?=$base_url?>course_details.php?crs="></a>-->
  <!--</form>-->
<p><br></p>
  <!-- Modal -->

          					<?php
          					$modal_id++;
						if($row_course_paid > 0){
							
							$check_course_sym = array_search($result_course['tnlt_course_id'], $paidCourses);
							if($check_course_sym !== false){
								?>
									<a class = "btn btn-primary btn-lg btn-block" href="<?=$base_url?>viewCourse.php?crs=<?=$result_course['tnlt_course_id']?>">Play</a>
								
								<?php
							}else{
								
							}
						}else{
							
						}
					?>
          
          	</div>
        </div>
        </div>
    </div>	
				        
				        <?php
				    }

				}
				?>
       
      
  
		 
 </div>


        <?php 
          if( !empty($_SESSION) ) {
            if( $_SESSION['cust_user'] === "fahimrahman864@gmail.com" || $_SESSION['cust_user'] === "praloy@disseminare.com" ) {
        ?>
          <a href="<?php echo $base_url?>ajax_request.php" class="button button2">Change courses</button><br/>
        <?php
            }
          }
        ?>
    
        <?php
          //if($_SESSION['cust_user'] === "fahimrahman864@gmail.com" || $_SESSION['cust_user'] === "praloy@disseminare.com"){
        ?>
          <!-- <a href="<?php //echo $base_url ?>ajax_request.php" class="button button2">Change courses</button><br/> -->
        <?php
          // } 
        ?>



          <a href="<?=$base_url?>buy_course.php" class="button button2">To get the courses click here</a><br/>
  </body>
  
  
  <script>
$('a[rel=popover]').popover();


</script>
  
  
  <?php include_once 'common/footer.php'; ?> 
