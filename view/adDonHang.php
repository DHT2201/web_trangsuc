<?php
include_once("model/mDatHang.php");
$model = new mDatHang();

$list = $model->getAllDonHang();
?>

<h2>Quản lý đơn hàng</h2>

<table border="1" width="100%">
<tr>
    <th>Mã</th>
    <th>Khách</th>
    <th>SĐT</th>
    <th>Tổng tiền</th>
    <th>Trạng thái</th>
    <th>Hành động</th>
</tr>

<?php while($row = mysqli_fetch_assoc($list)){ ?>
<tr>
    <td><?= $row['MaDH'] ?></td>
    <td><?= $row['TenKhach'] ?></td>
    <td><?= $row['DienThoai'] ?></td>
    <td><?= number_format($row['TongTien']) ?></td>

    <td>
        <?php
        if($row['TrangThai'] == 'pending'){
            echo "<span style='color:orange'>Chờ thanh toán</span>";
        }else{
            echo "<span style='color:green'>Đã thanh toán</span>";
        }
        ?>
    </td>

    <td>
        <?php if($row['TrangThai'] == 'pending'){ ?>
            <a href="index.php?page=xacNhanThanhToan&id=<?= $row['MaDH'] ?>">
                Xác nhận
            </a>
        <?php } ?>
    </td>
</tr>
<?php } ?>
</table>