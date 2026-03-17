
<style>
    .formDN td{
        height:30px;
        padding:10px;
    }
    .formDN input{
        width:200px;
        height:25px;
    }
</style>
<h2 align='center'>Thông tin đăng nhập</h2>
<form name ="formLogin" action="#" method="post" class="formDN" enctype="multipart/form-data">
    <table witdh="80%" align="center" style= "text-align:center; border-collapse:collapse;" border="0">
        <tr>
            <td>Username</td>
            <td><input type="text" name="username" id=""></td>
        </tr>
        <tr>
            <td>Password</td>
            <td><input type="password" name="password" id=""></td>
        </tr>
        <tr>
            <td></td>
            <td>
                <button type="submit" name="submit">Đăng nhập</button>
                <button type="reset">Huy</button>
            </td>
        </tr>
    </table>
</form>

<?php
    
    include_once("controller/cNguoiDung.php");
    if(isset($_REQUEST["submit"])){
        $username = $_REQUEST["username"];
        $password = $_REQUEST["password"];
        $p = new controlNguoiDung();
        $kq = $p->login($username, $password);
    }
?>
