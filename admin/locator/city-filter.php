<?php
include_once '../includes/conn.php';
$state = $_POST['state'];
?>
<div class="form-group">
    <label class="col-md-3 col-xs-12 control-label">City</label>
    <div class="col-md-6 col-xs-12">
        <div class="input-group">
            <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
            <select name="city" class="form-control" id="">
                <?php
                $qry_sel_city = "select * from city where state = '$state'";
                
                $res_sel_city = mysqli_query($con, $qry_sel_city);
                while($row_sel_city = mysqli_fetch_array($res_sel_city)){
                ?>
                <option value="<?php echo $row_sel_city['city'] ?>"><?php echo $row_sel_city['city'] ?></option> 
                <?php
                }
                ?>
            </select>
        </div>
    </div>
</div>
<br>