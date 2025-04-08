<?php
    class detailProductUserModel {
        public $conn;
        public function __construct(){
            $this->conn = connectDB();
        }
        public function getAlldetailProduct($id) {
            try {
                $sql = "SELECT 
                            tb_sanPham.id_sanPham,
                            tb_sanPham.ten_sanPham,
                            MAX(tb_sanPham.moTa) AS moTa,
                            GROUP_CONCAT(DISTINCT tb_anh.file_anh) AS file_anh,
                            GROUP_CONCAT(DISTINCT tb_dungLuong.dungLuong) AS dungLuong,
                            GROUP_CONCAT(DISTINCT tb_bienthesanpham.giaBienThe) AS giaBienThe,
                            GROUP_CONCAT(DISTINCT tb_bienthesanpham.soLuong) AS soLuong,
                            GROUP_CONCAT(DISTINCT tb_mausac.ten_mauSac) AS tenMau,
                            GROUP_CONCAT(DISTINCT tb_mausac.maMau) AS maMau
                        FROM tb_sanPham
                        INNER JOIN tb_bienthesanpham ON tb_sanPham.id_sanPham = tb_bienthesanpham.id_sanPham
                        INNER JOIN tb_anh ON tb_sanPham.id_sanPham = tb_anh.id_sanPham AND tb_anh.loaiAnh = 'phu'
                        INNER JOIN tb_dungluong ON tb_bienthesanpham.id_dungLuong = tb_dungluong.id_dungLuong
                        INNER JOIN tb_mausac ON tb_bienthesanpham.id_mauSac = tb_mausac.id_mauSac
                        WHERE tb_sanPham.id_sanPham = :id_sanPham
                        GROUP BY tb_sanPham.id_sanPham, tb_sanPham.ten_sanPham";
                $stmt = $this->conn->prepare($sql);
                $stmt->execute(['id_sanPham' => $id]);
                return $stmt->fetch();
            }catch (PDOException $e) {
                return "Error: " . $e->getMessage();
            }
        }       
        public function voucher() {
            try {
                $sql = "SELECT * FROM tb_giamGia";
                $stmt = $this->conn->prepare($sql);
                $stmt->execute();
                return $stmt->fetch(PDO::FETCH_ASSOC);
            } catch (PDOException $e){
                die("Error: " . $e->getMessage());
            }
        }
    }