<?php // connect to datebase 
require ("../config/db.class.php");  
include("../admin/permission.php");
// delete data in mysql database 
$DB = new Db();
$id = $_GET["MaSP"];
mysqli_query($DB->connect(),"DELETE FROM sanpham WHERE MaSP='$id'"); 
header("Location: store/admin/show_SanPham.php");  
?>