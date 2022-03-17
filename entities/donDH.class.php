<?php
    require_once("../config/db.class.php");
    class donDH{
        public $MaDDH;
        public $Email;
        public $ThoiGianDat;
        public $ThanhTien;
        
        public function __construct( $Email, $ThoiGianDat, $ThanhTien){
            $this->$Email = $Email;
            $this->$ThoiGianDat = $ThoiGianDat;
            $this->$ThanhTien = $ThanhTien;
        }

        public function save(){
            $DB = new dB();
            $sql = "INSERT INTO dondh( Email, ThoiGianDat, ThanhTien) VALUES 
            ( '$this->Email', '$this->ThoiGianDat', '$this->ThanhTien')";
            $result = $DB->query_execute($sql);
            return $result;
        }
        
    }
?>