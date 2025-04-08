<?php
class colorAdminModel {
    public $conn;

    public function __construct() {
        // Kết nối tới cơ sở dữ liệu
        $this->conn = connectDB();
    }

    // Lấy tất cả màu sắc
    public function getAllColors() {
        $query = "SELECT * FROM tb_mausac";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Lấy thông tin màu sắc theo ID
    public function getColorById($id) {
        $query = "SELECT * FROM tb_mausac WHERE id_mauSac = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Thêm màu sắc mới
    public function addColor($ten_mauSac, $maMau) {
        $query = "INSERT INTO tb_mausac (ten_mauSac, maMau) VALUES (:ten_mauSac, :maMau)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':ten_mauSac', $ten_mauSac, PDO::PARAM_STR);
        $stmt->bindParam(':maMau', $maMau, PDO::PARAM_STR);
        return $stmt->execute();
    }

    // Cập nhật màu sắc
    public function updateColor($id, $ten_mauSac, $maMau) {
        $query = "UPDATE tb_mausac SET ten_mauSac = :ten_mauSac, maMau = :maMau WHERE id_mauSac = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':ten_mauSac', $ten_mauSac, PDO::PARAM_STR);
        $stmt->bindParam(':maMau', $maMau, PDO::PARAM_STR);
        return $stmt->execute();
    }

    // Xóa màu sắc
    public function deleteColor($id) {
        $query = "DELETE FROM tb_mausac WHERE id_mauSac = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}