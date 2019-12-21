<?php 
session_start();
require ('/var/secure/keys.php');
require ('include/functions.php');
require ('include/config.php');

// Set price and and Expiry based on plan number
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['Plan'])) {
  $_SESSION['Plan'] = $_POST["Plan"]; // Grab plan number and add to session
} else {
  header('Location:' . 'index.php'); //  otherwise redirect to home page
}

switch ($_SESSION['Plan']) {
    case "0":
    $_SESSION['Price']='0';
    $_SESSION['Plan_Desc']='Free Trial';
		$d=strtotime("+1 week");
		$_SESSION['Expiry']=date("Y-m-d",$d) ."T". date("H:i:s", $d) .".000Z";
		break;
    case "1":
		$_SESSION['Price']='2';
    $_SESSION['Plan_Desc']='Bronze';
    $d=strtotime("+1 month");
		$_SESSION['Expiry']=date("Y-m-d",$d) ."T". date("H:i:s", $d) .".000Z";
		break;
    case "2":
		$_SESSION['Price']='9';
    $_SESSION['Plan_Desc']='Silver';
    $d=strtotime("+6 months");
		$_SESSION['Expiry']=date("Y-m-d",$d) ."T". date("H:i:s", $d) .".000Z";
		break;
	case "3":
    $_SESSION['Price']='12';
    $_SESSION['Plan_Desc']='Gold';
		$d=strtotime("+1 year");
		$_SESSION['Expiry']=date("Y-m-d",$d) ."T". date("H:i:s", $d) .".000Z";
		break;
	default:
		break;
	}

$wallet = new phpFunctions_Wallet();
    
 // Deal with the bots first
 if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['recaptcha_response'])) {
    // Build POST request:
    $recaptcha_url = 'https://www.google.com/recaptcha/api/siteverify';
    $recaptcha_response = $_POST['recaptcha_response'];
    $remoteip = $_SERVER["REMOTE_ADDR"];
  
    // Curl Request
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $recaptcha_url);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_POSTFIELDS, array(
        'secret' => $captcha_secret_key,
        'response' => $recaptcha_response,
        'remoteip' => $remoteip
        ));
    $curlData = curl_exec($curl);
    curl_close($curl);

    // Parse data
    $recaptcha = json_decode($curlData, true);
    if ($recaptcha["success"]) {
      $verified=true;
    } else {
      $verified=false;
      die (" Recaptcha thinks you're a bot! - please try again in a new tab.");
    }
}
// Make and decode POST request:
//    $recaptcha = file_get_contents($recaptcha_url . '?secret=' . $captcha_secret_key . '&response=' . $recaptcha_response);
//    $recaptcha = json_decode($recaptcha);
//    if($recaptcha->success==true){
        // Take action based on the score returned:
//        if ($recaptcha->score >= 0.5) {
//            $verified=true;
//         } else {
//            $verified=false;
//            die (" Recaptcha thinks you're a bot! - please try again in a new tab.");
//        }
//      } else { // there is an error /
//        die (" Something went wrong with Recaptcha! - please try again in a new tab.");
//    }
//}

 //Check if node is online before and grab address before taking payment
 $url = $scheme.'://'.$server_ip.':'.$api_port.'/api/Node/status' ;
 $check_server = $wallet->checkSite ($url);
 if ( $check_server == '' || empty($check_server) ) {
    } else {
    // Grab the next unused address 
    $url = $scheme.'://'.$server_ip.':'.$api_port.'/api/Wallet/unusedaddress?WalletName='.$WalletName.'&AccountName='.$AccountName.$api_ver ;
    $address = $wallet->CallAPI ($url,"GET");
    if ( $address == '' || empty($address) ) {
        die (' Something went wrong checking the node! - please try again in a new tab it could just be a timeout.');
    } else {
        $_SESSION['Address']=$address;
        }
    }

// Generate & store the InvoiceID in session
$_SESSION['OrderID']=$ticker . '-' . $_SESSION['Address'];
// Full service description
$serv= "Trustaking ". $_SESSION['Plan_Desc'] ." - Service Expiry: " . $_SESSION['Expiry'];
// Create invoice
$inv = $wallet->CreateInvoice($_SESSION['OrderID'],$_SESSION['Price'],$serv,$redirectURL,$ipnURL);
$invoiceId= $inv['invoice_id'];
$invoiceURL= $inv['invoice_url'];
// Store the InvoiceID in session
$_SESSION['InvoiceID']=$invoiceId;
// Forwarding to payment page
header('Location:' . $invoiceURL); //<<redirect to payment page
//echo '<br><b>Invoice:</b><br>'.$invoiceId.'" created, see '.$invoiceURL .'<br>';
?>