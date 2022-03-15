<?php
    require_once("../config/db.class.php");
    class hangSX
    {
        public $MaNSX;
        public $TenNSX;
        public function __construct($TenNSX)
        {
            $this->TenNSX = $TenNSX;
        }

        public function save(){
            $DB = new dB();
            $sql = "INSERT INTO hangsx (TenNSX) VALUES ( '$this->TenNSX')";
            $result = $DB->query_execute($sql);
            return $result;
        }

        public static function dSHSX(){
            $DB = new dB();
            $sql= "SELECT * FROM hangsx";
            return $DB->select_to_array  ($sql);
        }
    }
?>