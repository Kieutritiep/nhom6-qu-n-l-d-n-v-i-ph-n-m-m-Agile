<?php
    class categorysAdminController{
        public $category;
        public function __construct(){
            $this->category = new categorysAdminModel;
        }
        public function categorys(){
            $categorys = $this->category->getAllCategory();
            require_once './views/admin/category/category.php';
        }
        public function deleteCagorys() {
            if (isset($_GET['id']) && is_numeric($_GET['id'])) {
                $id = $_GET['id'];
                $result = $this->category->deleteCategoryById($id);
                if ($result) {
                    header('location: ./?act=admin/categorys');
                    exit();
                } else {
                    echo "Không thể xóa danh mục.";
                }
            } else {
                echo "id không tồn tại!.";
            }
        }
        public function fromAddcategorys() {
            require_once './views/admin/category/formAddCategory.php';
        }
        
        public function fromUpdatecategorys() {
            $id = $_GET['id'];
            $categorys = $this->category->getCategoryID($id);
            require_once './views/admin/category/formUpdateCategory.php';
        }
        public function updatecategorys(){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $nameCategory = $_POST['nameCategory'];
                $id = $_POST['id_danhMuc'];
                $result = $this->category->updateCategory_Model($id,$nameCategory);
                if($result){
                    header('location:./?act=admin/categorys');
                    exit();
                }
                else{
                    echo "Cập nhật danh mục thất bại.";
                }
            }
        }
        public function addCategory() {
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $nameCategory = $_POST['nameCategory'];
                $result = $this->category->addCategoryModel($nameCategory);
                if($result){
                    header('location:./?act=admin/categorys');
                    exit();
                }else{
                    echo "Thêm danh mục thất bại.";
                }
            }
        }
}