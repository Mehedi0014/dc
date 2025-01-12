<?php
 include_once ('admin/includes/conn.php'); 
 require_once("e-learningCoursesfunctionalities.php");
    session_start();
    if(isset($_SESSION['cust_user'])&&(($_SESSION['cust_user'] === "fahimrahman864@gmail.com")|| ($_SESSION['cust_user'] === "praloy@disseminare.com"))){
        $date = date('Y-m-d');
        $url = "https://disseminare.talentlms.com/api/v1/courses/";
        $request = "GET";
        $getResponse = new APIFunctionalities();
        
        $response = $getResponse->setupCurlConnection($url, $request);
        $response = json_decode($response, true);
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
        if($res_insert_course){
            $_SESSION["success_msg1"] = "Courses update Successfully";
            header("Location: e-learning.php");
        }else{
            $_SESSION["error_msg1"] = "Failed to update courses";
            header("Location: e-learning.php");
        }
    }else{
        header("Location: e-learning.php");
    }
?>