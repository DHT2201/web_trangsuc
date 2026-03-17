<?php
    include_once("controller/cThuongHieu.php");
    $p = new controllerThuongHieu();
    $kq = $p->getAllThuongHieu();
    
    echo "<table border='1' align='center' width='100%' style='border-collapse:collapse;text-align:center;'>";
    echo "<tr>";
    echo "<th>MaLoai</th><th>Tên Loại</th><th>Thao tác</th>";
    while ($r =  $kq->fetch_assoc()) {
        echo "<tr>";
        echo "<td>".$r['MaLoai']."</td>";
        echo "<td>".$r['TenLoai']."</td>";
        echo "<td><a href='#'>Sửa</a> | <a href='#'>Xóa</a> </td>";
        echo "</tr>";
    }
    echo "</table>";


?>