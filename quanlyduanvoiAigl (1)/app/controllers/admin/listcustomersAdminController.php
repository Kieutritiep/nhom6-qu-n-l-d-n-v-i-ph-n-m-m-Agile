<?php
class ListCustomersAdminController {
    private $model;

    public function __construct($model) {
        $this->model = $model;
    }

    // Hiển thị danh sách khách hàng
    public function listcustomer() {
        $khachHangs = $this->model->getAllKhachHang();
        require './views/admin/customer/listcustomer.php';
    }


    // Hiển thị form sửa khách hàng
    public function edit($id) {
        if (!$id) {
            die("Không tìm thấy ID khách hàng!");
        }
        $khachHang = $this->model->getKhachHangById($id);
        if (!$khachHang) {
            die("Khách hàng không tồn tại!");
        }
        require './views/admin/customer/editcustomer.php';
    }

    // Xử lý sửa khách hàng
    public function editPost($id) {
        if (!$id) {
            die("Không tìm thấy ID khách hàng!");
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'ten_khachHang' => $_POST['ten_khachHang'],
                'email' => $_POST['email'],
                'matKhau' => password_hash($_POST['matKhau'], PASSWORD_DEFAULT), // Mã hóa mật khẩu
                'soDienThoai' => $_POST['soDienThoai'],
                'phanQuyen' => $_POST['phanQuyen']
            ];
            $result = $this->model->updateKhachHang($id, $data);
            if ($result) {
                header("Location: ./?act=admin/listcustomers");
                exit;
            } else {
                echo "Cập nhật khách hàng thất bại!";
            }
        }
    }
    
}
