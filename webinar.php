<?php include_once 'common/header.php'; ?>
<?php
$sql_content1 = "SELECT * FROM `page` WHERE `alias` = 'courses' and status = '0'";
$res_content1 = mysqli_query($con, $sql_content1) or trigger_error("Query Failed! SQL: $sql_content1 - Error: " . mysqli_error(), E_USER_ERROR);
$row_content1 = mysqli_fetch_assoc($res_content1);

if (isset($_SESSION['cust_id'])) {

    $qry_cust = "select * from customer_registration where id = '" . $_SESSION['cust_id'] . "'";
    $res_cust = mysqli_query($con, $qry_cust);
    $row_cust = mysqli_fetch_array($res_cust);
    $phone = $row_cust['phone'];
}
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

                        <li class="active"><a href="<?php echo $base_url; ?>all_courses.php"><?php echo $row_content1['title'] ?></a></li>
                    </ol>
                </div>
            </div>
            <!-- Page Title End -->
        </div>
    </div>
</section>
<!--== Page Header Area End ==-->

<!--== Service Area Start ==-->
<section id="blog-page" class="section-padding">
    <div class="container">
        <div class="row">

            <div class="course_all">
                <!--<div class="float-right"><a href="http://disseminare.com/page/past-assignment" class="theme-btn">Past Assignments</a></div>-->
                <div class="float-right"><a href="http://disseminare.com/past_assignment.php" class="theme-btn">Past Assignments</a></div>
            </div>
        </div>

    </div>
    <!-- Single Service End -->\

</section>
<?php
	if(isset($_GET['success'])){
		?>
			<div class="alert alert-success alert-dismissible fade show" role="alert">
				<strong><?=$_GET['success']?></strong>
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
	}else if(isset($_GET['result'])){
		?>
			<div class="alert alert-danger alert-dismissible fade show" role="alert">
				<strong><?=$_GET['result']?></strong>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
		<?php
	}
?>
                
                
                
<!--== Service Area Start ==-->
<section id="blog-page">
    <div class="container">

        <div class="row">

            <div class="course_all">
                
                <?php
                
                $qry_course_check = "SELECT * from webiner WHERE status = 0";
                $res_course_check = mysqli_query($con, $qry_course_check);
                $row_coures_count = mysqli_num_rows($res_course_check);

                
                ?>
                
      
      <div class="row-card-course">
          
                        <?php
                        $modal_id = 0;
				while($result_course  = mysqli_fetch_assoc($res_course_check)){
				// foreach($response as $result_course){
				    $priceTotal =(float)(filter_var($result_course["price"], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION));
				    // if($priceTotal !== 0.00){
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
            <!--<small>Price</small>-->
            <small>Free</small>
            <div class="price"><?=$result_course['price'];?></div>
          </div>
        </div>
        <div class="course-card-foot">
          <!--<img align="left" class="not-img course-card-foot-img" src="http://www.personalbrandingblog.com/wp-content/uploads/2017/08/blank-profile-picture-973460_640-300x300.png">-->
          <div class="course-card-foot-name main-name">
          <?=$result_course['date'];?> <br/>
          </div>
          <div class="course-card-foot-name main-name">
            Webinar <br/>
            
            
          </div>
          
          
          
          
          
            <!-- Trigger the modal with a button -->
              <!--<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal<?=$modal_id?>">View Details</button>-->
              <form action="<?=$base_url?>webinar_details.php" method="POST">
                  <input type="hidden" name="crs" value="<?=$result_course['id']?>"/>
                  <input type="submit" name="submit" value="View More" class="btn btn-primary"/>
                  <!--<a class = "btn btn-primary" href="<?=$base_url?>course_details.php?crs="></a>-->
              </form>
            <p><br></p>


          	</div>
        </div>
        </div>
    </div>	
				        
				        <?php
				    // }

				}
				?>
       
      
  
		 
 </div>


			<!--<a href="<?=$base_url?>buy_course.php" class="button button2">To get the courses click here</a><br/>-->
			
  </body>
  
                
            </div>
            
        </div>
        
        <?php if (isset($_SESSION['cust_user'])) {
        ?>
                            <form method="post" action="<?php echo $base_url; ?>db_webinerapply.php">
                            <div class="form-row">

                                <div class="form-group">
                                <h6>Select Webinar that you are interested*</h6>
        <?php
                $qry_course_check = "SELECT * from webiner WHERE status = 0";
                $res_course_check = mysqli_query($con, $qry_course_check);
                            
                while($result_course  = mysqli_fetch_assoc($res_course_check)){
                    
                ?>
                    

                                <p><input type="checkbox" name="course[]" value="<?=$result_course['id']?>" /> <?=$result_course['name']?></p>

                <?php
                }
                ?>
                                     </div>
                                </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    </form>

                                
        <?php
        } else {
        ?>
                                                <div align="center" style="font-size:16px; padding-top: 10px; padding-bottom: 10px">
                                        <h4>Please Log in to register for webinar</h4>
                                        <p><br></p>
                                        <a href="<?php echo $base_url; ?>login.php" class="theme-btn">Log in</a>
                                        <br><br>

                                      
                                        </div>
                <?php
        }
        ?>
                                
        <div class="section-top-border">
				<div class="row">
					<div class="col-lg">
						<!--<h3 class="mb-30">Form Element</h3>-->
      <!--                  <form method="post" action="<?php echo $base_url; ?>db_webinerapply.php">-->
      <!--                      <div class="form-row">-->
      <!--                          <div class="form-group col-md-6">-->
      <!--                          <label for="inputName">Name*</label>-->
      <!--                          <input class="form-control" id="name" name="name" type="text" placeholder="Name" required>-->
      <!--                          </div>-->
      <!--                          <div class="form-group col-md-6">-->
      <!--                          <label for="inputEmail">Email*</label>-->
      <!--                          <input class="form-control" type= "email" name= "email" id="email" placeholder="Email" required>-->
      <!--                          </div>-->
      <!--                      </div>-->
      <!--                      <div class="form-row">-->
      <!--                          <div class="form-group col-md-6">-->
      <!--                          <label for="inputPhone">Mobile*</label>-->
      <!--                          <input class="form-control" id="mobile" name = "mobile" type="text" placeholder="Mobile" required>-->
      <!--                          </div>-->
      <!--                          <div class="form-group col-md-6">-->
      <!--                          <label for="inputQualification">Qualification*</label>-->
      <!--                          <input  class="form-control" id="qualification" name = "qualification" type="text" placeholder="Qualification"required>-->
      <!--                          </div>-->
      <!--                      </div>-->
      <!--                      <div class="form-group">-->
      <!--                          <label for="inputMsg">Message</label>-->
      <!--                          <textarea rows="7" class="form-control" name="message" id="message" placeholder="About Yourself *" required></textarea>-->
      <!--                      </div>-->
      <!--                      <div class="form-row">-->

      <!--                          <div class="form-group">-->
      <!--                          <h6>Select Course*</h6>-->
                               <?php
                                // $qry_course_check = "SELECT * from webiner WHERE status = 0";
                                // $res_course_check = mysqli_query($con, $qry_course_check);
                                
                                // while($result_course  = mysqli_fetch_assoc($res_course_check)){
                                    
                                ?>
                                    <!--<p><input type="checkbox" name="course[]" value="<?=$result_course['name']?>" /> <?=$result_course['name']?></p>-->
                                <?php
                                // }
                                ?>
           <!--                     <p><input type="checkbox" name="course[]" value="Blockchain fundamentals" /> Blockchain fundamentals</p>-->
           <!--                     <p><input type="checkbox" name="course[]" value="Blockchain advanced" /> Blockchain advanced</p>-->
           <!--                     <p><input type="checkbox" name="course[]" value="Covid 19 What's Next for you" /> Covid 19 What's Next for you</p>-->
           <!--                     <p><input type="checkbox" name="course[]" value="Know yourself" /> Know yourself</p>-->
           <!--                     <p><input type="checkbox" name="course[]" value="Financial Modelling in default projection in Banks" /> Financial Modelling in default projection in Banks</p>-->

           <!--                      <div class="switch-wrap d-flex justify-content-between">-->
						     <!--   <p>Software Development Engineer</p>-->
						     <!--   <div class="primary-checkbox">-->
							    <!--<input type="checkbox" id="job" name= "job[]">-->
							    <!--<label for="default-checkbox"></label>-->
							    <!--</div>-->
							    <!--</div> -->
							    <!--</div>-->
                                
                            <!--</div>-->
                            <!--<button type="submit" class="btn btn-primary">Submit</button>-->
                            <!--</form>-->
                            <p><br></p>
                            <p><br></p>
                    </div>
                </div>
        </div>


    </div>
    <!-- Single Service End -->
    
    



</section>


<!--== Service Area End ==-->
<?php include_once 'common/footer.php'; ?> 