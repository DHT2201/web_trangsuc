<?php
include_once("model/mDatHang.php");
// var_dump($_SESSION['buy_now']);
// die();
class cDatHang {

    // B1: nhận từ trang chi tiết
   function xuLyDatHang() {

        $_SESSION['buy_now'] = $_POST;

        $step = "thongtin";
        include_once("view/datHang.php");
    }

    function xuLyXacNhan() {


        $_SESSION['khachhang'] = $_POST;

        $step = "xacnhan";
        include_once("view/datHang.php");
    }

    function xuLyThanhToan() {

        $model = new mDatHang();

        $kq = $model->themDonHang(
            $_SESSION['khachhang'],
            $_SESSION['buy_now']
        );

        $step = "ketqua";
        $success = $kq;

        if($kq){
            unset($_SESSION['buy_now']);
            unset($_SESSION['khachhang']);
        }

        include_once("view/datHang.php");
    }

function thanhToanQR(){
    $model = new mDatHang();

    $maDH = $model->taoDonHang(
        $_SESSION['khachhang'],
        $_SESSION['buy_now']
    );

    if($maDH){
        $_SESSION['MaDH'] = $maDH;
        $_SESSION['tongtien'] = $_SESSION['buy_now']['gia'] * $_SESSION['buy_now']['soluong'];

        $step = "qr";
        include_once("view/datHang.php"); // ✅ sửa lại
    }
}

function xacNhanThanhToan(){
    $model = new mDatHang();

    $id = $_GET['id'];

    $model->updateTrangThai($id, "paid");

    echo "<script>
        alert('Đã xác nhận thanh toán!');
        window.location='index.php?page=quanly&type=donhang';
    </script>";
}

}
?>