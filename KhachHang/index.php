<?php
    require_once("../KhachHang/layout/header.php");
    echo "<h1>hello</h1>";
?>
    <form method="post" >
        <select name="slc" >
            <option value="1">Ha Noi</option>
            <option value="2">TP.HCM</option>
        </select>
        <input type="submit" name="btn" value="ok">
    </form>
<?php 
    echo (isset($_POST["btn"]))? $_POST["slc"]: "";
    require_once("../KhachHang/layout/footer.php");
?>