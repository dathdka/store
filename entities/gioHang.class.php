<?php
    require_once("../config/db.class.php");
    require_once("CTDDH.class.php");
    require_once("sanPham.class.php");
    class gioHang{
        public $MaSP;
        public $Email;
        public $SoLuong;

        public function __construct($MaSP, $Email, $SoLuong ){
            $this->MaSP = $MaSP;
            $this->Email = $Email;
            $this->SoLuong = $SoLuong;
        }

        public function save(){
            $DB= new dB();
            $sql = "INSERT INTO gioHang(MaSP, Email, SoLuong) VALUES
            ('$this->MaSP', '$this->Email', '$this->SoLuong')";
            return $DB->query_execute($sql);
        }
        public static function delete($MaSP){
            $DB= new dB();
            $Email= $_COOKIE["username"];
            $sql = "DELETE FROM giohang WHERE MaSP= '$MaSP' AND Email = '$Email'";
            return $DB->query_execute  ($sql);
        }

        public static function dSGH($Email){
            $DB = new dB();
            $sql= "SELECT * FROM giohang where Email = '$Email'";
            return $DB->select_to_array  ($sql);
        }

        public static function luuCTDDH($Email,$MaDDH){
            $DB = new dB();
            $layGioHang = "SELECT * FROM giohang WHERE Email = '$Email'";
            $dSGH = $DB->select_to_array ($layGioHang);
            foreach ($dSGH as $item){
                $newCTDDH = new cTDDH($item["MaSP"],$MaDDH,"",$item["SoLuong"]);
                $newCTDDH->save();
                $SP = sanPham::laySanPham($item["MaSP"]);
                $SLMoi = $SP->SoLuong-$item["SoLuong"];
                $giamSoLuong = "UPDATE sanpham set SoLuong = $SLMoi WHERE MaSP = '$SP->MaSP'";
                $DB->query_execute($giamSoLuong);
            }
            $xoaGioHang = "DELETE FROM giohang WHERE Email='$Email'";
            return $DB->query_execute ($xoaGioHang);
        }
    }

?>