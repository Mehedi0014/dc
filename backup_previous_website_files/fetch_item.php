<?php
//fetch_item.php
 include_once ('admin/includes/conn.php'); 
// include('database_connection.php');
// $query = "SELECT * FROM tbl_product ORDER BY id ASC";
$query = "SELECT * FROM elearning_courses ORDER BY id ASC";
$resource = mysqli_query($con, $query);
$row = mysqli_num_rows($resource);
?>
<div class="table-responsive" id="order_table">
 <table class="table table-bordered table-striped">
  <tr>  
            <th width="10%">Select</th>  
            <th width="50%">Name</th>  
            <th width="40%">Price</th>  
        </tr>

<?php
if($row> 0)
{
    while($result = mysqli_fetch_assoc($resource)){
    ?>
    <tr>
        <td><input type="checkbox" class="select_product" data-product_id="<?=$result['id']?>" data-product_name="<?=$result["name"]?>" data-product_details="<?=$result['details']?>" data-product_price="<?=$result['price']?>" value=""></td>
        
        <td><?=$result["name"]?></td>
        <td align="right"><?=$result['price']?></td>
    </tr>
    <?php
    
    }?>
    </table>
</div>
    <?php
    // echo $output;
}

?>
