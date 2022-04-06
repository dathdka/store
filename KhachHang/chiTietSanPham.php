
<?php
    require_once("../KhachHang/layout/header.php");
    require_once("../entities/sanPham.class.php");
    require_once("../entities/binhLuan.class.php");

    if(isset($_GET["MaSP"])){
        $MaSP =$_GET["MaSP"] ;
        $item = sanPham::laySanPham($MaSP);
    }
    if($item!=null){
?>
<div class="container-fluid" style="height: 740px;">
<div class="col-md-6 col-sm-6 col-xs-12 isotope-item men" id="border-product" style="height:100%; margin-left:0px;height: 100%;left: 28%;margin-top: 100px">
        <div class="block2-pic hov-img0 " id="margin-img">
            <img src="<?php echo $item->HinhAnh ?>" style="width:300px">
        </div>
        <div class="block2-txt-child1" style="text-align:center;">
        <h1><?php echo $item->MaSP ?></h1>
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
        </div>
        <?php if(isset($_COOKIE["username"])){ ?>
        <form method="post" onsubmit="return false" name="form">
            <button type="submit" name="btnGio" class="btn btn-primary"id=<?php echo $item->MaSP; ?> onclick="changevalue(<?php echo $item->MaSP ?>);">
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
                        <input type='button' value='Đăng nhập để mua hàng' class='btn btn-primary' style='margin-top: 38px;'/>
                    </a>";
        } ?>
    </div>
    <?php }else {
        echo "<h1>Không tìm thấy sản phẩm</h1>";
    }  ?>
</div>

<span class="fb-comments-count" data-href="https://www.localhost<?php echo $_SERVER['PHP_SELF']."?MaSP=".$MaSP; ?>"></span>
    

<div class="fb-comments" data-href="https://www.localhost<?php echo $_SERVER['PHP_SELF']."?MaSP=".$MaSP; ?>" data-width="100%" data-numposts="5"></div>

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