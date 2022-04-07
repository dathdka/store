<?php
    require_once("../admin/layoutAdmin/header.php");
?>

<div class="table-users" style="width:85%;float: right;">
<?php
    require_once("../entities/taiKhoan.class.php");
    include("../admin/permission.php");
    $dSTK = taiKhoan::dSTK();
    if(isset($_GET["thanhCong"]))
    {
        echo "<div class='notice success'><p>Phân quyền thành công</p></div>";
    }
    echo "<h1 style='text-align:center'>Quản lý người dùng</h1>";
    foreach($dSTK as $item){
?>
<th class="table-users" style="width: 100%;float: right;">
<table cellspacing="0"> 
    <tr >
      <th id="text-center" style="width:15%;background-color: #95A5A6;color:black;">Email</th>
      <th id="text-center" style="width:15%;background-color: #95A5A6;color:black;">Họ Tên</th>
      <th id="text-center" style="width:10%;background-color: #95A5A6;color:black;">SDT</th>
      <th id="text-center" style="width:10%;background-color: #95A5A6;color:black;">Địa chỉ</th>
      <th id="text-center" style="width:10%;background-color: #95A5A6;color:black;">Quyền Hạn</th>
      <th id="text-center" style="width:10%;background-color: #95A5A6;color:black;">Lịch Sử Mua</th>
      <th id="text-center" style="width:10%;background-color: #95A5A6;color:black;">Phân Quyền</th>
    </tr>
    <tr >
        <td id="text-center" data-label="Email" style="width:20%;">
          <p><?php echo $item["Email"] ?></p>
        </td>

        <td id="text-center" data-label="Họ Tên" style="width:12%;">
            <p><?php echo $item["HoTen"] ?></p>
        </td>

        <td id="text-center" data-label="SDT" style="width:10%;">
            <p> <?php echo $item["SDT"] ?></p>
        </td>

        <td id="text-center" data-label="Địa chỉ" style="width:10%;">
            <p> <?php echo $item["DiaChi"] ?></p>
        </td>

        <td id="text-center" data-label="Quyền Hạn" style="width:5%;">
            <?php if($item["PhanQuyen"]){
                echo "<p> admin</p>";
            }else{
                echo "<p> Khách hàng</p>";
            } ?>
        </td>

        <td id="text-center" data-label="Lịch Sử Mua" style="width:12%;">
            <a href="show_HD.php?Email=<?php echo $item["Email"]?>">
                <button type="submit" name="btnHoaDon" class="btn btn-primary">Lịch sử mua hàng</button>
            </a>
        </td>

        <td id="text-center" data-label="Phân Quyền" style="width:5%;">
            <a href="phanQuyen.php?Email=<?php echo $item["Email"]?>">
                <button type="submit" name="btnPhanQuyen" class="btn btn-danger" onclick="javascript: return confirm('Bạn có muốn phân quyền cho người này?');">Phân quyền</button>
            </a>
        </td>
    </tr>
  </table>
<?php
}
    require_once("../admin/layoutAdmin/header.php");
?>
</div>
