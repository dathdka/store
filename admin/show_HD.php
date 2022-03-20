<?php
    require_once("../admin/layoutAdmin/header.php");
    require_once("../entities/donDH.class.php");
    include("../admin/permission.php");
    $dSDDH = donDH::listDDH();
    if(isset($_GET["Email"])){
        $Email = $_GET["Email"];
        $dSDDH = donDH::dSDDH($Email);
        echo "<h1>Hóa đơn đặt hàng của: $Email</h1>";
    }
    else{
        echo "<h1>Tất cả hóa đơn đặt hàng</h1>";
    }
$tongTien = 0;
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
echo "<h1>Tổng cộng: $tongTien</h1>";
    require_once("../admin/layoutAdmin/footer.php");
?>