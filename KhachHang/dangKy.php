<style>
    body{
    background-image: linear-gradient(135deg, #FAB2FF 10%, #1904E5 100%);
    background-size: cover;
    background-repeat: no-repeat;
    background-attachment: fixed;
    }
</style>
<?php
    require_once("../KhachHang/layout/header.php");
    require_once("../entities/taiKhoan.class.php");

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
            echo "<h1>Đăng ký thành công</h1>";
        }
        else{
            echo "<h1>Đã xảy ra lỗi trong quá trình đăng ký</h1>";
        }
    }
?>

<body>
    <div class="box-form">
        <div class="right">
            <h5>Register</h5>
                <form method="POST">
                    <fieldset>
                        <div class="inputs">
                            <h3>Email: </h3>
                            <input type="email" name="txtEmail" placeholder="Email" required>
                            <h3>Mật khẩu: </h3>
                            <input type="password" name="txtMatKhau" placeholder="Mật khẩu" required>
                            <h3>Họ tên: </h3>
                            <input type="text" name="txtHoTen" placeholder="Họ tên" required>
                            <h3>Số điện thoại: </h3>
                            <input type="number" name="txtSDT" placeholder="Số điện thoại" required>
                            <h3>Địa chỉ: </h3>
                            <input type="text" name="txtDiaChi" placeholder="Địa chỉ" required>
                            <input type="submit" value="Đăng ký" name="btnDangKy">
                        </div>
                    </fieldset>
                </form>
        </div>
    </div>  
</body>

<?php
    require_once("../KhachHang/layout/footer.php");

?>