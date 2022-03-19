<?php
require_once("../KhachHang/layout/header.php");
require_once("../entities/taiKhoan.class.php");
include("../KhachHang/permission.php");
    $Email = $_COOKIE["username"];
    $item =  taiKhoan::layTaiKhoan($Email);
?>
    <h3>Email: </h3>
    <?php echo $item->Email; ?>
    <h3>Họ tên: </h3>
    <?php echo $item->HoTen?>
    <h3>Số điện thoại: </h3>
    <?php echo $item->SDT?>
    <h3>Địa chỉ: </h3>
    <?php echo $item->DiaChi?>
    <h3>Điểm: </h3>
    <?php echo $item->Diem?>
    <a href="edit_ThongTin.php">
            <input type='button' value='Chỉnh sửa thông tin' />
    </a>
    <a href="lichSu.php">
            <input type='button' value='Lịch sử mua hàng' />
    </a>
<?php
require_once("../KhachHang/layout/footer.php");
?>