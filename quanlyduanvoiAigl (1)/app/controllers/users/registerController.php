<?php
    class registerController{
        public function __construct() {
            $this->registerController = new registerModel;
        }
        public function register(){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $username = $_POST['username'];
                $email = $_POST['email'];
                $phone = $_POST['phone'];
                $password = $_POST['password'];
                $repassword = $_POST['repassword'];
                $result = $this->registerController->registerModel($username, $email, $phone, $password, $repassword);
                if($password !== $repassword ){
                    echo "Mật khẩu không khớp";
                    return;
                }
                if($result){
                    echo "<script>
                            alert('Đăng kí thành công');
                            window.location.href = './?act=formLogin';
                        </script>";
                    
                }
                else{
                    echo "<script>
                            alert('Đăng kí thất bại');
                            window.location.href = './?act=formLogin#';
                        </script>";
                }
            }
        }
        
    }