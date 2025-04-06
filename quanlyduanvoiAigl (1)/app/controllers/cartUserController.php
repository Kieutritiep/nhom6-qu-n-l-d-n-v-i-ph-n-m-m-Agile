<?php
    class cartUserController{
        public $cart;
        public function __construct(){
            $this->cart = new cartUserModel;
        }
        public function cartUser(){
            $userIDCart = $_GET['id'];
            $cartProducts = $this->cart->getProductByUserID($userIDCart);
            $addressUser = $this->cart->getAddressUser($userIDCart);
            $colors = $this->cart->getAllColor($userIDCart);
            // print_r($cartProducts);die();
            require_once './views/users/cart/cart.php';
        }
        public function addCart() {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $id_sanPham = $_POST['id_sanPham'];
                $capacity = $_POST['capacity'];
                $color = $_POST['color'];
                $price = $_POST['price'];
                $userID = $_POST['userID'];
                $buyNow = isset($_POST['buyNow']) ? true : false;
                $addToCart = isset($_POST['addToCart']) ? true : false;
                // var_dump($_POST);die();
                $addCart = $this->cart->addCartModel($id_sanPham, $capacity, $color, $price, $userID);
                if ($addCart) {
                    if ($buyNow) {
                        header('Location: ./?act=cart&id=' . $userID);
                        exit();
                    } elseif ($addToCart) {
                        header('Location: ./?act=detailProduct&id=' . $id_sanPham);
                    }
                } else {
                    echo "Thêm vào giỏ hàng thất bại.";
                }
            }
        }
        public function deteteCart(){
            $userID = $_GET['idUser'];
            $idProductCart = $_GET['id'];
            $capacity = $_GET['capacity'];
            $color = $_GET['color'];
            // var_dump($color);die();
            $deleteCart = $this->cart->deteteCartMode($idProductCart,$capacity,$color);
            if($deleteCart){
                header('Location: ./?act=cart&id=' . $userID);
            }else{
                echo "Xóa sản phẩm khỏi giỏ hàng thất bại.";
            }
        }
        public function updateColorCart(){
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $idUser = $_POST['idUser'];
                $idProduct = $_POST['id_sanPham'];
                $color = $_POST['mauSac'];
                $updateColor = $this->cart->updateColorCartModel($idProduct,$color,$idUser);
                var_dump($updateColor); 
            }
        }
}

        