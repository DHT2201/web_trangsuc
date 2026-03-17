<?php
include_once("controller/cSanPham.php");

$p = new controllerSanPham();

if(isset($_GET['maSP'])){

$ketqua = $p->getChiTietSanPham($_GET['maSP']);

if ($ketqua && $row = $ketqua->fetch_assoc()) {

?>

<h1 align="center" style="color:green;padding-bottom:20px;">
Chi tiết sản phẩm
</h1>

<style>

.product-details{
width:90%;
margin:auto;
display:flex;
gap:50px;
align-items:center;
}

.product-details img{
width:350px;
border:1px solid #ddd;
padding:10px;
}

.product-info{
list-style:none;
font-size:18px;
}

.product-info li{
margin-bottom:10px;
}

.price{
color:red;
font-size:24px;
font-weight:bold;
}

.btn-cart{
background:gold;
padding:10px 20px;
border:none;
cursor:pointer;
font-weight:bold;
}

.btn-cart:hover{
background:orange;
}


</style>

<div class="product-details">

<img src="image/anhsp/<?php echo $row["HinhAnh"]; ?>">

<ul class="product-info">

<li><b>Tên sản phẩm:</b> <?php echo $row["TenSP"]; ?></li>


<li class="price">
<?php echo number_format($row["Gia"],0,",","."); ?> đ
</li>

<li><b>Mô tả:</b> <?php echo $row["MoTa"]; ?></li>

<br>

<form method="post" action="view/themgiohang.php">

<input type="hidden" name="masp" value="<?php echo $row["MaSP"]; ?>">
<input type="hidden" name="tensp" value="<?php echo $row["TenSP"]; ?>">
<input type="hidden" name="gia" value="<?php echo $row["Gia"]; ?>">
<input type="hidden" name="hinhanh" value="<?php echo $row["HinhAnh"]; ?>">
Số lượng:
<input type="number" name="soluong" value="1" min="1">

<br><br>

<button class="btn-cart">
Thêm vào giỏ hàng
</button>

</form>

<br>

<a href="index.php?page=sanpham">
← Quay lại danh sách sản phẩm
</a>

</ul>

</div>

<?php

}else{
    echo "<h2 align='center'>Sản phẩm không tồn tại</h2>";
}

}
?>