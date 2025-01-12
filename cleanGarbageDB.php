<?php
    ob_start();
    include_once("./admin/includes/conn.php");
    deletedatabase($con);
    function deletedatabase($conn = null){
        $deleted = 0;
        $ndel = 0;
        if($conn != null){
            $chk_seven_date = new DateTime();
            $tosub = new DateInterval('P7D'); // 7 Days
            $chk_seven_date->sub($tosub);
            $chk_seven_date = $chk_seven_date->format("Y-m-d H:i:s");
            
            $chk_two_date = new DateTime();
            $tosub = new DateInterval('PT00H05M'); // 7 Days
            $chk_two_date->sub($tosub);
            $chk_two_date = $chk_two_date->format("Y-m-d H:i:s");
            
            $qry_usr = "SELECT * FROM customer_registration where (date_registration > '$chk_seven_date' and date_registration <= '$chk_two_date') and validation <> '852' Order By id ASC";
            // $qry_usr = "SELECT * FROM customer_registration where date_registration > '$chk_seven_date' and validation <> '852' Order By id ASC";
            $res_usr = mysqli_query($conn, $qry_usr);
            while($row_usr = mysqli_fetch_assoc($res_usr)){
                $idu = $row_usr['id'];
                $del_user = "DELETE FROM `customer_registration` WHERE id = '$idu'";
                $res_usr_del = mysqli_query($conn, $del_user);
                
            }
            
            $qry_usr_foleder = "SELECT * FROM user_folder Order By userid ASC";
            $res_usr_foleder = mysqli_query($conn, $qry_usr_foleder);
            while($row_usr_foleder = mysqli_fetch_assoc($res_usr_foleder)){
                $userid = $row_usr_foleder['userid'];
                $id = $row_usr_foleder['id'];
                $qry_usr_new_foleder = "SELECT * FROM customer_registration WHERE id = '$userid'";
                $res_usr_new_foleder = mysqli_query($conn, $qry_usr_new_foleder);
                if(mysqli_num_rows($res_usr_new_foleder) === 0){
                    $delete_sql = "DELETE FROM `user_folder` WHERE id = '$id'";
                    $res_usr_new_foleder_del = mysqli_query($conn, $delete_sql);
                    $deleted++;
                }else{
                    $ndel++;
                }
            }
            
        }else{
            
        }
    }
    ob_end_flush();
?>