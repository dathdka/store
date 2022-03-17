<?php // connect to datebase 
require ("../config/db.class.php");  
include("../admin/permission.php");
// delete data in mysql database 
$DB = new Db();
$id = $_GET["MaNSX"];
mysqli_query($DB->connect(),"DELETE FROM hangsx WHERE MaNSX='$id'"); 
header("Location: show_HSX.php");  
?>