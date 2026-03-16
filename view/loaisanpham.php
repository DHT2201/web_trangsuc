<div class="container">

<div class="left">
<?php include("view/menu_loaisp.php"); ?>
</div>

<div class="right">
<?php
if(isset($_GET["page"]))
{
    $page = $_GET["page"];
    include("view/".$page.".php");
}
else
{
    include("view/sanpham.php");
}
?>
</div>

</div>