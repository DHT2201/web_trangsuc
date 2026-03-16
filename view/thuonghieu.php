<?php
    include_once("controller/cThuongHieu.php");
    $p = new controllerThuongHieu();
    $kq = $p->getAllThuongHieu();
    
    echo "<ul>";
    while ($r =  $kq->fetch_assoc()) {
        echo "<li><a href='?th=".$r['MaLoai']."'>".$r['TenLoai']."</a></li>";
    }
    echo "</ul>";


?>

