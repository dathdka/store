<body>
    <div class="super_container">
        <div class="main_slider" style="background-image:url(images/slider_1.jpg)">
            <div class="container fill_height">
	            <div class="row align-items-center fill_height">
                    <div class="col">
					    <div class="main_slider_content">
						    <h6>Spring / Summer Collection 2017</h6>
						    <h1>Get up to 30% Off New Arrivals</h1>
                            <?php
                                    require_once("../KhachHang/layout/header.php");
                                    require_once("../entities/CTDDH.class.php");
                                    require_once("../entities/sanPham.class.php");
                                    // echo "<h1>hello</h1>";
                                    $dSBC = cTDDH::bestSell();
                                    foreach ($dSBC as $SP){
                                        $item = sanPham::laySanPham($SP["MaSP"]);
                                ?>
	                    </div>
                    </div>    
                </div>
            </div>
        </div>
       
				
    <div class="new_arrivals">
		<div class="container">
			<div class="row">
				<div class="col text-center">
					<div class="section_title new_arrivals_title">
						<h2>New Arrivals</h2>
					</div>
				</div>
			</div>
			<div class="row align-items-center">
				<div class="col text-center">
					<div class="new_arrivals_sorting">
						<ul class="arrivals_grid_sorting clearfix button-group filters-button-group">
							<li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center active is-checked" data-filter="*">Tất Cả</li>
							<li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center" data-filter=".women">Nữ</li>
							<!-- <li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center" data-filter=".accessories">accessories</li> -->
							<li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center" data-filter=".men">Nam</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col">
					<div class="product-grid" data-isotope='{ "itemSelector": ".product-item", "layoutMode": "fitRows" }'>

  
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
</div>
</body>
    <?php
    require_once("../KhachHang/layout/footer.php");
?>