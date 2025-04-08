<?php
    class orderAdminController{
        public $listOlder;
        public function __construct(){
            $this->listOlder = new olderAdminModel;
        }
        public function orderAdmin(){
            $orders = $this->listOlder->getAllOder();
            // var_dump($orders);die();
            require_once './views/admin/order/order.php';
        }
    }