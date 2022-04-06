<?php
require_once("../KhachHang/layout/header.php");
require_once("../entities/donDH.class.php");
include("../KhachHang/permission.php");
$Email = $_COOKIE["username"];
$dSDDH = donDH::dSDDH($Email);
$tongTien = 0;
foreach ($dSDDH as $item) {
?>
<div id="margin-top-110">
<table class="table" >
    <h1>Lịch Sử Mua Hàng</h1>
  <tr>
    <th class="table__heading">Mã Đơn Hàng</th>
    <th class="table__heading">Thời Gian Đặt</th>
    <th class="table__heading">Thành Tiền</th>
    <th class="table__heading">Xem Chi Tiết Đơn Hàng</th>
  </tr>
  <tr class="table__row">
    <td class="table__content" data-heading="Mã Đơn Hàng">
        <p>Mã đơn đặt hàng: <?php echo $item["MaDDH"]?></p>
    </td>
    <td class="table__content" data-heading="Thời Gian Đặt">
        <p>Thời gian đặt: <?php echo $item["ThoiGianDat"]?></p>
    </td>
    <td class="table__content" data-heading="Thành Tiền">
        <p>Thành tiền: <?php echo $item["ThanhTien"]?></p>
    </td>
    <td class="table__content" data-heading="Xem Chi Tiết Đơn Hàng">
    <a href="chiTietDonHang.php?MaDDH=<?php echo $item["MaDDH"]?>">
        <button type="submit" name="btnChiTiet">Xem chi tiết đơn hàng</button>
    </a>
    </td>
  </tr>
  <tr>
  <td id="border-bottom-none"><a href="sanPham.php" class="btn btn-warning" ><i class="fa fa-angle-left"></i> Tiếp tục mua hàng</a></td>
  </tr>
</table>
</div>
    
<?php
$tongTien+= $item["ThanhTien"];
}
require_once("../KhachHang/layout/footer.php");
?>