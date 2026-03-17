<?php
    include_once("ketnoi.php");
    class modelThuongHieu{
        public function selectAllThuongHieu(){
            $p = new clsKetNoi();
            $con = $p->moKetNoi();
            $sql = "select * from loaisanpham";
            $kq = $con->query($sql);
            $p->dongKetNoi($con);
            return $kq;
        }
    }

?>