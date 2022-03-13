<?php
    require_once("layoutAdmin/header.php");
    require_once("entities/taiKhoan.class.php");

    if(isset($_POST["btnDangKy"]))
    {
        $Email = $_POST["txtEmail"];
        $Matkhau = md5($_POST["txtMatKhau"]);
        $HoTen = $_POST["txtHoTen"];
        $SDT = $_POST["txtSDT"];
        $DiaChi = $_POST["txtDiaChi"];
        $newUser = new taiKhoan($Email, $Matkhau, $HoTen, $SDT, $DiaChi);
        $result = $newUser->save();
        if($result)
        {
            header("Location: dangKy.php?daThem");
        }
        else{
            header("Location: dangKy.php?thatBai");
        }
    }

    if(isset($_GET["daThem"])){
        echo "<h1>Đăng ký thành công</h1>";
    }
    if(isset($_GET["thatBai"])){
        echo "<h1>Đã xảy ra lỗi trong quá trình đăng ký</h1>";
    }
?>


<form method="POST">
    <h3>Email: </h3>
    <input type="email" name="txtEmail" placeholder="Email">
    <h3>Mật khẩu: </h3>
    <input type="password" name="txtMatKhau" placeholder="Mật khẩu">
    <h3>Họ tên: </h3>
    <input type="text" name="txtHoTen" placeholder="Họ tên">
    <h3>Số điện thoại: </h3>
    <input type="number" name="txtSDT" placeholder="Số điện thoại">
    <h3>Địa chỉ: </h3>
    <input type="text" name="txtDiaChi" placeholder="Địa chỉ">
    <input type="submit" value="Đăng ký" name="btnDangKy">
</form>

<?php
    require_once("layoutAdmin/footer.php");

?>