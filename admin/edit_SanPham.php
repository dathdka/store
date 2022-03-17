<?php
require_once("../admin/layoutAdmin/header.php");
require_once("../entities/sanPham.class.php");
require_once("../entities/hangSX.class.php");
include("../admin/permission.php");
if (isset($_GET["thanhCong"])) {
    echo "<h1>Chỉnh sửa thành công</h1>";
    echo "  <a href='show_SanPham.php'>
                        <input type='button' value='Trở về trang chủ' />
                    </a>";
}
if (isset($_GET["thatBai"])) {
    echo "<h1>Đã xảy ra lỗi trong quá trình sửa</h1>";
}
if (isset($_GET["MaSP"])) {
    $item = sanPham::laySanPham($_GET["MaSP"]);
?>
    <form method="post" enctype="multipart/form-data">
        <h3>Tên sản phẩm</h3>
        <input type="text" name="txtTenSP" placeholder=<?php echo $item->TenSP;?>>
        <h3>Nhà sản xuất</h3>
        <select name="txtHSX">
            <option value="" selected></option>
            <?php
            $HSX = hangSX::dSHSX();
            foreach ($HSX as $hsx) {
                echo "<option value=" . $hsx["MaNSX"] . ">" . $hsx["TenNSX"] . "</option>";
            }
            ?>
        </select>
        <h3>Đơn giá</h3>
        <input type="number" name="txtDonGia" placeholder=<?php echo $item->DonGia;?>>
        <h3>Giới tính</h3>
        <select name="cbGioiTinh">
            <option value="0">Nam</option>
            <option value="1">Nữ</option>
        </select>
        <h3>Mô tả</h3>
        <input type="text" name="txtMoTa" placeholder=<?php echo $item->MoTa;?>>
        <h3>Số lượng</h3>
        <input type="number" name="txtSoLuong" placeholder=<?php echo $item->SoLuong;?>>
        <h3>Khuyến mãi</h3>
        <input type="number" name="txtKhuyenMai" placeholder=<?php echo $item->KhuyenMai;?>>
        <h3>Chọn hình ảnh</h3>
        <input type="file" name="fileToUpload" id="fileToUpload">
        <input type="submit" name="btnXacNhan" value="Xác nhận">
    </form>
<?php
}
if(isset($_POST["btnXacNhan"])){
    $MaNSX = $_POST["txtHSX"];
    $TenSP = $_POST["txtTenSP"];
    $DonGia = $_POST["txtDonGia"];
    $GioiTinh = $_POST["cbGioiTinh"];
    $MoTa = $_POST["txtMoTa"];
    $SoLuong = $_POST["txtSoLuong"];
    $KhuyenMai = $_POST["txtKhuyenMai"];
    //upload file
    $uploadOk = 1;
    $target_dir = "../uploads/";
    $timestamp = date("d") . date("m") . date("y") . date("h") . date("i") . date("s");
    $target_file = $target_dir . $timestamp . basename($_FILES["fileToUpload"]["name"]);
    if (file_exists($target_file)) {
        echo "Đã trùng ảnh";
        $uploadOk = 0;
    }
    if ($_FILES["fileToUpload"]["size"] > 500000) {
        echo "File đã vượt quá kích thước cho phép";
        $uploadOk = 0;
    }
    if ($uploadOk == 0) {
        echo "Upload thất bại";
    } else {
        move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
    }
    $editSP = new sanPham($MaNSX, $TenSP, $DonGia, $GioiTinh, $SoLuong, $MoTa, $KhuyenMai, $target_file);
    $editSP->doiGiaTri($_GET["MaSP"]);
    if (!$result) {
        header("Location: edit_San_Pham.php?thanhCong");
    } else {
        header("Location: edit_San_Pham.php?thatBai");
    }
}

?>