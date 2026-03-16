<?php

if(!isset($_SESSION["giohang"]) || count($_SESSION["giohang"])==0)
{
    echo "<h2>Giỏ hàng của bạn đang trống</h2>";
    return;
}

$tong=0;
?>

<h2>Giỏ hàng</h2>

<table border="1" width="100%" cellpadding="10">

<tr>
<th>Mã SP</th>
<th>Hình ảnh</th>
<th>Tên sản phẩm</th>
<th>Giá</th>
<th>Số lượng</th>
<th>Thành tiền</th>
<th>Xóa</th>
</tr>

<?php

foreach($_SESSION["giohang"] as $key=>$sp)
{

$thanhtien = $sp["gia"] * $sp["soluong"];
$tong += $thanhtien;

echo "<tr>";

echo "<td>".$sp["masp"]."</td>";
echo "<td style='border:1px solid black;padding:10px;text-align:center'>
<img src='image/anhsp/".$sp["hinhanh"]."' width='100px'>";
echo "<td>".$sp["tensp"]."</td>";
echo "<td>".$sp["gia"]."</td>";
echo "<td>".$sp["soluong"]."</td>";
echo "<td>".$thanhtien."</td>";

echo "<td>
<a href='index.php?page=xoagiohang&id=".$key."'>
Xóa
</a>
</td>";

echo "</tr>";

}

?>

<tr>
<td colspan="4"><b>Tổng tiền</b></td>
<td colspan="3"><b><?php echo $tong ?> VNĐ</b></td>
</tr>

</table>