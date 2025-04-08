<!-- header -->
<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/baseDuanpoly/app/views/users/layout/header.php'; ?>
<!-- header -->
<style>
    .custom-carousel-control {
        background-color: rgba(0, 0, 0, 0.5);
        border: none;
        width: 45px;
        height: 45px;
        display: flex;
        justify-content: center;
        align-items: center;
        border-radius: 50%;
        color: white;
        transition: background-color 0.3s ease;
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        z-index: 5;
    }

    .custom-carousel-control:hover {
        background-color: rgba(0, 0, 0, 0.8);
    }

    .carousel-control-prev {
        left: 15px;
    }

    .carousel-control-next {
        right: 15px;
    }

    .custom-carousel-control i {
        font-size: 1.5rem;
    }

    .custom-bg {
        background-color: #1C1C1D;
    }

    .voucher {
        background-color: #333333;
        padding: 15px;
        border-radius: 10px;
    }

    .hover-bg-primary:hover {
        background-color: #007bff !important;
        color: white !important;
    }

    .btn-outline-secondary {
        border-color: #6c757d;
        color: #6c757d;
        border-width: 1px;
    }

    .hover-border-primary:hover {
        background-color: #007bff !important;
        color: white !important;
        border-color: #007bff !important;
    }

    .hoverViewComment:hover {
        background-color: #6c757d;
        /* Màu nền xám khi hover */
        color: white !important;
    }

    .background {
        background-color: #007bff !important;
        color: white !important;
    }

    .background:hover {
        background-color: #ffff !important;
        color: #007bff !important;
    }
</style>
<!-- Bootstrap Carousel -->
<div class="container mt-5">
    <div class="row">
        <!-- slide show -->
        <div class="col-md-6">
            <div id="phoneCarousel" class="carousel slide" data-bs-ride="carousel">
                <!-- Indicators -->
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#phoneCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#phoneCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#phoneCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>

                <!-- Slides -->
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="./public/images/iphone-16-pro-sa-mac-650x650.png" alt="Product 1" class="d-block w-100 img-fluid">
                    </div>
                    <div class="carousel-item">
                        <img src="./public/images/iphone-16-pro-sa-mac-650x650.png" alt="Product 2" class="d-block w-100 img-fluid">
                    </div>
                    <div class="carousel-item">
                        <img src="./public/images/iphone-16-pro-sa-mac-650x650.png" alt="Product 3" class="d-block w-100 img-fluid">
                    </div>
                </div>
                <!-- Slides -->
                <button class="carousel-control-prev custom-carousel-control" type="button" data-bs-target="#phoneCarousel" data-bs-slide="prev">
                    <i class="fa-sharp fa-solid fa-arrow-left"></i>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next custom-carousel-control" type="button" data-bs-target="#phoneCarousel" data-bs-slide="next">
                    <i class="fa-sharp fa-solid fa-arrow-right"></i>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
        <!-- slide show -->

        <!-- content -->
        <div class="col-md-6 text-white">
            <h1>iPhone 16 Pro Max 256GB</h1>
            <h3>34.990.000₫</h3>
            <p>Dung Lượng</p>
            <div class="d-flex">
                <p class="text-white border rounded text-center py-2 px-3 fw-bold me-2">34GB</p>
                <p class="text-white border rounded text-center py-2 px-3 fw-bold me-2">128GB</p>
                <p class="text-white border rounded text-center py-2 px-3 fw-bold">256GB</p>
            </div>
            <p class="fw-bold">Màu: Titan Sa Mạc</p>
            <div class="">
                <button class="btn rounded-circle" style="width: 40px; height: 40px; background-color: #c7a979;"></button>
                <button class="btn rounded-circle" style="width: 40px; height: 40px; background-color: #1a1a1a;"></button>
                <button class="btn rounded-circle" style="width: 40px; height: 40px; background-color: #413f3f;"></button>
                <button class="btn rounded-circle" style="width: 40px; height: 40px; background-color: #fff;"></button>
            </div>

            <!-- khuyến mãi -->
            <div class="mt-4 voucher">
                <p class="fw-bold">Khuyến mãi</p>
                <p>Giá và khuyến mãi dự kiến áp dụng đến 23:59 | 30/11</p>
                <hr>
                <p>.Nhập mã VNPAYTGDD5 để được giảm 200.000đ <br> áp dụng cho những đơn hàng trên 1.000.000đ</p>
            </div>
            <!-- khuyến mãi -->
            <!-- Mua hàng -->
            <form action="" method="post">
                <div class="d-flex mt-3">
                    <button type="submit" class="btn btn-primary rounded-1">Mua ngay</button>
                    <button type="button" class="btn btn-secondary rounded-1 ms-2">Thêm vào giỏ hàng</button>
                </div>
            </form>
            <!-- Mua hàng -->
            <div class="mt-3 text-white small my-3">
                <div><i class="fas fa-box"></i> Bộ sản phẩm gồm: Hộp, Sách hướng dẫn, Cáp, Cây lấy sim</div>
                <div><i class="fas fa-sync-alt"></i> Hư gì đổi nấy 12 tháng tại 3053 siêu thị trên toàn quốc</div>
                <div><i class="fas fa-shipping-fast"></i> Giao hàng nhanh toàn quốc</div>
                <div><i class="fas fa-phone-volume"></i> Tổng đài tư vấn miễn phí 24/7: 1800.1763</div>
            </div>
        </div>
        <!-- content -->
    </div>
</div>
<!-- thông số và bình luận -->
<div class="bg-white" style="min-height:950px;">
    <div class="container">
        <div class="my-4 text-center">
            <a href="./?act=detailProduct&id=<?= htmlspecialchars($_GET['id_sanpham'] ?? 0) ?>"><button class="mt-5 btn btn-outline-secondary rounded w-25 text-muted hover-border-primary">Thông số kỹ thuật</button></a>
            <a href="./?act=commentProduct&id=<?= htmlspecialchars($_GET['id'] ?? 0) ?>"><button class="mt-5 btn btn-outline-secondary rounded w-25 text-muted hover-border-primary ms-3">Đánh giá sản phẩm</button></a>
        </div>

        <!-- Sử dụng d-flex và justify-content-center để căn giữa -->
        <div class="d-flex justify-co   ntent-center">
            <div class="accordion" id="specAccordion" style="width: 60%; max-width: 900px;">
                <div class="border border-secondary p-3 " style="border-radius: 15px; ">
                    <h3 class="text-danger">Đánh giá iphone 13</h3>
                    <div class="d-flex my-3">
                        <img src="./public/images/iphone-16-pro-sa-mac-650x650.png"
                            alt="Product 1" class="img-fluid product-image" style="width:150px">
                        <img src="./public/images/iphone-16-pro-sa-mac-650x650.png"
                            alt="Product 1" class="img-fluid product-image" style="width:150px">
                        <img src="./public/images/iphone-16-pro-sa-mac-650x650.png"
                            alt="Product 1" class="img-fluid product-image" style="width:150px">
                    </div>
                    <!-- danh sách bình bình luận -->
                    <div>

                        <div class="comments-section container">
                            <h2 class="mb-4">Bình luận sản phẩm</h2>
                            <!-- bình luận -->
                            <div class="d-flex">
                                <p class="fw-bold me-2">Kiều Tiếp</p> <!-- thay tên khách hàng vào đây -->
                                <p><i class="fas fa-check-circle" style="color: #FFD700;"></i></p>
                                <p class="text-danger ms-2">Đã mua tại iPhone Lux</p>
                            </div>
                            <img src="./public/images/iphone-16-pro-sa-mac-650x650.png"
                                alt="Product 1" class="img-fluid product-image" style="width:70px">
                            <p class="mt-2">Dùng một thời gian thấy khá ok</p>
                            <p style="font-size:13px;color:#838EA4;"> đã bình luận : 20 giờ trước</p>
                            <hr>
                            <!-- bình luận -->
                            <!-- Hiển thị danh sách bình luận -->
                            <?php if (!empty($comments)): ?>
                                <?php foreach ($comments as $comment): ?>
                                    <div class="comment mb-4">
                                        <!-- Thông tin khách hàng -->
                                        <div class="d-flex align-items-center mb-2">
                                            <p class="fw-bold me-2"><?= htmlspecialchars($comment['ten_khachHang']) ?></p>
                                        </div>

                                        <!-- Ảnh và nội dung bình luận -->
                                        <div class="d-flex align-items-start">
                                            <img src="<?= htmlspecialchars($comment['link_anh']) ?>"
                                                alt="Ảnh sản phẩm"
                                                class="img-fluid product-image me-3"
                                                style="width: 70px; height: auto;">
                                            <div>
                                                <p><?= htmlspecialchars($comment['noiDung']) ?></p>
                                                <p style="font-size:13px; color:#838EA4;">đã bình luận: <?= htmlspecialchars($comment['thoiGian']) ?></p>
                                            </div>
                                        </div>
                                        <hr>
                                    </div>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <p>Chưa có bình luận nào.</p>
                            <?php endif; ?>
                        </div>
                        <!-- Form gửi bình luận -->
                        <form action="" method="POST" enctype="multipart/form-data" class="p-3 border rounded mt-4">
                            <input type="hidden" name="id_sanPham" value="<?= htmlspecialchars($_GET['id_sanpham'] ?? 0) ?>">
                            <input type="hidden" name="id_khachHang" value="<?= htmlspecialchars($_SESSION['id_khachHang'] ?? 0) ?>">

                            <div class="mb-3">
                                <textarea id="noiDung" name="noiDung" class="form-control" rows="2" placeholder="Nhập bình luận..." required></textarea>
                            </div>

                            <div class="d-flex align-items-center gap-2">
                                <input type="file" id="link_anh" name="link_anh" class="form-control" accept="image/*" style="width: 250px;">
                                <button type="submit" name="submit_comment" class="btn btn-primary btn-sm px-3" style="height: 36px;">Gửi</button>
                            </div>
                        </form>

                    </div>


                    </a>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- footer -->
<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/baseDuanpoly/app/views/users/layout/footter.php'; ?>
<!-- footer -->