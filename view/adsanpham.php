<?php
include_once("controller/cSanPham.php");

$p = new controllerSanPham();
$kq = $p->getAllSanPham();

echo "<table border='1' align='center' width='100%' style='border-collapse:collapse;text-align:center;'>";

echo "<tr>
<th>Mã SP</th>
<th>Tên sản phẩm</th>
<th>Giá</th>
<th>Hình ảnh</th>
<th>Thao tác</th>
</tr>";

while ($r = $kq->fetch_assoc()) {

echo "<tr>";

echo "<td>".$r["MaSP"]."</td>";

echo "<td>
<a href='index.php?page=chitiet&maSP=".$r["MaSP"]."'>
<b>".$r["TenSP"]."</b>
</a>
</td>";

echo "<td>".number_format($r["Gia"],0,",",".")." đ</td>";

echo "<td>
<img src='image/anhsp/".$r["HinhAnh"]."' width='100'>
</td>";

echo "<td>
<a href='?page=quanly&action=update&id=".$r["MaSP"]."'>Sửa</a> |
<a href='?page=quanly&action=delete&id=".$r["MaSP"]."'>Xóa</a>
</td>";

echo "</tr>";

}

echo "</table>";
?>