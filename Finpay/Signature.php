<?php
date_default_timezone_set("Asia/Jakarta");
class Finpay_Signature {

    public static function createSignature($data,$pass){
        $sign_component = Finpay_Signature::mer_signature($data,$sortir='Y').$pass;
        $sign_result = strtoupper(hash('sha256', $sign_component));
        // $sign_result = strtoupper(hash256($sign_component));
        // $sign_result = strtoupper(hash_hmac('sha256', $sign_component, Finpay_Signature::strToHex($pass)));
        $sign_response['component'] = $sign_component;
        $sign_response['result'] = $sign_result;
        return($sign_response);
    }

    // function createSignature($arrParamX, $key){
    //     ksort($arrParamX, 0);
    //     if(is_array($arrParamX['items'])){
    //         $arrParamX['items'] = json_encode($arrParamX['items']);
    //     }
    //     echo strtoupper(implode("%",$arrParamX))."%".$key,"\n\n";
    //     $signature=hash('sha256', strtoupper(implode("%",$arrParamX))."%".$key);
    //     // $sign_response['component'] = $sign_component;
    //     $sign_response['result'] = strtoupper($signature);
    //     return $sign_response;
    // }

    public static function mer_signature($array,$sortir=''){
        unset($array['mrc_signature']);
        unset($array['mer_signature']);
        unset($array['fin_securehash']);
        unset($array['signature']);
        $result = array_filter($array);
        $output = "";
        if($sortir=='Y'){
            ksort ($result);
        }
        foreach($result as $key=>$val){
            if(!empty($val)){
                if(is_array($val)){
                    $output .= json_encode($val).'%';
                }else{
                    $output .= $val.'%';
                }
            }
        }
        return strtoupper($output);
    }

    public static function createSignature2($array,$kunci){
        unset($array['signature']);
        ksort ($array);
        $output = '';
        foreach($array as $key=>$val){
            if(is_array($val)){
                $output .= json_encode($val)."%";
            }else{
                $output .= $val."%";
            }
        }
        $output = hash_hmac('sha256', $output.$kunci, Finpay_Signature::strToHex($kunci));
        $response = strtoupper($output);
        return $response;
    }

    public static function strToHex($string){
        $hex = '';
        for ($i=0; $i<strlen($string); $i++){
            $ord = ord($string[$i]);
            $hexCode = dechex($ord);
            $hex .= substr('0'.$hexCode, -2);
        }
        return strToUpper($hex);
    }
    
    // $uname='MT77764DKM83N';
    // $pwd='YJV3AM0y';
    // $key='daYumnMb';
    // $url_endpoint="https://demos.finnet.co.id/apicobrand/getDenom/";
    // //$url_endpoint="https://apicobrand.finnet.co.id/upgradeAccount/";
    
    // echo "unm: $uname";
    // echo "<br>";
    // echo "pwd: $pwd";
    // echo "<br>";
    // echo "key: $key";
    // echo "<br>";
    // echo "url_endpoint: $url_endpoint";
    // echo "<br>";
    // echo "<br>";
    
    // $request = array(
    //     "failed_url" => "http://ec2-18-140-83-171.ap-southeast-1.compute.amazonaws.com:8109/payment/paymentStatusSuccess",
    //     "success_url" => "http://ec2-18-140-83-171.ap-southeast-1.compute.amazonaws.com:8109/payment/paymentStatusFailed",
    //     "return_url" => "http://servicebussit.telkom.co.id:9001/TelkomSystem/Finnet/Services/ProxyService/notifDeposit",
    //     "sof_type" => "pay",
    //     "sof_id" => "tcash",
    //     "cust_name" => "Pccw Five One",
    //     "cust_email" => "pccwtest51@gmail.com",
    //     "cust_msisdn" => "000100661146",
    //     "cust_id" => "100661146",
    //     "amount" => "10000",
    //     "invoice" => "202007081605",
    //     "trans_date" => "20200708160606",
    //     "merchant_id" => "MYINDHM869",
    //     "timeout" => "180",
    //     "add_info2" => "100661146",
    //     "add_info1" => "Pccw Five One",
    //     //"mer_signature" => "666a6f8204a4c70c789d20ccfdda9dea4db82a5c4dcd9208a647960452d62200",
    //     "items" => [
    //         [
    //             "deposit-000100661146-100661146",
    //             "10000",
    //             100661146
    //         ]
    //     ]
    // );
    
    // createSignature($request, "yourpassword");
}
?>
