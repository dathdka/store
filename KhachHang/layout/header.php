<!DOCTYPE html>
<html lang="vi">

<head>
    <meta property="fb:app_id" content="971339196857340" />
    <meta property="fb:admins" content="100007045279349" />
    <link rel="canonical" href="localhost/store/KhachHang<?php echo $_SERVER['PHP_SELF']; ?>" />
</head>

<body>
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v13.0&appId=971339196857340&autoLogAppEvents=1" nonce="5v65n9fy"></script>
    <!-- Đưa vào navbar -->
    <form>
        <a href="index.php">
            <input type="button" value="Trang chủ" />
        </a>
        <a href='sanPham.php'>
            <input type='button' value='Sản phẩm' />
        </a>

        <a href='timKiem.php'>
            <input type='button' value='Tìm kiếm' />
        </a>

        <?php if (!isset($_COOKIE["username"])) { ?>
            <a href='dangNhap.php'>
                <input type='button' value='Đăng nhập' />
            </a>
        <?php } else { ?>
            <a href='gioHang.php'>
                <input type='button' value='Giỏ hàng' />
            </a>
            <a href='thongTin.php'>
                <input type='button' value='Thông tin' />
            </a>
            <a href='dangXuat.php?logout=1'>
                <input type='button' value='Đăng xuất' />
            </a>
        <?php } ?>
    </form>
    <!-- ================= -->