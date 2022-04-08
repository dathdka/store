<?php
    require_once("../KhachHang/layout/header.php");
    require_once("../entities/gioHang.class.php");
    require_once("../entities/taiKhoan.class.php");
    require_once("../entities/sanPham.class.php");
    require_once("../config/db.class.php");
    include("../KhachHang/permission.php");
    
?>

<?php
$DB = new dB();
    $Email = $_COOKIE["username"];
    $dSGH =  gioHang::dSGH($Email);
    $tongTien = 0 ;
    foreach ($dSGH as $item)
    {
        $sql = "SELECT * FROM sanpham WHERE MaSP =" . $item["MaSP"];
        $temp = mysqli_fetch_array(mysqli_query($DB->connect(),$sql));
?>
<table class="table" id="margin-top-110">
		<tr>
    	<th style="width:40%" class="table__heading">Tên Sản Phẩm</th>
		<th style="width:25%" class="table__heading">Đơn giá</th>
    	<th style="width:10%" class="table__heading">Số lượng</th>
    	<th style="width:20%" class="table__heading"></th>
  		</tr>
  <tr class="table__row" >
    <td class="table__content" data-heading="Tên Sản Phẩm">
		<p><?php echo $temp["TenSP"]?></p>
	</td>

	<td class="table__content" data-heading="Đơn giá">
		<p><?php echo ($temp["DonGia"]- ($temp["DonGia"]*$temp["KhuyenMai"]/100))?></p>
	</td>

    <td class="table__content" data-heading="Số lượng">
		<form>
        	<input type="number" name="txtSoLuong" class="form-control text-center" id="<?php echo $temp["MaSP"]?>"
        	min="1" max=<?php echo $temp["SoLuong"] ?> 
        	value=<?php echo $item["SoLuong"]?>
        	onchange="changeAmount(<?php echo $temp['MaSP'] ?>)">
    	</form>
	</td>

    <td class="table__content" data-heading="" style="text-align: center">
		<button type="submit" class="btn btn-danger btn-sm" id="<?php echo $item["MaSP"]; ?>" onclick="xoaSP(<?php  echo $item['MaSP']; ?>);" ><i class="fa fa-trash-o"></i></button>
	</td>
  	</tr>
</table>
	
		<?php
    		$tongTien += ($temp["DonGia"]- ($temp["DonGia"]*$temp["KhuyenMai"]/100)) *$item["SoLuong"];
    	?>
		<?php
		}
    		echo "	
			<table class='table'>
			<tr>
				<th class='table__heading' style='float:right'><h2> Tổng Tiền:$tongTien </h2></th>
  			</tr>
			<table>";
    		if(count($dSGH)>0){
		?>

<?php
    }
    require_once("../KhachHang/layout/footer.php");
?>
			<a href="sanPham.php" class="btn btn-warning"><i class="fa fa-angle-left"></i> Tiếp tục mua hàng</a>
			<?php $TK = taiKhoan::layTaiKhoan($Email); ?>	
    		<a class="btn btn-success" style="float:right;padding-left: 20px; " href="<?php echo "thanhToan.php?Email=".$Email."&tongTien=".$tongTien."&hoTen=".$TK->HoTen."&SDT=".$TK->SDT ?>">Thanh toán
				<i class="fa fa-angle-right"></i>
    		</a>

<script type="text/javascript">
    function changeAmount(MaSP){
        var x = document.getElementById(MaSP);
        const xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET", "tangGH.php?MaSP=" + MaSP+"&amount="+ x.value, true);
        xmlhttp.send();
        location.reload();
    }

    function xoaSP(MaSP) {
        const xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET", "xoaKhoiGio.php?MaSP=" + MaSP, true);
        xmlhttp.send();
        location.reload();
    }
</script>
