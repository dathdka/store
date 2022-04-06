<?php 
    require_once("../admin/layoutAdmin/header.php");
?>
<div class="table-users" style="width: 85%;float: right;">
    <div class="header">Quan Li DOn Hang</div>
<?php
    require_once("../entities/donDH.class.php");
    include("../admin/permission.php");
    $dSDDH = donDH::listDDH();
    if(isset($_GET["Email"])){
        $Email = $_GET["Email"];
        $dSDDH = donDH::dSDDH($Email);
        echo "<h1>Hóa đơn đặt hàng của: $Email</h1>";
    }
    else{
        echo "<h1 style='text-align:center'>Tất cả hóa đơn đặt hàng</h1>";
    }
$tongTien = 0;
foreach ($dSDDH as $item) {
?>


<div class="table-users" style="width: 100%;float: right;">
   <table cellspacing="0">
      <tr>
         <th id="text-center">Mã đơn đặt hàng</th>
         <th id="text-center">Thời gian đặt</th>
         <th id="text-center">Thành tiền</th>
         <th id="text-center" width="230">Chi Tiet Don Hang</th>
      </tr>
      <tr>
        <td id="text-center"><p> <?php echo $item["MaDDH"]?></p></td>
        <td id="text-center"><p><?php echo $item["ThoiGianDat"]?></p></td>
        <td id="text-center"><p><?php echo $item["ThanhTien"]?></p></td>
        <td id="text-center">
            <a href="chiTietDonHang.php?MaDDH=<?php echo $item["MaDDH"]?>">
            <button class="btn btn-primary" type="submit" name="btnChiTiet">Xem chi tiết đơn hàng</button>
            </a>
        </td>
      </tr>
   </table>
</div>
    
<?php
$tongTien+= $item["ThanhTien"];
}
echo "<h1 style='float: right;'>Tổng cộng: $tongTien</h1>";
    require_once("../admin/layoutAdmin/footer.php");
?>
</div>
