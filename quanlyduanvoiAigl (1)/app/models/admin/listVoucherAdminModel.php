<?php
class voucherModel{
    public $conn;
    public function __construct(){
        $this->conn = connectDB();
    }
    public function getAllVoucher(){
        try{
            $sql = "SELECT * FROM tb_giamgia";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
        catch(PDOException $e){
            echo "Error: ". $e->getMessage();
        }
    }   
    public function deleteVoucherModel($id){
        try{
            $sql = "DELETE FROM tb_giamGia WHERE id_giamGia = :id_giamGia";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':id_giamGia' => $id
            ]);
            return true;
        }
        catch(PDOException $e){
            echo "Error: ". $e->getMessage();
        }
    }
    public function addVoucher($ten_chuongTrinh, $moTa, $soTienGiamGia, $soTienToiThieu, $trangThai, $ngayBatDau, $ngayKetThuc){
        try{
            $sql = "INSERT INTO tb_giamgia(ten_chuongTrinh,ma_giamGia,soTienGiamGia,soTienToiThieu,trangThai,ngayBatDau,ngayKetThuc)
            VALUES(:ten_chuongTrinh, :ma_giamGia, :soTienGiamGia, :soTienToiThieu, :trangThai, :ngayBatDau, :ngayKetThuc)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':ten_chuongTrinh' => $ten_chuongTrinh,
                ':ma_giamGia' => $moTa,
                ':soTienGiamGia' => $soTienGiamGia,
                ':soTienToiThieu' => $soTienToiThieu,
                ':trangThai' => $trangThai,
                ':ngayBatDau' => $ngayBatDau,
                ':ngayKetThuc' => $ngayKetThuc
            ]);
            return true;
        }
        catch(PDOException $e){
            echo "Error: ". $e->getMessage();
        }
    }
    public function getVoucherById($id){
        try{
            $sql = "SELECT * FROM tb_giamgia WHERE id_giamGia = :id_giamGia";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':id_giamGia' => $id
            ]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        }
        catch(PDOException $e){
            echo "Error: ". $e->getMessage();
        }
    }
    public function updateVoucherModel($id_giamGia, $ten_chuongTrinh, $moTa, $soTienGiamGia, $soTienToiThieu, $trangThai, $ngayBatDau, $ngayKetThuc){
        try{
            $sql = "UPDATE tb_giamgia 
            SET ten_chuongTrinh = :ten_chuongTrinh ,ma_giamGia = :ma_giamGia ,soTienGiamGia = :soTienGiamGia ,soTienToiThieu = :soTienToiThieu,trangThai = :trangThai, ngayBatDau = :ngayBatDau,ngayKetThuc = :ngayKetThuc
            WHERE id_giamGia = :id_giamGia";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':ten_chuongTrinh' => $ten_chuongTrinh,
                ':ma_giamGia' => $moTa,
                ':soTienGiamGia' => $soTienGiamGia,
                ':soTienToiThieu' => $soTienToiThieu,
                ':trangThai' => $trangThai,
                ':ngayBatDau' => $ngayBatDau,
                ':ngayKetThuc' => $ngayKetThuc,
                ':id_giamGia' => $id_giamGia
            ]);
            return true;
        }
        catch(PDOException $e){
            echo "Error: ". $e->getMessage();
            return false;
        }

    }
}