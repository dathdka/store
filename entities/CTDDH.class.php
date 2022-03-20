<?php 
    require_once("../config/db.class.php");


    class cTDDH{
        public $MaSP;
        public $MaDDH;
        public $SoLuongDat;

        public function __construct($MaSP, $MaDDH,  $SoLuongDat){
            $this->MaSP = $MaSP;
            $this->MaDDH = $MaDDH;
            $this->SoLuongDat = $SoLuongDat;
        }

        function save(){
            $DB = new dB();
            $sql = "INSERT INTO ctddh (MaSP,MaDDH,SoLuongDat) VALUE 
            ('$this->MaSP','$this->MaDDH','$this->SoLuongDat')";
            $result = $DB->query_execute($sql);
            return $result;
        }

        public static function dSCTDDH( $MaDDH)
        {
            $DB = new dB();
            $sql = "SELECT * FROM ctddh WHERE MaDDH='$MaDDH'";
            $result = $DB->select_to_array($sql);
            return $result;
        }

        public static function bestSell()
        {
            $DB = new dB();
            $sql = "SELECT MaSP FROM CTDDH 
                GROUP BY MaSP
                ORDER BY SoLuongDat DESC
                LIMIT 6";
            return $DB->select_to_array($sql);
        }
        
    }
?>