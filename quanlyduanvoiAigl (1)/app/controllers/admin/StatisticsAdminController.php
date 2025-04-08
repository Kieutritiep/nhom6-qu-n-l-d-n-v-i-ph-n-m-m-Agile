<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/baseDuanpoly/app/models/admin/StatisticsAdminModel.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/baseDuanpoly/app/commons/Database.php'; // Nạp class Database

class StatisticsAdminController {
    private $model;

    public function __construct() {
        // Sử dụng Database để tạo model
        $db = (new Database())->getConnection();
        $this->model = new StatisticsAdminModel($db);
    }

    // Hiển thị thống kê doanh thu theo khoảng thời gian
    public function displayRevenue() {
        $startDate = $_GET['start_date'] ?? date('Y-m-01'); // Ngày đầu tháng
        $endDate = $_GET['end_date'] ?? date('Y-m-t');     // Ngày cuối tháng
    
        // Lấy dữ liệu doanh thu và tổng số đơn hàng từ Model
        $revenueData = $this->model->getRevenueByDateRange($startDate, $endDate);
        $totalOrdersData = $this->model->getTotalOrders($startDate, $endDate);

        // Gửi dữ liệu tới View
        require_once $_SERVER['DOCUMENT_ROOT'] . '/baseDuanpoly/app/views/admin/products/Statistics.php';
    }

    public function index() {
        $this->displayRevenue();
    }
    
}
