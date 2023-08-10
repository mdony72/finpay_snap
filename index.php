<?php
require_once(dirname(__FILE__) . '/Finpay.php');
//Set Your Credential
Finpay_Config::$username = "ZORA484";
Finpay_Config::$secretKey = "ZORA2016";
// comment if sandbox
Finpay_Config::$isProduction = true;

//data of product
$item_data = array();
$item_1 = array(
  "Kaos Anime Demon Slayer",
  "100000",
  "1"
);
$item_2 = array(
  "Kaos Anime One Piece",
  "150000",
  "1"
);
$item_3 = array(
  "Kaos Anime Naruto",
  "200000",
  "1"
);
array_push($item_data, $item_1);
array_push($item_data, $item_2);
array_push($item_data, $item_3);
$items = array("items" => $item_data);
//end data of product

date_default_timezone_set("Asia/Jakarta");

//required
$merchant_info = array(
  "merchant_id" => Finpay_Config::$username,
);

//required
$user_info = array(
  "cust_name" => "Dominiq Purba", //name of user
  "cust_email" => "jcbtest@gmail.com", //email user
  "cust_msisdn" => "08193305405988", //phone_no user
  "cust_id" => "081933054055", //customer id from merchant
);

//required
$transaction_detail = array(
  "invoice" => date("YmdHis"), //transaction no
  "amount" => "450000", //total amount
);

$settings = array(
  "success_url" => "https://pg.widiramadhan.com/snap/success_page.php", //custom redirect url for merchant
	"failed_url" => "https://pg.widiramadhan.com/snap/failed_page.php", //custom redirect url for merchant
	"return_url" => "https://pg.widiramadhan.com/snap/cancel_page.php", //custom redirect url for merchant
	"back_url" => "https://pg.widiramadhan.com/snap/cancel_page.php", //custom redirect url for merchant
  "timeout" => "1200",
  "add_info1" => "Testing Finpay PG", //information for transaction (optional)
  "key" => Finpay_Config::$secretKey,
);

$data = array();
$data = array_merge($merchant_info, $user_info, $transaction_detail, $settings, $items);
$snap = Finpay_Snap::createTransaction($data, Finpay_Config::$secretKey);
?>

<!DOCTYPE html>
<html>
  <body>
    <div style="padding:20px;">
      <h4>Shopping Cart</h4>
      <?php foreach($item_data as $value) { ?>
          <div style="border:1px solid #333;padding:20px;width:500px;height:100px;margin-bottom:10px;">
              <div style="float:left;margin-right:10px;">
                <img src="https://images.tokopedia.net/img/cache/500-square/VqbcmM/2020/12/25/e72c70a6-d6d0-4943-a073-34f0feb9f1f4.png" style="width:50px;">
              </div>
              <div style="float:left;">
                <span style="font-size:14px;font-weight:bold"><?php echo $value[0];?></span><br>
                <span style="font-size:14px;font-weight:bold;color:red;"><?php echo $value[2];?>x @Rp<?php echo number_format($value[1]);?></span><br><br>
              </div>
              <div style="clear:both;"></div>
          </div>
      <?php } ?>
      <button id="pay-button" type="button" style="background-color:#333;color:#fff;padding:10px;width:150px;border-radius:10px;">Checkout</button>
    </div>

    <script type="text/javascript" src="snap.js"></script>
    <script type="text/javascript">
      document.getElementById('pay-button').onclick = function(){
        pay({
        request: '<?= $snap;?>'
      });
      };
    </script>
  </body>
</html>