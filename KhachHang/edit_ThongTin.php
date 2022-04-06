<?php
require_once("../KhachHang/layout/header.php");
require_once("../entities/taiKhoan.class.php");
include("../KhachHang/permission.php");
if(isset($_GET["thanhCong"]))
    echo "<h1>Sửa thông tin thành công!</h1>";
$Email = $_COOKIE["username"];
$item =  taiKhoan::layTaiKhoan($Email);
?>
    
<div id="container-edit">
  <div class='signup'>
    <form method="POST">
        <h1>Chỉnh sửa thông tin cá nhân</h1>
        <input type="text" name="txtHoTen" placeholder="Họ Tên" value=<?php echo $item->HoTen ?> required>
        <input type="number" name="txtSDT" placeholder="Số Điện Thoại" value=<?php echo $item->SDT ?> required>
        <input type="text" name="txtDiaChi" placeholder="Địa Chỉ" value=<?php echo $item->DiaChi ?> required>
        <input type="submit" value="Lưu" name="btnLuu">
     </form>
  </div>
</div>

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
