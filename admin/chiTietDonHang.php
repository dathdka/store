<?php
require_once("../admin/layoutAdmin/header.php");
require_once("../entities/CTDDH.class.php");
require_once("../entities/donDH.class.php");
require_once("../entities/sanPham.class.php");
include("../admin/permission.php");
if ($_GET["MaDDH"]) {
    $MaDDH = $_GET["MaDDH"];
    $dSCTDDH = CTDDH::dSCTDDH($MaDDH);
    foreach ($dSCTDDH as $item) {
        $SP = sanPham::laySanPham($item["MaSP"]);
?>
        <h3>Tên sản phẩm: <?php echo $SP->TenSP ?> </h3>
        <h3>Số lượng đặt: <?php echo $item["SoLuongDat"] ?> </h3>
<?php
    }
}
require_once("../KhachHang/layout/footer.php");
?>