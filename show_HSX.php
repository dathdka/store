<?php
    require_once("layoutAdmin/header.php");
    require_once("entities/hangSX.class.php");
    include("permission.php");
    $dSHSX =  hangSX::dSHSX();

    foreach ($dSHSX as $item)
    {
        
?>
    <h1><?php echo $item["TenNSX"]?></h1>
<?php
    }
    require_once("layoutAdmin/footer.php");
?>
