<?php

$id = $_GET["id"];

unset($_SESSION["giohang"][$id]);

header("location:index.php?page=giohang");

?>