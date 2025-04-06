<?php
class addProductModel {
    public $conn;
    
    public function __construct() {
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
    public function getAllram(){
        try{
            $sql = "SELECT * FROM tb_ram";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll();
            return $result;
        }catch (PDOException $e){
            echo "Error: ". $e->getMessage();
             return []; 
        }
    }
    public function getAllCapacity(){
        try{
            $sql = "SELECT * FROM tb_dungLuong";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll();
            return $result;
        }catch (PDOException $e){
            echo "Error: ". $e->getMessage();
             return []; 
        }

    }
    public function getAllColor(){
        try{
            $sql = "SELECT * FROM tb_mauSac";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll();
            return $result;
        }catch (PDOException $e){
            echo "Error: ". $e->getMessage();
             return []; 
        }
    }
    public function addProductModels($nameProduct, $category, $priceProducts, $colors, $description, $quantitys, $capacities, $display, $file_save, $file_subImage) {
        try {
            $sql = "INSERT INTO tb_sanPham 
                    (ten_sanPham, id_danhMuc, moTa, hienThi) 
                    VALUES 
                    (:ten_sanPham, :id_danhMuc, :moTa, :hienThi)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':ten_sanPham' => $nameProduct,
                ':id_danhMuc' => $category,
                // ':gia' => $price,
                ':moTa' => $description,
                ':hienThi' => $display,
            ]);
            $productID = $this->conn->lastInsertId();
    
            foreach ($colors as $colorID) {
                // foreach ($rams as $ramID) {
                    foreach ($capacities as $capacityID) {
                        foreach ($priceProducts as $priceProduct) {
                            foreach ($quantitys as $quantity) {
                                $sql = "INSERT INTO tb_bienthesanpham 
                                        (id_sanPham, id_mauSac, id_dungLuong, soLuong, giaBienThe) 
                                        VALUES 
                                        (:id_sanPham, :id_mauSac, :id_dungLuong, :soLuong, :giaBienThe)";
                                $stmt = $this->conn->prepare($sql);
                                $stmt->execute([
                                    ':id_sanPham' => $productID,
                                    ':id_mauSac' => $colorID,
                                    ':id_dungLuong' => $capacityID,
                                    // ':id_ram' => $ramID,
                                    ':soLuong' => $quantity,
                                    ':giaBienThe' => $priceProduct,
                                ]);
                            }
                        }
                    }
                // }
            }
            
            
            $sql = "INSERT INTO tb_anh (id_sanPham, file_anh, loaiAnh) VALUES (:id_sanPham, :file_anh, :loaiAnh)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':id_sanPham' => $productID,
                ':file_anh' => $file_save,
                ':loaiAnh' => 'chinh',
            ]);
            if (is_array($file_subImage)) {
                foreach ($file_subImage as $image) {
                    $sql = "INSERT INTO tb_anh (id_sanPham, file_anh, loaiAnh) VALUES (:id_sanPham, :file_anh, :loaiAnh)";
                    $stmt = $this->conn->prepare($sql);
                    $stmt->execute([
                        ':id_sanPham' => $productID,
                        ':file_anh' => $image,
                        ':loaiAnh' => 'phu',
                    ]);
                }
            }
            return true;
        } catch (PDOException $e) {
            $this->conn->rollBack();
            return false;
        }
    }
    
}