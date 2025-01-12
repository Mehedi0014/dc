<?php
session_start();
include_once('../admin/includes/conn.php');
// echo "<pre>";
// var_dump($_SESSION);
// exit();
if(isset($_SESSION['shopping_cart'])){
	$shoppingCart = $_SESSION['shopping_cart'];
	$priceTotal = 0;
	$productinfo =""; 
	foreach($shoppingCart as $k){
// 			$priceTotal +=(float)substr($k['product_price'], -4);
			$priceTotal +=(float)(filter_var($k["product_price"], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION));
			$productinfo .= "pi_".$k['product_id'].",";
	}

if(strcasecmp($_SERVER['REQUEST_METHOD'], 'POST') == 0){
	//Request hash
	$contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';	
	if(strcasecmp($contentType, 'application/json') == 0){
		$data = json_decode(file_get_contents('php://input'));
		$hash=hash('sha512', $data->key.'|'.$data->txnid.'|'.$data->amount.'|'.$data->pinfo.'|'.$data->fname.'|'.$data->email.'|||||'.$data->udf5.'||||||'.$data->salt);
		$json=array();
		$json['success'] = $hash;
    	echo json_encode($json);
	
	}
	exit(0);
}

function getCallbackUrl()
{
	$protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
	return $protocol . $_SERVER['HTTP_HOST'] .'/payment/response.php';
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PayUmoney Payment Form</title>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

<!-- this meta viewport is required for BOLT //-->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" >
<!-- BOLT Sandbox/test //-->
<!--<script id="bolt" src="https://sboxcheckout-static.citruspay.com/bolt/run/bolt.min.js" bolt-color="e34524" bolt-logo="http://boltiswatching.com/wp-content/uploads/2015/09/Bolt-Logo-e14421724859591.png"></script>-->
<!-- BOLT Production/Live //-->
    <script id="bolt" src="https://checkout-static.citruspay.com/bolt/run/bolt.min.js" bolt-color="e34524" bolt-logo="http://boltiswatching.com/wp-content/uploads/2015/09/Bolt-Logo-e14421724859591.png"></script>

</head>
<style>

/*div.polaroid {*/
/*  width: 1200px;*/
/*  padding: 10px 10px 20px 10px;*/
/*  border: 1px solid #bfbfbf;*/
/*  background-color: white;*/

/*  position: fixed;*/
/*}*/

/*div.rotate_right {*/
/*  margin-bottom: 20px !important;*/
/*  margin: 4px 2px;*/
/*  position: relative;*/
/*  left: 200px;*/
/*}*/
/*.head3 {*/
/*  background-color: white;*/
/*  color: #4c8aaf;*/
/*  margin: 20px;*/
/*  padding: 20px;*/
/*  position: relative;*/
/*}*/

/*.container_default {*/
/*  width: 100%;*/
/*  height: 100%;*/
/*  position: relative;*/
/*  margin: 10px;*/
/*}*/

/*.form-inline .form-group {*/
/*  display: inline-block;*/
/*  margin-bottom: 20px;*/
/*  vertical-align: middle;*/
/*  width: 100%;*/
/*  border-bottom: 1px solid #ddd;*/
/*  box-shadow: 0px 5px 10px;*/
/*  padding: 10px;*/
/*}*/

/*input[type="text"],*/
/*    select {*/
/*      width: 100%;*/
/*      padding: 12px 20px;*/
/*      margin: 8px 0;*/
/*      display: inline-block;*/
/*      border: 1px solid #ccc;*/
/*      border-radius: 4px;*/
/*      box-sizing: border-box;*/
/*    }*/

/*    input[type="submit"] {*/
/*      width: 100%;*/
/*      background-color: #007bff;*/
/*      color: white;*/
/*      padding: 14px 20px;*/
/*      margin: 8px 0;*/
/*      border: none;*/
/*      border-radius: 4px;*/
/*      cursor: pointer;*/
/*    }*/

	/*.main {*/
	/*    font-family:Verdana, Geneva, sans-serif, serif;*/
 /*       margin: auto;*/
 /*       width: 60%;*/
 /*       padding: 10px;*/
 /*       border: 2px solid #bfbfbf;*/
 /*       border-radius: 5px;*/
 /*       font-size: 20px;*/
	/*}*/
	/*.text {*/
	/*	float:left;*/
	/*	width:200px;*/
	/*}*/
	/*.dv {*/
	/*	margin-bottom:20px;*/
	/*	display: inline-block;*/
 /*       margin-bottom: 20px;*/
 /*       vertical-align: middle;*/
 /*       width: 100%;*/
 /*       border-bottom: 1px solid #ddd;*/
        
 /*       padding: 10px;*/
	/*}*/
	
	
	/* iframe{*/
 /*       height: 278px;*/
 /*       width: 100%;*/
 /*   }*/
    
    /*.button {*/
    /*    background-color: #f4511e;*/
    /*    justify-content: center;*/
    /*    border: none;*/
    /*    color: white;*/
    /*    padding: 16px 32px;*/
    /*    text-align: center;*/
    /*    font-size: 16px;*/
    /*    margin: 4px 2px;*/
    /*    opacity: 0.6;*/
    /*    transition: 0.3s;*/
    /*    display: inline-block;*/
    /*    text-decoration: none;*/
    /*    cursor: pointer;*/
    /*    padding: 14px 40px;*/
    /*    border-radius: 8px;*/
    /*    width: 50%;*/
    /*}*/
    /*.button:hover {opacity: 1}*/


</style>

<body>
    
    <br>
    <br>
    <br>
    
<!--<div class="main">-->
        <div class="polaroid rotate_right">
            <div class="container">
	<div>
    	<img src="images/payumoney.png" />
    	<p><br></p>
    </div>
	<form action="#" id="payment_form">
        <input type="hidden" id="udf5" name="udf5" value="BOLT_KIT_PHP7" />
        <input type="hidden" id="surl" name="surl" value="<?php echo getCallbackUrl(); ?>" />
    <div>
        <!--<span class="text"><label>Merchant Key:</label></span>-->
        <span><input type="hidden" id="key" name="key" placeholder="Merchant Key" value="AwC9Jbak" /></span>
    </div>
    
    <div>
        <!--<span class="text"><label>Merchant Salt:</label></span>-->
        <span><input type="hidden" id="salt" name="salt" placeholder="Merchant Salt" value="5jxOG5OcCb" /></span>
    </div>
    
    <div class="dv form-group">
        <label for="txnid">Transaction/Order ID:</label>
        <span><input type="text" class = "form-control" id="txnid" name="txnid" placeholder="Transaction ID" value="<?php echo  "Txn" . rand(10000,99999999)?>" readonly/></span>
    </div>
    
    <div class="dv form-group">
        <label for = "amount">Amount (INR):</label>
        <span><input type="text" class = "form-control" id="amount" name="amount" placeholder="Amount" value="<?=$priceTotal?>" readonly/></span>    
    </div>
    
    <div class="dv form-group">
        <label for = "pinfo">Product Info:</label>
        <span><input type="text" class = "form-control" id="pinfo" name="pinfo" placeholder="Product Info" value="<?=$productinfo?>" readonly/></span>
    </div>
    
    <div class="dv form-group">
        <label for = "fname">Name:</label>
        <span><input type="text" class = "form-control" id="fname" name="fname" placeholder="First Name" value="<?=$_SESSION['cust_name']?>" readonly /></span>
    </div>
    
    <div class="dv form-group">
        <label for = "email">Email ID:</label>
        <span><input type="text" class = "form-control" id="email" name="email" placeholder="Email ID" value="<?=$_SESSION['cust_user']?>" readonly /></span>
    </div>
    
    <div class="dv form-group">
        <label for = "mobile">Mobile/Cell Number*:</label>
        <span><input type="text" class = "form-control" id="mobile" name="mobile" placeholder="Mobile/Cell Number" value="" /></span>
    </div>
    
    <div class="dv" style="visibility: hidden;">
        <span class="hidden"><label>Hash:</label></span>
        <span><input type="hidden" id="hash" name="hash" placeholder="Hash" value="" /></span>
    </div>
    <!--<div><button class="button" type="submit" value="Pay" onclick="launchBOLT(); return false;">Make Payment</button></div>-->
    <div><input type="submit"  class="btn btn-info" value="Make Payment" onclick="launchBOLT(); return false;"></button><a class="btn btn-primary" style="margin-left: 10px;" href='<?=$base_url?>buy_course.php'>Back</a></div>
	</form>
</div>
</div>
<script type="text/javascript">
$('#payment_form').bind('keyup blur', function(){
	$.ajax({
          url: 'PayUMoney_form.php',
          type: 'POST',
          data: JSON.stringify({ 
            key: $('#key').val(),
			salt: $('#salt').val(),
			txnid: $('#txnid').val(),
			amount: $('#amount').val(),
		    pinfo: $('#pinfo').val(),
            fname: $('#fname').val(),
			email: $('#email').val(),
			mobile: $('#mobile').val(),
			udf5: $('#udf5').val()
          }),
		  contentType: "application/json",
		  dataType: 'json',
          success: function(json) {
            if (json['error']) {
			 $('#alertinfo').html('<i class="fa fa-info-circle"></i>'+json['error']);
            }
			else if (json['success']) {	
				$('#hash').val(json['success']);
            }
          },
          error: function(e, ts, et) { alert(ts) }
        }); 
});

</script>
<script type="text/javascript">
function launchBOLT()
{
	
	bolt.launch({
	key: $('#key').val(),
	txnid: $('#txnid').val(), 
	hash: $('#hash').val(),
	amount: $('#amount').val(),
	firstname: $('#fname').val(),
	email: $('#email').val(),
	phone: $('#mobile').val(),
	productinfo: $('#pinfo').val(),
	udf5: $('#udf5').val(),
	surl : $('#surl').val(),
	furl: $('#surl').val(),
	mode: 'dropout'	
},{ responseHandler: function(BOLT){
	console.log( BOLT.response.txnStatus );		
	if(BOLT.response.txnStatus != 'CANCEL')
	{
		//Salt is passd here for demo purpose only. For practical use keep salt at server side only.
		var fr = '<form action=\"'+$('#surl').val()+'\" method=\"POST\">' +
		'<input type=\"hidden\" name=\"key\" value=\"'+BOLT.response.key+'\" />' +
		'<input type=\"hidden\" name=\"salt\" value=\"'+$('#salt').val()+'\" />' +
		'<input type=\"hidden\" name=\"txnid\" value=\"'+BOLT.response.txnid+'\" />' +
		'<input type=\"hidden\" name=\"amount\" value=\"'+BOLT.response.amount+'\" />' +
		'<input type=\"hidden\" name=\"productinfo\" value=\"'+BOLT.response.productinfo+'\" />' +
		'<input type=\"hidden\" name=\"firstname\" value=\"'+BOLT.response.firstname+'\" />' +
		'<input type=\"hidden\" name=\"email\" value=\"'+BOLT.response.email+'\" />' +
		'<input type=\"hidden\" name=\"udf5\" value=\"'+BOLT.response.udf5+'\" />' +
		'<input type=\"hidden\" name=\"mihpayid\" value=\"'+BOLT.response.mihpayid+'\" />' +
		'<input type=\"hidden\" name=\"status\" value=\"'+BOLT.response.status+'\" />' +
		'<input type=\"hidden\" name=\"hash\" value=\"'+BOLT.response.hash+'\" />' +
		'</form>';
		var form = jQuery(fr);
		jQuery('body').append(form);								
		form.submit();
	}
},
	catchException: function(BOLT){
 		alert( 'Please enter your phone number' );
	}
});
}

</script>	

</body>
</html>
	

<?php
}else{
	header("Location: ".$base_url."buy_course.php?errmsg='Select Item First'");
}
?>

