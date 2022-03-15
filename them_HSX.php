<?php
    require_once("layoutAdmin/header.php");
    require_once("entities/hangSX.class.php");
    include("permission.php");
    if(isset($_POST["btnSubmit"])){
        $tenNSX = $_POST["txtHSX"];
        $newHSX = new hangSX($tenNSX);
        $result = $newHSX-> save();
        if($result){
            header("Location: them_HSX.php?daThem");
        }
        else{
            header("Location: them_HSX.php?thatBai");
        }
    }
?>
<?php
    if(isset($_GET["daThem"])){
        echo "<h1>Thêm mới thành công</h1>";
    }
    if(isset($_GET["thatBai"])){
        echo "<h1>Đã xảy ra lỗi trong quá trình thêm</h1>";
    }
?>

    <form method="post">
        <input type="text" name="txtHSX" placeholder="Nhập hãng sản xuất">
        <input type="submit" name="btnSubmit" value="Đồng ý">
    </form>
<?php
    require_once("layoutAdmin/footer.php");
?>