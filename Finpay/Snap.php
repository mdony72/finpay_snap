<?php
date_default_timezone_set("Asia/Jakarta");
class Finpay_Snap {
    public static function createTransaction($array, $kunci){
        $response = base64_encode(json_encode($array));
        return $response;
    }
}
?>
