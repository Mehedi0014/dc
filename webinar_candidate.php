<?php include_once 'common/header.php'; ?>
<?php
// $sql_content1 = "SELECT * FROM `page` WHERE `alias` = 'courses' and status = '0'";
// $res_content1 = mysqli_query($con, $sql_content1) or trigger_error("Query Failed! SQL: $sql_content1 - Error: " . mysqli_error(), E_USER_ERROR);
// $row_content1 = mysqli_fetch_assoc($res_content1);


// if (isset($_SESSION['cust_id'])) {
    
    $qry_cust = "SELECT * FROM `customer_registration` WHERE id = '" . $_SESSION['cust_id'] . "'";
    // $qry_cust = "select * from customer_registration where id = '" . $_SESSION['cust_id'] . "'";
    $res_cust = mysqli_query($con, $qry_cust);
    $row_cust = mysqli_fetch_array($res_cust);
    
    
    

    
    $user_type = $row_cust['user_type'];
    
    // var_dump($user_type);
    // exit();
    

    
?>
<!--== Page Header Area Start ==-->
<section id="page-header" style="background-image: url(<?php echo $base_url . $document_page_banner . $row_content1['banner_img']; ?>)">
    <div class="container">
        <div class="row">
            <!-- Page Title Start -->
            <div class="col-lg-12 text-center">
                <div class="page-title">
                    <h2>Webinar Candidates</span></h2>
                </div>

                <div class="page-breadcrum">
                    <ol>
                        <li><a href="<?php echo $base_url; ?>">Home</a></li>


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
                        <h2>Candidates for Webinar</h2>
                        <br>
                    </div>
                    <?php
                    if($user_type === '10'){
                    ?>
                        <table class="table table-hover">
                          <thead>
                            <tr>
                              <th scope="col">Sl.</th>
                              <th scope="col">Candidate Details</th>
                              <th scope="col">Course Name</th>
                              <!--<th scope="col">Handle</th>-->
                            </tr>
                          </thead>
                          
                          <?php
    
    $sql_user = "SELECT * FROM `webinar_apply`";
    $res_user = mysqli_query($con, $sql_user);
    
    

    
    // $qry_user = "SELECT * FROM `customer_registration` WHERE id = '$user_id'";
    
    // var_dump($qry_user);
    


    $sl = 1;
	while($row_user = mysqli_fetch_array($res_user)){
	    
	  $user_id = $row_user['user_id'];
    $webinar_id = $row_user['course_id'];
    
    $webinar_id1 = (explode(",",$webinar_id));
    
    $qry_user = "SELECT * FROM `customer_registration` WHERE id = '$user_id'";
    //  var_dump($qry_user);
    //  exiit();
    $res_user1 = mysqli_query($con, $qry_user);
	    
	 $row_user  = mysqli_fetch_assoc($res_user1);
	        
    $first_name = $row_user['first_name'];
    $last_name = $row_user['last_name'];
    $phone = $row_user['phone'];
    $email = $row_user['email'];
    
    $crsString = array();
                
                    foreach($webinar_id1 as $c => $cvs){
                    
                    $qry = "SELECT * FROM `webiner` WHERE id = $cvs";
                    $res = mysqli_query($con, $qry);
                    $result  = mysqli_fetch_assoc($res);
                    
                    $name = $result['name'];
    
                    
                    array_push($crsString, $name);
                    
                    }
                    
                    $msg_send = "";
                    foreach ($crsString as $k => $v ){
                            $msg_send .= $k+1 . ". " .$v .'<br>'; 
                        }
    
    // var_dump($user_id);
    // var_dump($first_name);
    // var_dump($last_name);
    // var_dump($phone);
    // var_dump($email);
    // var_dump($msg_send);
    // exit();
    ?>
    
                          
                          <tbody>
                            <tr>
                              <th scope="row"><?php echo $sl?></th>
                              <td><?php echo $row_user['first_name']?>
                              <?php echo $row_user['last_name']?><br>
                              <?php echo $row_user['phone']?><br>
                              <?php echo $row_user['email']?>
                              </td>
                              <td><?php echo $msg_send?></td>
                              <!--<td>@mdo</td>-->
                            </tr>
                                
    <?php
    $sl ++;
	}
    ?>
    
            
                          </tbody>
                        </table>
            
                    
                    <?php
                    }
                    ?>
    

    <?php
// }
?>



        
        

    </div>        
</section>


<!--== Service Area End ==-->
<?php include_once 'common/footer.php'; ?> 