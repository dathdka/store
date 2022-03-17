<?php
require_once("../KhachHang/layout/header.php");
require_once("../entities/sanPham.class.php");
require_once("../config/db.class.php");
include("../admin/permission.php");
$dSSP = sanPham::dSSP();
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
            <button type="submit" id=<?php echo $item["MaSP"]; ?>  onclick="changevalue(<?php echo $item['MaSP'] ?>);" >
                <?php 
                    $DB = new dB();
                    $sql = "SELECT * FROM gioHang WHERE MaSP =". $item["MaSP"];
                    $x = mysqli_fetch_object(mysqli_query($DB->connect(),$sql));
                    
                    if($x!=null) {
                       echo "Đã thêm vào giỏ hàng";
                    }
                    else {
                        echo "Thêm vào giỏ";
                    }
                ?>
            </button>
        </form>

    </div>
<?php
}
?>

<script type="text/javascript" >

    function changevalue(item)
    {
        const xmlhttp = new XMLHttpRequest();
        var x = document.getElementById(item);
        if(x.innerText == "Thêm vào giỏ")
        {
            x.innerHTML = "Đã thêm vào giỏ hàng ";
            xmlhttp.open("GET", "themVaoGio.php?MaSP="+ item, true);
            xmlhttp.send();
        }
        else{
            x.innerHTML = "Thêm vào giỏ";
            xmlhttp.open("GET", "xoaKhoiGio.php?MaSP="+ item, true);
            xmlhttp.send();
        }
    };
</script>
