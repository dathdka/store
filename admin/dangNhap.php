<?php
require_once("../entities/taiKhoan.class.php");
?>
    <form method="post" id="login" class="hidden">
        <input type="email" name="txtEmail" placeholder="Nhập Email">
        <input type="password" name="txtPassword" placeholder="Nhập mật khẩu">
        <input type="submit" name="btnsubmit" value="Đăng nhập">
    </form>
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
            header("Location: show_HD.php");
        }
        else{
            echo "Tên tài khoản hoặc mật khẩu không đúng";
        }
    }

require_once("../admin/layoutAdmin/footer.php");
?>