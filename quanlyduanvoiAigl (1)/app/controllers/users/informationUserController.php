<?php
    class infomationUserController{
        public $infomationUser;
        public function __construct(){
            $this->infomationUser = new infomationUser;
        }
        public function infomationUser(){
            $idUser = $_GET["idUser"];
            $getUser = $this->infomationUser->getUserModel($idUser);
            // var_dump($getUser);
            require_once './views/users/informationUser/informationUser.php';
        }
    }