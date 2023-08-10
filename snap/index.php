<?php
$request = $_GET['request'];
$decode = base64_decode($request);
$decode_array = json_decode($decode, true);
require_once(dirname(__FILE__) . '/../Finpay.php');
?>
<!DOCTYPE html>
<html>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/css/bootstrap.min.css">
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/js/bootstrap.min.js"></script>
    <body>
        <nav class="navbar fixed-top navbar-light bg-white" style="text-align:center;">
            <div class="h4">
                <center>Pembayaran</center>
            </div>
            <div style="box-shadow: 0 4px 2px -2px gray;height:5px;"></div>
        </nav>
        <div class="row">
            <div class="col-12">
                <div style="padding:20px;">
                    <br><br>
                    <div class="card" style="background-color:#C0D6FB;">
                        <div class="card-body">
                            <small>Total</small><br>
                            <span class="h3">Rp<?php echo number_format($decode_array['amount']);?></span><br>
                            <div class="row">
                                <div class="col-6">
                                    <small>Order ID</small>
                                </div>
                                <div class="col-6 text-end">
                                    <small style="font-weight:bold;color:#333;">#<?php echo $decode_array['invoice'];?></small>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <a class="text-decoration-none text-muted" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                                        <div class="row" >
                                            <div class="col-6">
                                               
                                            </div>
                                            <div class="col-6 text-end">
                                                <small style="color:#333;">Detail Pesanan</small>
                                            </div>
                                        </div>
                                    </a>
                                    <div class="collapse" id="collapseExample" style="margin-top:10px;">
                                        <div class="card card-body" style="background-color:#C0D6FB;">
                                            <span><b>Pesanan Anda</b><span><br>
                                            <?php
                                            foreach($decode_array['items'] as $item) { ?>
                                                <div class="row">
                                                    <div class="col-8">
                                                        <small><?php echo $item[2]."x ".$item[0];?></small>
                                                    </div>
                                                    <div class="col-4">
                                                        <small style="text-align:right;">Rp<?php echo number_format($item[1]);?></small>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                            <br>
                                            <span><b>Detail Pelanggan</b><span><br>
                                            <div class="row">
                                                <div class="col-8">
                                                    <small><?php echo $decode_array['cust_name'];?></small><br>
                                                    <small><?php echo $decode_array['cust_email'];?></small>
                                                </div>
                                                <div class="col-4">
                                                    <small style="text-align:right;"><?php echo $decode_array['cust_id'];?></small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-12">
                            <span class="h5">Pilih Metode Pembayaran</span><br>
                            <a href="checkout.php?payment=cc&request=<?php echo $request;?>" class="text-decoration-none text-muted">
                                <div class="card" style="margin-top:10px;">
                                    <div class="card-body">
                                        Kartu Kredit<br>
                                        <img src="src/cc_group.png" style="width:100px;">
                                    </div>
                                </div>
                            </a>
                            <a href="choose_payment.php?payment=bank&request=<?php echo $request;?>" class="text-decoration-none text-muted">
                                <div class="card" style="margin-top:10px;">
                                    <div class="card-body">
                                        Bank Transfer<br>
                                        <img src="src/bank_group.png">
                                    </div>
                                </div>
                            </a>
                            <!--<a href="choose_payment.php?payment=outlet&request=<?php echo $request;?>" class="text-decoration-none text-muted">-->
                            <!--    <div class="card" style="margin-top:10px;">-->
                            <!--        <div class="card-body">-->
                            <!--            Outlet Retail<br>-->
                            <!--            <img src="src/outlet_group.png">-->
                            <!--        </div>-->
                            <!--    </div>-->
                            <!--</a>-->
                            <a href="checkout.php?payment=qris&request=<?php echo $request;?>" class="text-decoration-none text-muted">
                                <div class="card" style="margin-top:10px;">
                                    <div class="card-body">
                                        QRIS<br>
                                        <img src="src/qris.png" style="width:50px;">
                                    </div>
                                </div>
                            </a>
                            <a href="choose_payment.php?payment=ewallet&request=<?php echo $request;?>" class="text-decoration-none text-muted">
                                <div class="card" style="margin-top:10px;">
                                    <div class="card-body">
                                        E-Wallet<br>
                                        <img src="src/ewallet_group.png">
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>