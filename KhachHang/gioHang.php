<?php
    require_once("../KhachHang/layout/header.php");
    require_once("../entities/gioHang.class.php");
    require_once("../config/db.class.php");
    $DB = new dB();
    $dSGH =  gioHang::dSGH($_COOKIE["username"]);
    $tongTien = 0 ;
    foreach ($dSGH as $item)
    {
        $sql = "SELECT * FROM sanpham WHERE MaSP =" . $item["MaSP"];
        $temp = mysqli_fetch_array(mysqli_query($DB->connect(),$sql));
        $tongTien += $temp["DonGia"] *$item["SoLuong"]; 
?>
    <h1><?php echo $temp["TenSP"]?></h1>
    <h1><?php echo $item["SoLuong"]?></h1>
    <h1><?php echo $temp["DonGia"]?></h1>
<?php
    }
    echo "<h1>Tổng tiền = </h1>" . $tongTien;
    require_once("../KhachHang/layout/footer.php");
?>
