<?php
    require_once("../KhachHang/layout/header.php");
    require_once("../entities/CTDDH.class.php");
    require_once("../entities/sanPham.class.php");
    echo "<h1>hello</h1>";
    $MaSP =$_GET["MaSP"] ;
?>
<div class="fb-comments" data-href="http://www.localhost<?php echo $_SERVER['PHP_SELF']."?MaSP=".$MaSP; ?>" data-width="100%" data-numposts="5"></div>