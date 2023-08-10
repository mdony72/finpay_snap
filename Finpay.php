<?php

// Check PHP version.
if (version_compare(PHP_VERSION, '5.2.1', '<')) {
    throw new Exception('PHP version >= 5.2.1 required');
}

// Check PHP Curl & json decode capabilities.
if (!function_exists('curl_init') || !function_exists('curl_exec')) {
  throw new Exception('Finpay needs the CURL PHP extension.');
}
if (!function_exists('json_decode')) {
  throw new Exception('Finpay needs the JSON PHP extension.');
}

// Configurations
require_once('Finpay/Config.php');

// Signature
require_once('Finpay/Signature.php');

//snapTest
require_once('Finpay/Snap.php');
?>