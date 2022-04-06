<!-- <style>
body {
  font-weight: 400;
  font-family: -apple-system, BlinkMacSystemFont, 'Helvetica Neue', sans-serif;
  background-color: #fafafa;
}
</style> -->

<?php
require_once("../KhachHang/layout/header.php");
require_once("../entities/taiKhoan.class.php");
include("../KhachHang/permission.php");
    $Email = $_COOKIE["username"];
    $item =  taiKhoan::layTaiKhoan($Email);
?>
<div id="margin-top-110">
<table class="table">
  <tr>
    <th class="table__heading">Email</th>
    <th class="table__heading">Họ tên</th>
    <th class="table__heading">Số điện thoại</th>
    <th class="table__heading">Địa chỉ</th>
    <th class="table__heading">Điểm</th>
    <th class="table__heading">Thông Tin</th>
    <th class="table__heading">Lịch Sử</th>
  </tr>
  <tr class="table__row" >
    <td class="table__content" data-heading="Email">
        <?php echo $item->Email; ?>
    </td>
    <td class="table__content" data-heading="Họ tên">
        <?php echo $item->HoTen?>
    </td>
    <td class="table__content" data-heading="Số điện thoại">
    <?php echo $item->SDT?>
    </td>
    <td class="table__content" data-heading="Địa chỉ">
    <?php echo $item->DiaChi?>
    </td>
    <td class="table__content" data-heading="Điểm">
    <?php echo $item->Diem?>
    </td>
    <td class="table__content" data-heading="Thông Tin">
    <a href="edit_ThongTin.php">
            <input class="btn btn-primary" type='button' value='Chỉnh sửa thông tin' />
    </a>
    </td>
    <td class="table__content" data-heading="Lịch Sử">
    <a href="lichSu.php">
            <input class="btn btn-primary" type='button' value='Lịch sử mua hàng' />
    </a>
    </td>
  </tr>
  <tr>
    <td id="border-bottom-none"><a href="sanPham.php" class="btn btn-warning"><i class="fa fa-angle-left"></i> Tiếp tục mua hàng</a></td>
  </tr>
</table>
</div>
   
<?php
require_once("../KhachHang/layout/footer.php");
?>