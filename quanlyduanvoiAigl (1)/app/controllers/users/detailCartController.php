<?php
    class detailcartUserController{
        public $detailCart;
        public function __construct(){
            $this->detailCart = new detailCartUserModel;
        }
        public function detailCartUser(){
            $idOrder = $_GET['id'];
            $detailOrdersUsers = $this->detailCart->getDetailOrder($idOrder);
            // var_dump($detailOrdersUsers);die();
            // var_dump($orders);die();
            require_once './views/users/cart/detailCart.php';
        }
    }