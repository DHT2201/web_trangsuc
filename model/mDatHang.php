<?php
include_once("ketnoi.php");

class mDatHang {

    function themDonHang($kh, $sp){
        $p = new clsKetNoi();
        $conn = $p->moKetNoi();

        $tongtien = $sp['gia'] * $sp['soluong'];

        // thêm đơn hàng
        $sql1 = "INSERT INTO donhang(TenKhach, DienThoai, DiaChi, NgayDat, TongTien, TrangThai)
         VALUES (
            '{$kh['ten']}',
            '{$kh['sdt']}',
            '{$kh['diachi']}',
            NOW(),
            '$tongtien',
            'pending'
         )";
        if(mysqli_query($conn, $sql1)){
            $order_id = mysqli_insert_id($conn);

            // thêm chi tiết đơn hàng
           $sql2 = "INSERT INTO chitietdonhang(MaDH, MaSP, SoLuong, Gia)
         VALUES (
            '$order_id',
            '{$sp['masp']}',
            '{$sp['soluong']}',
            '{$sp['gia']}'
         )";

            return mysqli_query($conn, $sql2);
        }

        return false;
    }

    function taoDonHang($kh, $sp){
    $p = new clsKetNoi();
    $conn = $p->moKetNoi();

    $tongtien = $sp['gia'] * $sp['soluong'];

 $sql = "INSERT INTO donhang(TenKhach, DienThoai, DiaChi, NgayDat, TongTien, TrangThai)
        VALUES (
            '{$kh['ten']}',
            '{$kh['sdt']}',
            '{$kh['diachi']}',
            NOW(),
            '$tongtien',
            'pending'
        )";

    if(mysqli_query($conn, $sql)){
        return mysqli_insert_id($conn); // trả về MaDH
    }

    return false;

}

     public function createOrder($conn, $tong){
        $sql = "INSERT INTO orders (total, status) VALUES ('$tong', 'pending')";
        mysqli_query($conn, $sql);
        return mysqli_insert_id($conn);
    }

    public function updateStatus($conn, $id, $status){
        $sql = "UPDATE orders SET TrangThai='$status' WHERE ID='$id'";
        return mysqli_query($conn, $sql);
    }

    function updateTrangThai($id, $status){
    $p = new clsKetNoi();
    $conn = $p->moKetNoi();

    $sql = "UPDATE donhang SET TrangThai='$status' WHERE MaDH='$id'";
    return mysqli_query($conn, $sql);
}
function getAllDonHang(){
    $p = new clsKetNoi();
    $conn = $p->moKetNoi();

    $sql = "SELECT * FROM donhang ORDER BY MaDH DESC";
    return mysqli_query($conn, $sql);
}
}
?>