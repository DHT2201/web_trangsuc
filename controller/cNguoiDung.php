<?php

include_once("model/mNguoiDung.php");

class controlNguoiDung{

    function login($username,$password){
        $password = md5($password);
        $p = new modelNguoiDung();
        $kq = $p->selectAUser($username,$password);

        if($kq && $kq->num_rows > 0){

            $_SESSION["dangnhap"] = $username;

            echo "<script>alert('Đăng nhập thành công')</script>";
            echo "<script>window.location='index.php?page=quanly'</script>";

        }else{

            echo "<script>alert('Sai username hoặc password')</script>";

        }

    }

}
?>