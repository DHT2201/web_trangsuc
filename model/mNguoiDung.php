<?php
include_once("ketnoi.php");
class modelNguoiDung{
    public function selectAUser($username, $password){
        $p = new clsKetNoi();
        $con = $p->moKetNoi();
        $sql = "select * from nguoidung where Username = '$username' and Password = '$password'";
        $kq = $con->query($sql);
        $p->dongKetNoi($con);
        return $kq;
    }
}

?>