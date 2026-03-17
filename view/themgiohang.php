<?php
session_start();

$masp = $_POST["masp"];
$tensp = $_POST["tensp"];
$gia = $_POST["gia"];
$hinhanh = $_POST["hinhanh"];
$soluong = $_POST["soluong"];

if(!isset($_SESSION["giohang"]))
{
    $_SESSION["giohang"] = array();
}

$trung = false;

/* kiểm tra sản phẩm đã có chưa */
foreach($_SESSION["giohang"] as &$sp)
{
    if($sp["masp"] == $masp)
    {
        $sp["soluong"] += $soluong; // cộng thêm số lượng
        $trung = true;
        break;
    }
}

/* nếu chưa có thì thêm mới */
if(!$trung)
{
    $sp = array(
        "masp"=>$masp,
        "tensp"=>$tensp,
        "gia"=>$gia,
        "hinhanh"=>$hinhanh,
        "soluong"=>$soluong
    );

    $_SESSION["giohang"][] = $sp;
}

header("location:../index.php?page=giohang");
exit();
?>