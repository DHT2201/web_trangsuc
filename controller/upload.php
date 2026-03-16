<?php
   class clsUploadHinhSP{
    public function uploadAnh($file, $filename, & $hinh){
        $size = $file['size'];
        $loai = $file['type'];
        $temp = $file['tmp_name'];

        if(!$this->checkSize($file["size"]))
            return false;
        if(!$this->checkType($file["type"]))
            return false;
        $folder = "image/anhsp/";
        $name_arr = explode(".", $file["name"]);
        $ext = "." . $name_arr[count($name_arr) -1];
        $hinh = $this->changeName($filename).$ext;
        $des = $folder.$hinh;
        if(move_uploaded_file($temp, $des)){
            return true;
        }else{
            return false;
        }

    }

    public function checkSize($size){
        $cont = 3*1024*1024;
        if($size<$cont)
            return true;
        return false;
    }

    public function checkType($type){
        $arrType = array("image/jpeg", "image/png", "image/jpg");
        if(in_array($type, $arrType))
            return true;
        return false;
    }
    

    public function changeName($ten){
        $unicode = array(
 
            'a'=>'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ',
             
            'd'=>'đ',
             
            'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
             
            'i'=>'í|ì|ỉ|ĩ|ị',
             
            'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
             
            'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
             
            'y'=>'ý|ỳ|ỷ|ỹ|ỵ',
             
            'A'=>'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
             
            'D'=>'Đ',
             
            'E'=>'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
             
            'I'=>'Í|Ì|Ỉ|Ĩ|Ị',
             
            'O'=>'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
             
            'U'=>'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
             
            'Y'=>'Ý|Ỳ|Ỷ|Ỹ|Ỵ',
             
            );
             
            foreach($unicode as $nonUnicode=>$uni){
             
            $ten = preg_replace("/($uni)/i", $nonUnicode, $ten);
             
            }
            $ten = str_replace(' ','-',$ten);
             
            return $ten;
             
    }
        
   }
?>