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
    }

    .hover-border-primary:hover {
        background-color: #007bff !important;
        color: white !important;
        border-color: #007bff !important;
    }

    .custom-btn {
        background-color: #6c757d;
        color: white;
        width: 20%;
        border: none;
    }

    .custom-btn:hover {
        background-color: #5a6268;
        /* Màu xám đậm hơn khi hover */
    }

    /* Màu mặc định của nút dung lượng */
    .dung-luong-btn {
        background-color: #2E2E2E;
        /* Màu khi không chọn */
        color: white;
        border: none;
        padding: 10px 20px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .dung-luong-btn.active {
        background-color: #1F1F20;
        /* Màu khi chọn */
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
            <?php
            if (isset($detailProducts['dungLuong']) && isset($detailProducts['giaBienThe'])) {
                $dungLuongList = explode(',', $detailProducts['dungLuong']);
                $giaList = explode(',', $detailProducts['giaBienThe']);
            } else {
                $dungLuongList = [];
                $giaList = [];
            }
            ?>
            <!-- Hiển thị tên sản phẩm và dung lượng mặc định -->
            <h1 id="productTitle"><?php echo $detailProducts['ten_sanPham'] . ' ' . ($dungLuongList[0] ?? ''); ?></h1>
            <h2 id="priceProductVariant">
                <?php
                // Kiểm tra nếu $dungLuongList và $giaList không rỗng
                if (!empty($dungLuongList) && !empty($giaList)) {
                    // Dung lượng và giá mặc định là phần tử đầu tiên
                    $defaultDungLuong = $dungLuongList[0];
                    $defaultPrice = $giaList[0];
                    // Hiển thị giá mặc định
                    echo number_format($defaultPrice) . " VNĐ";
                } else {
                    // Nếu không có dữ liệu, hiển thị thông báo lỗi
                    echo "Thông tin không có sẵn.";
                }
                ?>
            </h2>
            <p class="mt-3">Dung Lượng</p>
            <div class="d-flex">
                <?php
                // Kiểm tra và hiển thị các nút dung lượng với giá tương ứng
                if (count($dungLuongList) === count($giaList)) {
                    foreach ($dungLuongList as $index => $dungLuong) {
                        $price = $giaList[$index];
                        // Kiểm tra xem dung lượng này có phải là mặc định hay không, nếu có thêm lớp 'active'
                        $activeClass = ($dungLuong == $defaultDungLuong) ? 'active' : '';
                        echo '<button class="btn custom-btn me-2 dung-luong-btn my-3 ' . $activeClass . '"
                            data-price="' . $price . '"
                            data-dungLong="' . $dungLuong . '"
                            onclick="updatePrice(this)">
                          ' . $dungLuong . '
                      </button>';
                    }
                } else {
                    echo '<p class="text-danger">Dữ liệu dung lượng và giá không khớp.</p>';
                }
                ?>
            </div>
            <!-- Đổ dữ liệu cho màu -->
            <?php
            $colorCodes = explode(',', $detailProducts['maMau']);
            $colorNames = array_map('trim', explode(',', $detailProducts['tenMau']));
            $colors = array_combine($colorCodes, $colorNames);
            ?>
            <div class="d-flex">
                <?php foreach ($colors as $code => $name): ?>
                    <?php
                    $defaultColorCode = array_key_first($colors);
                    // $defaultColorCode = array_key_first($colors);
                    $defaultColorName = $colors[$defaultColorCode];
                    ?>
                    <button
                        class="btn rounded-circle me-2"
                        style="width: 40px; height: 40px; background-color: #<?php echo $code; ?>"
                        onclick="showColorName('<?php echo $name; ?>')">
                    </button>

                <?php endforeach; ?>
            </div>
            <p class="fw-bold mt-3">Màu: <span id="colorNameDisplay"><?php echo $defaultColorName ?></span></p>
            <!-- khuyến mãi -->
            <div class="mt-4 voucher">
                <p class="fw-bold">Khuyến mãi</p>
                <p>
                    <?php echo $vouchers['ten_chuongTrinh'] ?> <br>
                    ngày bắt đầu : <?php echo $vouchers['ngayBatDau'] ?> <br>
                    ngày kết thúc :<?php echo $vouchers['ngayKetThuc'] ?> <br>
                    Trạng thái : <?php echo $vouchers['trangThai'] ?>
                </p>
                <hr>
                <p>.Nhập mã <?php echo $vouchers['ma_giamGia'] ?> để được giảm <?php echo $vouchers['soTienGiamGia'] ?>VNĐ <br> áp dụng cho những đơn hàng trên <?php echo $vouchers['soTienToiThieu'] ?>VNĐ</p>
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
    </div>
</div>
<script>
    function updatePrice(button) {
        const selectedPrice = button.getAttribute('data-price');
        const selectedCapacity = button.getAttribute('data-dungLong');
        document.getElementById('priceProductVariant').innerText = `${parseInt(selectedPrice).toLocaleString()} VNĐ`;
        document.getElementById('productTitle').innerText = `<?php echo $detailProducts['ten_sanPham']; ?> ${selectedCapacity}`;
        document.querySelectorAll('.dung-luong-btn').forEach(btn => btn.classList.remove('active'));
        button.classList.add('active');
    }

    function showColorName(colorName, button) {
        const defaultColor = document.getElementById('colorNameDisplay').innerText;
        if (defaultColor !== colorName) {
            document.getElementById('colorNameDisplay').innerText = '';
        }
        document.getElementById('colorNameDisplay').innerText = colorName;
    }
</script>
<!-- thông số và bình luận -->
<div class="bg-white">
    <div class="container">
        <div class="my-4 text-center">
            <a href="./?act=detailProduct&id=<?= htmlspecialchars($_GET['id'] ?? 0) ?>"><button class="mt-5 btn btn-outline-secondary rounded w-25 text-muted hover-border-primary">Thông số kỹ thuật</button></a>
            <a href="./?act=commentProduct&id_sanpham=<?= htmlspecialchars($_GET['id'] ?? 0) ?>"><button class="mt-5 btn btn-outline-secondary rounded w-25 text-muted hover-border-primary ms-3">Đánh giá sản phẩm</button></a>
        </div>

        <!-- Sử dụng d-flex và justify-content-center để căn giữa -->
        <div class="d-flex justify-content-center">
            <div class="accordion" id="specAccordion" style="width: 80%; max-width: 900px;">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne">
                            Cấu hình & bộ nhớ
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show">
                        <div class="accordion-body">
                            <div class="d-flex flex-column">
                                <div class="row mb-2">
                                    <div class="col-6">
                                        <p class="fw-bold mb-0">Hệ điều hành:</p>
                                    </div>
                                    <div class="col-6">
                                        <p class="mb-0">iOS 18</p>
                                    </div>
                                </div>
                                <hr> <!-- Thêm thẻ hr -->

                                <div class="row mb-2">
                                    <div class="col-6">
                                        <p class="fw-bold mb-0">Chip xử lý (CPU):</p>
                                    </div>
                                    <div class="col-6">
                                        <p class="mb-0">Apple A18 Pro 6 nhân</p>
                                    </div>
                                </div>
                                <hr> <!-- Thêm thẻ hr -->

                                <div class="row mb-2">
                                    <div class="col-6">
                                        <p class="fw-bold mb-0">Tốc độ CPU:</p>
                                    </div>
                                    <div class="col-6">
                                        <p class="mb-0">Hãng không công bố</p>
                                    </div>
                                </div>
                                <hr> <!-- Thêm thẻ hr -->

                                <div class="row mb-2">
                                    <div class="col-6">
                                        <p class="fw-bold mb-0">RAM:</p>
                                    </div>
                                    <div class="col-6">
                                        <p class="mb-0">8GB</p>
                                    </div>
                                </div>
                                <hr> <!-- Thêm thẻ hr -->

                                <div class="row mb-2">
                                    <div class="col-6">
                                        <p class="fw-bold mb-0">Dung lượng lưu trữ:</p>
                                    </div>
                                    <div class="col-6">
                                        <p class="mb-0">256GB/512GB/1TB</p>
                                    </div>
                                </div>
                                <hr> <!-- Thêm thẻ hr -->

                                <div class="row mb-2">
                                    <div class="col-6">
                                        <p class="fw-bold mb-0">Khe cắm thẻ nhớ:</p>
                                    </div>
                                    <div class="col-6">
                                        <p class="mb-0">Không</p>
                                    </div>
                                </div>
                                <hr> <!-- Thêm thẻ hr -->
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo">
                                Camera & Màn Hình
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse">
                            <div class="accordion-body">
                                <div class="d-flex align-items-center">
                                    <p class="fw-bold mb-0" style="width: 200px;">Độ phân giải camera sau:</p>
                                    <p class="mb-0 ms-2">Chính 48 MP & Phụ 48 MP, 12 MP</p>
                                </div>
                                <hr>
                                <div class="d-flex align-items-center">
                                    <p class="fw-bold mb-0" style="width: 200px;">Quay phim camera sau:</p>
                                    <p class="mb-0 ms-2">HD 720p@30fps, 4K 2160p@60fps, etc.</p>
                                </div>
                                <hr>
                                <div class="d-flex align-items-center">
                                    <p class="fw-bold mb-0" style="width: 200px;">Đèn flash camera sau:</p>
                                    <p class="mb-0 ms-2">Có</p>
                                </div>
                                <hr>
                                <div class="d-flex align-items-center">
                                    <p class="fw-bold mb-0" style="width: 200px;">Độ phân giải camera trước:</p>
                                    <p class="mb-0 ms-2">12 MP</p>
                                </div>
                                <hr>
                                <div class="d-flex align-items-center">
                                    <p class="fw-bold mb-0" style="width: 200px;">Công Nghệ màn hình:</p>
                                    <p class="mb-0 ms-2">OLED</p>
                                </div>
                                <hr>
                                <div class="d-flex align-items-center">
                                    <p class="fw-bold mb-0" style="width: 200px;">Độ phân giải màn hình:</p>
                                    <p class="mb-0 ms-2">Super Retina XDR (1206 x 2622 Pixels)</p>
                                </div>
                                <hr>
                                <div class="d-flex align-items-center">
                                    <p class="fw-bold mb-0" style="width: 200px;">Màn hình rộng:</p>
                                    <p class="mb-0 ms-2">6.3" - Tần số quét 120 Hz</p>
                                </div>
                                <hr>
                                <div class="d-flex align-items-center">
                                    <p class="fw-bold mb-0" style="width: 200px;">Mặt kính cảm ứng:</p>
                                    <p class="mb-0 ms-2">Kính cường lực Ceramic Shield</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Pin & Sạc -->
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree">
                                Pin & Sạc
                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse">
                            <div class="accordion-body">
                                <div class="d-flex align-items-center">
                                    <p class="fw-bold mb-0" style="width: 200px;">Dung lượng pin:</p>
                                    <p class="mb-0 ms-2">27 giờ</p>
                                </div>
                                <hr>
                                <div class="d-flex align-items-center">
                                    <p class="fw-bold mb-0" style="width: 200px;">Loại:</p>
                                    <p class="mb-0 ms-2">Li-Ion</p>
                                </div>
                                <hr>
                                <div class="d-flex align-items-center">
                                    <p class="fw-bold mb-0" style="width: 200px;">Hỗ trợ sạc tối đa:</p>
                                    <p class="mb-0 ms-2">20 W</p>
                                </div>
                                <hr>
                                <div class="d-flex align-items-center">
                                    <p class="fw-bold mb-0" style="width: 200px;">Công nghệ pin:</p>
                                    <p class="mb-0 ms-2">Tiết kiệm pin, Sạc nhanh, Sạc ngược qua cáp, Sạc không dây MagSafe</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Tiện ích -->
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingFour">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour">
                                Tiện ích
                            </button>
                        </h2>
                        <div id="collapseFour" class="accordion-collapse collapse">
                            <div class="accordion-body">
                                <div class="d-flex align-items-center">
                                    <p class="fw-bold mb-0" style="width: 200px;">Bảo mật nâng cao:</p>
                                    <p class="mb-0 ms-2">Mở khoá khuôn mặt Face ID</p>
                                </div>
                                <hr>
                                <div class="d-flex align-items-center">
                                    <p class="fw-bold mb-0" style="width: 200px;">Tính năng đặc biệt:</p>
                                    <p class="mb-0 ms-2">Âm thanh Dolby Atmos, Phát hiện va chạm, Màn hình luôn hiển thị AOD, HDR10+</p>
                                </div>
                                <hr>
                                <div class="d-flex align-items-center">
                                    <p class="fw-bold mb-0" style="width: 200px;">Kháng nước, bụi:</p>
                                    <p class="mb-0 ms-2">IP68</p>
                                </div>
                                <hr>
                                <div class="d-flex align-items-center">
                                    <p class="fw-bold mb-0" style="width: 200px;">Ghi âm:</p>
                                    <p class="mb-0 ms-2">Có</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Kết nối -->
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingFive">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive">
                                Kết nối
                            </button>
                        </h2>
                        <div id="collapseFive" class="accordion-collapse collapse">
                            <div class="accordion-body">
                                <div class="d-flex align-items-center">
                                    <p class="fw-bold mb-0" style="width: 200px;">Mạng di động:</p>
                                    <p class="mb-0 ms-2">Hỗ trợ 5G</p>
                                </div>
                                <hr>
                                <div class="d-flex align-items-center">
                                    <p class="fw-bold mb-0" style="width: 200px;">SIM:</p>
                                    <p class="mb-0 ms-2">1 Nano SIM & 1 eSIM</p>
                                </div>
                                <hr>
                                <div class="d-flex align-items-center">
                                    <p class="fw-bold mb-0" style="width: 200px;">Wifi:</p>
                                    <p class="mb-0 ms-2">Wi-Fi MIMO-Wi-Fi 7</p>
                                </div>
                                <hr>
                                <div class="d-flex align-items-center">
                                    <p class="fw-bold mb-0" style="width: 200px;">Bluetooth:</p>
                                    <p class="mb-0 ms-2">v5.3</p>
                                </div>
                                <hr>
                                <div class="d-flex align-items-center">
                                    <p class="fw-bold mb-0" style="width: 200px;">Cổng kết nối/sạc:</p>
                                    <p class="mb-0 ms-2">Type-C</p>
                                </div>
                                <hr>
                                <div class="d-flex align-items-center">
                                    <p class="fw-bold mb-0" style="width: 200px;">Jack tai nghe:</p>
                                    <p class="mb-0 ms-2">Type-C</p>
                                </div>
                                <hr>
                                <div class="d-flex align-items-center">
                                    <p class="fw-bold mb-0" style="width: 200px;">Kết nối khác:</p>
                                    <p class="mb-0 ms-2">NFC</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Thiết Kế & Chất Liệu -->
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingSix">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix">
                                Thiết Kế & Chất liệu
                            </button>
                        </h2>
                        <div id="collapseSix" class="accordion-collapse collapse">
                            <div class="accordion-body">
                                <div class="d-flex align-items-center">
                                    <p class="fw-bold mb-0" style="width: 200px;">Chất liệu:</p>
                                    <p class="mb-0 ms-2">Nhôm, Kính</p>
                                </div>
                                <hr>
                                <div class="d-flex align-items-center">
                                    <p class="fw-bold mb-0" style="width: 200px;">Kích thước:</p>
                                    <p class="mb-0 ms-2">146.7 x 70.9 x 7.4 mm</p>
                                </div>
                                <hr>
                                <div class="d-flex align-items-center">
                                    <p class="fw-bold mb-0" style="width: 200px;">Trọng lượng:</p>
                                    <p class="mb-0 ms-2">174 gram</p>
                                </div>
                                <hr>
                                <div class="d-flex align-items-center">
                                    <p class="fw-bold mb-0" style="width: 200px;">Màu sắc:</p>
                                    <p class="mb-0 ms-2">Đen, Trắng, Vàng</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
</div>
<!-- footer -->
<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/baseDuanpoly/app/views/users/layout/footter.php'; ?>
<!-- footer -->