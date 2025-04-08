<?php
    class detailCartUserModel {
        public $conn;
        public function __construct(){
            $this->conn = connectDB();
        }
        public function getDetailOrder($idOrder) {
            // Truy vấn lấy thông tin sản phẩm
            $sqlProduct = "SELECT 
                            tb_chitietdonhang.soLuong,
                            tb_chitietdonhang.dungLuong,
                            tb_chitietdonhang.mauSac,
                            tb_chitietdonhang.gia,
                            tb_chitietdonhang.tongTien,
                            tb_sanPham.ten_sanPham,
                            tb_anh.file_anh,
                            tb_donhang.trangThai,
                            tb_donhang.id_donHang,
                            tb_donhang.tongTien,
                            tb_donhang.hinhThucThanhToan,
                            tb_donhang.lyDoHuy
                            FROM tb_chitietdonhang
                            INNER JOIN tb_sanPham ON tb_chitietdonhang.id_sanPham = tb_sanPham.id_sanPham
                            INNER JOIN tb_anh ON tb_sanPham.id_sanPham = tb_anh.id_sanPham AND tb_anh.loaiAnh = 'chinh'
                            INNER JOIN tb_donhang ON tb_chitietdonhang.id_donHang = tb_donHang.id_donHang 
                            WHERE tb_chitietdonhang.id_donHang = :id_donHang";
        
            // Truy vấn lấy thông tin địa chỉ
            $sqlAddress = "SELECT 
                           diachi.soDienThoai,
                           diachi.hoVaTen,
                           diachi.gioiTinh,
                           diachi.thanhPho,
                           diachi.quanHuyen,
                           diachi.xaPhuong,
                           diachi.diaChiChiTiet,
                           CONCAT(madonhang.tienTo, LPAD(madonhang.hauTo, 4, '0')) AS ma_hoa_don
                           FROM tb_donhang
                           INNER JOIN diachi ON tb_donhang.diachi_id = diachi.id_diachi
                           INNER JOIN madonhang ON tb_donhang.id_madonhang = madonhang.id
                           WHERE tb_donhang.id_donhang = :id_donHang";
        
            // Thực thi truy vấn sản phẩm
            $stmtProduct = $this->conn->prepare($sqlProduct);
            $stmtProduct->execute(['id_donHang' => $idOrder]);
            $productDetails = $stmtProduct->fetchAll(PDO::FETCH_ASSOC);
        
            // Thực thi truy vấn địa chỉ
            $stmtAddress = $this->conn->prepare($sqlAddress);
            $stmtAddress->execute(['id_donHang' => $idOrder]);
            $addressDetails = $stmtAddress->fetch(PDO::FETCH_ASSOC);
        
            // Kết hợp kết quả sản phẩm và địa chỉ
            $orderDetails = [
                'products' => $productDetails,
                'address' => $addressDetails
            ];
            return $orderDetails;
        }
    }
