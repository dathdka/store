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
    echo "<h1>Kết quả tìm kiếm: ". $keyWord ."</h1>";
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
<form method="GET">
    <h3>Giá: </h3>
    <select name="sbGia" >
        <option value="tang" <?php echo (isset($_GET["sbGia"]) && $_GET["sbGia"]== "tang") ? "selected=true" : ""; ?>>Tăng</option>
        <option value="giam" <?php echo (isset($_GET["sbGia"]) && $_GET["sbGia"]== "giam") ? "selected=true" : ""; ?>>Giảm</option>
    </select>
    <h3>Hãng sản xuất: </h3>
    <select name="cbHSX">
        <option value="0" selected>Tất cả</option>
        <?php
        $HSX = hangSX::dSHSX();
        foreach ($HSX as $item) {
            echo "<option value=" . $item["MaNSX"] . ">" . $item["TenNSX"] . "</option>";
        }
        ?>
    </select>
        <h3>Nam: </h3>
        <input type="checkbox" name="cbNam" <?php echo isset($_GET["cbNam"]) ? "checked=true" : ""; ?>>
        <h3>Nữ: </h3>
        <input type="checkbox" name="cbNu" <?php echo isset($_GET["cbNu"]) ? "checked=true" : ""; ?>>
        <h3>Khuyến mãi: </h3>
        <input type="checkbox" name="cbKM" <?php echo isset($_GET["cbKM"]) ? "checked=true" : ""; ?>>
    
        <input type="submit" name="btnXacNhan" value="Xác nhận">
</form>
<?php

foreach ($dSSP as $item) {
?>
    <div class="col-md-6">
        <h1><?php echo $item["MaSP"] ?></h1>
        <h1><?php echo $item["TenSP"] ?></h1>
        <?php if($item["KhuyenMai"]>0) {
            ?>
                <h1 style="text-decoration: line-through;"><?php echo $item["DonGia"] ?></h1>
                <h1><?php echo $item["DonGia"] - ($item["KhuyenMai"]* $item["DonGia"])/100 ?></h1>
        <?php    }
        else{ ?>
        <h1><?php echo $item["DonGia"] ?></h1>
        <?php }
        ?>
        <h1><?php echo ($item["GioiTinh"] == "0") ? "Nam" : "Nữ"; ?></h1>
        <h1><?php echo $item["MoTa"] ?></h1>
        <h1><?php echo $item["SoLuong"] ?></h1>
        <h1 style="line-through:true"><?php echo $item["KhuyenMai"] ?></h1>
        <img src="<?php echo $item["HinhAnh"] ?>" style="width:100px">
        <?php if(isset($_COOKIE["username"])){ ?>
        <form method="post" onsubmit="return false" name="form">
            <button type="submit" name="btnGio" id=<?php echo $item["MaSP"]; ?> onclick="changevalue(<?php echo $item['MaSP'] ?>);">
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
                        <input type='button' value='Đăng nhập để mua hàng' />
                    </a>";
        } ?>
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