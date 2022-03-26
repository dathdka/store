<!DOCTYPE html>
<html lang="vi">

<head>
    <meta property="fb:app_id" content="996332981322355" />
    <meta property="fb:admins" content="100007045279349" />

    <link rel="canonical" href="localhost/store/KhachHang<?php echo $_SERVER['PHP_SELF']; ?>" />
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

<body>
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v13.0&appId=996332981322355&autoLogAppEvents=1" nonce="IzTv8ApQ"></script>
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
                <input type='button' value='Đăng nhập web' />
            </a>
            <a href='dangKy.php'>
                <input type='button' value='Đăng ký' />
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
            <div class="fb-login-button" onclick="checkLoginState()" scope="public_profile,email" data-size="small" data-button-type="login_with" data-layout="rounded" data-auto-logout-link="true" data-use-continue-as="true"></div>

            <!-- Load the JS SDK asynchronously -->


        <?php } else { ?>
            <a href='gioHang.php'>
                <input type='button' value='Giỏ hàng' />
            </a>
            <a href='thongTin.php'>
                <input type='button' value='Thông tin' />
            </a>
            <a href='dangXuat.php?logout=1'>
                <input type='button' onclick="dangXuat()" value='Đăng xuất' />
            </a>

        <?php } ?>
    </form>
    <!-- ================= -->