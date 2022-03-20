<?php
require_once("../admin/layoutAdmin/header.php");
require_once("../entities/sanPham.class.php");
include("../admin/permission.php");
$dSSP = sanPham::dSSP();
?>
    <a href="them_SanPham.php">
    <input type='button' value='Thêm sản phẩm mới' />
    </a>
<?php
foreach ($dSSP as $item) {
?>
    <h1><?php echo $item["MaSP"]?></h1>
    <h1><?php echo $item["TenSP"]?></h1>
    <h1><?php echo $item["DonGia"]?></h1>
    <h1><?php echo ($item["GioiTinh"]=="0")?"Nam":"Nữ";?></h1>
    <h1><?php echo $item["MoTa"]?></h1>
    <h1><?php echo $item["SoLuong"]?></h1>
    <h1><?php echo $item["KhuyenMai"]?></h1>
    <img src="<?php echo $item["HinhAnh"]?>" style="width:100px">
    <form method="post">
        <input type="submit" name="btnEdit" value="Chỉnh sửa">
        <a class="button" href="delete_SanPham.php?MaSP=<?php echo $item["MaSP"];?>" onclick="javascript: return confirm('Bạn có chắc chắn muốn xóa?');">Delete</a>
    </form>
    <?php
    if(isset($_POST["btnEdit"])){
         header("location: edit_SanPham.php?MaSP=" .$item['MaSP']) ;
    }
}
require_once("../admin/layoutAdmin/header.php");
?>