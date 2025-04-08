<?php
    class cartEmptyUserModel {
        public $conn;
        public function __construct(){
            $this->conn = connectDB();
        }
        public function cancelOrder($idOrder, $cancel_reason, $trangThai) {
            try {
                $sql = "UPDATE tb_donHang SET lyDoHuy = :lyDoHuy, trangThai = :trangThai WHERE id_donHang = :id_donHang";
                $stmt = $this->conn->prepare($sql);
                $stmt->execute([
                    ':id_donHang' => $idOrder,
                    ':lyDoHuy' => $cancel_reason,
                    ':trangThai' => $trangThai
                ]);
                return true;
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
                return false;
            }
        }
        
    }
