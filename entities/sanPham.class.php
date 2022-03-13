<?php
    require_once("db.class.php");
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
        
    }
?>