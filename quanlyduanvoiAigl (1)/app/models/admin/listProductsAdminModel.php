<?php
class listProductAdminModel{
    public $conn;
    public function __construct(){
        $this->conn = connectDB();
    }
    public function getProductAdmin(){
        try{
            $sql = "SELECT 
            tb_sanPham.id_sanPham,
            tb_sanPham.ten_sanPham,
            MAX(tb_sanPham.moTa) AS moTa,
            MAX(tb_anh.file_anh) AS file_anh,
            GROUP_CONCAT(DISTINCT tb_dungLuong.dungLuong) AS dungLuong,
            GROUP_CONCAT(DISTINCT tb_mausac.ten_mauSac) AS mauSac
            FROM tb_sanPham
            INNER JOIN tb_bienthesanpham ON tb_sanPham.id_sanPham = tb_bienthesanpham.id_sanPham
            INNER JOIN tb_anh ON tb_sanPham.id_sanPham = tb_anh.id_sanPham AND tb_anh.loaiAnh = 'chinh'
            INNER JOIN tb_dungluong ON tb_bienthesanpham.id_dungLuong = tb_dungluong.id_dungLuong
            INNER JOIN tb_mausac ON tb_bienthesanpham.id_mauSac = tb_mausac.id_mauSac
            GROUP BY tb_sanPham.id_sanPham";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $results;
            }
            catch(PDOException $e){
                echo "Error: " . $e->getMessage();
            }
        }
    }