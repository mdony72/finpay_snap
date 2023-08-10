<?php
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
                    <b>Informasi Pembayaran</b>
                    <br><br>
                    <table class="table table-bordered table-striped">
                        <tr>
                            <td><small>Nomor Transaksi</small></td>
                            <td style="text-align:right;font-weight:bold;"><small><?php echo $decode_array['invoice'];?></small></td>
                        </tr>
                        <tr>
                            <td><small>Nama Channel</small></td>
                            <td style="text-align:right;font-weight:bold;"><small><?php echo strtoupper($decode_array_result['channel']);?></small></td>
                        </tr>
                        <tr>
                            <td><small>Nominal Transaksi</small></td>
                            <td style="text-align:right;font-weight:bold;"><small>Rp<?php echo number_format($decode_array['amount']);?></small></td>
                        </tr>
                        <tr>
                            <td><small>Informasi Tambahan</small></td>
                            <td style="text-align:right;font-weight:bold;"><small><?php echo $decode_array['add_info1'];?></small></td>
                        </tr>
                    </table>
                    <div class="card">
                        <div class="card-header" style="background-color:#14255d;">
                            <div class="row">
                                <div class="col-6">
                                    <span style="color:#fff;"><small>Kode bayar berlaku sampai</small></span>
                                </div>
                                <div class="col-6" style="text-align:right">
                                    <span style="color:#fff;"><small><?php echo date("d F Y H:i:s", substr($decode_array_result['expired_date'], 0, 10));?></small></span>
                                </div>
                            </div>
                        </div>
                        <div class="card-body text-center" onclick="copyText()">
                            <small>Kode Bayar</small><br>
                            <input type="hidden" value="<?php echo $decode_array_result['payment_code'];?>" id="payment_code">
                            <span style="font-weight:bold;"><?php echo $decode_array_result['payment_code'];?></span><br>
                            <small class="text-muted">Klik nomor untuk menyalin</small>
                        </div>
                    </div>
                    <br>
                    <br>
                    <a href="check_status.php?result=<?php echo $result;?>" class="btn btn-danger w-100">Cek Status Pembayaran</a>
                    <!--<medium class="text-muted font-weight-bold">Cara Pembayaran</medium>-->
                    <!--<br><br>-->
                    <!--<div class="row">-->
                    <!--    <div class="col-12">-->
                    <!--        <div class="accordion" id="accordionExample">-->
                    <!--            <div class="accordion-item">-->
                    <!--                <h2 class="accordion-header" id="headingOne">-->
                    <!--                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">-->
                    <!--                    Mobile Banking-->
                    <!--                </button>-->
                    <!--                </h2>-->
                    <!--                <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">-->
                    <!--                <div class="accordion-body">-->
                    <!--                    <strong>This is the first item's accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.-->
                    <!--                </div>-->
                    <!--                </div>-->
                    <!--            </div>-->
                    <!--            <div class="accordion-item">-->
                    <!--                <h2 class="accordion-header" id="headingTwo">-->
                    <!--                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">-->
                    <!--                    Internet Banking-->
                    <!--                </button>-->
                    <!--                </h2>-->
                    <!--                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">-->
                    <!--                <div class="accordion-body">-->
                    <!--                    <strong>This is the second item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.-->
                    <!--                </div>-->
                    <!--                </div>-->
                    <!--            </div>-->
                    <!--            <div class="accordion-item">-->
                    <!--                <h2 class="accordion-header" id="headingThree">-->
                    <!--                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">-->
                    <!--                    Melalui ATM-->
                    <!--                </button>-->
                    <!--                </h2>-->
                    <!--                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">-->
                    <!--                <div class="accordion-body">-->
                    <!--                    <strong>This is the third item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.-->
                    <!--                </div>-->
                    <!--                </div>-->
                    <!--            </div>-->
                    <!--        </div>-->
                    <!--    </div>-->
                    <!--</div>-->
                </div>
            </div>
        </div>
    </body>
</html>
<script>
function copyText() {
    var copyText = document.getElementById("payment_code");
    copyText.select();
    var successful = document.execCommand('copy');
    alert("Nomor berhasil disalin");
}
</script>