<?php
include_once("controller/cSanPham.php");

if(!isset($_GET['id'])){
    header("Location: admin.php");
    exit();
}

$maSP = $_GET['id'];

$p = new controllerSanPham();

$sp = $p->getOneSanPham($maSP);
if($sp){
    $r = $sp->fetch_assoc();
    $tenSP = $r["TenSP"];
    $gia = $r["Gia"];
    $hinhanh = $r["HinhAnh"];
    $maloai  = $r["MaLoai"];
}
?>
<style>
body{
    font-family: Arial;
    background: #f5f5f5;
}

.container{
    width: 600px;
    margin: 40px auto;
    background: white;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0,0,0,0.1);
}

h2{
    text-align: center;
    margin-bottom: 20px;
}

table{
    width: 100%;
}

td{
    padding: 10px;
}

input, select{
    width: 100%;
    padding: 10px;
    font-size: 16px;
}

input[type="submit"]{
    background: #28a745;
    color: white;
    border: none;
    cursor: pointer;
}

input[type="submit"]:hover{
    background: #218838;
}

img{
    margin-top: 10px;
    border-radius: 5px;
}
.tsp{
    width: 150px;   /* tăng chiều rộng */
  
}

</style>
<div class="container">

<h2>CẬP NHẬT SẢN PHẨM</h2>

<form method="post" enctype="multipart/form-data">

<table>

<tr>
<td class="tsp">Tên sản phẩm</td>
<td>
<input type="text" name="tensp" value="<?php echo $tenSP ?>">
</td>
</tr>

<tr>
<td>Giá</td>
<td>
<input type="number" name="gia" value="<?php echo $gia ?>">
</td>
</tr>

<tr>
<td>Hình ảnh</td>
<td>

<input type="file" name="hinhanh">

<img src="image/anhsp/<?php echo $hinhanh ?>" width="150">

</td>
</tr>

<tr>
<td>Thương hiệu</td>

<td>

<?php
include_once("controller/cThuongHieu.php");

$th = new controllerThuongHieu();
$ds = $th->getAllThuongHieu();

echo "<select name='cboThuongHieu'>";

while($row = $ds->fetch_assoc()){

    if($row["MaLoai"] == $maloai ){
        echo "<option value='".$row["MaLoai"]."' selected>".$row["TenLoai"]."</option>";
    }
    else{
        echo "<option value='".$row["MaLoai"]."'>".$row["TenLoai"]."</option>";
    }

}

echo "</select>";
?>

</td>
</tr>

<tr>
<td colspan="2" align="center">
<input type="submit" name="btnSua" value="Cập nhật">
</td>
</tr>

</table>

</form>

</div>

<?php

if(isset($_POST["btnSua"])){

    $kq = $p->updateSanPham(
        $maSP,
        $_POST["tensp"],
        $_POST["gia"],
        $_FILES["hinhanh"],
        $hinhanh,
        $_POST["cboThuongHieu"]
    );

    if($kq){
        echo "<script>alert('Cập nhật thành công')</script>";
        echo "<script>window.location='admin.php'</script>";
    }
    else{
        echo "<script>alert('Cập nhật thất bại')</script>";
    }

}
?>