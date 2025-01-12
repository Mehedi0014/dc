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
    @media screen and (max-width: 700px) {
        .panel {
            padding: 0 18px;
            background-color: white;
            max-height: 100% !important;
            overflow: hidden;
            transition: max-height 0.2s ease-out;
            font-family: 'Roboto Slab', serif !important;
            font-size: 14px;
        }
        #add_to_cart2, #add_to_cart {
            font-size: 10px;
        }
        #select-all2, #select-all {
            font-size: 10px;
        }
        #deselect-all2, #deselect-all {
            font-size: 10px;
        }
        .panel-heading h4 {
            font-size: 15px;
            text-align: center;
            padding: 0px 19px;
            margin-bottom: 20px;
        }
        .panel-heading .col-md-6, .panel-body .col-md-6{
            text-align: center;
        }
    }
</style>

<section id="page-header" style="background-image: url(<?php echo $base_url . $document_page_banner . $row_content1['banner_img']; ?>)">
    <div class="container">
        <div class="row">
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
        </div>
    </div>
</section>


<section id="blog-page" class="section-padding">
    <div class="container">
        <div class="row">
            <div class="course_all" style="width: 100%;">
                <div class="container">
                            <div class="row">
                                <?php if (isset($_SESSION['cust_user'])) { ?>
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
                                        <br /><br />
                                    <?php
                                        }
                                    ?>

                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <div class="row">
                                                <div class="col-md-6"><h4>Product List</h4></div>
                                                <div class="col-md-6" align="right">
                                                    <button type="button" name="add_to_cart" id="add_to_cart" class="btn btn-success btn-xs" onclick="scrollWin()">Add to Cart</button>
                                                    <button type="button" name="check" id="select-all" class="btn btn-success btn-xs">Select All</button>
                                                    <button type="button" name="check" id="deselect-all" class="btn btn-success btn-xs">Deselect All</button>
                                                    <p><br></p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div id="display_item"></div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6"></div>
                                                <div class="col-md-6" align="right">
                                                    <button type="button" name="add_to_cart" id="add_to_cart2" class="btn btn-success btn-xs" onclick="scrollWin()">Add to Cart</button>
                                                    <button type="button" name="check" id="select-all2" class="btn btn-success btn-xs">Select All</button>
                                                    <button type="button" name="check" id="deselect-all2" class="btn btn-success btn-xs">Deselect All</button>
                                                    <p><br></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                        

                                    <div class="panel panel-default" >
                                        <div class="panel-heading">
                                            <div class="row">
                                                <div class="col-md-6">Cart Details</div>
                                                <div class="col-md-6" id="cart_list" align="right">
                                                    <button type="button" name="clear_cart" id="clear_cart" class="btn btn-warning btn-xs">Clear</button>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="panel-body" id="shopping_cart"></div>
                                        
                                        <div align="center" style="font-size:16px; padding-top: 10px; padding-bottom: 10px">
                                            <p><br></p>
                                            <div class="col-md-6"  align="center">
                                                <form>
                                                        <div>
                                                            <input type="checkbox" id="terms_and_conditions" value="1" onclick="terms_changed(this)" />
                                                            <label for="terms_and_conditions">I agree to the <a href='<?=$base_url;?>course_terms_conditions.php'>Terms and Conditions*</a></label>                                                                
                                                        </div>
                                                        <div>                                                                
                                                            <button type="button" id="submit_button" onclick="location.href='<?=$base_url;?>ICICI_MS/saleApi.php'" disabled class="btn btn-success btn-xs"><span style="color:white;">Check Out</span></button>
                                                        </div>
                                                </form>
                                                <p><br></p>
                                            </div>
                                        </div>
                                    </div>                                    
                                </div>
                            </div>


                                <?php
                                    } else {
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
                                            <div class="col-md-6"><h4>Product List</h4></div>
                                                <div class="col-md-6" align="right">
                                                    <button type="button" name="add_to_cart" id="add_to_cart2" class="btn btn-success btn-xs" onclick="scrollWin()">Add to Cart</button>
                                                    <button type="button" name="check" id="select-all2" class="btn btn-success btn-xs">Select All</button>
                                                    <button type="button" name="check" id="deselect-all2" class="btn btn-success btn-xs">Deselect All</button>
                                                    <p><br></p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="panel-body">
                                            <div class="row">
                                            <div class="col-md-12">
                                                <div id="display_item"></div>
                                            </div>
                                            </div>
                                            <div class="row">
                                            <div class="col-md-6"></div>
                                                <div class="col-md-6" align="right">
                                                    <button type="button" name="add_to_cart" id="add_to_cart" class="btn btn-success btn-xs" onclick="scrollWin()">Add to Cart</button>
                                                    <button type="button" name="check" id="select-all" class="btn btn-success btn-xs">Select All</button>
                                                    <button type="button" name="check" id="deselect-all" class="btn btn-success btn-xs">Deselect All mmhs</button>
                                                    <p><br></p>
                                                </div>
                                            </div>
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

                                            <div class="panel-body" id="shopping_cart"></div>
                                            
                                            <div align="center" style="font-size:16px; padding-top: 10px; padding-bottom: 10px">
                                                <h4>Please Log in to buy courses</h4>
                                                <p><br></p>
                                                <a href="<?php echo $base_url; ?>login.php" class="theme-btn">Log in</a>
                                                <br><br>
                                                <label for="terms_and_conditions">Also see the <a href='<?=$base_url;?>course_terms_conditions.php'>Terms and Conditions*</a></label>
                                            </div>
                                        </div>
                                        
                                        

                                    </div>
                                </div>

                                

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
</section>
<??>
<?php include_once 'common/footer.php'; ?> 

<script>  
$(document).ready(function(){

    load_product();
    load_cart_data();
 
    $('#select-all').click(function(event) {  
        $(':checkbox').each(function() {
            this.checked = true;                        
        });
    });

    $('#select-all2').click(function(event) {  
        $(':checkbox').each(function() {
            this.checked = true;                        
        });
    });


    $('#deselect-all').click(function(event) {  
        $(':checkbox').each(function() {
            this.checked = false;                        
        });
    });

    $('#deselect-all2').click(function(event) {  
        $(':checkbox').each(function() {
            this.checked = false;                        
        });
    });

    // This Function load when the buy_course.php page load.
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



    function addToCart(buttonId) {
        var product_id = [];
        var product_name = [];
        var product_price = [];
        var action = "add";
        
        $('.select_product').each(function(){
            if($(this).prop('checked') == true) {
                product_id.push($(this).data('product_id'));
                product_name.push($(this).data('product_name'));
                product_price.push($(this).data('product_price'));
            }
        });

        if(product_id.length > 0) {
            $.ajax({
                url: "action.php",
                method: "POST",
                data: {
                    product_id: product_id,
                    product_name: product_name,
                    product_price: product_price,
                    action: action
                },
                success: function(data) {
                    $('.select_product').each(function(){
                        if($(this).prop('checked') == true) {
                            $(this).attr('checked', false);
                            var temp_product_id = $(this).data('product_id');
                            $('#product_' + temp_product_id).css('background-color', 'transparent');
                            $('#product_' + temp_product_id).css('border-color', '#ccc');
                        }
                    });
                    confirm("Are you sure you want to add the item into Cart?");
                    load_cart_data();
                }
            });
        } else {
            alert('Select at least one item');
        }
    }

    // Bind the function to both buttons
    $('#add_to_cart').click(function() {
        addToCart('#add_to_cart');
    });

    $('#add_to_cart2').click(function() {
        addToCart('#add_to_cart2');
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
                confirm("Are you sure you want to remove all product?");
                load_cart_data();
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


function scrollWin() {
    window.scrollTo(0, 1200);
}


function terms_changed(termsCheckBox){
    if(termsCheckBox.checked){
        document.getElementById("submit_button").disabled = false;
    } else{
        document.getElementById("submit_button").disabled = true;
    }
}

</script>