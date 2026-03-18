<?php } elseif($step == "qr") { 

if(!isset($_SESSION['MaDH']) || !isset($_SESSION['tongtien'])){
    echo "<h3>Lỗi: Không có dữ liệu thanh toán!</h3>";
    echo "<a href='index.php'>Về trang chủ</a>";
    exit();
}

$maDH = (int)$_SESSION['MaDH'];
$tong = (int)$_SESSION['tongtien'];

$bank = "MBBANK"; 
$stk = "0338322433";

// ✅ THÊM DÒNG NÀY
$noidung = "DH".$maDH;

// tạo QR
$qr = "https://img.vietqr.io/image/{$bank}-{$stk}-compact.png?amount={$tong}&addInfo="
    . urlencode($noidung) . "&t=" . time();

?>

<h3>Quét mã để thanh toán</h3>

<p><b>Ngân hàng:</b> MB Bank (Quân đội)</p>
<p><b>Số tài khoản:</b> <?= $stk ?></p>

<p>Số tiền: <b><?= number_format($tong) ?> đ</b></p>
<p>Nội dung: <b><?= $noidung ?></b></p>

<img src="<?= $qr ?>" width="300">

<br><br>

<p>👉 Sau khi chuyển khoản, admin sẽ xác nhận đơn hàng</p>

<a href="index.php">Về trang chủ</a>

<?php } ?>