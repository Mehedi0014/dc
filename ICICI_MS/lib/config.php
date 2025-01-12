<?php
/*
* PHP Kit for Icici Merchant Solutions
* Version: 1.0.5
*/

/*Enter LIVE kit parameters */
define('ENC_KEY', 'A1F1E2DDAA456EB7C7E7C840E8C55F3F'); 
define('SECURE_SECRET', '0BE079622CB46D96C3E8CFC8B59ECAD7'); 
define('VERSION', '1'); 
define('PASSCODE', 'KHSG2920'); //Must be 8 digit only. No special characters allowed
define('MERCHANTID', '100000000068556'); //This is not being used in kit but for your reference in case of use it as global
define('TERMINALID', 'EG002023'); //This is not being used in kit but for your reference in case of use it as global
define('BANKID', '24520'); //Must be 6 digit only. No special characters allowed
define('MCC', '7392'); //Must be 4 digit only. No special characters allowed
define('GATEWAYURL', 'https://paypg.icicibank.com/accesspoint/angularBackEnd/requestproxypass'); 
define('REFUNDURL', 'https://paypg.icicibank.com/accesspoint/v1/24520/createRefundFromMerchantKit'); 
define('STATUSURL', 'https://paypg.icicibank.com/accesspoint/v1/24520/checkStatusMerchantKit');
define('RETURNURL', 'https://disseminare.com/ICICI_MS/responseSale.php'); // define('RETURNURL', 'YOUR_DOMAIN/ICICI_MS/responseSale.
// Return url's length must not be more then 500 character
?>