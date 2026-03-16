<?php
    include_once("controller/cSanPham.php");
    $p = new controllerSanPham();
    if(isset($_REQUEST['th'])){
        $kq = $p->getAllSanPhamByTH($_REQUEST['th']);
    }elseif(isset($_REQUEST['btnSearch'])){
        $kq = $p->getAllSanPhamByName($_REQUEST['txtSearch']);
    }else{
        $kq = $p->getAllSanPham();
    
    }
    echo "<table width='100%' align='center' style='text-align:center'>";
    echo "<tr>";
    $dem = 0;
   if(!$kq){
    echo '<img src="../image/banner/nodata-found.jpg" width="80%" align="center">';
}else{
    while ($r = $kq->fetch_assoc()) {
    
        echo "<td style='border:1px solid black;padding:10px;text-align:center'>
        <img src='image/anhsp/".$r["HinhAnh"]."' width='100px'><br><br>
      <a href='index.php?page=chitiet&maSP=".$r["MaSP"]."'>
<b>".$r["TenSP"]."</b>
</a><br>
        <b>".number_format($r['Gia'],0,",",".")." đ</b>
        </td>";

        $dem++; 

        if($dem%4==0){
            echo "</tr><tr>";
        }
    }

    echo "</tr>";
    echo "</table>";
}

?>

<style>
    li{
        margin-top:3px;
        background:#c2c3c4;   
        padding:5px;
        border-bottom:1px solid black; 
    }
    a{
        padding:5px;
        text-decoration:none;
        font-size:larger;
    }

</style>