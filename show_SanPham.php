<?php
require_once("layoutAdmin/header.php");
require_once("entities/sanPham.class.php");
include("permission.php");
$dSSP = sanPham::dSSP();
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
    
<?php
}

?>