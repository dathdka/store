<?php
require_once("../KhachHang/layout/header.php");
require_once("../entities/sanPham.class.php");
require_once("../config/db.class.php");
include("../admin/permission.php");
$dSSP = sanPham::dSSP();
if(isset($_GET["btnXacNhan"])){
    $timKiem = "SELECT * FROM sanpham WHERE    ";
    $timKiem .=isset($_GET["cbNam"]) ? "GioiTinh=0 AND ":"";
    $timKiem .=isset($_GET["cbNu"]) ? "GioiTinh=1 AND ":"";
    $timKiem .=isset($_GET["cbKM"]) ? "KhuyenMai>0 ":substr($timKiem, 0,-4);
    $timKiem .=($_GET["sbGia"]=="giam") ? "ORDER BY DonGia DESC": "ORDER BY DonGia";
    echo $timKiem;
    $dSSP = sanPham::dSSPTK($timKiem);
}

?>
<form method="GET">
    <h3>Giá: </h3>
    <select name="sbGia" >
        <option value="tang" <?php echo (isset($_GET["sbGia"]) && $_GET["sbGia"]== "tang") ? "selected=true" : ""; ?>>Tăng</option>
        <option value="giam" <?php echo (isset($_GET["sbGia"]) && $_GET["sbGia"]== "giam") ? "selected=true" : ""; ?>>Giảm</option>
    </select>
        <h3>Nam: </h3>
        <input type="checkbox" name="cbNam" <?php echo isset($_GET["cbNam"]) ? "checked=true" : ""; ?>>
        <h3>Nữ: </h3>
        <input type="checkbox" name="cbNu" <?php echo isset($_GET["cbNu"]) ? "checked=true" : ""; ?>>
        <h3>Khuyến mãi: </h3>
        <input type="checkbox" name="cbKM" <?php echo isset($_GET["cbKM"]) ? "checked=true" : ""; ?>>
        <input type="submit" name="btnXacNhan" value="Xác nhận">
</form>
<?php

foreach ($dSSP as $item) {
?>
    <div class="col-md-6">
        <h1><?php echo $item["MaSP"] ?></h1>
        <h1><?php echo $item["TenSP"] ?></h1>
        <h1><?php echo $item["DonGia"] ?></h1>
        <h1><?php echo ($item["GioiTinh"] == "0") ? "Nam" : "Nữ"; ?></h1>
        <h1><?php echo $item["MoTa"] ?></h1>
        <h1><?php echo $item["SoLuong"] ?></h1>
        <h1><?php echo $item["KhuyenMai"] ?></h1>
        <img src="<?php echo $item["HinhAnh"] ?>" style="width:100px">
        <form method="post" onsubmit="return false" name="form">
            <button type="submit" id=<?php echo $item["MaSP"]; ?> onclick="changevalue(<?php echo $item['MaSP'] ?>);">
                <?php
                $DB = new dB();
                $sql = "SELECT * FROM gioHang WHERE MaSP =" . $item["MaSP"];
                $x = mysqli_fetch_object(mysqli_query($DB->connect(), $sql));

                if ($x != null) {
                    echo "Đã thêm vào giỏ hàng";
                } else {
                    echo "Thêm vào giỏ";
                }
                ?>
            </button>
        </form>

    </div>
<?php
}

?>

<script type="text/javascript">
    function changevalue(item) {
        const xmlhttp = new XMLHttpRequest();
        var x = document.getElementById(item);
        if (x.innerText == "Thêm vào giỏ") {
            x.innerHTML = "Đã thêm vào giỏ hàng ";
            xmlhttp.open("GET", "themVaoGio.php?MaSP=" + item, true);
            xmlhttp.send();
        } else {
            x.innerHTML = "Thêm vào giỏ";
            xmlhttp.open("GET", "xoaKhoiGio.php?MaSP=" + item, true);
            xmlhttp.send();
        }
    };
    //Sắp xếp
    // function gia(){
    //     var x = document.getElementById("jsGia");
    //     if(x.innerHTML == )
    // }
    // function gioiTinh(){
    //     var x = document.getElementById("jsGioiTinh");
    //     if(x.innerHTML != "Giới tính: Nam"){
    //         x.innerHTML = "Giới tính: Nam";
    //         xmlhttp.open("GET", "sanPham.php?GioiTinh=Nam", true);
    //         xmlhttp.send();
    //     }
    //     else{
    //         x.innerHTML = "Giới tính: Nữ";
    //     }
    //     x.style.backgroundColor="blue";
    // }
    // function KM(){
    //     var x = document.getElementById("jsKM");
    //     if(x.style.backgroundColor!="blue"){
    //         x.style.backgroundColor="blue";
    //     }
    //     else{
    //         x.style.backgroundColor="white";
    //     }
    // }
    // function xacNhan(){
    // }
</script>