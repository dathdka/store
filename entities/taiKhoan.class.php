<?php
    require_once("config/db.class.php");
    class taiKhoan{
        public $IDNguoiDung;
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
            $sql = "INSERT INTO taikhoan (Email, MatKhau, HoTen, SDT, DiaChi, Diem, PhanQuyen) VALUES
            ('$this->Email', '$this->MatKhau','$this->HoTen','$this->SDT', '$this->DiaChi', '$this->Diem', '$this->PhanQuyen')";
            $result = $DB->query_execute($sql);
            return $result;
        }
        
    }
?>