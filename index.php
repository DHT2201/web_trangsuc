<?php 
session_start(); 

// 👉 thêm controller đặt hàng
include_once("controller/cDatHang.php");
$datHang = new cDatHang();
?>

<!DOCTYPE html>
<html lang="vi">
<head>
<meta charset="UTF-8">
<title>Luxury Jewelry</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<style>
body{
margin:0;
font-family:Arial;
background:#f5f5f5;
}

/* HEADER */
header{
background:#111;
color:white;
padding:15px 40px;
}

.title h1{
margin:0;
color:gold;
}

.title p{
margin:0;
}

/* MENU */
.menu{
background:#222;
padding:10px;
}

.menu a{
color:white;
text-decoration:none;
padding:10px 15px;
display:inline-block;
}

.menu a:hover{
background:gold;
color:black;
}

/* DROPDOWN */
.dropdown{
display:inline-block;
position:relative;
}

.dropdown-content{
display:none;
position:absolute;
background:#333;
min-width:160px;
}

.dropdown-content a{
display:block;
padding:10px;
color:white;
}

.dropdown-content ul{
list-style:none;
padding:0;
margin:0;
}

.dropdown-content li{
list-style:none;
}

.dropdown-content a:hover{
background:gold;
color:black;
}

.dropdown:hover .dropdown-content{
display:block;
}

/* SEARCH */
.formSearch{
float:right;
}

.formSearch input{
padding:5px;
}

/* CONTENT */
section{
padding:20px;
}

article{
background:white;
padding:20px;
border-radius:5px;
}

/* FOOTER */
footer{
background:#111;
color:white;
text-align:center;
padding:15px;
margin-top:20px;
}

/* CART ICON */
.cartIcon{
float:right;
color:white;
font-size:22px;
margin-right:10px;
margin-top:3px;
}

.cartIcon:hover{
color:gold;
}
</style>

</head>

<body>

<header>
<div class="title">
<h1>Luxury Jewelry</h1>
<p>Trang sức sang trọng - Tôn vinh vẻ đẹp của bạn</p>
</div>
</header>

<div class="menu">

<a href="index.php">Trang chủ</a>

<div class="dropdown">
<a href="index.php?page=sanpham">Sản phẩm</a>

<div class="dropdown-content">
<?php include_once("view/thuonghieu.php"); ?>
</div>
</div>

<a href="index.php?page=gioithieu">Giới thiệu</a>
<a href="index.php?page=baiviet">Bài viết</a>

<?php
if(isset($_SESSION["dangnhap"])){

echo "<a href='index.php?page=quanly'>Quản lý</a>";
echo "<a href='index.php?page=thongke'>Thống kê</a>";
echo "<a href='index.php?page=dangxuat'>Đăng xuất</a>";

}else{
echo "<a href='index.php?page=dangnhap'>Đăng nhập</a>";
}
?>

<a href="index.php?page=giohang" class="cartIcon">
<i class="fa-solid fa-cart-shopping"></i>
</a>

<form action="index.php?page=timkiem" method="post" class="formSearch">
<input type="text" name="txtSearch" placeholder="Tìm trang sức...">
<input type="submit" value="Search" name="btnSearch">
</form>

</div>

<section>
<article>

<?php

if(isset($_GET["page"])){

$page = $_GET["page"];

switch($page){

case "gioithieu":
    include("view/gioithieu.php");
    break;

case "sanpham":
    include("view/sanpham.php");
    break;

case "chitiet":
    include("view/chitietsanpham.php");
    break;

case "giohang":
    include("view/giohang.php");
    break;

case "xoagiohang":
    include("view/xoagiohang.php");
    break;

case "baiviet":
    include("view/baiviet.php");
    break;

case "dangnhap":
    include("view/dangnhap.php");
    break;

case "dangxuat":
    include("view/dangxuat.php");
    break;

case "quanly":
    include("admin.php");
    break;
case "thanhToanQR":
    $p = new cDatHang();
    $p->thanhToanQR();
    break;
// case "thongke":
// include("admin/thongke.php");
// break;

case "timkiem":
    include("view/timkiem.php");
    break;

/* ====== ĐẶT HÀNG MVC ====== */

case "datHang":
    $datHang->xuLyDatHang();
    break;

case "xacNhan":
    $datHang->xuLyXacNhan();
    break;

case "thanhToan":
    $datHang->xuLyThanhToan();
    break;
case "xacNhanThanhToan":
    $datHang->xacNhanThanhToan();
    break;

/* ========================== */

default:
    include("view/sanpham.php");
}

}else{
    include("view/sanpham.php");
}

?>

</article>
</section>

<footer>
<p>Luxury Jewelry Store</p>
<p>Địa chỉ: TP.HCM</p>
<p>Hotline: 0900 000 000</p>
</footer>

</body>
</html>