<?php
class commentsAdminModel {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    // Lấy tất cả bình luận
    public function getAllComments() {
        $sql = "SELECT tb_binhluan.*, 
                       tb_khachhang.ten_khachHang, 
                       tb_sanpham.ten_sanPham 
                FROM tb_binhluan
                JOIN tb_khachhang ON tb_binhluan.id_khachHang = tb_khachhang.id_khachHang
                JOIN tb_sanpham ON tb_binhluan.id_sanPham = tb_sanpham.id_sanPham";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Xóa bình luận theo ID
    public function deleteCommentById($id) {
        $sql = "DELETE FROM tb_binhluan WHERE id_binhLuan = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}
?>
