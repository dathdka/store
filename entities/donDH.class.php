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