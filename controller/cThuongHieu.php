<?php
    include_once("model/mThuongHieu.php");
    class controllerThuongHieu{
        public function getAllThuongHieu(){
            $p = new modelThuongHieu();
            $kq = $p->selectAllThuongHieu();
            if(!$kq){
                echo "No data !";
            }else{
                if($kq->num_rows > 0)
                    return $kq;
            }
        }
    }

?>