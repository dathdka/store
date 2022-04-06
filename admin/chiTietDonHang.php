<?php
    require_once("../admin/layoutAdmin/header.php");
?>
<div class="table-users" style="width: 85%;float: right;">
<div class="header" >Chi Tiet don Hang</div>
<?php
require_once("../entities/CTDDH.class.php");
require_once("../entities/donDH.class.php");
require_once("../entities/sanPham.class.php");
include("../admin/permission.php");
if ($_GET["MaDDH"]) {
    $MaDDH = $_GET["MaDDH"];
    $dSCTDDH = CTDDH::dSCTDDH($MaDDH);
    
?>

<?php
    foreach ($dSCTDDH as $item) {
    $SP = sanPham::laySanPham($item["MaSP"]);
?>

<div class="table-users" style="width: 100%;float: right;">
   <table cellspacing="0">
   <tr>
        <th id="text-center">Tên sản phẩm</th>
        <th id="text-center" width="40%">Số lượng đặt</th>
    </tr>
    <tr>
        <td id="text-center"><p> <?php echo $SP->TenSP ?></p></td>
        <td id="text-center"><p><?php echo $item["SoLuongDat"] ?></p></td>
    </tr>
    </table>
</div>
<?php
    }
}
require_once("../KhachHang/layout/footer.php");
?>
</div>