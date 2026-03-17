<style>
    .formUpd {
            width: 60%;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table td, table th {
            padding: 10px;
            border: 1px solid #ddd;
        }
        input[type="text"], input[type="number"], input[type="file"], select {
            width: calc(100% - 12px); /* Giảm độ rộng để phù hợp với border */
            padding: 8px;
            margin-top: 4px;
        }
        input[type="submit"], input[type="reset"] {
            padding: 10px 20px;
            margin-top: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }
        input[type="submit"]:hover, input[type="reset"]:hover {
            background-color: #45a049;
        }
        img {
            max-width: 120px;
            height: auto;
        }
   textarea {
    width: calc(100% - 12px);
    padding: 8px;
    margin-top: 4px;
    box-sizing: border-box;

    height: 120px;      
    resize: vertical;   
}
</style>
<form method="post" enctype="multipart/form-data" action="#" class="formUpd">
        <table>
            <h1 align="center">THÊM SẢN PHẨM</h1>
            <tr>
                <td width="30%">Tên sản phẩm</td>
                <td><input type="text" name="tensp" required /></td>
            </tr>
            <tr>
                <td>Giá bán</td>
                <td><input type="number" name="giaban" required  /></td>
            </tr>
            <tr>
                <td>Hình ảnh</td>
                <td>
                    <input type="file" name="hinhanh" /><br>
                </td>
            </tr>
    <tr>
        <td>Mô tả</td>
                <td><textarea name="mota" placeholder="Nhập mô tả sản phẩm tại đây..."></textarea></td>
</tr>
            <tr>
                <td><label for="thuonghieu">Loại</label></td>
                <td>
                    <?php
                        include_once("Controller/cthuonghieu.php");
                        $p = new controllerThuongHieu();
                        $kq = $p->getAllThuongHieu();
                        if(!$kq){
                            echo "No data !";
                        }else{
                            echo "<select name = 'cboThuongHieu'>";
                                while ($r =  $kq->fetch_assoc()) {
                                    if($r["TenTH"] == $thuonghieu){
                                        echo "<option value='".$r['MaLoai']."' selected>".$r['MaLoai']."</option>";
                                    }else{
                                        echo "<option value=".$r['MaLoai'].">".$r['MaLoai']."</option>";
                                    }
                                    
                                }
                            echo "</select>";
                        }
                        
                    ?>


                </td>
            </tr>
            <tr>
                
                <td align='center' colspan='2'>
                    <input type="submit" name="btthem" value="INSERT" />
                    <input type="reset" name="" value="Hủy bỏ" />
                </td>
            </tr>
        </table>
    </form>
    <?php
    
    include_once("Controller/csanpham.php");
    if(isset($_REQUEST["btthem"])){

    $pu = new controllerSanPham();

    $kq = $pu->insert(
        $_REQUEST["tensp"],
        $_REQUEST["giaban"],          // giá
        $_FILES["hinhanh"],           // file
        $_REQUEST["mota"],            // mô tả
        $_REQUEST["cboThuongHieu"]    // loại
    );

    if($kq){
        echo "<script>alert('Thêm sản phẩm thành công')</script>";
    }else{
        echo "<script>alert('Thêm thất bại')</script>";
    }
}
    

?>