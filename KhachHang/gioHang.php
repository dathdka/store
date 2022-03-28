<?php
    require_once("../KhachHang/layout/header.php");
    require_once("../entities/gioHang.class.php");
    require_once("../entities/taiKhoan.class.php");
    require_once("../entities/sanPham.class.php");
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
?>
    <h1><?php echo $temp["TenSP"]?></h1>
    <form>
        <label>Số lượng</label>
        <input type="number" name="txtSoLuong" id="<?php echo $temp["MaSP"]?>"
        min="1" max=<?php echo $temp["SoLuong"] ?> 
        value=<?php echo $item["SoLuong"]?>
        onchange="changeAmount(<?php echo $temp['MaSP'] ?>)">
        
    </form>
    <h1>Đơn giá: </h1>
    <h1><?php echo ($temp["DonGia"]- ($temp["DonGia"]*$temp["KhuyenMai"]/100))?></h1>
    <?php
    $tongTien += ($temp["DonGia"]- ($temp["DonGia"]*$temp["KhuyenMai"]/100)) *$item["SoLuong"];
    ?>
        <button type="submit" id="<?php echo $item["MaSP"]; ?>" onclick="xoaSP(<?php  echo $item['MaSP']; ?>);" >Xóa khỏi giỏ </button>
    <?php

}
    echo "<h1>Tổng tiền = $tongTien </h1>" ;
    if(count($dSGH)>0){
?>
    <?php $TK = taiKhoan::layTaiKhoan($Email); ?>
    <a href="<?php echo "thanhToan.php?Email=".$Email."&tongTien=".$tongTien."&hoTen=".$TK->HoTen
        ."&SDT=".$TK->SDT ?>">
        <button>Thanh toán</button>
    </a>

<?php
    }

        
    require_once("../KhachHang/layout/footer.php");
?>
<script type="text/javascript">
    function changeAmount(MaSP){
        var x = document.getElementById(MaSP);
        const xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET", "tangGH.php?MaSP=" + MaSP+"&amount="+ x.value, true);
        xmlhttp.send();
        location.reload();
    }

    function xoaSP(MaSP) {
        const xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET", "xoaKhoiGio.php?MaSP=" + MaSP, true);
        xmlhttp.send();
        location.reload();
    }
</script>