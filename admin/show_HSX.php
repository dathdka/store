<?php
    require_once("../admin/layoutAdmin/header.php");
    require_once("../entities/hangSX.class.php");
    include("../admin/permission.php");
    $dSHSX =  hangSX::dSHSX();
?>
    <a href="them_HSX.php">
    <input type='button' value='Thêm hãng sản xuất mới' />
    </a>
<?php

    foreach ($dSHSX as $item)
    {
        
?>
    <h1><?php echo $item["TenNSX"]?></h1>
    <form method="post">
        <input type="submit" name="btnEdit" value="Chỉnh sửa">
        <a class="button" href="delete_HSX.php?MaNSX=<?php echo $item["MaNSX"];?>" onclick="javascript: return confirm('Bạn có chắc chắn muốn xóa?');">Delete</a>
    </form>
    <?php
    if(isset($_POST["btnEdit"])){
         header("location: edit_HSX.php?MaNSX=" .$item['MaNSX']) ;
    }
    }
    require_once("../admin/layoutAdmin/footer.php");
?>
