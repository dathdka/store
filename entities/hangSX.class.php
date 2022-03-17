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

        public function doiGiaTri($MaNSX){
            $DB = new dB();
            $sql = "UPDATE hangsx SET TenNSX = '$this->TenNSX' WHERE MaNSX = '$MaNSX'";
            return $DB->query_execute($sql);
        }

        public static function layHSX($MaNSX){
            $DB = new dB();
            $sql= "SELECT * FROM hangsx WHERE MaNSX = '$MaNSX'";
            $result = mysqli_fetch_object(mysqli_query($DB->connect(),$sql));
            return $result;
        }
    }
?>