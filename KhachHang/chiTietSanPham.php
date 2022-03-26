
<?php
    require_once("../KhachHang/layout/header.php");
    require_once("../entities/sanPham.class.php");
    require_once("../entities/binhLuan.class.php");
    echo "<h1>hello</h1>";
    $MaSP =$_GET["MaSP"] ;
?>
<span class="fb-comments-count" data-href="https://www.localhost<?php echo $_SERVER['PHP_SELF']."?MaSP=".$MaSP; ?>"></span>
    

<div class="fb-comments" data-href="https://www.localhost<?php echo $_SERVER['PHP_SELF']."?MaSP=".$MaSP; ?>" data-width="100%" data-numposts="5"></div>

