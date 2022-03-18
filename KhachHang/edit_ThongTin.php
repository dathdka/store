<?php
require_once("../KhachHang/layout/header.php");
require_once("../entities/taiKhoan.class.php");
include("../KhachHang/permission.php");
if(isset($_GET["thanhCong"]))
    echo "<h1>Sửa thông tin thành công!</h1>";
$Email = $_COOKIE["username"];
$item =  taiKhoan::layTaiKhoan($Email);
?>
    <h1>Chỉnh sửa thông tin cá nhân</h1>
    <form method="POST">
        <input type="text" name="txtHoTen"  value=<?php echo $item->HoTen ?>>
        <input type="number" name="txtSDT"  value=<?php echo $item->SDT ?>>
        <input type="text" name="txtDiaChi" value=<?php echo $item->DiaChi ?>>
        <input type="submit" value="Lưu" name="btnLuu">
    </form>

<?php
    if(isset($_POST["btnLuu"]))
    {
        $HoTen = $_POST["txtHoTen"];
        $SDT = $_POST["txtSDT"];
        $DiaChi = $_POST["txtDiaChi"];
        $result = taiKhoan::editThongTin($Email, $HoTen, $SDT, $DiaChi);
        if($result){
            header("Location: edit_ThongTin.php?thanhCong");
        }
    }
require_once("../KhachHang/layout/footer.php");
?>
