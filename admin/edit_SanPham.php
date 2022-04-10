<?php
require_once("../admin/layoutAdmin/header.php");
?>
<div style="width:85%;float: right">
<?php
require_once("../entities/sanPham.class.php");
require_once("../entities/hangSX.class.php");
include("../admin/permission.php");
if (isset($_GET["thanhCong"])) {
    echo "<div class='notice success'><p>Chỉnh sửa thành công</p></div>";
    echo "  <a href='show_SanPham.php'>
                        <input class='btn btn-primary' type='button' value='Trở về trang chủ' />
                    </a>";
}
if (isset($_GET["thatBai"])) {
    echo " <div class='notice error'><p>Đã xảy ra lỗi trong quá trình sửa</p></div>";
   
}
if (isset($_GET["MaSP"])) {
    $item = sanPham::laySanPham($_GET["MaSP"]);
?>
 
<div class="form_wrapper">
  <div class="form_container">
    <div class="title_container">
      <h2>Sửa Sản Phẩm</h2>
    </div>
    <div class="row clearfix">
      <div class="">
        <form method="POST" enctype="multipart/form-data">
            <div class="input_field"> <span><i class="fa-solid fa-bars"></i></span>
                <input type="text" name="txtTenSP" placeholder=<?php echo $item->TenSP;?> required>
            </div>

            <div class="input_field select_option">
                <select name="txtHSX">
                    <option value="" selected></option>
                    <?php
                    $HSX = hangSX::dSHSX();
                    foreach ($HSX as $hsx) {
                        echo "<option value=" . $hsx["MaNSX"] . ">" . $hsx["TenNSX"] . "</option>";
                    }
                    ?>
                </select>
                <div class="select_arrow"></div>
            </div>

            <div class="input_field"> 
                <input type="number" name="txtDonGia" placeholder=<?php echo $item->DonGia;?> required>
            </div>

            <div class="input_field select_option">
                <select name="cbGioiTinh">
                    <option value="0">Nam</option>
                    <option value="1">Nữ</option>
                </select>
                <div class="select_arrow"></div>
            </div>

          <div class="input_field"> <span><i class="fa-solid fa-file-lines"></i></span>
            <input type="text" name="txtMoTa" placeholder=<?php echo $item->MoTa;?> required>
          </div>
          
          <div class="row clearfix">
            <div class="col_half">
                <div class="input_field">
                    <input type="number"  style="width:100%" name="txtSoLuong" placeholder=<?php echo $item->SoLuong;?> required> 
                </div>
            </div>
            
            <div class="col_half">
                <div class="input_field">
                    <input type="number"  style="width:100%" name="txtKhuyenMai" placeholder=<?php echo $item->KhuyenMai;?> required>   
                </div>
            </div>
          </div>
            	
          <div class="input_field">
                <input type="file" name="fileToUpload" id="fileToUpload" class="inputfile" required>   
                <label style="padding:5px" for="fileToUpload">Choose a file <i class="fa fa-upload"></i></label> 
          </div>

          <input type="submit" name="btnXacNhan" value="Xác nhận">
        </form>
      </div>
    </div>
  </div>
</div>
<?php
}
if(isset($_POST["btnXacNhan"])){
    $MaNSX = $_POST["txtHSX"];
    $TenSP = $_POST["txtTenSP"];
    $DonGia = $_POST["txtDonGia"];
    $GioiTinh = $_POST["cbGioiTinh"];
    $MoTa = $_POST["txtMoTa"];
    $SoLuong = $_POST["txtSoLuong"];
    $KhuyenMai = $_POST["txtKhuyenMai"];
    //upload file
    $uploadOk = 1;
    $target_dir = "../uploads/";
    $timestamp = date("d") . date("m") . date("y") . date("h") . date("i") . date("s");
    $target_file = $target_dir . $timestamp . basename($_FILES["fileToUpload"]["name"]);
    if (file_exists($target_file)) {
        echo "<div class='notice warning'><p>Đã trùng ảnh</p></div>";
        $uploadOk = 0;
    }
    if ($_FILES["fileToUpload"]["size"] > 500000) {
        echo "<div class='notice warning'><p>File đã vượt quá kích thước cho phép</p></div>";
        $uploadOk = 0;
    }
    if ($uploadOk == 0) {
        echo "<div class='notice warning'><p>Upload thất bại</p></div>";
        
    } else {
        move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
    }
    $editSP = new sanPham($MaNSX, $TenSP, $DonGia, $GioiTinh, $SoLuong, $MoTa, $KhuyenMai, $target_file);
    $editSP->doiGiaTri($_GET["MaSP"]);

}

?>
