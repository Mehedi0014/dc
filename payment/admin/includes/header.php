<?php session_start(); ?>
<html lang="en">
    <head>        
        <!-- META SECTION -->
        <?php
        if (!isset($_SESSION['username'])) {
            header("Location:index.php");
        } else {
            $user_name = $_SESSION['username'];
            $cid = $_SESSION['id'];
        }
        
        ?>
        <?php// include_once 'conn.php'; ?>
        <title><?php echo $application_name; ?></title>            
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <link rel="icon" href="favicon.ico" type="image/x-icon" />
        <!-- END META SECTION -->

        <!-- CSS INCLUDE -->        
        <link rel="stylesheet" type="text/css" id="theme" href="<?php echo $admin_base_url .$css_path; ?>theme-default.css"/>
        <link rel="stylesheet" type="text/css" id="theme" href="<?php echo $admin_base_url .$css_path; ?>style.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo $admin_base_url .$css_path; ?>datepicker.css" rel="stylesheet">
        
        <script
    src="https://code.jquery.com/jquery-1.6.4.min.js"
    integrity="sha256-lR1rrjnrFy9XqIvWhvepIc8GD9IfWWSPDSC2qPmPxaU="
crossorigin="anonymous"></script>
<script
			  src="http://code.jquery.com/ui/1.8.0/jquery-ui.min.js"
			  integrity="sha256-i1lZLWfq3HA69s3Vuo0Hf5+UhdAftkBVVWFDNfib6Zs="
			  crossorigin="anonymous"></script>
        <!--<link rel="stylesheet" type="text/css" id="theme" href="<?php echo $admin_base_url .$css_path; ?>style.css"/>-->
        <!-- EOF CSS INCLUDE -->
<!--        Custom CSS for import-excel module only-->
        <style>
            .tabs-menu {
    height: 30px;
    float: left;
    clear: both;
}

.tabs-menu li {
    height: 30px;
    line-height: 30px;
    float: left;
    margin-right: 10px;
    background-color: #ccc;
    border-top: 1px solid #d4d4d1;
    border-right: 1px solid #d4d4d1;
    border-left: 1px solid #d4d4d1;
}

.tabs-menu li.current {
    position: relative;
    background-color: #fff;
    border-bottom: 1px solid #fff;
    z-index: 5;
}

.tabs-menu li a {
    padding: 10px;
    text-transform: uppercase;
    color: #fff;
    text-decoration: none; 
}

.tabs-menu .current a {
    color: #2e7da3;
}

.tab {
    border: 1px solid #d4d4d1;
    background-color: #fff;
    float: left;
    margin-bottom: 20px;
    width: auto;
}

.tab-content {
    width: 660px;
    padding: 20px;
    display: none;
}

#tab-2 {
 display: block;   
}
.editableform {
    margin-bottom: 0;
}

.editableform .control-group {
    margin-bottom: 0; 
    white-space: nowrap; 
    line-height: 20px; 
}

.editable-buttons {
   display: inline-block; 
   vertical-align: top;
   margin-left: 7px;
   zoom: 1; 
   *display: inline;
}

.editable-input {
    vertical-align: top; 
    display: inline-block; 
    width: auto; 
    white-space: normal; 
    zoom: 1; 
    *display: inline;   
}

.editable-buttons .editable-cancel {
   margin-left: 7px; 
}

.editable-click, 
a.editable-click, 
a.editable-click:hover {
    text-decoration: none;
    border-bottom: dashed 1px #0088cc;
}

.editable-unsaved {
  font-weight: bold; 
}

.editable-bg-transition {
  -webkit-transition: background-color 1400ms ease-out;
  -moz-transition: background-color 1400ms ease-out;
  -o-transition: background-color 1400ms ease-out;
  -ms-transition: background-color 1400ms ease-out;
  transition: background-color 1400ms ease-out;  
}
        </style>
        
    </head>