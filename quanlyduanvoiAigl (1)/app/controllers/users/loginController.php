<?php
    class loginController {
        public function __construct() {
            $this->loginController = new loginModel;
        }
        public function formlogin() {
            require_once './views/users/login/login.php';
        }
        public function login(){
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $email = $_POST['email'];
                $password = $_POST['password'];
        
                // Lấy thông tin người dùng từ cơ sở dữ liệu theo email
                $user = $this->loginController->getAllinfomationUser($email);
        
                if ($user) {
                    if ($password == $user[0]['matKhau']){
                        $_SESSION['id_khachHang'] = $user[0]['id_khachHang'];
                        $_SESSION['email'] = $user[0]['email'];
                        $_SESSION['ten_khachHang'] = $user[0]['ten_khachHang'];
                        $_SESSION['phanQuyen'] = $user[0]['phanQuyen'];
        
                        // Điều hướng người dùng dựa trên quyền
                        if ($user[0]['phanQuyen'] === 'admin') {
                            echo "<script>
                                    alert('Đăng nhập thành công');
                                    window.location.href = './?act=admin/';
                                  </script>";
                            exit();
                        } elseif($user[0]['phanQuyen'] === 'user') {
                            echo "<script>
                                    alert('Đăng nhập thành công');
                                    window.location.href = './';
                                  </script>";
                            exit();
                        } else {
                            header('Location: ./?act=formLogin');
                            exit();
                        }
                    } else {
                        echo "<script>
                            alert('Sai thông tin đăng nhập');
                            window.location.href = './?act=formLogin';
                        </script>";
                    }
                } else {
                    echo "<script>
                            alert('Sai thông tin đăng nhập');
                            window.location.href = './?act=formLogin';
                        </script>";
                }
            }
        }
        
        public function logout(){
            if ($_SESSION['ten_khachHang']) {
                unset($_SESSION['id_khachHang']);
                unset($_SESSION['email']);
                unset($_SESSION['ten_khachHang']);
                unset($_SESSION['phanQuyen']);
                session_destroy();
                header('Location: ./');
                exit();
            } else {
                header('Location: ./?act=formLogin');
                exit();
            }
        }
        
    }