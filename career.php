<?php include_once 'common/header.php'; ?>
<?php
$sql_content1 = "SELECT * FROM `page` WHERE `alias` = 'career' and status = '0'";
$res_content1 = mysqli_query($con, $sql_content1) or trigger_error("Query Failed! SQL: $sql_content1 - Error: " . mysqli_error(), E_USER_ERROR);
$row_content1 = mysqli_fetch_assoc($res_content1);
?>
<style>
    iframe{
        height: 278px;
        width: 100%;
    }
</style>
<!--== Page Header Area Start ==-->
<section id="page-header" style="background-image: url(<?php echo $base_url . $document_page_banner . $row_content1['banner_img']; ?>)">
    <div class="container">
        <div class="row">
            <!-- Page Title Start -->
            <div class="col-lg-12 text-center">
                <div class="page-title">
                    <h2><?php echo $row_content1['title'] ?></h2>
                </div>

                <div class="page-breadcrum">
                    <ol>
                        <li><a href="<?php echo $base_url; ?>">Home</a></li>
                        <li class="active"><a href="<?php echo $base_url; ?>contact-us.php"><?php echo $row_content1['title'] ?></a></li>
                    </ol>
                </div>
            </div>
            <!-- Page Title End -->
        </div>
    </div>
</section>
<!--== Page Header Area End ==-->



<!--<section>
    <div class="container">
        

    </div>

</section>-->


<section id="contact-page" class="section-padding">


    <div class="container">

        
        <?php
        $accord_html = '';
        $optionshtml = '<select name="jobindex" class="form-control">';
        $sql_jobq = "SELECT * FROM job where status='0'";
        $res_jobq = mysqli_query($con, $sql_jobq) or trigger_error("Query Failed! SQL: $sql_content1 - Error: " . mysqli_error(), E_USER_ERROR);
        $rowcount = mysqli_num_rows($res_jobq);
        $i=1;
        $addClass= '';
        $level = '';
        if($rowcount != 0){
            while($row = mysqli_fetch_assoc($res_jobq)){
                switch ($i){
                    case 1:
                        $level = 'One';
                        $addClass = null;
                    break;
                    case 2:
                        $level = 'Two';
                        $addClass = 'class="collapsed"';
                    break;
                    case 3:
                        $level = 'Three';
                        $addClass = 'class="collapsed"';
                    break;
                    default :
                        exit;
                }
                $optionshtml .= '<option value="' .$row['id'] . '">' .$row['title']. '</option>';
                $accord_html .= '<div class="panel panel-default">
      <div class="panel-heading" role="tab" id="heading'. $level. '">
        <h4 class="panel-title">
        <a '. (is_null($addClass) ? ' ' : $addClass) . ' role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse'.$level .'" aria-expanded="true" aria-controls="collapse'. $level .'">'.
         $row['title']. 
        '</a>
      </h4>
      </div>
      <div id="collapse'. $level . '" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading'.$level. '">
        <div class="panel-body">'.html_entity_decode($row['description']).
          
        '</div>
      </div>
    </div>'; 
                $i++;
            }
            $optionshtml .= '</select>';
        }
        
        ?>
        <!-- <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="job-list">
                    <div class="accordion-option">
                        <h3 class="title">Current Openings</h3>
                        <a href="javascript:void(0)" class="toggle-accordion active" accordion-id="#accordion"></a>
                    </div>
                    <div class="clearfix"></div>
                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <?php echo (!empty($accord_html)) ? $accord_html : '<h4>Currently no openings found</h4>'?>
                    </div>
                </div>
            </div>
        </div> -->

        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="section-title">
                    <h2>Coming Soon</h2>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-10 m-auto">
                <div class="contact-form-contant">
                    <h3>Drop Your Resume Here</h3>
                    <form method="post" action="<?php echo $base_url; ?>db_cvapply.php" enctype="multipart/form-data">
                        <div class="row">
                            <!-- Name Input Start -->
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <input class="form-control" id="name" name="name" type="text" placeholder="Your Name *" required>
                                </div>
                            </div>
                            <!-- Name Input End -->

                            <!-- Email Input Start -->
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <input class="form-control" id="email" name="email" type="email" placeholder="Your Email *" required>
                                </div>
                            </div>
                            <!-- Email Input End -->

                            <!-- Subject Input Start -->
                            <!-- Subject Input Start -->
                            <div class="col-lg-6  col-md-6">
                                <div class="form-group">
                                    <input class="form-control" id="mobile" name="mobile" type="text" placeholder="Phone *" required>
                                </div>
                            </div>
                            <!-- Subject Input End -->

                            <!-- City Input Start -->
                            <div class="col-lg-6  col-md-6">
                                <div class="form-group">
                                    <input class="form-control" id="qualification" type="text" name="qualification" placeholder="Qualification *" required>
                                </div>
                            </div>
                            <!-- City Input End -->
                            <div class="col-lg-6  col-md-6">
                                <div class="form-group">
                                    <input class="form-control" id="jobexp" name="jobexp" type="text" placeholder="Past Job experience(in Years) *" required>
                                </div>
                            </div>
                            
                            <div class="col-lg-6  col-md-6">
                                <div class="form-group">
                                    <input class="form-control" id="langp" name="langp" type="text" placeholder="Language proficiency *" required>
                                </div>
                            </div>
                            <!-- Message Input Start -->
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <textarea rows="7" class="form-control" name="message" id="message" placeholder="About Yourself *" required></textarea>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <?php echo (!empty($optionshtml)) ? $optionshtml: '<label>Please send your resume to us</label>'?>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <input type="file" name="file" id="file" required>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 d-flex justify-content-center" style="margin-bottom: 20px;">
                                <div class="g-recaptcha" data-sitekey="6LexbeAZAAAAAHiATrG1buOrmL3srgZbkp0XIjuD"></div>
                            </div>
                            

                            <!-- Submit Input Start -->
                            <div class="col-lg-12 text-center">
                                <div id="success">
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
                                </div>
                                <button id="sendMessageButton" class="theme-btn" type="submit">Send Now <i class="fa fa-send-o"></i></button>
                            </div>
                            <!-- Submit Input End -->
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>



<?php include_once 'common/footer.php'; ?> 