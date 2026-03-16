<?php 

if(!isset($_SESSION["dangnhap"])){

    echo "<script>alert('Không có quyền truy cập')</script>";
    echo "<script>window.location='index.php'</script>";

}

?>

<style>

.adminLayout{
display:flex;
gap:20px;
}

.adminMenu{
width:220px;
background:#eee;
padding:15px;
border-radius:5px;
}

.adminMenu ul{
list-style:none;
padding:0;
margin:0;
}

.adminMenu li{
background:#ddd;
margin-bottom:8px;
padding:10px;
}

.adminMenu a{
text-decoration:none;
color:black;
}

.adminMenu a:hover{
color:red;
}

.adminContent{
flex:1;
background:white;
padding:20px;
border-radius:5px;
}

</style>


<div class="adminLayout">

<div class="adminMenu">

<ul>

<li><a href="?page=quanly&type=thuonghieu">Quản lý thương hiệu</a></li>

<li><a href="?page=quanly&type=sanpham">Quản lý sản phẩm</a></li>

<li><a href="?page=quanly&action=insert">Thêm sản phẩm</a></li>

</ul>

</div>


<div class="adminContent">

<?php

if(isset($_REQUEST['type']) && $_REQUEST['type']=='thuonghieu'){

include_once("view/adthuonghieu.php");

}elseif(isset($_REQUEST['type']) && $_REQUEST['type']=='sanpham'){

include_once("view/adsanpham.php");

}elseif(isset($_REQUEST['action']) && $_REQUEST['action']=='update'){

include_once("view/suasanpham.php");

}elseif(isset($_REQUEST['action']) && $_REQUEST['action']=='delete'){

include_once("view/xoasanpham.php");

}elseif(isset($_REQUEST['action']) && $_REQUEST['action']=='insert'){

include_once("view/themsanpham.php");

}else{

echo "<h2>Trang quản lý</h2>";
echo "<p>Chọn chức năng bên trái để quản lý.</p>";

}

?>

</div>

</div>