<?php
    class orderProductController{
        public function __construct() {
            $this->orderProduct = new orderProductModel;
        }
        public function order(){
            if($_SERVER["REQUEST_METHOD"] == "POST"){
                $id_khachHang = $_POST['id_khachHang'] ?? NULL;
                $gender = $_POST['gender'] ?? NULL;
                $name = $_POST['nameUser'] ?? NULL;
                $phone = $_POST['phone'] ?? NULL;
                $city = $_POST['city'] ?? NULL;
                $district = $_POST['district'] ?? NULL;
                $commune = $_POST['commune'] ?? NULL;
                $detailAddress = $_POST['detailAddress'] ?? NULL;
                $voucher = $_POST['voucher'] ?? NULL;
                $pay = $_POST['pay'] ?? NULL;
                $totalPrice = $_POST['totalPrice'] ?? NULL;
                $idProduct = $_POST['idProduct'] ?? NULL;
                $quantity = $_POST['quantity'] ?? NULL;
                $price = $_POST['price'] ?? NULL;
                $capacity = $_POST['capacity'] ?? NULL;
                $color = $_POST['color'] ?? NULL;
                $isDefault = $_POST['isDefault'] ?? 0;
                // print_r($_POST);die();
                $result = $this->orderProduct->olderProducts($id_khachHang,$gender, $name, $phone, $city, $district, $commune, $detailAddress, $isDefault,$voucher,$pay,$totalPrice,$idProduct,$price,$quantity,$capacity,$color);
                if($result){
                    require_once './views/users/cart/orderSuccessfully.php';
                }else{
                    echo "Đặt hàng thất bại";
                }
            }
        }
        
    }