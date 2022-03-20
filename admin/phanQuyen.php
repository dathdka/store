<?php
    require_once("../admin/layoutAdmin/header.php");
    require_once("../entities/taiKhoan.class.php");
    include("../admin/permission.php");
    if(isset($_GET["Email"]))
    {
        $Email = $_GET["Email"];
        $result = taiKhoan::phanQuyen($Email);
        if($result){
            Header("Location: show_user.php?thanhCong");
        }
        else{
            echo "<h1>Phân quyền thất bại</h1>";
        }
    }
?>

<?php
    require_once("../admin/layoutAdmin/footer.php");
?>