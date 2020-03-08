<?php 
// Coin specific variables will get injected
$ticker='xds';
$api_port='48334';
$rpc_port='48333';

// Service specific variables will get injected
$redirectURL='https://xds.trustaking.com/activate.php';
$ipnURL='https://xds.trustaking.com/IPNlogger.php';
$email='';

// general variables
$server_ip='localhost'; // '0.0.0.0' target server ip. [ex.] 10.0.0.15
$scheme='http' ;// tcp protocol to access json on coin. [default]
$AccountName='coldStakingHotAddresses' ; // special account for cold staking addresses
$HotAccountName='account%200' ; // special account for hot addresses
$api_ver='&Segwit=true'; // additional parameters for api call
$coldstakeui='1'; // switch off the scripts
$whitelist='1'; //is whitelisting enabled
$payment='1'; // is payment enabled
$exchange='1'; // is exchanged enabled
?>