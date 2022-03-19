<?php
    require_once("../config/db.class.php");
    class donDH{
        public $MaDDH;
        public $Email;
        public $ThoiGianDat;
        public $ThanhTien;
        public $MaNH;
        
        public function __construct($MaDDH, $Email, $ThoiGianDat, $ThanhTien, $MaNH){
            $this->MaDDH = $MaDDH;
            $this->Email = $Email;
            $this->ThoiGianDat = $ThoiGianDat;
            $this->ThanhTien = $ThanhTien;
            $this->MaNH = $MaNH;
        }

        public function save(){
            $DB = new dB();
            $sql = "INSERT INTO dondh(MaDDH, Email, ThoiGianDat, ThanhTien, MaNH) VALUES 
            ('$this->MaDDH', '$this->Email', '$this->ThoiGianDat', '$this->ThanhTien','$this->MaNH')";
            $result = $DB->query_execute($sql);
            return $result;
        }
        
        public static function dSDDH($Email){
            $DB = new dB();
            $sql = "SELECT * FROM dondh WHERE Email = '$Email'";
            return $DB->select_to_array($sql);
        }

        public static function kiemTra($Email, $MaDDH){
            $DB = new dB();
            $sql = "SELECT * FROM dondh WHERE Email = '$Email' AND MaDDH = '$MaDDH'";
            $result = $DB->select_to_array($sql);
            if(count($result) > 0){
                return true;
            }else{
                return false;
            }
        }
    }
?>