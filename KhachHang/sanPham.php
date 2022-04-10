<?php
require_once("../KhachHang/layout/header.php");
require_once("../entities/sanPham.class.php");
require_once("../entities/hangSX.class.php");
require_once("../config/db.class.php");
$dSSP = sanPham::dSSP();
$timKiem = "SELECT * FROM sanpham WHERE ";
if(isset($_GET['timKiem'])){
    $keyWord = $_GET['timKiem'];
    $timKiem .=  " TenSP LIKE  '%$keyWord' OR TenSP LIKE  '$keyWord%'";
    $dSSP = sanPham::dSSPTK($timKiem);
}
if(isset($_GET["btnXacNhan"])){
    $timKiem .=($_GET["cbHSX"]==0) ? "" : " MaNSX=".$_GET["cbHSX"]."  AND ";
    $timKiem .=isset($_GET["cbNam"]) ? " GioiTinh=0  AND ":"";
    $timKiem .=isset($_GET["cbNu"]) ? " GioiTinh=1  AND ":"";
    isset($_GET["cbKM"]) ?$timKiem .= " KhuyenMai>0 ":$timKiem = substr($timKiem, 0,-6);
    $timKiem .=($_GET["sbGia"]=="giam") ? " ORDER BY DonGia DESC": " ORDER BY DonGia";
    $dSSP = sanPham::dSSPTK($timKiem);
    
}

// echo $timKiem;
?>
<!-- =============Lọc sản phẩm ================ -->
<!-- ==================================== -->
<div class="bg0 m-t-23 p-b-140">
		<div class="container">
			<div class="flex-w flex-sb-m p-b-52" style="width: 100%;margin-top: 75px;justify-content: flex-start; padding: 0px;">
				<div class="flex-w flex-c-m m-tb-10" style="width:200%;">
					<div class="flex-c-m stext-106 cl6 size-104 bor4 pointer hov-btn3 trans-04 m-r-8 m-tb-4 js-show-filter">
						<i class="icon-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-filter-list"></i>
						<i class="icon-close-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
						 <!-- Filter -->
					</div>  
            <form method="GET" style="width:100%; border-top:100px">
            <div class="dis-block panel-filter w-full p-t-10 ">
				<div class="wrap-filter flex-w bg6 w-full p-lr-40 p-t-27 p-lr-15-sm">
                
					<div class="filter-col1 p-r-15 p-b-27">
							<div class="mtext-102 cl2 p-b-15">
                                <h3 style="margin: 0px 60px";>Giá </h3>
							</div>
							<ul>
								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
                                    <select name="sbGia" id="padding-left-right-20">
                                        <option value="tang" <?php echo (isset($_GET["sbGia"]) && $_GET["sbGia"]== "tang") ? "selected=true" : ""; ?>>Tăng</option>
                                        <option value="giam" <?php echo (isset($_GET["sbGia"]) && $_GET["sbGia"]== "giam") ? "selected=true" : ""; ?>>Giảm</option>
                                    </select>
									</a>
								</li>
							</ul>
						</div>

						<div class="filter-col2 p-r-15 p-b-27">
							<div class="mtext-102 cl2 p-b-15">
                                <h3>Hãng sản xuất </h3>
							</div>

							<ul>
								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04 filter-link-active">
                                    <select name="cbHSX" id="padding-left-right-20">
                                        <option value="0" selected >Tất cả</option>
                                        <?php
                                            $HSX = hangSX::dSHSX();
                                            foreach ($HSX as $item) {
                                            echo "<option value=" . $item["MaNSX"] . ">" . $item["TenNSX"] . "</option>";
                                        }
                                        ?>
                                    </select>
									</a>
								</li>
							</ul>
						</div>

						<div class="filter-col3 p-r-15 p-b-27">
							<div class="mtext-102 cl2 p-b-15">
                                    <h3>Giới Tính</h3>
                            </div>
                            <ul>
								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04" style="text-decoration: none">
                                    <div id="checkbox-flex">
                                    <p>Nam</p>
                                        <input type="checkbox" name="cbNam" <?php echo isset($_GET["cbNam"]) ? "checked=true" : ""; ?>>
                                    </div>
                                    <div id="checkbox-flex">
                                    <p>Nữ:</p>
                                        <input type="checkbox" name="cbNu" <?php echo isset($_GET["cbNu"]) ? "checked=true" : ""; ?>>
                                        </div>
									</a>
								</li>
							</ul>
						</div>

						<div class="filter-col4 p-b-27">
							<div class="mtext-102 cl2 p-b-15">
                                <h3>Khuyến mãi </h3>
							</div>
                            <div id="checkbox-flex">
                            <input type="submit" name="btnXacNhan" value="Xác nhận">
                            <input type="checkbox" name="cbKM" <?php echo isset($_GET["cbKM"]) ? "checked=true" : ""; ?>>
                            </div>
						</div>
					</div>
                </form>
				</div>
			</div>
        </div>
        <?php
            if(isset($_GET['timKiem'])){
            $keyWord = $_GET['timKiem'];
            $timKiem .=  " TenSP LIKE  '%$keyWord' OR TenSP LIKE  '$keyWord%'";
            echo "<h1 style='margin: 30px 0px;'>Kết quả tìm kiếm: ". $keyWord ."</h1>";
            }
        ?>


<?php
foreach ($dSSP as $item) {
?>
    <div class="col-md-5 col-sm-6 col-xs-12 isotope-item men" id="border-product" style="margin-bottom:15px">
        <div class="block2-pic hov-img0" id="border-img" >
            <a href="chiTietSanPham.php?MaSP=<?php echo $item["MaSP"]?>" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
				Quick View
			</a>

        <img src="<?php echo $item["HinhAnh"] ?>" style="width:120px;height:100px; margin-top: 10px;">
        </div>
        <div class="block2-txt-child1" style="text-align:center;">
        <h2><?php echo $item["TenSP"] ?></h2>
        <?php if($item["KhuyenMai"]>0) {
            ?>
                <h2 style="text-decoration: line-through;">Đơn Giá: <?php echo $item["DonGia"] ?></h2>
                <h2 style="color: red">Khuyến Mãi: <?php echo $item["DonGia"] - ($item["KhuyenMai"]* $item["DonGia"])/100 ?></h2>
        <?php    }
        else{ ?>
        <h2>Đơn Giá: <?php echo $item["DonGia"] ?></h2>
        <?php }
        ?>
        <h2>Giới Tính: <?php echo ($item["GioiTinh"] == "0") ? "Nam" : "Nữ"; ?></h2>
        <h2>Khuyến Mãi: <?php echo $item["KhuyenMai"] ?>%</h2>
        </div>
        
        <?php if(isset($_COOKIE["username"])){ ?>
        <form method="post" onsubmit="return false" name="form">
            <button type="submit" name="btnGio" class="btn btn-primary" id=<?php echo $item["MaSP"]; ?> onclick="changevalue(<?php echo $item['MaSP'] ?>);">
                <?php
                $DB = new dB();
                $sql = "SELECT * FROM gioHang WHERE MaSP =" . $item["MaSP"];
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
                        <input type='button' value='Đăng nhập để mua hàng' class='btn btn-primary' id='margin-top'/>
                    </a>";
        } ?>
        <a href="chiTietSanPham.php?MaSP=<?php echo $item["MaSP"]?>">
            <button class="btn btn-primary " id="margin-top">Xem chi tiết sản phẩm</button>
        </a>
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