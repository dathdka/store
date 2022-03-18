<?php
    require_once "../entities/gioHang.class.php";
    require_once("../config/db.class.php");
    include("../KhachHang/permission.php");

    if(isset($_GET["MaSP"]))
        {
            $DB = new dB();
            $MaSP = $_GET["MaSP"];
            gioHang::delete($MaSP);
        }
?>