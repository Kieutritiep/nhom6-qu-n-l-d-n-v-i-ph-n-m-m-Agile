<?php
   class addProductAdminController {
    public $addProduct;

    public function __construct() {
        $this->addProduct = new addProductModel;
    }

    public function formAddProduct() {
        $categorys = $this->addProduct->getAllCategory();
        $colors = $this->addProduct->getAllColor();
        $capacitys = $this->addProduct->getAllCapacity();
        $rams = $this->addProduct->getAllram();
        require_once './views/admin/products/addProducts.php';
    }

    public function addProduct() {
        // Lấy dữ liệu từ form
        $nameProduct = $_POST['nameProduct'];
        $category = $_POST['category'];
        $priceProducts = $_POST['price'];
        $capacities = $_POST['capacity'];
        $colors = isset($_POST['color']) ? $_POST['color'] : [];
        $description = $_POST['description'];
        $quantitys = $_POST['quantity'];
        $display = $_POST['display'];
        $mainImage = $_FILES['mainImage'];
        $folder = './uploads/';
        $file_save = $this->uploadFile($mainImage, $folder);
        $subImage = $_FILES['subImage'];
        $folder_subImage = './upload_subImage/';
        $file_subImage = [];
        // var_dump($_POST);die();
    if (isset($subImage['name']) && is_array($subImage['name'])) {
        foreach ($subImage['name'] as $key => $name) {
            $tmp_name = $subImage['tmp_name'][$key];
            $uniqueName = time() . '_' . uniqid() . '_' . basename($name); 
            $file_name = $folder_subImage . $uniqueName;
            if (move_uploaded_file($tmp_name, $file_name)) {
                $file_subImage[] = $file_name;
            }
        }
        } elseif (!empty($subImage['name'])) {
            $tmp_name = $subImage['tmp_name'];
            $uniqueName = time() . '_' . uniqid() . '_' . basename($subImage['name']); 
            $file_name = $folder_subImage . $uniqueName;

            if (move_uploaded_file($tmp_name, $file_name)) {
                $file_subImage[] = $file_name;
            }
        }
        $result = $this->addProduct->addProductModels($nameProduct, $category, $priceProducts, $colors, $description, $quantitys, $capacities, $display, $file_save, $file_subImage);
        if ($file_save) {
            if ($result) {
                echo "Thêm sản phẩm thành công";
            } else {
                echo "Có lỗi xảy ra khi thêm sản phẩm.";
            }
        } else {
            echo "Có lỗi xảy ra khi tải ảnh chính.";
        }
        }
        public function uploadFile($file, $folder) {
            if ($file['error'] == 0) {
                $fileName = basename($file['name']);
                $filePath = $folder . $fileName;
                if (move_uploaded_file($file['tmp_name'], $filePath)) {
                    return $filePath; 
                } else {
                    return false;  
                }
            }
            return false;  
        }
    }
?>