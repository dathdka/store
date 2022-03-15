<?php 
    require_once("../config/db.class.php");


    class cTDDH{
        public $MaSP;
        public $MaDDH;
        public $ThoiGianNhan;
        public $SoLuongDat;

        public function __construct($MaSP, $MaDDH, $ThoiGianNhan, $SoLuongDat){
            $this->MaSP = $MaSP;
            $this->MaDDH = $MaDDH;
            $this->ThoiGianNhan = $ThoiGianNhan;
            $this->SoLuongDat = $SoLuongDat;
        }

        function save(){
            $DB = new dB();
            $sql = "INSERT INTO ctddh (MaSP,MaDDH,ThoiGianNhan,SoLuongDat) VALUE 
            ('$this->MaSP','$this->MaDDH','$this->ThoiGianNhan','$this->SoLuongDat')";
            $result = $DB->query_execute($sql);
            return $result;
        }

        public function list_CTDDH()
        {
            $DB = new dB();
            $sql = "SELECT * FROM ctddh";
            $result = $DB->select_to_array($sql);
            return $result;
        }
    }
?>