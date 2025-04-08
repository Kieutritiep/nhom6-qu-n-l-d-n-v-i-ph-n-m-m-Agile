<?php
class ListCustomersAdminModel {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    // Lấy tất cả khách hàng
    public function getAllKhachHang() {
        $stmt = $this->db->prepare("SELECT * FROM tb_khachhang");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Lấy khách hàng theo ID
    public function getKhachHangById($id) {
        $stmt = $this->db->prepare("SELECT * FROM tb_khachhang WHERE id_khachHang = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }


    // Cập nhật khách hàng
    public function updateKhachHang($id, $data) {
        $sql = "UPDATE tb_khachhang 
                SET ten_khachHang = ?, email = ?, matKhau = ?, soDienThoai = ?, phanQuyen = ? 
                WHERE id_khachHang = ?";
        $stmt = $this->db->prepare($sql);
        if (!$stmt->execute([
            $data['ten_khachHang'],
            $data['email'],
            $data['matKhau'],
            $data['soDienThoai'],
            $data['phanQuyen'],
            $id
        ])) {
            print_r($stmt->errorInfo());
            return false;
        }
        return true;
    }
    
}
