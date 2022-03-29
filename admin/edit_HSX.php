<?php
require_once("../admin/layoutAdmin/header.php");
require_once("../entities/hangSX.class.php");
include("../admin/permission.php");
if (isset($_GET["thanhCong"])) {
    echo "<h1>Chỉnh sửa thành công</h1>";
    echo "  <a href='show_HSX.php'>
                        <input type='button' value='Trở về trang chủ' />
                    </a>";
}
if (isset($_GET["thatBai"])) {
    echo "<h1>Đã xảy ra lỗi trong quá trình sửa</h1>";
}
if (isset($_GET["MaNSX"])) {
    $item = hangSX::layHSX($_GET["MaNSX"]);
?>
    <form method="post">
    <h3>Tên nhà sản xuất</h3>
        <input type="text" name="txtTenNSX" placeholder="<?php echo $item->TenNSX ?>" required>
        <input type="submit" name="btnXacNhan" value="Xác nhận">
    </form>
<?php
}
if(isset($_POST["btnXacNhan"])){
    $TenNSX = $_POST["txtTenNSX"];
    $editHSX = new hangSX($TenNSX);
    $editHSX->doiGiaTri($_GET["MaNSX"]);
    if (!$result) {
        header("Location: edit_HSX.php?thanhCong");
    } else {
        header("Location: edit_HSX.php?thatBai");
    }
}
?>