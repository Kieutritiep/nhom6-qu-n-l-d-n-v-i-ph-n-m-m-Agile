<?php
class commentProductUserModel {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    // Lấy tất cả bình luận cho sản phẩm
    public function getCommentsByProductId($idSanPham) {
        $sql = "SELECT 
                    tb_binhluan.id_binhLuan,
                    tb_binhluan.id_sanPham,
                    tb_binhluan.id_khachHang,
                    tb_binhluan.link_anh,
                    tb_binhluan.noiDung,
                    tb_binhluan.thoiGian,
                    tb_khachhang.ten_khachHang
                FROM tb_binhluan 
                LEFT JOIN tb_khachhang 
                ON tb_binhluan.id_khachHang = tb_khachhang.id_khachHang
                WHERE tb_binhluan.id_sanPham = :id_sanPham";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id_sanPham', $idSanPham, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Thêm bình luận mới vào cơ sở dữ liệu
    public function addComment($idSanPham, $idKhachHang, $noiDung, $linkAnh = null) {
        $sql = "INSERT INTO tb_binhluan (id_sanPham, id_khachHang, noiDung, link_anh, thoiGian) 
                VALUES (:id_sanPham, :id_khachHang, :noiDung, :link_anh, NOW())";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id_sanPham', $idSanPham, PDO::PARAM_INT);
        $stmt->bindParam(':id_khachHang', $idKhachHang, PDO::PARAM_INT);
        $stmt->bindParam(':noiDung', $noiDung, PDO::PARAM_STR);
        $stmt->bindParam(':link_anh', $linkAnh, PDO::PARAM_STR);
        $stmt->execute();
    }
}
?>
