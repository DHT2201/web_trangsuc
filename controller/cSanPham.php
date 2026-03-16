<?php
    include_once("model/mSanPham.php");
    include_once("upload.php");
    class controllerSanPham{
        public function getAllSanPham(){
            $p = new modelSanPham();
            $kq = $p->selectAllSanPham();
            if(!$kq){
                echo "No data !";
            }else{
                if($kq->num_rows > 0)
                    return $kq;
            }
        }

        public function getOneSanPham($maSP){
            $p = new modelSanPham();
            $kq = $p->selectOneSanPham($maSP);
            if(!$kq){
                echo "No data !";
            }else{
                if($kq->num_rows > 0)
                    return $kq;
            }
        }

        public function getAllSanPhamByTH($th){
            $p = new modelSanPham();
            $kq = $p->selectAllSanPhamByTH($th);
            if(!$kq){
                echo "No data !";
            }else{
                if($kq->num_rows > 0)
                    return $kq;
            }
        }

        public function getAllSanPhamByName($name){
            $p = new modelSanPham();
            $kq = $p->selectAllSanPhamByName($name);
            if(!$kq){
                echo "No data !";
            }else{
                if($kq->num_rows > 0)
                    return $kq;
            }
        }

        public function updateSanPham($maSP, $tenSP, $giaGoc, $giaBan, $fileHinh, $hinh, $thuongHieu){
            if($fileHinh["tmp_name"] != ""){
                $pu = new clsUploadHinhSP();
                $kq = $pu->uploadAnh($fileHinh, $tenSP, $hinh);
                if(!$kq)
                    return false;
            }
            $p = new modelSanPham();
            $kq = $p->updateSanPham($maSP, $tenSP, $giaGoc, $giaBan, $hinh, $thuongHieu);
            return $kq;
            

        }
    public function getChiTietSanPham($maSP){

    $p = new modelSanPham();

    $kq = $p->selectChiTietSanPham($maSP);

    return $kq;
}
public function getSanPhamTheoLoai($maLoai)
{
    include_once("model/mSanPham.php");
    $p = new modelSanPham();
    return $p->selectSanPhamTheoLoai($maLoai);
}
    }

?>