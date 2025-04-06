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
    .dropdown:hover .dropdown-menu {
        display: block;
    }
    #carouselExampleDark {
        width: 100%;
        max-width: 100%;
    }
</style>
<body>
    <div class="" style="background-color: #3E3E3F;">
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
                    <a href="./?act=/" class="menu-link text-reset text-decoration-none px-3 py-2 d-block">Trang Chủ</a>
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
        <div class="dropdown">
        <?php 
        if (!isset($_SESSION['phanQuyen']) || $_SESSION['phanQuyen'] !== 'user') {
            header('location: ./?act=formLogin');
            exit();
        }
        if(!isset($_SESSION['ten_khachHang'])){
            header('location: ./');
            exit();
        }
        if (isset($_SESSION['ten_khachHang'])) { 
            $fullName = $_SESSION['ten_khachHang'];
            $nameParts = explode(' ', $fullName);
            $shortName = '';
            foreach ($nameParts as $part) {
                $shortName .= strtoupper(substr($part, 0, 1)); 
            }
        ?>
        <span class="badge rounded-circle bg-white text-dark p-2 d-inline-flex justify-content-center align-items-center me-4 ms-4" style="width: 30px; height: 30px;">
            <?php echo $shortName; ?>
            </span>
            <ul class="dropdown-menu" aria-labelledby="userDropdown">
                <li><a class="dropdown-item" href="./?act=infomationUser&idUser=<?php echo $_SESSION['id_khachHang'] ?>">Quản lý tài khoản</a></li>
                <li><a class="dropdown-item" href="./?act=listOrderUser&id=<?php echo $_SESSION['id_khachHang'] ?>">Đơn hàng của tôi</a></li>
                <li><a class="dropdown-item" href="./?act=logout" onclick="return confirm('bạn có muốn đăng xuất không');">Đăng xuất</a></li>
        </ul>
    <?php } else { ?>
        <a href="./?act=formLogin" class="text-decoration-none text-reset" id="userDropdown" role="button">
            <i class="fa-solid fa-user me-4 ms-4 fs-4"></i>
        </a>
    <?php } ?>
        </div>
        <a href="./?act=cart&id=<?php 
            if(isset($_SESSION['id_khachHang'])){
                echo $_SESSION['id_khachHang'];
            }
        ?>" class="position-relative text-reset text-decoration-none">
            <i class="fa-solid fa-cart-shopping me-5 fs-4"></i>
            <p class="position-absolute top-0 start-50 translate-middle bg-danger text-white rounded-circle d-flex justify-content-center align-items-center" style="width: 20px; height: 20px; font-size: 12px;">1</p>
        </a>
    </div>
</header>
        