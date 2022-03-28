<?php
    require_once("../entities/taiKhoan.class.php");
    if(isset($_GET["Email"],$_GET["HoTen"])){
        $email = $_GET["Email"];
        $hoTen = $_GET["HoTen"];
        $check = taiKhoan::checkEmail($email);
        if(count($check) == 0){
            $userFB = new taiKhoan($email,'0',$hoTen,'0123456789',"TP. Hồ Chí Minh");
            $userFB->save();
            $username= "username";
            $Email = $userFB->Email;
            $permission = "permission";
            $PhanQuyen = $userFB->PhanQuyen;
            setcookie($username,$Email ,time()+(86400*30),"/");
            setcookie($permission,$PhanQuyen ,time()+(86400*30),"/");
            
        }else{
            $username= "username";
            foreach($check as $item){
                $Email =  $item["Email"];
                $permission = "permission";
                $PhanQuyen =  $item["PhanQuyen"];
                setcookie($username,$Email ,time()+(86400*30),"/");
                setcookie($permission,$PhanQuyen ,time()+(86400*30),"/");
                break;
            }
        }
        // header("Location: index.php");        
    }


?>