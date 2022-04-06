<?php
require_once("../admin/layoutAdmin/header.php");
?>

<div style="width:80%;float:right">
<?php
require_once("../entities/hangSX.class.php");
include("../admin/permission.php");
if (isset($_GET["thanhCong"])) {
    echo "<div class='notice success'><p>Chỉnh sửa thành công</p></div>";
    echo "  <a href='show_HSX.php'>
                        <input type='button' class='btn btn-primary' value='Trở về trang chủ' />
                    </a>";
}
if (isset($_GET["thatBai"])) {
    echo "<div class='notice error'><p>Đã xảy ra lỗi trong quá trình sửa</p></div>";
    
}
if (isset($_GET["MaNSX"])) {
    $item = hangSX::layHSX($_GET["MaNSX"]);
?>

<div class="form_wrapper">
    <div class="form_container">
        <div class="title_container">
            <h2>Tên nhà sản xuất</h2>
        </div>
            <div class="row clearfix">
            <div class="">
                <form method="post">
                    <div class="input_field"> <span><i aria-hidden="true" class="fa-solid fa-briefcase"></i></span>
                        <input type="text" name="txtTenNSX" placeholder="<?php echo $item->TenNSX ?>" required>
                        <?php
                            }
                        if(isset($_POST["btnXacNhan"])){
                            $TenNSX = $_POST["txtTenNSX"];
                            $editHSX = new hangSX($TenNSX);
                            $editHSX->doiGiaTri($_GET["MaNSX"]);
                            if (!$result) {
                            header("Location: edit_HSX.php?thanhCong");
                            } else {
                                header("Location: edit_HSX.php?thatBai");
                            }
                        }
                        ?>
                    </div>
                    <input type="submit" name="btnXacNhan" value="Xác nhận">
                </form>
            </div>
        </div>
    </div>
</div>
</div>


