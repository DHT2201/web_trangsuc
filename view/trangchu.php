```php
<?php session_start(); ?>
<!DOCTYPE html>
<html lang="vi">

<head>
<meta charset="UTF-8">
<title>Luxury Jewelry</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

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
display:flex;
justify-content:space-between;
align-items:center;
}

.logo{
font-size:26px;
font-weight:bold;
color:gold;
}

/* MENU */

.menu{
background:#222;
padding:10px;
text-align:center;
}

.menu a{
color:white;
text-decoration:none;
padding:10px 18px;
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
}

.dropdown:hover .dropdown-content{
display:block;
}

/* BANNER */

.banner img{
width:100%;
height:420px;
object-fit:cover;
}

/* CATEGORY */

.category{
display:flex;
justify-content:center;
gap:30px;
padding:40px;
background:white;
}

.category div{
text-align:center;
}

.category img{
width:120px;
height:120px;
border-radius:50%;
object-fit:cover;
}

/* PRODUCTS */

.products{
padding:40px;
}

.products h2{
text-align:center;
margin-bottom:30px;
}

.product-grid{
display:grid;
grid-template-columns:repeat(4,1fr);
gap:25px;
}

.product{
background:white;
padding:15px;
text-align:center;
border-radius:6px;
box-shadow:0 2px 5px rgba(0,0,0,0.1);
transition:0.2s;
}

.product img{
width:100%;
height:220px;
object-fit:cover;
}

.product:hover{
transform:scale(1.03);
}

.product a{
text-decoration:none;
color:black;
}

.product button{
background:gold;
border:none;
padding:8px 12px;
cursor:pointer;
}

/* FOOTER */

footer{
background:#111;
color:white;
text-align:center;
padding:20px;
margin-top:40px;
}

</style>
</head>

<body>

<header>

<div class="logo">Luxury Jewelry</div>

<form action="index.php" method="get">
<input type="hidden" name="page" value="sanpham">
<input type="text" name="txtSearch" placeholder="Tìm trang sức...">
<input type="submit" name="btnSearch" value="Search">
</form>

</header>

<div class="menu">

<a href="index.php">Trang chủ</a>

<div class="dropdown">
<a href="index.php?page=sanpham">Sản phẩm</a>

<div class="dropdown-content">
<a href="index.php?page=sanpham&loai=1">Nhẫn</a>
<a href="index.php?page=sanpham&loai=2">Dây chuyền</a>
<a href="index.php?page=sanpham&loai=3">Bông tai</a>
<a href="index.php?page=sanpham&loai=4">Vòng tay</a>
</div>

</div>

<a href="index.php?page=gioithieu">Giới thiệu</a>
<a href="index.php?page=giohang">Giỏ hàng</a>
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

</div>

<!-- BANNER -->

<div class="banner">
<img src="images/banner.jpg">
</div>

<!-- CATEGORY -->

<div class="category">

<div>
<img src="images/nhan.jpg">
<p>Nhẫn</p>
</div>

<div>
<img src="images/daychuyen.jpg">
<p>Dây chuyền</p>
</div>

<div>
<img src="images/bongtai.jpg">
<p>Bông tai</p>
</div>

<div>
<img src="images/vongtay.jpg">
<p>Vòng tay</p>
</div>

</div>

<!-- PRODUCTS -->

<div class="products">

<h2>Sản phẩm nổi bật</h2>

<div class="product-grid">

<?php
include("view/sanpham.php");
?>

</div>

</div>

<footer>

<p>Luxury Jewelry Store</p>
<p>Địa chỉ: TP.HCM</p>
<p>Hotline: 0900 000 000</p>

</footer>

</body>
</html>
```
