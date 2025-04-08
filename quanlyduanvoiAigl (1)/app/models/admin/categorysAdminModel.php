<?php
class categorysAdminModel{
    public $conn;
    public function __construct(){
        $this->conn = connectDB();
    }
    public function getAllCategory(){
        try{
            $sql = "SELECT * FROM tb_danhMuc";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll();
            return $result;
        }catch (PDOException $e){
            echo "Error: ". $e->getMessage();
             return []; 
        }
    }
    public function addCategoryModel($nameCategory){
        try{
            $sql = "INSERT INTO tb_danhMuc (ten_DanhMuc) VALUES (:ten_DanhMuc)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':ten_DanhMuc' => $nameCategory]);
            return true;
        }catch (PDOException $e){
            echo "Error: ". $e->getMessage();
             return false; 
        }
    }
    public function deleteCategoryById($id){
        try{
            $sql = "DELETE FROM tb_danhMuc WHERE id_DanhMuc = :id_DanhMuc";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':id_DanhMuc' => $id]);
            return true;
        }catch (PDOException $e){
            echo "Error: ". $e->getMessage();
             return false; 
        }
    }
}