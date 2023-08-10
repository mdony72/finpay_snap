<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');

date_default_timezone_set("Asia/Jakarta");
require_once(dirname(__FILE__) . '/../Finpay.php');
$result = $_GET['result'];
$decode_result = base64_decode($result);
$decode_array_result = json_decode($decode_result, true);
// echo $decode_result;
// echo"<br>";
// echo date("d F Y H:i:s", time() + 86400);

$request = $decode_array_result['request'];
$decode = base64_decode($request);
$decode_array = json_decode($decode, true);
$key = $decode_array_result['key'];

$data = array(
    "amount" => $decode_array['amount'],
    "trans_date" => $decode_array_result['date'],
    // "mer_signature" => $decode_array['mer_signature'],
    "back_url" => $decode_array['back_url'],
    "merchant_id" => $decode_array['merchant_id'],
    "timeout" => $decode_array['timeout'],
    "cust_email" => $decode_array['cust_email'],
    "cust_msisdn" => $decode_array['cust_msisdn'],
    "failed_url" => $decode_array['failed_url'],
    "return_url" => $decode_array['return_url'],
    "cust_name" => $decode_array['cust_name'],
    "invoice" => $decode_array['invoice'],
    "cust_id" => $decode_array['cust_id'],
    "success_url" => $decode_array['success_url'],
);

$signature = Finpay_Signature::createSignature($data, $key);
$results = array();
$array_signature = array("mer_signature" => $signature['result']);
$results = array_merge($data, $array_signature);

postData($results, $decode_array['success_url'], $decode_array['failed_url'], $result, $decode_array_result['expired_date'] );
$redirect_url = "";

function postData($results, $successUrl, $failedUrl, $result, $tomorrow) {
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL,"https://sandbox.finpay.co.id/servicescode/api/checkFinpay.php");
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $results);

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $server_output = curl_exec($ch);
    $http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    curl_close($ch);
    $response = json_decode($server_output, true);
    
    if ($http_status == 200) {
        if($response[0]['result_code'] == "01") {
            echo"<script>alert('Status pembayaran Anda : Menunggu Pembayaran');history.back();</script>";
        } else {
            header("Location: ".$successUrl);
        }
    } else { 
        header("Location: ".$failedUrl);
    }
}

?>