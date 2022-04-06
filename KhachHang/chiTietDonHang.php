<?php
require_once("../KhachHang/layout/header.php");
require_once("../entities/CTDDH.class.php");
require_once("../entities/donDH.class.php");
require_once("../entities/sanPham.class.php");
include("../KhachHang/permission.php");
?>

<div id="margin-top-110">
    <?php
$Email = $_COOKIE["username"];
        if ($_GET["MaDDH"]) {
            $MaDDH = $_GET["MaDDH"];
            $result = donDH::kiemTra($Email, $MaDDH);
            if ($result) {
            $dSCTDDH = CTDDH::dSCTDDH($MaDDH);
            foreach ($dSCTDDH as $item) {
            $SP = sanPham::laySanPham($item["MaSP"]);
            ?>
<table class="table">
    <tr>
        <th class="table__heading">Tên San Phẩm</th>
        <th class="table__heading">Số Lượng</th>
    </tr>
    <tr class="table__row">
        <td class="table__content" data-heading="Tên San Phẩm">
            <h3>Tên sản phẩm: <?php echo $SP->TenSP ?> </h3>
        </td>
        <td class="table__content" data-heading="Số Lượng">
            <h3>Số lượng đặt: <?php echo $item["SoLuongDat"] ?> </h3>
        </td>
    </tr>
</table>       
</div>
   
<?php
        }
    }
    else{
        echo "<h1>Có lỗi trong quá trình kiểm tra</h1>";
    }
}
require_once("../KhachHang/layout/footer.php");
?>