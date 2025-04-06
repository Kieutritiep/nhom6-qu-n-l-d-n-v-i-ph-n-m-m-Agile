<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap Example</title>
    <!-- Link Bootstrap CSS -->
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <!-- Latest Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="./public/css/styles.css">
</head>
<style>
    .account{
            margin-top: 20px;
    }
.wrapper {
    position: relative;
    width: 780px;
    height: 560px;
    background: transparent;
    background: #081b29;
    overflow: hidden;
    border: 2px solid #0ef;
}
</style>
<body>
    <div class="" style="background-color: #081B29;">
        <!-- start header -->
        <header class="w-100 mb-5">
    <div class="pe-5 ps-5 py-3 bg-black text-white d-flex align-items-center justify-content-between">
        <div class="d-flex align-items-center">
            <div class="border-end pe-4 d-flex flex-column justify-content-center align-items-center" style="height: 60px;">
                <p class="mb-0 fw-bold" style="color: white; text-shadow: 0 0 10px rgba(255, 255, 255, 0.8), 0 0 20px rgba(255, 255, 255, 0.6);">iPhone Lux</p>
                <p class="mb-0" style="color: white; text-shadow: 0 0 10px rgba(255, 255, 255, 0.8), 0 0 20px rgba(255, 255, 255, 0.6);">store</p>
            </div>
            <img class="ms-3" style="width:40px; height:50px;" src="./public/images/logo.png" alt="">
        </div>
        <div class="flex-grow-1">
            <ul class="d-flex list-unstyled m-0 justify-content-center">
                <li class="mx-3">
                    <a href="#" class="menu-link text-reset text-decoration-none px-3 py-2 d-block">Trang Chủ</a>
                </li>
                <li class="mx-3">
                    <a href="#" class="menu-link text-reset text-decoration-none px-3 py-2 d-block">Sản phẩm mới ra mắt</a>
                </li> 
                <li class="mx-3">
                    <a href="#" class="menu-link text-reset text-decoration-none px-3 py-2 d-block">Sản phẩm cũ</a>
                </li>
            </ul>
        </div>

        <form class="position-relative">
            <input type="text" class="form-control rounded-4 pe-5 me-5" placeholder="Search" required>
            <i class="fa-solid fa-magnifying-glass position-absolute top-50 end-0 translate-middle-y me-3" style="color: gray;"></i>
        </form>
        <a href="" class="text-decoration-none text-reset">
            <i class="fa-solid fa-user me-5 ms-5 fs-4"></i>
        </a>
        <a href="#" class="position-relative text-reset text-decoration-none">
            <i class="fa-solid fa-cart-shopping me-5 fs-4"></i>
            <p class="position-absolute top-0 start-50 translate-middle bg-danger text-white rounded-circle d-flex justify-content-center align-items-center" style="width: 20px; height: 20px; font-size: 12px;">1</p>
        </a>
    </div>
</header>
    <!-- end header -->
    <div class="container1">
    <img src="./public/images/iphone-16-pro-sa-mac-650x650.png" alt="Product 1" style="width:450px;height:500px">
        <div class="wrapper">
            <span class="bg-animate"></span>
            <span class="bg-animate2"></span>
            <!-- form đăng nhập -->
            <div class="form-box login">
                <h2 class="animation" style="--i:0; --j:27">Đăng nhập</h2>
                <form action="./?act=login" method="POST">
                    <div class="input-box animation" style="--i:1; --j:28">
                        <input type="text" id="email" name="email" placeholder=" ">
                        <label for="email">Email</label>
                        <i class="fa-solid fa-user"></i>
                    </div>
                    <div class="input-box animation" style="--i:2; --j:29">
                        <input type="password" id="password" name="password" placeholder=" ">
                        <label for="password">Mật khẩu</label>
                        <i class="fa-solid fa-lock"></i>
                    </div>
                    <button type="submit" class="btn animation" style="--i:3; --j:30">Đăng nhập</button>
                    <div class="logreg-link animation account" style="--i:4; --j:31">
                        <p>Bạn chưa có tài khoản? <a href="#" class="register_link">Đăng kí</a></p>
                    </div>
                </form>
            </div>
            <div class="info-text login">
                <h2 class="animation" style="--i:0; --j:25">Chào mừng trở lại</h2>
                <p class="animation" style="--i:1;--j:26">
                    iphone Lux luôn đồng hành cùng khách hàng
                </p>
            </div>
            <!-- form đăng nhập -->

            <!-- form đăng kí -->
            <div class="form-box register">
                <h2 class="animation" style="--i:17; --j:4">Đăng kí</h2>
                <form action="./?act=register" method="POST">
                    <div class="input-box animation"  style="--i:18;">
                        <input type="text" id="username" name="username" placeholder=" ">
                        <label for="username">Tên đăng nhập</label>
                        <i class="fa-solid fa-user"></i>
                    </div>
                    <div class="input-box animation"  style="--i:19;  --j:1;">
                        <input type="text" id="email" name="email" placeholder=" ">
                        <label for="email">Email</label>
                        <i class="fa-solid fa-envelope"></i>
                    </div>
                    <div class="input-box animation"  style="--i:19;  --j:1;">
                        <input type="text" id="phone" name="phone" placeholder=" ">
                        <label for="phone">Số điện thoại</label>
                        <i class="fa-solid fa-envelope"></i>
                    </div>
                   
                    <div class="input-box animation"  style="--i:20; --j:2;">
                        <input type="password" id="password" name="password" placeholder=" ">
                        <label for="password">Mật khẩu</label>
                        <i class="fa-solid fa-lock"></i>
                    </div>
                    <div class="input-box animation"  style="--i:21; --j:3;">
                        <input type="repassword" id="password" name="repassword" placeholder=" ">
                        <label for="repassword">Nhập lại mật khẩu</label>
                        <i class="fa-solid fa-lock"></i>
                    </div>
                    <button type="submit" class="btn animation"  style="--i:22; --j:4">Đăng kí</button>
                    <div class="logreg-link animation account"  style="--i:23; --j:5;">
                        <p>bạn đã có tài khoản? <a href="#" class="login_link">Đăng nhập</a></p>
                    </div>
                </form>
            </div>
            <div class="info-text register ">
                <h2 class="animation" style="--i:24; --j:0">Chào mừng quý khách</h2>
                <p class="animation" style="--i:24; --j:1">
                    iphone Lux luôn đồng hành cùng khách hàng
                </p>
            </div>
            <!-- end form đăng kí -->
        </div>
    </div>
    <script>
        const wrapper = document.querySelector('.wrapper')
        const registerLink = document.querySelector('.register_link')
        const loginLink = document.querySelector('.login_link')
        registerLink.onclick = () =>{
            wrapper.classList.add('active')
        }
        loginLink.onclick = () => {
            wrapper.classList.remove('active'); 
        };
    </script>
<!-- footer -->
<?php require_once $_SERVER['DOCUMENT_ROOT'] .'/baseDuanpoly/app/views/users/layout/footter.php';?> 
<!-- footer -->
