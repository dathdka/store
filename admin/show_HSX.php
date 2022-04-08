<?php
require_once("../admin/layoutAdmin/header.php");
?>
<div style="width: 85%;float: right;">
<?php
    require_once("../entities/hangSX.class.php");
    include("../admin/permission.php");
    $dSHSX =  hangSX::dSHSX();
?>
    <a href="them_HSX.php">
    <input type='button' value='Thêm hãng sản xuất mới' class='btn btn-warning'/>
    </a>
<?php
    foreach ($dSHSX as $item)
    { 
?> 

<div class="table-users" style="width: 100%;float: right;">
    <table cellspacing="0">
        <tr>
            <th id="text-center">Ten Hang</th>
            <th id="text-center">Chinh Sua</th>
            <th id="text-center"></th>
        </tr>
        <tr>
            <td id="text-center">
                <p><?php echo $item["TenNSX"]?></p>
                <?php
                    if(isset($_POST["btnEdit"])){
                    header("location: edit_HSX.php?MaNSX=" .$item["MaNSX"]) ;
               }
                ?>
            </td>
            <td id="text-center">
                <a href="edit_HSX.php?MaNSX=<?php echo $item["MaNSX"] ?>">
                <button>Chỉnh sửa</button>
                </a>
            <!-- <form method="post">
                <input type="submit" name="btnEdit" value="Chỉnh sửa" class="btn btn-primary">
            </form> -->
            </td>
            <td id="text-center">
                <a class="button" href="delete_HSX.php?MaNSX=<?php echo $item["MaNSX"];?>" onclick="javascript: return confirm('Bạn có chắc chắn muốn xóa?');"><i class="fa fa-trash"></i></a>
            </td>
        </tr>
    </table>
</div>

    <?php
   
    }
    require_once("../admin/layoutAdmin/footer.php");
?>
</div>
