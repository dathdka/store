<?php
    require_once("config.ini");

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

    }
?>