<?php
    require_once("config.ini");
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
            $sql = "INSERT INTO hangsx (MaNSX, TenNSX) VALUES ('$this->MaNSX', '$this->TenNSX')";
            $result = $DB->query_execute($sql);
            return $result;
        }
    }
?>