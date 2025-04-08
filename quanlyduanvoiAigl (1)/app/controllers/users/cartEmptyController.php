<?php
    class cartEmptyUserController{
        public $cartEmpty;
        public function __construct(){
            $this->cartEmpty = new cartEmptyUserModel;
        }
        public function cartEmpty(){
            require_once './views/users/cart/cartEmpty.php';
        }
        public function cancel_order(){
            $idOrder = $_GET['idOrder'];
            // var_dump($idOrder);die();
            require_once './views/users/cart/cancelOrder.php';
        }
        public function submitCancel_order(){
            $cancel_reason = $_POST['cancel_reason'];
            $trangThai = $_POST['trangThai'];
            $idOrder = $_POST['idOrder'];
            $cancelOrder = $this->cartEmpty->cancelOrder($idOrder, $cancel_reason, $trangThai);
            // var_dump($cancelOrder);die();
            
        }
    }