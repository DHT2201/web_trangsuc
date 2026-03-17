<?php

include_once("controller/cSanPham.php");

if(!isset($_GET['id'])){
    header("Location: admin.php");
    exit();
}

$maSP = $_GET['id'];

$p = new controllerSanPham();
$sp = $p->getOneSanPham($maSP);

if($sp && $sp->num_rows > 0){
    $r = $sp->fetch_assoc();
    $tenSP = $r["TenSP"];
    $hinhanh = $r["HinhAnh"];
}else{
    header("Location: admin.php");
    exit();
}
?>

<style>
.container{
    width: 500px;
    margin: 50px auto;
    background: white;
    padding: 30px;
    border-radius: 10px;
    text-align: center;
    box-shadow: 0 0 10px rgba(0,0,0,0.1);
}

.btn{
    padding: 10px 20px;
    margin: 10px;
    border: none;
    cursor: pointer;
    font-size: 16px;
}

.btn-danger{
    background: red;
    color: white;
}

.btn-secondary{
    background: gray;
    color: white;
}
</style>

<div class="container">

<h2>XÁC NHẬN XÓA</h2>

<p>Bạn có chắc muốn xóa sản phẩm:</p>

<h3 style="color:red;"><?php echo $tenSP ?></h3>

<img src="image/anhsp/<?php echo $hinhanh ?>" width="120">

<form method="post">
    <input type="submit" name="btnXoa" value="Xóa" class="btn btn-danger">
    <a href="admin.php" class="btn btn-secondary">Hủy</a>
</form>

</div>

<?php

if(isset($_POST["btnXoa"])){

    // XÓA ẢNH
    if(file_exists("image/anhsp/".$hinhanh)){
        unlink("image/anhsp/".$hinhanh);
    }

    // XÓA DB
    $kq = $p->deleteSanPham($maSP);

    if($kq){
        echo "<script>alert('Xóa thành công')</script>";
        echo "<script>window.location='admin.php'</script>";
    }else{
        echo "<script>alert('Xóa thất bại')</script>";
    }
}
?>