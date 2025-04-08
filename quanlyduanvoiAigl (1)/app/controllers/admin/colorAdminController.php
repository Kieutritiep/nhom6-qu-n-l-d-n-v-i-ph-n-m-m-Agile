<?php
class colorAdminController {
    public $model;

    public function __construct() {
        // Khởi tạo model
        $this->model = new colorAdminModel();
    }

    // Hiển thị danh sách màu sắc
    public function listColors() {
        $colors = $this->model->getAllColors();
        require './views/admin/variant/listcolor.php'; // Hiển thị view danh sách màu sắc
    }

    // Thêm màu sắc mới
    public function addColor() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $ten_mauSac = $_POST['ten_mauSac'];
            $maMau = $_POST['maMau'];

            // Gọi model để thêm dữ liệu
            if ($this->model->addColor($ten_mauSac, $maMau)) {
                header('Location:/baseDuanpoly/app/?act=admin/color'); // Chuyển hướng về danh sách
            } else {
                echo "Thêm màu sắc thất bại!";
            }
        } else {
            require './views/admin/variant/addcolor.php'; // Hiển thị form thêm
        }
    }

    // Sửa màu sắc
    public function editColor() {
        $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $ten_mauSac = $_POST['ten_mauSac'];
            $maMau = $_POST['maMau'];

            // Gọi model để cập nhật dữ liệu
            if ($this->model->updateColor($id, $ten_mauSac, $maMau)) {
                header('Location: /baseDuanpoly/app/?act=admin/color'); // Chuyển hướng về danh sách
            } else {
                echo "Cập nhật màu sắc thất bại!";
            }
        } else {
            $color = $this->model->getColorById($id);
            if (!$color) {
                echo "Màu sắc không tồn tại!";
                exit;
            }
            require './views/admin/variant/editcolor.php'; // Hiển thị form sửa
        }
    }

    // Xóa màu sắc
    public function deleteColor() {
        $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

        // Gọi model để xóa dữ liệu
        if ($this->model->deleteColor($id)) {
            header('Location: /baseDuanpoly/app/?act=admin/color'); // Chuyển hướng về danh sách
        } else {
            echo "Xóa màu sắc thất bại!";
        }
    }
}
?>
