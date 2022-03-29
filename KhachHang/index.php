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
        <?php if(isset($_COOKIE["username"])){ ?>
        <form method="post" onsubmit="return false" name="form">
            <button type="submit" name="btnGio" id=<?php echo $item->MaSP; ?> onclick="changevalue(<?php echo $item->MaSP; ?>);">
                <?php
                $DB = new dB();
                $sql = "SELECT * FROM gioHang WHERE MaSP =" . $item->MaSP;
                $x = mysqli_fetch_object(mysqli_query($DB->connect(), $sql));

                if ($x != null) {
                    echo "Đã thêm vào giỏ hàng";
                } else {
                    echo "Thêm vào giỏ";
                }
                ?>
            </button>
        </form>
        <?php }
        else{
            echo "<a href='dangNhap.php'>
                        <input type='button' value='Đăng nhập để mua hàng' />
                    </a>";
        } ?>
        <a href="chiTietSanPham.php?MaSP=<?php echo $item->MaSP?>">
            <button>Xem chi tiết sản phẩm</button>
        </a>
<?php 
    }
    ?>
<script type="text/javascript">
    function changevalue(item) {
        const xmlhttp = new XMLHttpRequest();
        var x = document.getElementById(item);
        if (x.innerText == "Thêm vào giỏ") {
            x.innerHTML = "Đã thêm vào giỏ hàng ";
            xmlhttp.open("GET", "themVaoGio.php?MaSP=" + item, true);
            xmlhttp.send();
        } else {
            x.innerHTML = "Thêm vào giỏ";
            xmlhttp.open("GET", "xoaKhoiGio.php?MaSP=" + item, true);
            xmlhttp.send();
        }
    };
   
</script>

    <?php
    require_once("../KhachHang/layout/footer.php");
?>