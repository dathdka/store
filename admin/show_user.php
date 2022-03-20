<?php
    require_once("../admin/layoutAdmin/header.php");
    require_once("../entities/taiKhoan.class.php");
    include("../admin/permission.php");
    $dSTK = taiKhoan::dSTK();
    if(isset($_GET["thanhCong"]))
    {
        echo "<h1>Phân quyền thành công</h1>";
    }
    echo "<h1>Quản lý người dùng</h1>";
    foreach($dSTK as $item){
    ?>
        <h3>Email: <?php echo $item["Email"] ?></h3>
        <h3>Họ Tên: <?php echo $item["HoTen"] ?></h3>
        <h3>SDT: <?php echo $item["SDT"] ?></h3>
        <h3>Địa chỉ: <?php echo $item["DiaChi"] ?></h3>
        <?php if($item["PhanQuyen"]){
            echo "<h3>Phân quyền: admin</h3>";
        }else{
            echo "<h3>Phân quyền: Khách hàng</h3>";
        } ?>
        <a href="show_HD.php?Email=<?php echo $item["Email"]?>">
            <button type="submit" name="btnHoaDon">Xem Lịch sử mua hàng</button>
        </a>
        <a href="phanQuyen.php?Email=<?php echo $item["Email"]?>">
            <button type="submit" name="btnPhanQuyen" onclick="javascript: return confirm('Bạn có muốn phân quyền cho người này?');">Phân quyền</button>
        </a>
<?php
}
    require_once("../admin/layoutAdmin/header.php");
?>