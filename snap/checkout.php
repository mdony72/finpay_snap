<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');

date_default_timezone_set("Asia/Jakarta");
require_once(dirname(__FILE__) . '/../Finpay.php');
// comment if sandbox
Finpay_Config::$isProduction = false;

$request = $_GET['request'];
$decode = base64_decode($request);
$decode_array = json_decode($decode, true);
$key = $decode_array['key'];

$tomorrow = date("d F Y H:i:s", time() + 86400);
$payment = "";
if($_GET['payment'] == 'bni') {
    $payment = "vabni";
} else if($_GET['payment'] == 'mandiri') {
    $payment = "vabni";
} else if($_GET['payment'] == 'permata') {
    $payment = "vapermata";
} else if($_GET['payment'] == 'maybank') {
    $payment = "vamaybank";
} else if($_GET['payment'] == 'briva') {
    $payment = "briva";
} else if($_GET['payment'] == 'cc') {
    $payment = "cc";
} else if($_GET['payment'] == 'gopay') {
    $payment = "gopay";
} else if($_GET['payment'] == 'sakuku') {
    $payment = "sakuku";
} else if($_GET['payment'] == 'kredivo') {
    $payment = "kredivo";
} else if($_GET['payment'] == 'ovo') {
    $payment = "ovo";
} else if($_GET['payment'] == 'linkaja') {
    $payment = "linkaja";
} else if($_GET['payment'] == 'shopeepay') {
    $payment = "shopee";
} else if($_GET['payment'] == 'dana') {
    $payment = "dana";
} else if($_GET['payment'] == 'qris') {
    $payment = "qrdinamis";
} else {
    $payment = "finpay021";
}

$data = array(
    "amount" => $decode_array['amount'],
    "cust_id" => $decode_array['cust_id'],
    "cust_name" => $decode_array['cust_name'],
    "cust_email" => $decode_array['cust_email'],
    "cust_msisdn" => $decode_array['cust_msisdn'],
    "invoice" => $decode_array['invoice'],
    "return_url" => $decode_array['return_url'],
    "sof_id" => $payment,
    "sof_type" => "pay",
    "timeout" => $decode_array['timeout'],
    "trans_date" => date("YmdHis"),
    "failed_url" => $decode_array['failed_url'],
    "success_url" => $decode_array['success_url'],
    // "items" => "Lite Subscription",
    // "items" => array(array("Kura-kura Terbang","450000",1)),
    "merchant_id" => $decode_array['merchant_id'],
    "add_info1" => $decode_array['add_info1'],
    // "items" => $decode_array['items'],
);
// print_r(json_encode($decode_array['items']));
// echo"<br><br>";
$signature = Finpay_Signature::createSignature($data, $key);
$result = array();
$array_signature = array("mer_signature" => $signature['result']);
$result = array_merge($data, $array_signature);

postData($result, $key, $tomorrow);
$redirect_url = "";

function postData($result, $key, $tomorrow) {
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, Finpay_Config::getSnapBaseUrl());
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $result);

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $server_output = curl_exec($ch);
    // print_r($server_output);

    curl_close($ch);
    $response = json_decode($server_output, true);
    
    if ($response['status_code'] == "00") {
        if($_GET['payment'] == "cc") {
            echo"<script>window.onload = function(){ window.open('".$response['redirect_url']."', '_blank');window.location='pending_page.php'}</script>";
        } else if($_GET['payment'] == "qris") {
            header("Location: ".$response['redirect_url']);
        } else {
            $encrypt = array(
                "payment" => $_GET['payment'],
                "date" => date("YmdHis"),
                "expired_date" => strtotime("+1 days"),
                "request" => $_GET['request'],
                "channel" => $_GET['payment'],
                "key" => $key,
                "payment_code" => $response['payment_code'],
            );
            $result = Finpay_Snap::createTransaction($encrypt, $key);
            header("Location: detail_page.php?result=".$result."&expired_date=".$tomorrow);
        }
    } else { 
        if($response['status_code'] == "00") {
            header("Location: ".$response['redirect_url']);
        } else if($response['status_code'] == "106") {
            print_r($server_output);
            echo $response['true_signature'];
        } else if($response['status_code'] == "05") {
            header("Location: ".$response['redirect_url']);
        } else {
            print_r($server_output);
        }
    }
}
?>
