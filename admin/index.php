<?php
include("includes/conn.php");
?>
<html lang="en" class="body-full-height">
    <head>        
        <!-- META SECTION -->
        <title><?php echo $application_name; ?></title>            
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <link rel="icon" href="favicon.ico" type="image/x-icon" />
        <!-- END META SECTION -->

        <!-- CSS INCLUDE -->        
        <link rel="stylesheet" type="text/css" id="theme" href="<?php echo $css_path; ?>theme-default.css"/>
        <!-- EOF CSS INCLUDE --> 

    </head>
    <body>
        <div class="login-container">
            <?php include_once 'includes/message.php'; ?>
            <div class="login-box animated fadeInDown">
                <!--<div class="login-logo"></div>-->
                <div class="login-body">
                    
                    <div class="login-title">Login&nbsp;To&nbsp;<strong><?php echo $application_name; ?></strong> </div>
                    <div class="text-success"><strong>
                            <?php
                            if (isset($_GET['msg1'])) {
                                $msg = $_GET['msg1'];
                                echo $msg;
                            }
                            ?>
                        </strong>
                    </div>
                    <div>
                        <?php
                        if (isset($_GET['errinvaliduser'])) {
                            $msg = $_GET['errinvaliduser'];
                            ?>
                            <h6 style="color:#C00;"><b>
                                    <?php
                                    echo $msg;
                                }
                                ?>
                            </b></h6>
                    </div><br/>
                    <form action="db_login.php" class="form-horizontal" method="post" name="frm_login">
                        <div class="form-group">
                            <div class="col-md-12">
                                <input type="text" class="form-control" placeholder="Username" title="Username is required!" name="user_name" required/>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <input type="password" class="form-control" placeholder="Password" title="Password is required!" name="pwd" required/>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6">
                                &nbsp;
                            </div>
                            <div class="col-md-6">
                               
                                <input type="submit" class="btn btn-success btn-block" value="Log In" />
                            </div>
                        </div>
                    </form>
                </div>
                <div class="login-footer">
                    <div class="pull-left"> 
                    </div>
                    <div class="pull-right">
                        Developed&nbsp;By&nbsp;<a href="<?php echo $developer_url ?>"><?php echo $developer_name; ?></a> 
                    </div>
                </div>
            </div>

        </div>

    </body>
    <?php include 'includes/scripts.php'; ?>
</html>






