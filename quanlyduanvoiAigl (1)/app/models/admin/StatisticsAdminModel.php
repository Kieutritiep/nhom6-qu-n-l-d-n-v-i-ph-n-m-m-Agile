<?php

class StatisticsAdminModel {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    // Lấy dữ liệu doanh thu theo khoảng thời gian
    public function getRevenueByDateRange($startDate, $endDate) {
        $query = "
            SELECT SUM(tongTien) AS revenue
            FROM tb_donhang
            WHERE ngayDatHang BETWEEN :start_date AND :end_date
        ";

        $stmt = $this->db->prepare($query);
        $stmt->execute([
            ':start_date' => $startDate,
            ':end_date' => $endDate,
        ]);

        return $stmt->fetch();
    }
    public function getTotalOrders($startDate, $endDate) {
        $query = "
            SELECT COUNT(*) AS total_orders
            FROM tb_donhang
            WHERE ngayDatHang BETWEEN :start_date AND :end_date
        ";
    
        $stmt = $this->db->prepare($query);
        $stmt->execute([
            ':start_date' => $startDate,
            ':end_date' => $endDate,
        ]);
    
        return $stmt->fetch();
    }
    
}
