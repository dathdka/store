<?php
require_once("../admin/layoutAdmin/header.php");
?>

<div style="width:85%;float: right;">
<?php
require_once("../admin/layoutAdmin/header.php");
require_once("../entities/sanPham.class.php");
include("../admin/permission.php");
$dSSP = sanPham::dSSP();
?>

    <a href="them_SanPham.php">
    <input type='button' value='Thêm sản phẩm mới' class="btn btn-warning   "/>
    </a>
<?php
foreach ($dSSP as $item) {
?>
<div class="table-users" style="width: 100%;float: right;">
   <table cellspacing="0">
      <tr>
         <th id="text-center">MaSP</th>
         <th id="text-center">TenSP</th>
         <th id="text-center">Don Gia</th>
         <th id="text-center">Gioi Tinh</th>
         <th id="text-center">Mo Ta</th>
         <th id="text-center">So Luong</th>
         <th id="text-center">Khuyen Mai</th>
         <th id="text-center">Hinh Anh</th>
         <th id="text-center"></th>
         <th id="text-center"></th>
      </tr>
      <tr>
        <td id="text-center" >
            <p><?php echo $item["MaSP"]?></p>
            <?php
             if(isset($_POST["btnEdit"])){
                header("location: edit_SanPham.php?MaSP=" .$item['MaSP']) ;
            }
            ?>
        </td>

        <td id="text-center" width="20%">
            <p><?php echo $item["TenSP"]?></p>
        </td>

        <td id="text-center" width="8%">
            <p><?php echo $item["DonGia"]?></p>
        </td>

        <td id="text-center" width="8%">
            <p><?php echo ($item["GioiTinh"]=="0")?"Nam":"Nữ";?></p>
        </td>

        <td id="text-center" width="15%">
            <p><?php echo $item["MoTa"]?></p>
        </td>

        <td id="text-center" width="8%">
            <p><?php echo $item["SoLuong"]?></p>
        </td>

        <td id="text-center" width="8%">
            <p><?php echo $item["KhuyenMai"]?></p>
        </td>

        <td id="text-center" width="20%">
            <img src="<?php echo $item["HinhAnh"]?>" style="width:100px">
        </td>

        <td id="text-center" width="5%" >
            <form method="post">
                <input type="submit" name="btnEdit" value="Chỉnh sửa" class="btn btn-primary">
            </form>
        </td>

        <td id="text-center" width="5%">
            <a class="button" href="delete_SanPham.php?MaSP=<?php echo $item["MaSP"];?>" onclick="javascript: return confirm('Bạn có chắc chắn muốn xóa?');"><i class="fa fa-trash"></i></a>
        </td>
      </tr>
   </table>
</div>
   
    <?php
}
require_once("../admin/layoutAdmin/header.php");
?>
</div>