<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chỉnh sửa sản phẩm</title>
    <style>
        .formUpd table {
            width: 60%;
            margin:auto;
            border-collapse: collapse;
        }
        .formUpd td {
            padding: 5px;
        }
        .formUpd input[type="text"], .formUpd select {
            width: 250px;
            padding: 5px;
        }
        .formUpd input[type="number"], .formUpd select {
            width: 250px;
            padding: 5px;
        }
        .formUpd input[type="submit"], input[type="reset"] {
            padding: 10px 20px;
        }
    </style>
</head>
<body>
<?php
$maSP = $_REQUEST['id'];
include_once("controller/cSanPham.php");
$p = new controllerSanPham();
$sp = $p->getOneSanPham($maSP);
if($sp){
    while($r= $sp->fetch_assoc()){
        $tensp = $r["TenSP"];
        $giaban = $r["GiaBan"];
        $giagoc = $r["GiaGoc"];
        $hinhanh = $r["HinhAnh"];
        $thuonghieu = $r["TenTH"];
    }
}else{
    echo 'Sản phẩm không tồn tại !';
    header("Location: admin.php");
}
?>

    <h3 align='center'>Chỉnh sửa sản phẩm</h3>
    <form method="post" enctype="multipart/form-data" action="#" class="formUpd">
        <table>
            <tr>
                <td width="30%">Tên sản phẩm</td>
                <td><input type="text" name="tensp" required value="<?php if(isset($tensp)) echo $tensp; ?>" /></td>
            </tr>
            <tr>
                <td>Giá gốc</td>
                <td><input type="number" name="giagoc" required value="<?php if(isset($giagoc)) echo $giagoc; ?>" /></td>
            </tr>
            <tr>
                <td>Giá bán</td>
                <td><input type="number" name="giaban" required value="<?php if(isset($giaban)) echo $giaban; ?>" /></td>
            </tr>
            <tr>
                <td>Hình ảnh</td>
                <td>
                    <input type="file" name="hinhanh" /><br>
                    <img src="image/anhsp/<?php if(isset($hinhanh)) echo $hinhanh; ?>" width="120px">
                </td>
            </tr>

            <tr>
                <td><label for="thuonghieu">Thương hiệu</label></td>
                <td>
                    <?php
                        include_once("controller/cThuongHieu.php");
                        $p = new controllerThuongHieu();
                        $kq = $p->getAllThuongHieu();
                        if(!$kq){
                            echo "No data !";
                        }else{
                            echo "<select name = 'cboThuongHieu'>";
                                while ($r =  $kq->fetch_assoc()) {
                                    if($r["TenTH"] == $thuonghieu){
                                        echo "<option value='".$r['MaTH']."' selected>".$r['TenTH']."</option>";
                                    }else{
                                        echo "<option value=".$r['MaTH'].">".$r['TenTH']."</option>";
                                    }
                                    
                                }
                            echo "</select>";
                        }
                        
                    ?>


                </td>
            </tr>
            <tr>
                
                <td align='center' colspan='2'>
                    <input type="submit" name="btSua" value="Cập nhật" />
                    <input type="reset" name="" value="Hủy bỏ" />
                </td>
            </tr>
        </table>
    </form>
    <?php
        include_once("controller/cSanPham.php");
        $p = new controllerSanPham();
        if(isset($_REQUEST["btSua"])){
            $kq = $p->updateSanPham($maSP, $_REQUEST["tensp"], $_REQUEST["giagoc"],$_REQUEST["giaban"], $_FILES["hinhanh"], $hinhanh, $_REQUEST["cboThuongHieu"]);
            if($kq){
                echo "<script>alert('Upload thành công !')</script>";
            }else{
                echo "<script>alert('Upload thất bại !')</script>";
            }       
        }

?>
</body>
</html>
