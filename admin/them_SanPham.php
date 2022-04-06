<?php
require_once("../admin/layoutAdmin/header.php");
?>
<div style="width:85%;float: right">
<?php
require_once("../entities/sanPham.class.php");
require_once("../entities/hangSX.class.php");
include("../admin/permission.php");
if (isset($_POST["btnTaoMoi"])) {

    $MaNSX = $_POST["txtHSX"];
    $TenSP = $_POST["txtTenSP"];
    $DonGia = $_POST["txtDonGia"];
    $GioiTinh = $_POST["txtGioiTinh"];
    $MoTa = $_POST["txtMoTa"];
    $SoLuong = $_POST["txtSoLuong"];
    $KhuyenMai = $_POST["txtKhuyenMai"];
    //upload file
    $uploadOk = 1;
    $target_dir = "../uploads/";
    $timestamp = date("d") . date("m") . date("y") . date("h") . date("i") . date("s");
    $target_file = $target_dir . $timestamp . basename($_FILES["fileToUpload"]["name"]);
    if (file_exists($target_file)) {
        echo "Đã trùng ảnh";
        $uploadOk = 0;
    }
    if ($_FILES["fileToUpload"]["size"] > 500000) {
        echo "File đã vượt quá kích thước cho phép";
        $uploadOk = 0;
    }
    if ($uploadOk == 0) {
        echo "Upload thất bại";
    } else {
        move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
    }
    $newSP = new sanPham($MaNSX, $TenSP, $DonGia, $GioiTinh, $SoLuong, $MoTa, $KhuyenMai, $target_file);
    $result = $newSP->save();
    if ($result) {
        header("Location: them_SanPham.php?daThem");
    } else {
        header("Location: them_SanPham.php?thatBai");
    }
}

if (isset($_GET["daThem"])) {
    echo "<div class='notice success'><p>Tạo mới thành công</p></div>";
}
if (isset($_GET["thatBai"])) {
    echo "<div class='notice error'><p>Đã xảy ra lỗi trong quá trình tạo sản phẩm</p></div>";
}
?>

<div class="form_wrapper">
  <div class="form_container">
    <div class="title_container">
      <h2>Thêm Sản Phẩm</h2>
    </div>
    <div class="row clearfix">
      <div class="">
        <form method="POST" enctype="multipart/form-data">

            <div class="input_field"> <span><i class="fa-solid fa-bars"></i></span>
                <input type="text" name="txtTenSP" placeholder="Tên sản phẩm" required>
            </div>

            <div class="input_field select_option">
                <select name="txtHSX">
                    <option value="" selected></option>
                    <?php
                    $HSX = hangSX::dSHSX();
                    foreach ($HSX as $item) {
                        echo "<option value=" . $item["MaNSX"] . ">" . $item["TenNSX"] . "</option>";
                    }
                    ?>
                </select>
                <div class="select_arrow"></div>
            </div>

            <div class="input_field"> 
                <input type="number" name="txtDonGia" placeholder="Đơn giá" required>
            </div>

            <div class="input_field select_option">
                <select name="cbGioiTinh">
                    <option value="0">Nam</option>
                    <option value="1">Nữ</option>
                </select>
                <div class="select_arrow"></div>
            </div>

          <div class="input_field"> <span><i class="fa-solid fa-file-lines"></i></span>
            <input type="text" name="txtMoTa" placeholder="Mô tả" required>
          </div>
          
          <div class="row clearfix">
            <div class="col_half">
              <div class="input_field">
                <input type="number" style="width:100%" name="txtSoLuong" placeholder="Số lượng" required>
              </div>
            </div>
            
            <div class="col_half">
              <div class="input_field">
                <input type="number" style="width:100%" name="txtKhuyenMai" placeholder="Khuyến mãi" required>   
              </div>
            </div>
          </div>
            	
          <div class="input_field">
             <input type="file" name="fileToUpload" id="fileToUpload" class="inputfile" required>
             <label style="padding:5px" for="fileToUpload">Choose a file <i class="fa fa-upload"></i></label> 
          </div>

          <input type="submit" name="btnTaoMoi" value="Tạo mới">
        </form>
      </div>
    </div>
  </div>
</div>
  

<?php
require_once("layoutAdmin/footer.php");
?>
