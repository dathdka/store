<?php 
    require_once("../config/db.class.php");
    class binhLuan
    {
        public $NguoiBinhLuan;
        public $BinhLuan;
        public $MaSP;
        public $SoLike;

        public function __construct($NguoiBinhLuan,$BinhLuan , $MaSP, $SoLike){
            $this->NguoiBinhLuan = $NguoiBinhLuan;
            $this->BinhLuan = $BinhLuan;
            $this->MaSP = $MaSP;
            $this->SoLike = $SoLike;
        }

        public function save(){
            $DB = new dB();
            $sql = "INSERT INTO binhluan (NguoiBinhLuan, BinhLuan, MaSP, SoLike) VALUES 
            ('$this->NguoiBinhLuan', '$this->BinhLuan','$this->MaSP','$this->SoLike')";
            return $DB->query_execute($sql);
        }
    }

?>