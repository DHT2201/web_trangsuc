<?php
    include_once("ketnoi.php");
    class modelSanPham{
        public function selectAllSanPham(){
            $p = new clsKetNoi();
            $con = $p->moKetNoi();
            $sql = "select * from sanpham ";
            $kq = $con->query($sql);
            $p->dongKetNoi($con);
            return $kq;
        }

        public function selectOneSanPham($maSP){
            $p = new clsKetNoi();
            $con = $p->moKetNoi();
            $sql = "select * from sanpham s join thuonghieu t on s.MaTH = t.MaTH where MaSP = '$maSP'";
            $kq = $con->query($sql);
            $p->dongKetNoi($con);
            return $kq;
        }

        public function selectAllSanPhamByTH($th){
            $p = new clsKetNoi();
            $con = $p->moKetNoi();
            $sql = "select * from sanpham s join thuonghieu t on s.MaTH = t.MaTH where s.MaTH = $th";
            $kq = $con->query($sql);
            $p->dongKetNoi($con);
            return $kq;
        }
        public function selectAllSanPhamByName($name){
            $p = new clsKetNoi();
            $con = $p->moKetNoi();
            $sql = "select * from sanpham s join thuonghieu t on s.MaTH = t.MaTH where TenSP like N'%$name%'";
            $kq = $con->query($sql);
            $p->dongKetNoi($con);
            return $kq;
        }

        public function updateSanPham($maSP, $tenSP, $giaGoc, $giaBan, $hinhAnh, $thuongHieu){
            $p = new clsKetNoi();
            if($giaBan == null){
                $sql = "update sanpham set TenSP = N'$tenSP', GiaGoc = $giaGoc, GiaBan = null, HinhAnh = '$hinhAnh', MaTH = $thuongHieu where MaSP = $maSP";
            }else{
                $sql = "update sanpham set TenSP = N'$tenSP', GiaGoc = $giaGoc, GiaBan = $giaBan, HinhAnh = '$hinhAnh', MaTH = $thuongHieu where MaSP = $maSP";
            }
            $con = $p->moKetNoi();
            $kq = $con->query($sql);
            $p->dongKetNoi($con);
            return $kq;
        }
            public function selectChiTietSanPham($maSP){
            
            $p = new clsKetNoi();
            $con = $p->moKetNoi();

            $truyvan = "SELECT s.*, t.TenTH 
                        FROM sanpham s 
                        JOIN thuonghieu t ON s.MaTH = t.MaTH
                        WHERE s.MaSP = $maSP";

            $kq = $con->query($truyvan);

            $p->dongKetNoi($con);

            return $kq;
        }
        public function selectSanPhamTheoLoai($maLoai)
{
    $sql = "SELECT * FROM sanpham WHERE MaLoai = '$maLoai'";
    return $this->conn->query($sql);
}
    }

?>