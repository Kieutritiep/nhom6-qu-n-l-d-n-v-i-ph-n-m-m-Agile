<?php
    class loginModel {
        public $conn;
        public function __construct(){
            $this->conn = connectDB();
        }
        public function getAllinfomationUser($email){
        try{
            $stmt = $this->conn->prepare("SELECT * FROM tb_khachHang WHERE email = :email");
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }catch(Exception $e){
            echo "Error: ". $e->getMessage();
        }
}
}
