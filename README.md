Finpay Snap
===============

This is the Official PHP wrapper/library for Finpay Payment Snap API. Visit [https://finpay.id](https://finpay.id) for more information about the product

## 1. Installation

you can clone or [download](https://github.com/mdony72/finpay_snap/archive/master.zip) this repository.

## 2. How to Use

### 2.1 General Settings

```php
// Set your Merchant Username
Finpay_Config::$username = '<your username credential>';
// Set your Merchant Password
Finpay_Config::$password = '<your password credential>';
// Set your Merchant Secret Key
Finpay_Config::$secretKey = '<your secret key credential>';
// Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
Finpay_Config::$isProduction = false;
```

### 2.2.a Snap

You can see Snap example [here](example.php).

#### Get Snap Transaction

```php
$merchant_info = array(
  "merchant_id" => Finpay_Config::$username,
);

$user_info = array(
  "cust_name" => "Dominiq Purba", //name of user
  "cust_email" => "jcbtest@gmail.com", //email user
  "cust_msisdn" => "081xxxxxxxxx", //phone_no user
  "cust_id" => "081xxxxxxxxx", //customer id from merchant
);

transaction_detail = array(
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
);

$data = array();
$data = array_merge($merchant_info, $user_info, $transaction_detail, $settings, $items);
$snap = Finpay_Snap::createTransaction($data, Finpay_Config::$secretKey);
```

#### Initialize Snap JS when customer click pay button

```html
<html>
  <body>
    <button id="pay-button">Pay!</button>
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
```