<?php include_once 'common/header.php'; ?>
<?php
$sql_content1 = "SELECT * FROM `page` WHERE `alias` = 'management-team' and status = '0'";
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
                    <h2><?php echo $row_content1['title'] ?></h2>
                </div>

                <div class="page-breadcrum">
                    <ol>
                        <li><a href="<?php echo $base_url; ?>">Home</a></li>
                        <li><a href="#">About Us</a></li>
                        <li class="active"><a href="<?php echo $base_url; ?>management.php"><?php echo $row_content1['title'] ?></a></li>
                    </ol>
                </div>
            </div>
            <!-- Page Title End -->
        </div>
    </div>
</section>
<!--== Page Header Area End ==-->

<!--== Team Area Start ==-->
<section id="team-area" class="section-padding">
    <div class="container">
        <div class="row">
            <!-- Team Member Thumb -->
            <div class="col-lg-2">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <?php
                    $qry_management = "select * from management where status = '0'  order by id";
                    $res_management = mysqli_query($con, $qry_management);
                    $num_management = mysqli_num_rows($res_management);
                    $i = 1;
                    while ($row_management = mysqli_fetch_array($res_management)) {
                        ?>
                        <li class="nav-item">
                            <a class="nav-link <?php echo $i == '1' ? 'active' : ''; ?>" id="member_one" data-toggle="tab" href="#<?php echo 'mamber_' . $row_management['id']; ?>" role="tab" aria-controls="<?php echo 'mamber_' . $row_management['id']; ?>" aria-selected="true">
                                <img src="<?php echo $base_url . $document_path_management . $row_management['banner_img']; ?>" alt="<?php echo $row_management['title']; ?>">
                            </a>
                        </li>
                        <?php
                        $i++;
                    }
                    ?>

                </ul>
            </div>
            <!-- Team Member Thumb -->

            <!-- Team Member Content -->
            <div class="col-lg-10">
                <div class="tab-content" id="myTabContent">


                    <?php
                    $qry_management2 = "select * from management where status = '0'  order by id";
                    $res_management2 = mysqli_query($con, $qry_management2);
                    $j = 1;
                    while ($row_management2 = mysqli_fetch_array($res_management2)) {
                        ?>

                        <div class="tab-pane fade show <?php echo $j == '1' ? 'active' : ''; ?>" id="<?php echo 'mamber_' . $row_management2['id']; ?>" role="tabpanel" aria-labelledby="<?php echo $row_management2['id'] . '_mamber'; ?>">
                            <div class="row">
                                <div class="col-lg-6">
                                    <img src="<?php echo $base_url . $document_path_management . $row_management2['banner_img']; ?>" alt="<?php echo $row_management2['title']; ?>">
                                </div>
                                <div class="col-lg-6">
                                    <div class="member-details">
                                        <h3><?php echo $row_management2['title']; ?></h3>
                                        <h5><?php echo $row_management2['designation']; ?></h5>
                                        <?php
                                        echo html_entity_decode($row_management2['body']);
                                        ?>
    <!--                                        <p>Lorem ipsum is dolor sit amet, consectetur adipisicing elit. Maiores voluptate temporad, expedied acusantium.</p>
                                        <div class="skill-process">
                                            <h3>Skills</h3>
                                            <div class="process-item">
                                                <span>Education  - 75%</span>
                                                <div class="progress">
                                                    <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%"></div>
                                                </div>
                                            </div>
                                            <div class="process-item">
                                                <span>Intelligence - 88%</span>
                                                <div class="progress">
                                                    <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 88%"></div>
                                                </div>
                                            </div>
                                            <div class="process-item">
                                                <span>Experience - 95%</span>
                                                <div class="progress">
                                                    <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="team-social-icon">
                                            <a href="#"><i class="fa fa-facebook"></i></a>
                                            <a href="#"><i class="fa fa-twitter"></i></a>
                                            <a href="#"><i class="fa fa-linkedin"></i></a>
                                            <a href="#"><i class="fa fa-dribbble"></i></a>
                                        </div>-->
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php
                        $j++;
                    }
                    ?>

                </div>
            </div>
            <!-- Team Member Content -->
        </div>
    </div>
</section>
<!--== Team Area End ==-->

<?php include_once 'common/footer.php'; ?> 