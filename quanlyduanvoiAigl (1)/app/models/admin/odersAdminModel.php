<?php
class olderAdminModel{
    public $conn;
    public function __construct(){
        $this->conn = connectDB();
    }
    public function getAllOder(){
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
                    ORDER BY tb_donhang.ngayDatHang DESC";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }catch(Exception $e){
            echo "Error: ". $e->getMessage();

        }
    }
}