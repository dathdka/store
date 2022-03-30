<?php
    require_once("../KhachHang/layout/header.php");
    require_once("../entities/CTDDH.class.php");
    require_once("../entities/sanPham.class.php");
    echo "<h1>hello</h1>";
    $dSBC = cTDDH::bestSell();
    foreach ($dSBC as $SP){
        $item = sanPham::laySanPham($SP["MaSP"]);
?>
    
    <div class="container" style="margin-top: 10px; border: 2px solid;"> 
        <!-- <div class="row"> -->
        <div class="col-sm-12">
        <div class="box-text">
        <h1><?php echo $item->TenSP ?></h1>
        <?php if($item->KhuyenMai>0) {
            ?>
                <p id="home-text" style="text-decoration: line-through;"><?php echo $item->DonGia ?></p>
                <p id="home-text"><?php echo $item->DonGia - ($item->KhuyenMai* $item->DonGia)/100 ?></p>
        <?php    }
        else{ ?>
        <p id="home-text"><?php echo $item->DonGia ?></p>
        <?php }
        ?>
        <p id="home-text"><?php echo ($item->GioiTinh == "0") ? "Nam" : "Nữ"; ?></p>
        <p id="home-text"><?php echo $item->MoTa ?></p>
        <p id="home-text"><?php echo $item->SoLuong ?></p>
        <p id="home-text" style="line-through:true"><?php echo $item->KhuyenMai ?></p>
        
        
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
                echo "<a href='dangNhap.php' >
                        <input type='button' value='Đăng nhập để mua hàng' class='btn btn-primary' />
                    </a>";
            } ?>
                <a href="chiTietSanPham.php?MaSP=<?php echo $item->MaSP?>">
                    <button class="btn btn-primary" style="display: block; margin-top: 10px;">Xem chi tiết sản phẩm</button>
                </a>
                </div>
                <img src="<?php echo $item->HinhAnh ?>" style="width: 40%; height:400px">
        </div>
    <!-- </div> -->
    </div> 
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