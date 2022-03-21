<?php
    require_once("../config/db.class.php");
    class taiKhoan{
        public $Email;
        public $MatKhau;
        public $HoTen;
        public $SDT;
        public $DiaChi;
        public $Diem;
        public $PhanQuyen;


        public function __construct($Email, $MatKhau, $HoTen, $SDT, $DiaChi){
            $this->Email = $Email;
            $this->MatKhau = $MatKhau;
            $this->HoTen = $HoTen;
            $this->SDT = $SDT;
            $this->DiaChi = $DiaChi;
            $this->Diem = 0;
            $this->PhanQuyen = false;
        }

        public function save(){
            $DB = new dB();
            $conn = $DB->connect();
            $sql = $conn->prepare("INSERT INTO taikhoan (Email, MatKhau, HoTen, SDT, DiaChi, Diem, PhanQuyen) VALUES
            (?, ?, ?, ?, ?, ?, ?)");
            $sql->bind_param("sssssii",$this->Email,$this->MatKhau,$this->HoTen,$this->SDT,$this->DiaChi,$this->Diem,$this->PhanQuyen);
            return $sql->execute();
        }
        
        public function login(){
            $DB = new dB();
            $sql = "SELECT * FROM taikhoan WHERE Email = '$this->Email' AND MatKhau = '$this->MatKhau'";
            $result = mysqli_fetch_object(mysqli_query($DB->connect(),$sql));
            return $result;
        }

        public static function layTaiKhoan($Email){
            $DB = new dB();
            $sql = "SELECT * FROM taikhoan WHERE email = '$Email'";
            return mysqli_fetch_object(mysqli_query($DB->connect(),$sql));
        }

        public static function editThongTin($Email, $HoTen, $SDT, $DiaChi){
            $DB = new dB();
            $sql = "UPDATE taikhoan SET HoTen = '$HoTen', DiaChi = '$DiaChi', SDT='$SDT'
            WHERE Email = '$Email'";
            return $DB->query_execute($sql);
        }

        public static function dSTK(){
            $DB = new dB();
            $sql = "SELECT * FROM taikhoan ";
           return  $DB->select_to_array($sql);
        }

        public static function phanQuyen($Email){
            $DB = new dB();
            $sql = "UPDATE taikhoan SET PhanQuyen = 1 WHERE Email= '$Email'";
            return $DB->query_execute($sql);
        }
    }
?>