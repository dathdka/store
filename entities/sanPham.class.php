<?php
    require_once("../config/db.class.php");
    class sanPham
    {
        public $MaSP;
        public $MaNSX;
        public $TenSP;
        public $DonGia;
        public $GioiTinh;
        public $SoLuong;
        public $MoTa;
        public $KhuyenMai;
        public $HinhAnh;
        public function __construct($MaNSX, $TenSP, $DonGia, $GioiTinh, $SoLuong, $MoTa, $KhuyenMai, $HinhAnh)
        {
            $this->MaNSX = $MaNSX;
            $this->TenSP = $TenSP;
            $this->DonGia = $DonGia;
            $this->GioiTinh = $GioiTinh;
            $this->SoLuong = $SoLuong;
            $this->MoTa = $MoTa;
            $this->KhuyenMai = $KhuyenMai;
            $this->HinhAnh = $HinhAnh;
        }
        
        public function save(){
            $DB = new dB();
            $sql = "INSERT INTO sanpham ( MaNSX, TenSP, DonGia, GioiTinh, SoLuong, MoTa, KhuyenMai,HinhAnh) 
            VALUES ('$this->MaNSX','$this->TenSP','$this->DonGia', '$this->GioiTinh','$this->SoLuong','$this->MoTa', '$this->KhuyenMai','$this->HinhAnh')";
            $result = $DB->query_execute($sql);
            return $result;
        }

        public static function dSSP(){
            $DB = new dB();
            $sql= "SELECT * FROM sanpham";
            return $DB->select_to_array  ($sql);
        }
        
        public static function laySanPham($MaSP){
            $DB = new dB();
            $sql= "SELECT * FROM sanpham WHERE MaSP = '$MaSP'";
            $result = mysqli_fetch_object(mysqli_query($DB->connect(),$sql));
            return $result;
        }
        
        public function doiGiaTri($MaSP){
            $DB = new Db();
            $sql = "UPDATE sanpham SET MaNSX = '$this->MaNSX', TenSP = '$this->TenSP', DonGia = '$this->DonGia',
            GioiTinh = '$this->GioiTinh', MoTa = '$this->MoTa', SoLuong = '$this->SoLuong', HinhAnh = '$this->HinhAnh', KhuyenMai = '$this->KhuyenMai'
            WHERE MaSP = $MaSP ";
            $result = $DB->query_execute($sql);
            return $result;
        }
    }
?>