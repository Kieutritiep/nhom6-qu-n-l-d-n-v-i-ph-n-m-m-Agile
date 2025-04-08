<?php
class commentProductUserController {
    private $commentModel;

    public function __construct($commentModel) {
        $this->commentModel = $commentModel;
    }

    // Hiển thị và xử lý gửi bình luận
    public function displayComments() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit_comment'])) {
            $this->submitComment();
        }

        // Lấy id_sanpham từ URL, nếu không có thì trả về 0
        $idSanPham = $_GET['id_sanpham'] ?? 0;

        // Kiểm tra id_sanpham có hợp lệ không
        if ($idSanPham <= 0) {
            die("ID sản phẩm không hợp lệ!");
        }

        // Lấy tất cả bình luận cho sản phẩm
        $comments = $this->commentModel->getCommentsByProductId($idSanPham);
        require_once './views/users/products/commentProduct.php'; 
    }

    // Xử lý gửi bình luận
    private function submitComment() {
        $idSanPham = $_POST['id_sanPham'] ?? 0;
        $idKhachHang = $_POST['id_khachHang'] ?? 0;
        $noiDung = $_POST['noiDung'] ?? '';
        $linkAnh = null;

        // Xử lý upload ảnh
        if (isset($_FILES['link_anh']) && $_FILES['link_anh']['error'] === UPLOAD_ERR_OK) {
            $uploadDir = './uploads/';
            $fileName = uniqid() . '-' . basename($_FILES['link_anh']['name']); // Đổi tên file để tránh trùng
            $targetFilePath = $uploadDir . $fileName;

            // Kiểm tra và tạo thư mục nếu chưa tồn tại
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0755, true);
            }

            // Di chuyển file đã upload vào thư mục đích
            if (move_uploaded_file($_FILES['link_anh']['tmp_name'], $targetFilePath)) {
                $linkAnh = $targetFilePath; // Lưu đường dẫn ảnh
            }
        }

        // Thêm bình luận vào cơ sở dữ liệu
        $this->commentModel->addComment($idSanPham, $idKhachHang, $noiDung, $linkAnh);
        header("Location: ./?act=commentProduct&id_sanpham=$idSanPham");
        exit;
    }
}
?>
