<?php
    require_once("../KhachHang/layout/header.php");
    require_once("../entities/CTDDH.class.php");
    require_once("../entities/sanPham.class.php");
    echo "<h1>hello</h1>";
    $dSBC = cTDDH::bestSell();
    foreach ($dSBC as $SP){
        $item = sanPham::laySanPham($SP["MaSP"]);
?>
    
        <h1><?php echo $item->TenSP ?></h1>
        <?php if($item->KhuyenMai>0) {
            ?>
                <h1 style="text-decoration: line-through;"><?php echo $item->DonGia ?></h1>
                <h1><?php echo $item->DonGia - ($item->KhuyenMai* $item->DonGia)/100 ?></h1>
        <?php    }
        else{ ?>
        <h1><?php echo $item->DonGia ?></h1>
        <?php }
        ?>
        <h1><?php echo ($item->GioiTinh == "0") ? "Nam" : "Nữ"; ?></h1>
        <h1><?php echo $item->MoTa ?></h1>
        <h1><?php echo $item->SoLuong ?></h1>
        <h1 style="line-through:true"><?php echo $item->KhuyenMai ?></h1>
        <img src="<?php echo $item->HinhAnh ?>" style="width:100px">
<?php 
    }
    ?>
    <!-- Load Facebook SDK for JavaScript -->


<!-- Your embedded comments code -->

    <?php
    require_once("../KhachHang/layout/footer.php");
?>