<?php
if (isset($_COOKIE["username"]) == false) {
	// Nếu người dùng chưa đăng nhập thì chuyển hướng website sang trang đăng nhập
	header('Location: dangNhap.php');
}else {
	if (isset($_COOKIE["permission"]) == true) {
		// Ngược lại nếu đã đăng nhập
		$permission = $_COOKIE["permission"];
		// Kiểm tra quyền của người đó có phải là admin hay không
		if (!$permission ) {
			// Nếu không phải admin thì xuất thông báo
			echo "Bạn không đủ quyền truy cập vào trang này</br>";
			echo "  <a href='index.php'>
                        <input type='button' value='Trở về trang chủ' />
                    </a>";
			exit();
		}
	}
}
?>