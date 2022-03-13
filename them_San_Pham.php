<?php
require_once("layoutAdmin/header.php");
require_once("entities/sanPham.class.php");
require_once("entities/hangSX.class.php");

if (isset($_POST["btnTaoMoi"])) {

    $MaNSX = $_POST["txtHSX"];
    $TenSP = $_POST["txtTenSP"];
    $DonGia = $_POST["txtDonGia"];
    $GioiTinh = $_POST["txtGioiTinh"];
    $MoTa = $_POST["txtMoTa"];
    $SoLuong = $_POST["txtSoLuong"];
    $KhuyenMai = $_POST["txtKhuyenMai"];
    //upload file
    $uploadOk = 1;
    $target_dir = "uploads/";
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
    $newSP = new sanPham($MaNSX, $TenSP, $DonGia, $GioiTinh, $SoLuong, $MoTa, $KhuyenMai, $target_file);
    $result = $newSP->save();
    if ($result) {
        header("Location: them_San_Pham.php?daThem");
    } else {
        header("Location: them_San_Pham.php?thatBai");
    }
}

if (isset($_GET["daThem"])) {
    echo "<h1>Tạo mới thành công</h1>";
}
if (isset($_GET["thatBai"])) {
    echo "<h1>Đã xảy ra lỗi trong quá trình tạo sản phẩm</h1>";
}
?>

<form method="POST" enctype="multipart/form-data">
    <h3>Tên sản phẩm</h3>
    <input type="text" name="txtTenSP" placeholder="Tên sản phẩm">
    <h3>Nhà sản xuất</h3>
    <select name="txtHSX">
        <option value="" selected></option>
        <?php
        $HSX = hangSX::dSHSX();
        foreach ($HSX as $item) {
            echo "<option value=" . $item["MaNSX"] . ">" . $item["TenNSX"] . "</option>";
        }
        ?>
    </select>
    <h3>Đơn giá</h3>
    <input type="number" name="txtDonGia" placeholder="Đơn giá">
    <h3>Giới tính</h3>
    <select name="cbGioiTinh">
        <option value="0">Nam</option>
        <option value="1">Nữ</option>
    </select>
    <h3>Mô tả</h3>
    <input type="text" name="txtMoTa" placeholder="Mô tả">
    <h3>Số lượng</h3>
    <input type="number" name="txtSoLuong" placeholder="Số lượng">
    <h3>Khuyến mãi</h3>
    <input type="number" name="txtKhuyenMai" placeholder="Khuyến mãi">
    <h3>Chọn hình ảnh</h3>
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" name="btnTaoMoi" value="Tạo mới">
</form>

<?php
require_once("layoutAdmin/footer.php");

?>