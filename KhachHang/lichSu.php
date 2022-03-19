<?php
require_once("../KhachHang/layout/header.php");
require_once("../entities/donDH.class.php");
include("../KhachHang/permission.php");
$Email = $_COOKIE["username"];
$dSDDH = donDH::dSDDH($Email);
$tongTien = 0;
echo "<h1>Lịch sử mua hàng</h1>";
foreach ($dSDDH as $item) {
?>
    <p>Mã đơn đặt hàng: <?php echo $item["MaDDH"]?></p>
    <p>Thời gian đặt: <?php echo $item["ThoiGianDat"]?></p>
    <p>Thành tiền: <?php echo $item["ThanhTien"]?></p>
    <a href="chiTietDonHang.php?MaDDH=<?php echo $item["MaDDH"]?>">
        <button type="submit" name="btnChiTiet">Xem chi tiết đơn hàng</button>
    </a>
<?php
$tongTien+= $item["ThanhTien"];
}
require_once("../KhachHang/layout/footer.php");
?>