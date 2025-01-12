<?php
/*
* PHP Kit for Icici Merchant Solutions
* Version: 1.0.5
*/

/*Enter UAT kit parameters */
define('ENC_KEY', '01AB234CDE56789FG8H0I123J4567K89'); 
define('SECURE_SECRET', '12A34B5C5678D9E1F2G23456789HI01J2'); 
define('VERSION', '1'); 
define('PASSCODE', 'ABCD1234'); //Must be 8 digit only. No special characters allowed
define('MERCHANTID', '100000000068556'); //This is not being used in kit but for your reference in case of use it as global
define('TERMINALID', 'EG002023'); //This is not being used in kit but for your reference in case of use it as global
define('BANKID', '24520'); //Must be 6 digit only. No special characters allowed
define('MCC', '4511'); //Must be 4 digit only. No special characters allowed
define('GATEWAYURL', 'https://payuatrbac.icicibank.com/accesspoint/angularBackEnd/requestproxypass'); 
define('REFUNDURL', 'https://payuatrbac.icicibank.com/accesspoint/v1/24520/createRefundFromMerchantKit'); 
define('STATUSURL', 'https://payuatrbac.icicibank.com/accesspoint/v1/24520/checkStatusMerchantKit');
define('RETURNURL', 'YOUR_DOMAIN/ICICI_MS/responseSale.php'); // define('RETURNURL', 'YOUR_DOMAIN/ICICI_MS/responseSale.
// Return url's length must not be more then 500 character
?>