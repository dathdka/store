<?php
    require_once "../entities/gioHang.class.php";
    include("../KhachHang/permission.php");
    if(isset($_GET["MaSP"]))
    {
        $gh = new gioHang($_GET["MaSP"], $_COOKIE["username"], 1);
        $gh->save();
    }
        
?>