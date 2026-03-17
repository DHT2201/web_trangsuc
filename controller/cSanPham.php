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

       public function updateSanPham($maSP,$tenSP,$gia,$fileHinh,$hinhCu,$maloai ){

    $hinh = $hinhCu;

    if($fileHinh["tmp_name"] != ""){

        $hinh = $fileHinh["name"];

        move_uploaded_file(
            $fileHinh["tmp_name"],
            "image/anhsp/".$hinh
        );
    }

    $p = new modelSanPham();
    $kq = $p->updateSanPham($maSP,$tenSP,$gia,$hinh,$maloai );

    return $kq;
}
    public function getChiTietSanPham($maSP){

    $p = new modelSanPham();

    $kq = $p->selectChiTietSanPham($maSP);

    return $kq;
}

public function insert($tenSP, $gia, $fileHinh, $mota, $maloai){
    
    $hinh = "";

    // xử lý upload ảnh
    if($fileHinh["tmp_name"] != ""){
        $pu = new clsUploadHinhSP();
        $kq = $pu->uploadAnh($fileHinh, $tenSP, $hinh);

        if(!$kq){
            return false;
        }
    }

    // lưu DB (chỉ lưu tên file)
    $p = new modelSanPham();
    $kq = $p->themsanpham($tenSP, $gia, $hinh, $mota, $maloai);

    return $kq;
}
    public function UploadSanPham($maSP,$tenSP,$giaGoc,$giaBan,$fileHinh,$hinh,$loai){
        if($fileHinh["tmp_name"] != ""){
            $pu = new clsUploadHinhSP();
            $kq = $pu->uploadAnh($fileHinh,$tenSP,$hinh);
            if(!$kq){
                return false;
            }
        }
        $p= new modelSanPham();
        $kq = $p->updateSanPham($maSP,$tenSP,$giaGoc,$giaBan,$hinh,$loai);
        return $kq;
    }
    public function deleteSanPham($maSP){
    include_once("model/mSanPham.php");
    $m = new modelSanPham();
    return $m->deleteSanPham($maSP);
}

    }

?>