<?php
    class cartUserModel {
        public $conn;
        public function __construct(){
            $this->conn = connectDB();
        }
        public function addCartModel($id_sanPham, $capacity, $color, $price, $userID){
            try {
                $soLuong = 1;
                $tongTien = $soLuong * $price;
                $sql = "INSERT INTO tb_gioHang (id_sanPham, soLuong, tongTien, dungLuong, mauSac, gia, id_khachHang) 
                        VALUES (:id_sanPham, :soLuong, :tongTien, :dungLuong, :mauSac, :gia, :id_khachHang)";
                $stmt = $this->conn->prepare($sql);
                $stmt->bindParam(':id_sanPham', $id_sanPham);
                $stmt->bindParam(':soLuong', $soLuong, PDO::PARAM_INT);
                $stmt->bindParam(':tongTien', $tongTien, PDO::PARAM_INT);
                $stmt->bindParam(':dungLuong', $capacity);
                $stmt->bindParam(':mauSac', $color);
                $stmt->bindParam(':gia', $price);
                $stmt->bindParam(':id_khachHang', $userID);
                $stmt->execute();
                return true;
            } catch(PDOException $e) {
                echo "Error: ". $e->getMessage();
                return false;
            }
        }
        public function getAddressUser($userID){
            try {
                $sql = "SELECT * FROM diachi WHERE id_khachHang = :id_khachHang LIMIT 1";
                $stmt = $this->conn->prepare($sql);
                $stmt->execute([':id_khachHang' => $userID]);
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $result;
            } catch (PDOException $e) {
                echo "Error: ". $e->getMessage();
            }
        }
        public function getProductByUserID($userIDCart) {
            try {
                $sql = "SELECT 
                            tb_sanPham.id_sanPham,
                            tb_sanPham.ten_sanPham,
                            MAX(tb_anh.file_anh) AS file_anh,
                            tb_gioHang.dungLuong,
                            tb_gioHang.mauSac,
                            -- tb_gioHang.ram,
                            SUM(tb_gioHang.soLuong) AS tongSoLuongSanPham,
                            SUM(tb_gioHang.gia) AS gia,
                            (SELECT SUM(soLuong) 
                             FROM tb_gioHang 
                             WHERE id_khachHang = :id_khachHang) AS tongSoLuongGioHang,
                            (SELECT SUM(soLuong * gia) 
                             FROM tb_gioHang 
                             WHERE id_khachHang = :id_khachHang) AS tongTienGioHang 
                        FROM tb_gioHang
                        INNER JOIN tb_sanPham ON tb_sanPham.id_sanPham = tb_gioHang.id_sanPham
                        INNER JOIN tb_anh ON tb_anh.id_sanPham = tb_sanPham.id_sanPham AND tb_anh.loaiAnh = 'chinh'
                        WHERE tb_gioHang.id_khachHang = :id_khachHang
                        GROUP BY tb_sanPham.id_sanPham, tb_gioHang.dungLuong, tb_gioHang.mauSac";
                $stmt = $this->conn->prepare($sql);
                $stmt->execute([':id_khachHang' => $userIDCart]);
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $result;
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
        }
        public function getAllColor($userID){
            try {
                $sql = "SELECT 
                        gh.id_sanPham,
                        sp.ten_sanPham,
                        GROUP_CONCAT(DISTINCT ms.id_mauSac) AS id_mauSac,
                        GROUP_CONCAT(DISTINCT ms.ten_mauSac) AS ten_mauSac
                    FROM tb_giohang gh
                    JOIN tb_bienthesanpham bts ON gh.id_sanPham = bts.id_sanPham
                    JOIN tb_mausac ms ON bts.id_mauSac = ms.id_mauSac
                    JOIN tb_sanPham sp ON gh.id_sanPham = sp.id_sanPham
                    WHERE gh.id_khachHang = :id_khachHang
                    GROUP BY gh.id_sanPham, sp.ten_sanPham";
                $stmt = $this->conn->prepare($sql);
                $stmt->execute([':id_khachHang' => $userID]);
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                echo "Error: ". $e->getMessage();
            }
            
        }
        public function deteteCartMode($idProductCart,$capacity,$color){
            try{
                $sql = "DELETE FROM tb_giohang 
                        WHERE id_sanPham = :id_sanPham 
                        AND dungLuong = :dungLuong 
                        AND mauSac = :mauSac";
                $stmt = $this->conn->prepare($sql);
                $stmt->execute([
                    ':id_sanPham' => $idProductCart,
                    ':dungLuong' => $capacity,
                    ':mauSac' => $color
                    ]);
                return true;
            }
            catch(PDOException $e){
                echo "Error: ". $e->getMessage();
            }
        }
        public function updateColorCartModel($idProduct,$color,$idUser){
            try{
                $sql = "UPDATE tb_giohang SET mauSac = :mauSac WHERE id_sanPham = :id_sanPham AND id_khachHang = :id_khachHang ";
                $stmt = $this->conn->prepare($sql);
                $stmt->execute([
                    ':mauSac' => $color, 
                    ':id_sanPham' => $idProduct,
                    ':id_khachHang' => $idUser
                ]);
                return true;
            }
            catch(PDOException $e){
                echo "Error: ". $e->getMessage();
            }
        }
}
        
        

