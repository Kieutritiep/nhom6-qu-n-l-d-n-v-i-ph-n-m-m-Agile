<?php
    class registerModel {
        public $conn;
        public function __construct(){
            $this->conn = connectDB();
        }
        public function registerModel($username, $email, $phone, $password, $repassword){
        try{
            $sql = "INSERT INTO tb_khachHang (ten_khachHang, email, soDienThoai, matKhau, matKhau_2 ,phanQuyen) 
            VALUES (:ten_khachHang, :email, :soDienThoai, :matKhau, :matKhau_2,'user')";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':ten_khachHang', $username);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':soDienThoai', $phone);
            $stmt->bindParam(':matKhau', $password);
            $stmt->bindParam(':matKhau_2', $repassword);
            
            return $stmt->execute();
        }catch(Exception $e){
            echo "Error: ". $e->getMessage();
        }
}
}
