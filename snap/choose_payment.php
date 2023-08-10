<?php
$request = $_GET['request'];
$decode = base64_decode($request);
$decode_array = json_decode($decode, true);
?>
<!DOCTYPE html>
<html>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/css/bootstrap.min.css">
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/js/bootstrap.min.js"></script>
    <body>
        <nav class="navbar fixed-top navbar-light bg-white" style="text-align:center;">
            <div class="h4">
               Pembayaran
            </div>
            <div style="box-shadow: 0 4px 2px -2px gray;height:5px;"></div>
        </nav>
        <div class="row">
            <div class="col-12">
                <div style="padding:20px;">
                    <br><br>
                    <?php if($_GET['payment'] == "bank") { ?>
                        <a href="checkout.php?payment=mandiri&request=<?php echo $request;?>" class="text-decoration-none text-muted">
                            <div class="card" style="margin-top:10px;">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-3">
                                            <img src="src/mandiri.png" style="width:100%;">
                                        </div>
                                        <div class="col-9">
                                            Bank Mandiri
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <a href="checkout.php?payment=bni&request=<?php echo $request;?>" class="text-decoration-none text-muted">
                            <div class="card" style="margin-top:10px;">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-3">
                                            <img src="src/bni.png" style="width:100%;">
                                        </div>
                                        <div class="col-9">
                                            Bank BNI
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <a href="checkout.php?payment=briva&request=<?php echo $request;?>" class="text-decoration-none text-muted">
                            <div class="card" style="margin-top:10px;">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-3">
                                            <img src="src/briva.png" style="width:100%;">
                                        </div>
                                        <div class="col-9">
                                            BRIVA
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <a href="checkout.php?payment=permata&request=<?php echo $request;?>" class="text-decoration-none text-muted">
                            <div class="card" style="margin-top:10px;">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-3">
                                            <img src="src/permata.png" style="width:100%;">
                                        </div>
                                        <div class="col-9">
                                            Bank Permata
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <a href="checkout.php?payment=maybank&request=<?php echo $request;?>" class="text-decoration-none text-muted">
                            <div class="card" style="margin-top:10px;">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-3">
                                            <img src="src/maybank.png" style="width:100%;">
                                        </div>
                                        <div class="col-9">
                                            Maybank
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <a href="checkout.php?payment=finpay&request=<?php echo $request;?>" class="text-decoration-none text-muted">
                            <div class="card" style="margin-top:10px;">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-3">
                                            <img src="src/finpay.png" style="width:80%;">
                                        </div>
                                        <div class="col-9">
                                            Finpay021
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    <?php } else if($_GET['payment'] == "outlet") { ?>
                        <a href="checkout.php?payment=alfamart&request=<?php echo $request;?>" class="text-decoration-none text-muted">
                            <div class="card" style="margin-top:10px;">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-3">
                                            <img src="src/alfamart.png" style="width:100%;">
                                        </div>
                                        <div class="col-9">
                                            Alfamart
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <a href="checkout.php?payment=indomart&request=<?php echo $request;?>" class="text-decoration-none text-muted">
                            <div class="card" style="margin-top:10px;">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-3">
                                            <img src="src/indomart.png" style="width:100%;">
                                        </div>
                                        <div class="col-9">
                                            Indomart
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <a href="checkout.php?payment=alfamidi&request=<?php echo $request;?>" class="text-decoration-none text-muted">
                            <div class="card" style="margin-top:10px;">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-3">
                                            <img src="src/alfamidi.png" style="width:100%;">
                                        </div>
                                        <div class="col-9">
                                            Alfamidi
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    <?php } else { ?>
                        <!--<a href="checkout.php?payment=gopay&request=<?php echo $request;?>" class="text-decoration-none text-muted">-->
                        <!--    <div class="card" style="margin-top:10px;">-->
                        <!--        <div class="card-body">-->
                        <!--            <div class="row">-->
                        <!--                <div class="col-3">-->
                        <!--                    <img src="src/gopay.png" style="width:100%;">-->
                        <!--                </div>-->
                        <!--                <div class="col-9">-->
                        <!--                    Gopay-->
                        <!--                </div>-->
                        <!--            </div>-->
                        <!--        </div>-->
                        <!--    </div>-->
                        <!--</a>-->
                        <!--<a href="checkout.php?payment=sakuku&request=<?php echo $request;?>" class="text-decoration-none text-muted">-->
                        <!--    <div class="card" style="margin-top:10px;">-->
                        <!--        <div class="card-body">-->
                        <!--            <div class="row">-->
                        <!--                <div class="col-3">-->
                        <!--                    <img src="src/sakuku.png" style="width:100%;height:30px;object-fit:cover">-->
                        <!--                </div>-->
                        <!--                <div class="col-9">-->
                        <!--                    Sakuku-->
                        <!--                </div>-->
                        <!--            </div>-->
                        <!--        </div>-->
                        <!--    </div>-->
                        <!--</a>-->
                        <!--<a href="checkout.php?payment=kredivo&request=<?php echo $request;?>" class="text-decoration-none text-muted">-->
                        <!--    <div class="card" style="margin-top:10px;">-->
                        <!--        <div class="card-body">-->
                        <!--            <div class="row">-->
                        <!--                <div class="col-3">-->
                        <!--                    <img src="src/kredivo.png" style="width:100%;">-->
                        <!--                </div>-->
                        <!--                <div class="col-9">-->
                        <!--                    Kredivo-->
                        <!--                </div>-->
                        <!--            </div>-->
                        <!--        </div>-->
                        <!--    </div>-->
                        <!--</a>-->
                        <!--<a href="checkout.php?payment=ovo&request=<?php echo $request;?>" class="text-decoration-none text-muted">-->
                        <!--    <div class="card" style="margin-top:10px;">-->
                        <!--        <div class="card-body">-->
                        <!--            <div class="row">-->
                        <!--                <div class="col-3">-->
                        <!--                    <img src="src/ovo.png" style="width:100%;">-->
                        <!--                </div>-->
                        <!--                <div class="col-9">-->
                        <!--                    Ovo-->
                        <!--                </div>-->
                        <!--            </div>-->
                        <!--        </div>-->
                        <!--    </div>-->
                        <!--</a>-->
                        <a href="checkout.php?payment=linkaja&request=<?php echo $request;?>" class="text-decoration-none text-muted">
                            <div class="card" style="margin-top:10px;">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-3">
                                            <img src="src/link_aja.png" style="width:100%;">
                                        </div>
                                        <div class="col-9">
                                            Link Aja
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <a href="checkout.php?payment=finpay&request=<?php echo $request;?>" class="text-decoration-none text-muted">
                            <div class="card" style="margin-top:10px;">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-3">
                                            <img src="src/finpay.png" style="width:80%;">
                                        </div>
                                        <div class="col-9">
                                            Finpay Money
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <!--<a href="checkout.php?payment=shopeepay&request=<?php echo $request;?>" class="text-decoration-none text-muted">-->
                        <!--    <div class="card" style="margin-top:10px;">-->
                        <!--        <div class="card-body">-->
                        <!--            <div class="row">-->
                        <!--                <div class="col-3">-->
                        <!--                    <img src="src/shopeepay.png" style="width:100%;">-->
                        <!--                </div>-->
                        <!--                <div class="col-9">-->
                        <!--                    Shoope Pay-->
                        <!--                </div>-->
                        <!--            </div>-->
                        <!--        </div>-->
                        <!--    </div>-->
                        <!--</a>-->
                        <!--<a href="checkout.php?payment=dana&request=<?php echo $request;?>" class="text-decoration-none text-muted">-->
                        <!--    <div class="card" style="margin-top:10px;">-->
                        <!--        <div class="card-body">-->
                        <!--            <div class="row">-->
                        <!--                <div class="col-3">-->
                        <!--                    <img src="src/dana.webp" style="width:100%;">-->
                        <!--                </div>-->
                        <!--                <div class="col-9">-->
                        <!--                    Dana-->
                        <!--                </div>-->
                        <!--            </div>-->
                        <!--        </div>-->
                        <!--    </div>-->
                        <!--</a>-->
                        <!--<a href="checkout.php?payment=finpay&request=<?php echo $request;?>" class="text-decoration-none text-muted">-->
                        <!--    <div class="card" style="margin-top:10px;">-->
                        <!--        <div class="card-body">-->
                        <!--            <div class="row">-->
                        <!--                <div class="col-3">-->
                        <!--                    <img src="src/finpay.png" style="width:80%;">-->
                        <!--                </div>-->
                        <!--                <div class="col-9">-->
                        <!--                    Finpay Money-->
                        <!--                </div>-->
                        <!--            </div>-->
                        <!--        </div>-->
                        <!--    </div>-->
                        <!--</a>-->
                        <!--<a href="checkout.php?payment=qris&request=<?php echo $request;?>" class="text-decoration-none text-muted">-->
                        <!--    <div class="card" style="margin-top:10px;">-->
                        <!--        <div class="card-body">-->
                        <!--            <div class="row">-->
                        <!--                <div class="col-3">-->
                        <!--                    <img src="src/qris.png" style="width:100%;">-->
                        <!--                </div>-->
                        <!--                <div class="col-9">-->
                        <!--                    QRIS-->
                        <!--                </div>-->
                        <!--            </div>-->
                        <!--        </div>-->
                        <!--    </div>-->
                        <!--</a>-->
                    <?php } ?>
                </div>
            </div>
        </div>
    </body>
</html>