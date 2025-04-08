<?php
    class listOrderProductController{
        public $listOrderUser;
        public function __construct(){
            $this->listOrderUser = new listModelUser;
        }
        public function listorderUser(){
            $idUser = $_GET['id'];
            // var_dump($idUser);die();
            $listOrdersUsers = $this->listOrderUser->getAllOrderUser($idUser);
            // var_dump($canceled);die(); 
            require_once './views/users/cart/listOlderUser.php';
        }
        public function historyOrderUser(){
            $idUser = $_GET['id'];
            $historyOrderUsers = $this->listOrderUser->getAllHistoryOrderUser($idUser);
            require_once './views/users/cart/histstory.php';
        }
        public function ordered(){
            $idUser = $_GET['id'];
            $listOrdersUsers = $this->listOrderUser->ordered($idUser);
            require_once './views/users/cart/listOlderUser.php';
        }
        public function waiting_for_delivery(){
            $idUser = $_GET['id'];
            $listOrdersUsers = $this->listOrderUser->waiting_for_delivery($idUser);
            require_once './views/users/cart/listOlderUser.php';
        }
        public function are_delivering(){
            $idUser = $_GET['id'];
            $listOrdersUsers = $this->listOrderUser->are_delivering($idUser);
            require_once './views/users/cart/listOlderUser.php';
        }
        public function delivered(){
            $idUser = $_GET['id'];
            $listOrdersUsers = $this->listOrderUser->delivered($idUser);
            require_once './views/users/cart/listOlderUser.php';
        }
        public function canceled(){
            $idUser = $_GET['id'];
            $listOrdersUsers = $this->listOrderUser->canceled($idUser);
            require_once './views/users/cart/listOlderUser.php';
        }
        
    }