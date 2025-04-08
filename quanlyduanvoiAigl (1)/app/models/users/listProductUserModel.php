<?php
class listProductUsersModel{
    public $conn;
    public function __construct(){
        $this->conn = connectDB();
    }
    public function getAllProductUsers() {
    try {
        $sql = "SELECT 
                tb_sanPham.id_sanPham,
                tb_sanPham.ten_sanPham,
                MAX(tb_sanPham.moTa) AS moTa,
                MAX(tb_anh.file_anh) AS file_anh,
                GROUP_CONCAT(DISTINCT tb_dungLuong.dungLuong) AS dungLuong,
                GROUP_CONCAT(DISTINCT tb_bienthesanpham.giaBienThe) AS giaBienThe
                FROM tb_sanPham
                INNER JOIN tb_bienthesanpham ON tb_sanPham.id_sanPham = tb_bienthesanpham.id_sanPham
                INNER JOIN tb_anh ON tb_sanPham.id_sanPham = tb_anh.id_sanPham AND tb_anh.loaiAnh = 'chinh'
                INNER JOIN tb_dungluong ON tb_bienthesanpham.id_dungLuong = tb_dungluong.id_dungLuong
                GROUP BY tb_sanPham.id_sanPham";
                $stmt = $this->conn->prepare($sql);
                $stmt->execute();
                $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    } catch (PDOException $e) {
        echo "Lỗi: " . $e->getMessage();
    }
}
public function getAllCategory(){
    $sql = "SELECT * FROM tb_danhmuc";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

    
}