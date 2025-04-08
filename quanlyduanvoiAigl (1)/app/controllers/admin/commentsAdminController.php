<?php
class commentsAdminController {
    private $model;

    public function __construct($model) {
        $this->model = $model;
    }

    // Hiển thị danh sách bình luận
    public function listComments() {
        $comments = $this->model->getAllComments();
        require_once './views/admin/products/listComments.php';
    }

    // Xóa bình luận
    public function deleteComment() {
        if (isset($_GET['id_binhLuan']) && is_numeric($_GET['id_binhLuan'])) {
            $id = $_GET['id_binhLuan'];
            if ($this->model->deleteCommentById($id)) {
                header("Location: ?act=admin/comments");
                exit;
            } else {
                header("Location: ?act=admin/comments");
                exit;
            }
        } else {
            header("Location: ?act=admin/comments");
            exit;
        }
    }
}
?>
