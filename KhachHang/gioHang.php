<?php
    require_once("../KhachHang/layout/header.php");
    require_once("../entities/gioHang.class.php");
    require_once("../entities/taiKhoan.class.php");
    require_once("../config/db.class.php");
    include("../KhachHang/permission.php");
    $DB = new dB();
    $Email = $_COOKIE["username"];
    $dSGH =  gioHang::dSGH($Email);
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
?>
    <form>
        <input type="submit" name="btnThanhToan" value="Thanh toán">
    </form>
<?php
    if(isset($_GET["btnThanhToan"]))
    {
        $TK = taiKhoan::layTaiKhoan($Email);
        header("Location: thanhToan.php?Email=".$Email."&tongTien=".$tongTien."&hoTen=".$TK->HoTen
        ."&SDT=".$TK->SDT);
    }
        
    require_once("../KhachHang/layout/footer.php");
?>
