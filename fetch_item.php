<?php
session_start();

include_once ('admin/includes/conn.php'); 


$qry_fetch = "SELECT * from elearning_courses ORDER BY name ASC";
$res_fetch = mysqli_query($con, $qry_fetch);


$user = $_SESSION['cust_id'];
$query = "SELECT * FROM `user_course_paid` where user_id = '$user'";
$resource = mysqli_query($con, $query);
$row = mysqli_num_rows($resource);
$row_fetch = mysqli_fetch_assoc($resource);


$course_id = $row_fetch['course_id'];
$course_id = json_decode($course_id, true);
?>


<div class="table-responsive" id="order_table">
    <table class="table table-bordered table-striped">
        <tr>  
            <th width="10%">Select</th>  
            <th width="10%">Product ID</th>  
            <th width="50%">Name</th>  
            <th width="30%">Price(INR)</th>  
        </tr>

        <?php
        while($result = mysqli_fetch_assoc($res_fetch)){
            // foreach($response as $result){
            $priceTotal =(float)(filter_var($result["price"], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION));
            if($priceTotal !== 0.00){
                // $assign = preg_replace('/&#x20B9;/', '',$result['price']);
                $assign = $result['price'];
                // $assign = substr($assignlen,-4);
                if(empty($course_id)){
                    $showeach = false;
                }else{
                    $showeach = array_search($result['tnlt_course_id'], $course_id);
                }

                if($showeach === false){
                    ?>
                        <tr>
                            <td><input type="checkbox" class="select_product" data-product_id="<?=$result['tnlt_course_id']?>" data-product_name="<?=$result["name"]?>" data-product_details="<?=$result['details']?>" data-product_price="<?=$assign;?>" value=""></td>
                            <td>pi_<?=$result["tnlt_course_id"]?></td>
                            <td><?=$result["name"]?></td>
                            <td align="right"><?php echo $assign; ?></td>
                        </tr>
                    <?php
                }
            }
        }
        ?>
    </table>
</div>
