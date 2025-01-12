<?php include_once 'common/header.php'; ?>
<?php
$sql_content1 = "SELECT * FROM `page` WHERE `alias` = 'e-learning-course' and status = '0'";
$res_content1 = mysqli_query($con, $sql_content1) or trigger_error("Query Failed! SQL: $sql_content1 - Error: " . mysqli_error(), E_USER_ERROR);
$row_content1 = mysqli_fetch_assoc($res_content1);
?>
<style>
    iframe{
        height: 278px;
        width: 100%;
    }
</style>
<!--== Page Header Area Start ==-->
<section id="page-header" style="background-image: url(<?php echo $base_url . $document_page_banner . $row_content1['banner_img']; ?>)">
    <div class="container">
        <div class="row">
            <!-- Page Title Start -->
            <div class="col-lg-12 text-center">
                <div class="page-title">
                    <h2>E-learning Course</h2>
                </div>

                <div class="page-breadcrum">
                    <ol>
                        <li><a href="<?php echo $base_url; ?>">Home</a></li>
                        <li class="active"><a href="#"><?php echo $row_content1['title'] ?></a></li>
                    </ol>
                </div>
            </div>
            <!-- Page Title End -->
        </div>
    </div>
</section>

<section id="blog-page" class="section-padding">
    <div class="container">
        <div class="row">
            <div class="course_all">
                <div class="container">
                        <div class="row">
                            <?php if (isset($_SESSION['cust_user'])) {
                                ?>
                                <div class="container">
                                    <br />
                                    <h3 align="center"><a href="#">E-learning Course List</a></h3>
                                    <br />

                                    <?php 
                                    if(isset($_GET['errmsg'])){
                                        $msg = $_GET['errmsg'];
                                    
                                    ?>
                                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                        <h6><?=$msg;?></h6>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>

                                        <br />
                                    
                                        <br />
                                    <?php
                                        }
                                    ?>
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                        <div class="row">
                                            <div class="col-md-6">Product List</div>
                                                <div class="col-md-6" align="right">
                                                    <button type="button" name="add_to_cart" id="add_to_cart" class="btn btn-success btn-xs">Add to Cart</button>
                                                    <button type="button" name="check" id="check" class="btn btn-success btn-xs">Select All</button>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="panel-body" id="display_item">
                                        

                                        </div>

                                        <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <div class="row">
                                                <div class="col-md-6">Cart Details</div>
                                                <div class="col-md-6" align="right">
                                                    <button type="button" name="clear_cart" id="clear_cart" class="btn btn-warning btn-xs">Clear</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel-body" id="shopping_cart">
                                        </div>
                                        <div class="col-md-6"></div>
                                            <div class="col-md-6" align="right">
                                                <button type="input" name="add_to_cart" class="btn btn-success btn-xs"><a style="color:white;" href="<?=$base_url;?>payment/PayUMoney_form.php">Check out</a></button>
                                            </div>

                                        </div>

                                    </div>
                                </div>

                                <?php
                                    } else {
                                        ?>
                                        <div class="container">
                                        <div class="row">
                                        <h4 style="font-size:16px; padding-top: 10px; padding-bottom: 10px">Please Log in to buy courses<br></h4> <br>
                                        </div>
                                        </div>

                                        <a href="<?php echo $base_url; ?>login.php" class="theme-btn">Log in</a>
                                        <?php
                                    }
                                    ?>
                                </div>
                            </div>


                        </div>
                        <?php
                    
                    ?>


                </div>

            </div>
            <?php
                
                ?>

            </div>
        </div>

    </div>
    <!-- Single Service End -->
</section>
<??>
<?php include_once 'common/footer.php'; ?> 

<script>  
$(document).ready(function(){

 load_product();

 load_cart_data();
    
 function load_product()
 {
  $.ajax({
   url:"fetch_item.php",
   method:"POST",
   success:function(data)
   {
    $('#display_item').html(data);
   }
  });
 }

 function load_cart_data()
 {
  $.ajax({
   url:"fetch_cart.php",
   method:"POST",
   success:function(data)
   {
    $('#shopping_cart').html(data);
   }
  });
 }

 $(document).on('click', '.select_product', function(){
  var product_id = $(this).data('product_id');
  if($(this).prop('checked') == true)
  {
   $('#product_'+product_id).css('background-color', '#f1f1f1');
   $('#product_'+product_id).css('border-color', '#333');
  }
  else
  {
   $('#product_'+product_id).css('background-color', 'transparent');
   $('#product_'+product_id).css('border-color', '#ccc');
  }
 });

 $('#add_to_cart').click(function(){
  var product_id = [];
  var product_name = [];
  var product_price = [];
  var action = "add";
  $('.select_product').each(function(){
   if($(this).prop('checked') == true)
   {
    product_id.push($(this).data('product_id'));
    product_name.push($(this).data('product_name'));
    product_price.push($(this).data('product_price'));
   }
  });

  if(product_id.length > 0)
  {
   $.ajax({
    url:"action.php",
    method:"POST",
    data:{product_id:product_id, product_name:product_name, product_price:product_price, action:action},
    success:function(data)
    {
     $('.select_product').each(function(){
      if($(this).prop('checked') == true)
      {
       $(this).attr('checked', false);
       var temp_product_id = $(this).data('product_id');
       $('#product_'+temp_product_id).css('background-color', 'transparent');
       $('#product_'+temp_product_id).css('border-color', '#ccc');
      }
     });

     load_cart_data();
     alert("Item has been Added into Cart");
    }
   });
  }
  else
  {
   alert('Select atleast one item');
  }

 });

 $(document).on('click', '.delete', function(){
  var product_id = $(this).attr("id");
  var action = 'remove';
  if(confirm("Are you sure you want to remove this product?"))
  {
   $.ajax({
    url:"action.php",
    method:"POST",
    data:{product_id:product_id, action:action},
    success:function()
    {
     load_cart_data();
     alert("Item has been removed from Cart");
    }
   })
  }
  else
  {
   return false;
  }
 });

 $(document).on('click', '#clear_cart', function(){
  var action = 'empty';
  $.ajax({
   url:"action.php",
   method:"POST",
   data:{action:action},
   success:function()
   {
    load_cart_data();
    alert("Your Cart has been clear");
   }
  });
 });
    
});



$(document).ready(function(){
    $('.check:button').toggle(function(){
        $('input:checkbox').attr('checked','checked');
        $(this).val('uncheck all')
    },function(){
        $('input:checkbox').removeAttr('checked');
        $(this).val('check all');        
    })
})


</script>