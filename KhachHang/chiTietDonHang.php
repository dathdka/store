<?php
require_once("../KhachHang/layout/header.php");
require_once("../entities/CTDDH.class.php");
require_once("../entities/donDH.class.php");
require_once("../entities/sanPham.class.php");
include("../KhachHang/permission.php");
$Email = $_COOKIE["username"];
if ($_GET["MaDDH"]) {
    $MaDDH = $_GET["MaDDH"];
    $result = donDH::kiemTra($Email, $MaDDH);
    if ($result) {
        $dSCTDDH = CTDDH::dSCTDDH($MaDDH);
        foreach ($dSCTDDH as $item) {
            $SP = sanPham::laySanPham($item["MaSP"]);
?>
            <h3>Tên sản phẩm: <?php echo $SP->TenSP ?> </h3>
            <h3>Số lượng đặt: <?php echo $item["SoLuongDat"] ?> </h3>
<?php
        }
    }
    else{
        echo "<h1>Có lỗi trong quá trình kiểm tra</h1>";
    }
}
require_once("../KhachHang/layout/footer.php");
?>