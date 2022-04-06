<?php
    require_once("../admin/layoutAdmin/header.php");    
?>

<div style="width:85%;float:right">
<?php
    require_once("../entities/hangSX.class.php");
    include("../admin/permission.php");
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
        echo "<div class='notice success'><p>Thêm mới thành công</p></div>";
    }
    if(isset($_GET["thatBai"])){
        echo "<div class='notice error'><p>Đã xảy ra lỗi trong quá trình thêm</p></div>";
    }
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
                        <input type="text" name="txtHSX" placeholder="Nhập hãng sản xuất" required>
                    </div>
                        <input type="submit" name="btnSubmit" value="Đồng ý">
                </form>
            </div>
        </div>
    </div>
</div>
<div>


<?php
    require_once("layoutAdmin/footer.php");
?>