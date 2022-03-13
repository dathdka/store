<?php
    require_once("config/db.class.php");
    class donDH{
        public $MaDDH;
        public $IDNguoiDung;
        public $Email;
        public $ThoiGianDat;
        public $ThanhTien;
        
        public function __construct($IDNguoiDung, $Email, $ThoiGianDat, $ThanhTien){
            $this->$IDNguoiDung = $IDNguoiDung;
            $this->$Email = $Email;
            $this->$ThoiGianDat = $ThoiGianDat;
            $this->$ThanhTien = $ThanhTien;
        }

        public function save(){
            $DB = new dB();
            $sql = "INSERT INTO dondh(IDNguoiDung, Email, ThoiGianDat, ThanhTien) VALUES 
            ('$this->IDNguoiDung', '$this->Email', '$this->ThoiGianDat', '$this->ThanhTien')";
            $result = $DB->query_execute($sql);
            return $result;
        }
        
    }
?>