<?php
session_start(); // Khởi động session

// Require các file cần thiết
require_once './commons/env.php'; // Khai báo biến môi trường
require_once './commons/function.php'; // Hàm hỗ trợ

// Kết nối cơ sở dữ liệu
try {
    $dsn = "mysql:host=" . DB_HOST . ";post=" . DB_PORT . ";dbname=" . DB_NAME . ";charset=utf8mb4";
    $db = new PDO($dsn, DB_USERNAME, DB_PASSWORD);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Kết nối thất bại: " . $e->getMessage());
}

// Require tất cả file Controllers admin
require_once './controllers/admin/homeAdmimController.php';
require_once './controllers/admin/capacityAdminController.php';
require_once './controllers/admin/categorysAdminController.php';
require_once './controllers/admin/colorAdminController.php';
require_once './controllers/admin/commentsAdminController.php';
require_once './controllers/admin/detailcommentsAdminController.php';
require_once './controllers/admin/detailcustomerAdminController.php';
require_once './controllers/admin/detailodersAdminController.php';
require_once './controllers/admin/detailProductsAdminController.php';
require_once './controllers/admin/listcustomersAdminController.php';
require_once './controllers/admin/listProductAdminController.php';
require_once './controllers/admin/odersAdminController.php';
require_once './controllers/admin/ramAdminController.php';
require_once './controllers/admin/formaddProductController.php';
require_once './controllers/admin/listVoucherAdminController.php';
require_once './controllers/admin/StatisticsAdminController.php';

// Require tất cả file Models admin
require_once './models/admin/homeAdminModel.php';
require_once './models/admin/capacityAdminModel.php';
require_once './models/admin/categorysAdminModel.php';
require_once './models/admin/colorAdminModel.php';
require_once './models/admin/commentsAdminModel.php';
require_once './models/admin/detailcustomerAdminModel.php';
require_once './models/admin/detailodersAdminModel.php';
require_once './models/admin/detailProductsAdminModel.php';
require_once './models/admin/listcustomersAdminModel.php';
require_once './models/admin/listProductsAdminModel.php';
require_once './models/admin/odersAdminModel.php';
require_once './models/admin/ramAdminModel.php';
require_once './models/admin/formaddProductModel.php';
require_once './models/admin/listVoucherAdminModel.php';
require_once './models/admin/StatisticsAdminModel.php';
require_once './models/admin/StatisticsAdminModel.php';

// Require tất cả file Models users
require_once './models/users/listProductUserModel.php';
require_once './models/users/loginModel.php';
require_once './models/users/cartUserModel.php';
require_once './models/users/detailCartModel.php';
require_once './models/users/cartEmptyModel.php';
require_once './models/users/informationUserModel.php';
require_once './models/users/detailProductUserModel.php';
require_once './models/users/registerModel.php';
require_once './models/users/commentProductUserModel.php';
require_once './models/users/oderProductModel.php';
require_once './models/users/listOrderUserModel.php';
require_once './models/users/categoryProductUserModel.php';
// Require tất cả file Controllers users
require_once './controllers/users/listProductUserController.php';
require_once './controllers/users/loginController.php';
require_once './controllers/users/cartUserController.php';
require_once './controllers/users/detailCartController.php';
require_once './controllers/users/cartEmptyController.php';
require_once './controllers/users/informationUserController.php';
require_once './controllers/users/detailProductUserController.php';
require_once './controllers/users/registerController.php';
require_once './controllers/users/commentProductUserController.php';
require_once './controllers/users/oderProductController.php';
require_once './controllers/users/listOrderUserController.php';
require_once './controllers/users/categogyProductUserController.php';


$commentModel = new commentProductUserModel($db);
$adminCommentModel = new commentsAdminModel($db);
// Lấy giá trị act từ URL
$act = $_GET['act'] ?? '/';

try {
    if (strpos($act, 'admin/') === 0) {
        // Điều hướng admin
        $adminAction = substr($act, 6);
        match ($adminAction) {
            '' => (new homeAdminController())->homeAdmin(),
            'listProducts' => (new listProductAdminController())->listProducts(),
            'detailProduct' => (new detailProductController())->detailProduct(),
            'commentProduct' => (new commentProductUserController($commentModel))->displayComments(),
            'formAddProduct' => (new addProductAdminController())->formAddProduct(),
            'addProduct' => (new addProductAdminController())->addProduct(),
            'getAllram' => (new addProductAdminController())->getAllram(),
            'getAllCapacity' => (new addProductAdminController())->getAllCapacity(),
            'color' => (new colorAdminController())->listColors(),
            'color/add' => (new colorAdminController())->addColor(),
            'color/edit' => (new colorAdminController())->editColor(),
            'color/delete' => (new colorAdminController())->deleteColor(),
            'fromAdd_categorys' => (new categorysAdminController())->fromAddcategorys(),
            'categorys' => (new categorysAdminController())->categorys(),
            'delete_categorys' => (new categorysAdminController())->deleteCagorys(),
            'add_Category' => (new categorysAdminController())->addCategory(),
            'listcustomers' => (new ListCustomersAdminController(new listcustomersAdminModel($db)))->listcustomer(),
            'editcustomers' => (new ListCustomersAdminController(new listcustomersAdminModel($db)))->edit($_GET['id']),
            'listVoucher' => (new listVoucherAdminController())->listVoucher(),
            'formAddVoucher' => (new listVoucherAdminController())->formAddVoucher(),
            'addVoucher' => (new listVoucherAdminController())->addVoucher(),
            'deleteVoucher' => (new listVoucherAdminController())->deleteVoucher(),
            'updateVoucher' => (new listVoucherAdminController())->updateVoucher(),
            'formUpdateVoucher' => (new listVoucherAdminController())->formUpdateVoucher(),
            'updateVoucher' => (new listVoucherAdminController())->updateVoucher(),
            'orderAdmin' => (new orderAdminController())->orderAdmin(),
            'detailOrderAdmin' => (new detailOrderAdminController())->detailOrderAdmin(),
            'updateStatus' => (new detailOrderAdminController())->updateStatusOrder(),
            'comments' => (new commentsAdminController($adminCommentModel))->listComments(), 
            'deleteComment' => (new commentsAdminController($adminCommentModel))->deleteComment(),
            'statistics' => (new StatisticsAdminController())->index(),
            default => throw new Exception('404 Not Found', 404),
        };
    } else {
        // Điều hướng user
        match ($act) {
            '/' => (new listProductUsersController())->listProductUser(),
            'detailProduct' => (new detailProductController())->detailProduct(),
            'commentProduct' => (new commentProductUserController($commentModel))->displayComments(),
            // 'detailProduct' => (new detailProductController())->voucherProduct(),
            'formLogin' => (new loginController())->formlogin(),
            'login' => (new loginController())->login(),
            'register' => (new registerController())->register(),
            'logout' => (new loginController())->logout(),
            'cart' => (new cartUserController())->cartUser(),
            'updateColorCart' => (new cartUserController())->updateColorCart(),
            'deleteCart' => (new cartUserController())->deleteCart(),
            'deteteCart' => (new cartUserController())->deteteCart(),
            'addCart' => (new cartUserController())->addCart(),
            'detailCart' => (new detailcartUserController())->detailCartUser(),
            'order' => (new orderProductController())->order(),
            'cancel_order' => (new cartEmptyUserController())->cancel_order(),
            'submitCancel_order' => (new cartEmptyUserController())->submitCancel_order(),
            // 'order_successfully' => (new orderProductController())->order_successfully(),
            'listOrderUser' => (new listOrderProductController())->listorderUser(),
            'ordered' => (new listOrderProductController())->ordered(),
            'waiting_for_delivery' => (new listOrderProductController())->waiting_for_delivery(),
            'are_delivering' => (new listOrderProductController())->are_delivering(),
            'delivered' => (new listOrderProductController())->delivered(),
            'canceled' => (new listOrderProductController())->canceled(),
            'historyOrderUser' => (new listOrderProductController())->historyOrderUser(),
            'cartEmpty' => (new cartEmptyUserController())->cartEmpty(),
            'infomationUser' => (new infomationUserController())->infomationUser(),
            'listCategorys' => (new listCategorysUserController())->listCategorys(),
            default => throw new Exception('404 Not Found', 404),
        };
    }
} catch (Exception $e) {
    $httpCode = is_int($e->getCode()) && $e->getCode() >= 100 && $e->getCode() < 600 ? $e->getCode() : 500;
    http_response_code($httpCode);
    echo $e->getMessage();
    exit();
}
