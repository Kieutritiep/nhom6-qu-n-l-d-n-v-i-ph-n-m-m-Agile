<?php 
    class listModelUser{
        public $conn;
        public function __construct(){
            $this->conn = connectDB();
        }
        public function getAllOrderUser($idUser){
            try{
                $sql = "SELECT
                            tb_donhang.id_donhang,
                            tb_donhang.tongTien,
                            tb_donhang.hinhThucThanhToan,
                            tb_donhang.ngayDatHang,
                            tb_donhang.trangThai,
                            CONCAT(madonhang.tienTo, LPAD(madonhang.hauTo, 4, '0')) AS ma_hoa_don
                        FROM tb_donhang
                        INNER JOIN madonhang ON tb_donhang.id_madonhang = madonhang.id
                        WHERE tb_donhang.id_khachHang = :id_khachHang
                        ORDER BY tb_donhang.ngayDatHang DESC";
                $stmt = $this->conn->prepare($sql);
                $stmt->execute([':id_khachHang'=>$idUser]);
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }catch(Exception $e){
                echo "Error: ". $e->getMessage();
            }
        } 
        public function waiting_for_delivery($idUser){
            try{
                $sql = "SELECT
                            tb_donhang.id_donhang,
                            tb_donhang.tongTien,
                            tb_donhang.hinhThucThanhToan,
                            tb_donhang.ngayDatHang,
                            tb_donhang.trangThai,
                            CONCAT(madonhang.tienTo, LPAD(madonhang.hauTo, 4, '0')) AS ma_hoa_don
                        FROM tb_donhang
                        INNER JOIN madonhang ON tb_donhang.id_madonhang = madonhang.id
                        WHERE tb_donhang.id_khachHang = :id_khachHang AND tb_donhang.trangThai = 'Chờ vận chuyển'";
                $stmt = $this->conn->prepare($sql);
                $stmt->execute([':id_khachHang'=>$idUser]);
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }catch(Exception $e){
                echo "Error: ". $e->getMessage();
            }
        } 
        public function ordered($idUser){
            try{
                $sql = "SELECT
                            tb_donhang.id_donhang,
                            tb_donhang.tongTien,
                            tb_donhang.hinhThucThanhToan,
                            tb_donhang.ngayDatHang,
                            tb_donhang.trangThai,
                            CONCAT(madonhang.tienTo, LPAD(madonhang.hauTo, 4, '0')) AS ma_hoa_don
                        FROM tb_donhang
                        INNER JOIN madonhang ON tb_donhang.id_madonhang = madonhang.id
                        WHERE tb_donhang.id_khachHang = :id_khachHang AND tb_donhang.trangThai = 'Đã đặt hàng'";
                $stmt = $this->conn->prepare($sql);
                $stmt->execute([':id_khachHang'=>$idUser]);
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }catch(Exception $e){
                echo "Error: ". $e->getMessage();
            }
        } 
        public function are_delivering($idUser){
            try{
                $sql = "SELECT
                            tb_donhang.id_donhang,
                            tb_donhang.tongTien,
                            tb_donhang.hinhThucThanhToan,
                            tb_donhang.ngayDatHang,
                            tb_donhang.trangThai,
                            CONCAT(madonhang.tienTo, LPAD(madonhang.hauTo, 4, '0')) AS ma_hoa_don
                        FROM tb_donhang
                        INNER JOIN madonhang ON tb_donhang.id_madonhang = madonhang.id
                        WHERE tb_donhang.id_khachHang = :id_khachHang AND tb_donhang.trangThai = 'Đang giao'";
                $stmt = $this->conn->prepare($sql);
                $stmt->execute([':id_khachHang'=>$idUser]);
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }catch(Exception $e){
                echo "Error: ". $e->getMessage();
            }
        } 
        public function delivered($idUser){
            try{
                $sql = "SELECT
                            tb_donhang.id_donhang,
                            tb_donhang.tongTien,
                            tb_donhang.hinhThucThanhToan,
                            tb_donhang.ngayDatHang,
                            tb_donhang.trangThai,
                            CONCAT(madonhang.tienTo, LPAD(madonhang.hauTo, 4, '0')) AS ma_hoa_don
                        FROM tb_donhang
                        INNER JOIN madonhang ON tb_donhang.id_madonhang = madonhang.id
                        WHERE tb_donhang.id_khachHang = :id_khachHang AND tb_donhang.trangThai = 'Đã giao'";
                $stmt = $this->conn->prepare($sql);
                $stmt->execute([':id_khachHang'=>$idUser]);
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }catch(Exception $e){
                echo "Error: ". $e->getMessage();
            }
        } 
        public function canceled($idUser){
            try{
                $sql = "SELECT
                            tb_donhang.id_donhang,
                            tb_donhang.tongTien,
                            tb_donhang.hinhThucThanhToan,
                            tb_donhang.ngayDatHang,
                            tb_donhang.trangThai,
                            CONCAT(madonhang.tienTo, LPAD(madonhang.hauTo, 4, '0')) AS ma_hoa_don
                        FROM tb_donhang
                        INNER JOIN madonhang ON tb_donhang.id_madonhang = madonhang.id
                        WHERE tb_donhang.id_khachHang = :id_khachHang AND tb_donhang.trangThai = 'Đã hủy'";
                $stmt = $this->conn->prepare($sql);
                $stmt->execute([':id_khachHang'=>$idUser]);
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }catch(Exception $e){
                echo "Error: ". $e->getMessage();
            }
        } 

    }
?>