<?php
    class infomationUser {
        public $conn;
        public function __construct(){
            $this->conn = connectDB();
        }
        public function getUserModel($idUser){
            try{
                $sql = "SELECT * FROM tb_khachHang WHERE id_khachHang = :id_khachHang";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':id_khachHang' => $idUser]);
            return $stmt->fetch();
            }catch(PDOException $e){
                echo "Error: ". $e->getMessage();
            }
        }
    }
