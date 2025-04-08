<?php
    class homeAdminController{
        public $homeAdmin;
        public function __construct(){
            $this->homeAdmin = new homeAdminModel;
        }
        public function homeAdmin(){
            require_once './views/admin/home/homeAdmin.php';
        }
    }