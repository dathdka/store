<!DOCTYPE html>
<html lang="vi">
<head>
    <meta property="fb:app_id" content="&#123;996332981322355&#125;" />
    <!-- <meta property="fb:admins" content="100007045279349" /> -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="../KhachHang/assets/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400" rel="stylesheet" >  
    <link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="images/icons/favicon.png"/>
    <link rel="stylesheet" href="../KhachHang/css/main.css">
	<link rel="stylesheet" href="../KhachHang/css/util.css"/>
	<link rel="stylesheet" href="../KhachHang/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="../KhachHang/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="../KhachHang/fonts/iconic/css/material-design-iconic-font.min.css">
	<link rel="stylesheet" href="../KhachHang/fonts/linearicons-v1.0.0/icon-font.min.css">
	<link rel="stylesheet" href="../KhachHang/vendor/animate/animate.css">
	<link rel="stylesheet" href="../KhachHang/vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" href="../KhachHang/vendor/animsition/css/animsition.min.css">
	<link rel="stylesheet" href="../KhachHang/vendor/select2/select2.min.css">
	<link rel="stylesheet" href="../KhachHang/vendor/daterangepicker/daterangepicker.css">
	<link rel="stylesheet" href="../KhachHang/vendor/slick/slick.css">
	<link rel="stylesheet" href="../KhachHang/vendor/MagnificPopup/magnific-popup.css">
	<link rel="stylesheet" href="../KhachHang/vendor/perfect-scrollbar/perfect-scrollbar.css">
</head>


<script>
    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) {
            return;
        }
        js = d.createElement(s);
        js.id = id;
        js.src = "https://connect.facebook.net/vi_VN/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));

    function statusChangeCallback(response) { // Called with the results from FB.getLoginStatus().
        console.log('statusChangeCallback');
        console.log(response); // The current login status of the person.
        if (response.status === 'connected') {
            testAPI();
        } else if (response.status === 'unknown') {
            dangNhap();
        }
    }



    function dangNhap() {

        FB.login(function(response) {
            if (response.authResponse) {
                console.log('Welcome!  Fetching your information.... ');
                FB.api('/me', {
                    locale: 'vi_VN',
                    fields: 'id,name,email,link,gender,locale,picture'
                }, function(response) {
                    console.log('Good to see you, ' + response.name + '.');
                    const xmlhttp = new XMLHttpRequest();
                    xmlhttp.open("GET", "dangNhapFB.php?Email=" + response.email + "&HoTen=" + response.name, true);
                    xmlhttp.send();
                });
            } else {
                console.log('User cancelled login or did not fully authorize.');
                const xmlhttp = new XMLHttpRequest();
                xmlhttp.open("GET", "dangNhapFB.php?Email=" + response.email + "&HoTen=" + response.name, true);
                xmlhttp.send();
            }
        });

    }

    function dangXuat() {
        FB.logout(function(response) {
            // user is now logged out
        });
    }

    function testAPI() { // Testing Graph API after login.  See statusChangeCallback() for when this call is made.
        FB.api('/me', {
            locale: 'vi_VN',
            fields: 'id,name,email,link,gender,locale,picture'
        }, function(response) {
            console.log('Successful login for: ' + response.name);
            document.getElementById('status').innerHTML =
                "</b> <img src=" + response.picture.data.url + "/>" + response.name;
        });
    }

    function checkLoginState() { // Called when a person is finished with the Login Button.
        FB.getLoginStatus(function(response) {
            // See the onlogin handler
            statusChangeCallback(response);
        }, {
            scope: 'public_profile,email,pages_read_user_content,read_insights,manage_pages',
            return_scopes: true
        });
    }
</script>

<?php
function checkLogin()
{
    if (isset($_COOKIE["username"])) {
        return true;
    } else {
        return false;
    }
}
?>

<body class="animsition">

    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v13.0&appId=996332981322355&autoLogAppEvents=1" nonce="IzTv8ApQ"></script>
    <!-- Đưa vào navbar -->

			<!-- Header -->
	<header>
		<!-- Header desktop -->
		<div class="container-menu-desktop">
			<!-- Topbar -->
			<div class="top-bar">
				<div class="content-topbar flex-sb-m h-full container">
					<div class="right-top-bar flex-w h-full">
                            <?php if (!isset($_COOKIE["username"])) { ?>
                                <a href='dangNhap.php' class="flex-c-m trans-04 p-lr-25 " id="text-decoration-none">
                                    <input type='button' value='Đăng nhập web' />Đăng Nhập
                                </a>
                                <a href='dangKy.php' class="flex-c-m trans-04 p-lr-25" id="text-decoration-none">   
                                    <input type='button' value='Đăng ký'  />Đăng kí
                                </a>
                                    <script>
                                        window.fbAsyncInit = function() {
                                        FB.init({
                                        appId: '996332981322355',
                                        cookie: true,
                                        xfbml: true,
                                        version: 'v13.0'
                                        });
                                        FB.getLoginStatus(function(response) {
                                        statusChangeCallback(response);
                                        }) // Logged into your webpage and Facebook.
                                        };
                                    </script>
                                        <!-- <fb:login-button scope="public_profile,email" onlogin="checkLoginState();" >
                                        </fb:login-button> -->
                                        <div id="status"></div>
                                        <div class="fb-login-button" style="margin-top: 5px;" onclick="checkLoginState()" scope="public_profile,email" data-size="small" data-button-type="login_with" data-layout="rounded" data-auto-logout-link="true" data-use-continue-as="true"></div>
                                        <!-- Load the JS SDK asynchronously -->
					</div>
				</div>
			</div>

			<div class="wrap-menu-desktop">
				<nav class="limiter-menu-desktop container">
					<!-- Logo desktop -->		
					<a href="index.php" class="logo">
						<img src="images/icons/logo-01.png" alt="IMG-LOGO">
					</a>

					<!-- Menu desktop -->
					<div class="menu-desktop">
						<ul class="main-menu">
							<li class="active-menu">
                                <a href="index.php">
                                    <input type="button" value="Trang chủ" />Trang chủ
                                </a>
							</li>

							<li>
                                <a href="sanPham.php">
                                    <input type='button' value='Sản phẩm' />Sản phẩm
                                </a>
							</li>
                            </ul> 
                    </div>
                    <div class="wrap-icon-header flex-w flex-r-m">
						<div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 js-show-modal-search">
                            <a href='timKiem.php'>
                                <input type='button' value='Tìm kiếm'/>
                                <i class="zmdi zmdi-search"></i>
                            </a>
						</div>

						<div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11  js-show-cart" >
                                <a href='gioHang.php'>
                                    <input type='button' value='Giỏ hàng'/>
                                    <i class="zmdi zmdi-shopping-cart"></i>
                                </a>
						</div>
					</div>
                </nav>  
            </div>      

            <?php } else { ?>

            <div class="wrap-menu-desktop">
				<nav class="limiter-menu-desktop container">
					<!-- Logo desktop -->		
					<a href="index.php" class="logo">
						<img src="images/icons/logo-01.png" alt="IMG-LOGO">
					</a>

					<!-- Menu desktop -->
					<div class="menu-desktop">
						<ul class="main-menu">
							<li class="active-menu">
                                <a href='thongTin.php' class="flex-c-m trans-04 p-lr-25">
                                    <input type='button' value='Thông tin' />Thông tin
                                </a>
							</li>
							<li>
                                <a href='dangXuat.php?logout=1' class="flex-c-m trans-04 p-lr-25" >
                                    <input type='button' onclick="dangXuat()" value='Đăng xuất' />Đăng Xuất
                                </a>
							</li>
                        </ul> 
                    </div>
                
					<!-- Icon header -->
					<div class="wrap-icon-header flex-w flex-r-m">
						<div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11">
                            <a id="fontsize-none" style="color:#007bff" href='timKiem.php'>
                                <input type='button' value='Tìm kiếm'/>
                                <i class="zmdi zmdi-search"></i>
                            </a>
						</div>

						<div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11" >
                                <a id="fontsize-none" style="color:#007bff" href='gioHang.php'>
                                    <input type='button' value='Giỏ hàng'/>
                                    <i class="zmdi zmdi-shopping-cart"></i>
                                </a>
						</div>
                        <?php } ?>
					</div>
				</nav>
			</div>	
		</div>
    </header>
    <!-- ================= -->