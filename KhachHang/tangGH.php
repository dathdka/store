<?php
    require_once("../config/db.class.php");
    require_once("../entities/gioHang.class.php");
    if(isset($_GET["MaSP"], $_GET["amount"], $_COOKIE["username"]))
    {
        $MaSP = $_GET["MaSP"];
        $amount = $_GET["amount"];
        $Email = $_COOKIE["username"];
        $sql = "UPDATE giohang SET SoLuong = $amount WHERE MaSP= $MaSP AND Email= '$Email'";
        $DB = new dB();
        $DB->query_execute($sql); 
    }
?>