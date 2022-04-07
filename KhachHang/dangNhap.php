<link rel="stylesheet" href="../KhachHang/css/main.css">
<!-- <link rel="stylesheet" href="../KhachHang/css/util.css"> -->
<style>
    body, html{
        background-color: #8a9aae;
    }
</style>
<?php
// require_once("../KhachHang/layout/header.php");
require_once("../entities/taiKhoan.class.php")
?>


    <div class="box-form">
        <div class="right">
            <h5>Login</h5>
            <p>Don't have an account? <a href="../KhachHang/dangKy.php">Creat Your Account</a> it takes less than a minute</p>
                <form method="post" id="login" class="hidden">
                    <fieldset>
                        <div class="inputs">
                            <input type="email" name="txtEmail" placeholder="Nhập Email" required>
                            <input type="password" name="txtPassword" placeholder="Nhập mật khẩu" required>
                            <input type="submit" name="btnsubmit" value="Đăng nhập" style="background-color:cadetblue; background-image:none">
                        </div>
                    </fieldset>
                </form>
        </div>
    </div>


<?php
    if(isset($_POST["btnsubmit"]))
    {
        $email = $_POST["txtEmail"];
        $password = md5($_POST["txtPassword"]);
        $user = new taiKhoan($email,$password,"","","");
        $result = $user->login();
        if($result)
        {
            $username= "username";
            $Email = $result->Email;
            $permission = "permission";
            $PhanQuyen = $result->PhanQuyen;
            setcookie($username,$Email ,time()+(86400*30),"/");
            setcookie($permission,$PhanQuyen ,time()+(86400*30),"/");
            echo "Xin chào" . $_COOKIE["username"]. "</br>";
            echo ($_COOKIE["permission"]=='0')? "Khách hàng" : "Admin";
            header("Location: index.php");
        }
        else{
            echo "<div class='notice error'><p>Tên tài khoản hoặc mật khẩu không đúng</p></div>";
            
        }
    }

require_once("../KhachHang/layout/footer.php");
?>
