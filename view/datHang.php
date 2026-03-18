<?php
if(!isset($step)){
    $step = "thongtin";
}
?>
<h2 align="center">Đặt hàng</h2>

<?php if($step == "thongtin") { ?>

<form method="post" action="index.php?page=xacNhan">
Tên: <input type="text" name="ten" required><br><br>
SĐT: <input type="text" name="sdt" required><br><br>
Địa chỉ: <input type="text" name="diachi" required><br><br>
<button>Xác nhận</button>
</form>

<?php } elseif($step == "xacnhan") { 

$sp = $_SESSION['buy_now'];
$kh = $_SESSION['khachhang'];
$tong = $sp['gia'] * $sp['soluong'];
?>

<h3>Thông tin khách</h3>
<p>Tên: <?= $kh['ten'] ?></p>
<p>SĐT: <?= $kh['sdt'] ?></p>
<p>Địa chỉ: <?= $kh['diachi'] ?></p>

<h3>Sản phẩm</h3>
<p><?= $sp['tensp'] ?></p>
<p>Số lượng: <?= $sp['soluong'] ?></p>
<p>Tổng tiền: <?= number_format($tong) ?> đ</p>

<form method="post" action="index.php?page=thanhToanQR">
    <button>Thanh toán (QR)</button>
</form>

<!-- ✅ THÊM ĐOẠN NÀY -->
<?php } elseif($step == "qr") { 

$maDH = $_SESSION['MaDH'];
$tong = $_SESSION['tongtien'];

$bank = "MB";
$stk = "0338322433";

$noidung = "DH".$maDH;

$qr = "https://img.vietqr.io/image/$bank-$stk-compact.png?amount=$tong&addInfo=$noidung";
?>

<h3>Quét mã để thanh toán</h3>

<p>Số tiền: <b><?= number_format($tong) ?> đ</b></p>
<p>Nội dung: <b><?= $noidung ?></b></p>

<img src="<?= $qr ?>" width="300">

<br><br>
<p>👉 Sau khi chuyển khoản, admin sẽ xác nhận đơn hàng</p>

<a href="index.php">Về trang chủ</a>

<!-- ====================== -->

<?php } elseif($step == "ketqua") { ?>

<?php if($success) { ?>
    <h3 style="color:green;">Đặt hàng thành công!</h3>
<?php } else { ?>
    <h3 style="color:red;">Thanh toán thất bại!</h3>
<?php } ?>

<a href="index.php">Về trang chủ</a>

<?php } ?>