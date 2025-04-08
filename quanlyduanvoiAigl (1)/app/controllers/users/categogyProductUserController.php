<?php
    class listCategorysUserController{
        public $cartegory;
        public function __construct(){
            $this->cartegory = new categoryProductModel;
        }
        public function listCategorys(){
            // $getCategorys = $this->cartegory->getAllCategory();
            // var_dump($getCategorys);die();
            // require_once './views/users/products/listProductUser.php';
        }
        // public function listCategorys(){
            
        //     require_once './views/users/products/categoryProducts.php';
        // }
    }