<?php
session_start();

$total_price = 0;
$total_item = 0;

$output = '
<div class="table-responsive" id="order_table">
    <table class="table table-bordered table-striped">
        <tr>  
            <th width="40%">Product Name</th>  
            <th width="10%">Quantity</th>  
            <th width="20%">Price(INR)</th>  
            <th width="15%">Total(INR)</th>  
            <th width="5%">Action</th>  
        </tr>
    ';
    if(!empty($_SESSION["shopping_cart"]))
    {
        foreach($_SESSION["shopping_cart"] as $keys => $values)
        {
            $output .= '
                <tr>
                    <td>'.$values["product_name"].'</td>
                    <td>'.$values["product_quantity"].'</td>
                    <td align="right">'.$values["product_price"].'</td>
                    <td align="right">&#x20B9; '.number_format(filter_var($values["product_price"], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION),2).'</td>
                    <td><button name="delete" class="btn btn-danger btn-xs delete" id="'. $values["product_id"].'">Remove</button></td>
                </tr>
            ';
            $total_price = $total_price + (float)(filter_var($values["product_price"], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION));
        }
        $output .= '
            <tr>  
            <td colspan="3" align="right">Total</td>  
            <td align="right">&#x20B9; '.number_format($total_price, 2).'</td>  
            <td></td>  
            </tr>
            ';
    }
    else
    {
        $output .= '
            <tr>
                <td colspan="5" align="center">
                Your Cart is Empty!
                </td>
            </tr>
            ';
    }
    $output .= 
    '</table>
</div>';

echo $output;
?>