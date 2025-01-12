<?php include_once 'common/header.php'; ?>

<?php
$course = trim($_POST['crs']);
// $qry_course_check = "SELECT * from elearning_courses Order by name ASC";
// $res_course_check = mysqli_query($con, $qry_course_check);
$qry_course_check = "SELECT * from elearning_courses where id = '$course'";
$res_course_check = mysqli_query($con, $qry_course_check);

?>