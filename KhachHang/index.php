<?php
    require_once("../KhachHang/layout/header.php");
    require_once("../entities/CTDDH.class.php");
    require_once("../entities/sanPham.class.php");
?>
       
       <!-- Modal Search -->
       <div class="modal-search-header flex-c-m trans-04">
			<div class="container-search-header">
				<button class="flex-c-m btn-hide-modal-search trans-04 ">
					<img src="images/icons/icon-close2.png" alt="CLOSE">
				</button>
				<form class="wrap-search-header flex-w p-l-15">
					<button class="flex-c-m trans-04">
						<i class="zmdi zmdi-search"></i>
					</button>
					<input class="plh3" type="text" name="search" placeholder="Search...">
				</form>
			</div>
		</div>

    <!-- Slider -->
	<section class="section-slide">
		<div class="wrap-slick1">
			<div class="slick1">
				<div class="item-slick1" style="background-image: url(images/banner-07.jpg);">
					<div class="container h-full">
						<div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
							<div class="layer-slick1 animated visible-false" data-appear="fadeInDown" data-delay="0">
								<span class="ltext-101 cl2 respon2">
									Women Collection 2022
								</span>
							</div>
								
							<div class="layer-slick1 animated visible-false" data-appear="fadeInUp" data-delay="800">
								<h2 class="ltext-201 cl2 p-t-19 p-b-43 respon1">
									NEW SEASON
								</h2>
							</div>
								
							<div class="layer-slick1 animated visible-false" data-appear="zoomIn" data-delay="1600">
								<a href="sanPham.php" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
									Shop Now
								</a>
							</div>
						</div>
					</div>
				</div>

				<div class="item-slick1" style="background-image: url(images/banner_12.jpg);">
					<div class="container h-full">
						<div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
							<div class="layer-slick1 animated visible-false" data-appear="rollIn" data-delay="0">
								<span class="ltext-101 cl2 respon2">
									Men New-Season
								</span>
							</div>
								
							<div class="layer-slick1 animated visible-false" data-appear="lightSpeedIn" data-delay="800">
								<h2 class="ltext-201 cl2 p-t-19 p-b-43 respon1">
									Jackets & Coats
								</h2>
							</div>
								
							<div class="layer-slick1 animated visible-false" data-appear="slideInUp" data-delay="1600">
								<a href="sanPham.php" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
									Shop Now
								</a>
							</div>
						</div>
					</div>
				</div>

				<div class="item-slick1" style="background-image: url(images/banner_11.jpg);">
					<div class="container h-full">
						<div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
							<div class="layer-slick1 animated visible-false" data-appear="rotateInDownLeft" data-delay="0">
								<span class="ltext-101 cl2 respon2">
									Men Collection 2022
								</span>
							</div>
								
							<div class="layer-slick1 animated visible-false" data-appear="rotateInUpRight" data-delay="800">
								<h2 class="ltext-201 cl2 p-t-19 p-b-43 respon1">
									New arrivals
								</h2>
							</div>
								
							<div class="layer-slick1 animated visible-false" data-appear="rotateIn" data-delay="1600">
								<a href="sanPham.php" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
									Shop Now
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<?php
		$dSBC = cTDDH::bestSell();
    	foreach ($dSBC as $SP){
        $item = sanPham::laySanPham($SP["MaSP"]);
		?>
    	<div class="col-md-5 col-sm-6 col-xs-12 isotope-item men" id="border-product" style="height:400px;margin-left: 110px;margin-top:20px">
		<div class="block2-pic hov-img0 " id="margin-img" style="margin: 26px 0px 0px 18px; float: left; ">
		<img src="<?php echo $item->HinhAnh ?>" style="width:200px; height:200px">
		</div>
		<div class="block2-txt-child1" style="text-align: left;float: right;width: 61%;margin-top: 23px;height: 80%;">
        <h2><?php echo $item->TenSP ?></h2>
        <?php if($item->KhuyenMai>0) {
            ?>
                <h2 style="text-decoration: line-through; ">Giá: <?php echo $item->DonGia ?></h2>
                <h2 style="color:red">Giá Khuyến Mãi: <?php echo $item->DonGia - ($item->KhuyenMai* $item->DonGia)/100 ?></h2>
        <?php    }
        else{ ?>
        <h2>Giá: <?php echo $item->DonGia ?></h2>
        <?php }
        ?>
        <h2>Giới Tính: <?php echo ($item->GioiTinh == "0") ? "Nam" : "Nữ"; ?></h2>
        <h2>Mô Tả: <?php echo $item->MoTa ?></h2>
        <h2 style="display:none"> Số Lượng: <?php echo $item->SoLuong ?></h2>
        <h2 style="line-through:true">Khuyến Mãi: <?php echo $item->KhuyenMai ?>%</h2>
        </div>

        <?php if(isset($_COOKIE["username"])){ ?>
        <form method="post" onsubmit="return false" name="form">
            <button type="submit" name="btnGio" class="btn btn-primary" style="margin-top: 10px;" id=<?php echo $item->MaSP; ?> onclick="changevalue(<?php echo $item->MaSP; ?>);">
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
                        <input type='button' value='Đăng nhập để mua hàng' class='btn btn-primary' id='margin-top'/>
                    </a>";
        } ?>
        <a href="chiTietSanPham.php?MaSP=<?php echo $item->MaSP?>">
            <button class="btn btn-primary" id="margin-top">Xem chi tiết sản phẩm</button>
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