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
    }

    /* Màu mặc định của nút dung lượng */
    .dung-luong-btn {
        background-color: #2E2E2E;
        color: white;
        border: none;
        padding: 10px 20px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .dung-luong-btn.active {
        background-color: #1F1F20;
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
                    <?php
                    $list_images = explode(',', $detailProducts['file_anh']);
                    foreach ($list_images as $index => $image):
                    ?>
                        <button type="button" data-bs-target="#phoneCarousel" data-bs-slide-to="<?php echo $index; ?>" class="<?php echo $index === 0 ? 'active' : ''; ?>" aria-current="<?php echo $index === 0 ? 'true' : 'false'; ?>" aria-label="Slide <?php echo $index + 1; ?>"></button>
                    <?php endforeach; ?>
                </div>
                <!-- Slides -->
                <div class="carousel-inner">
                    <?php
                    $isActive = true;
                    foreach ($list_images as $image): ?>
                        <div class="carousel-item <?php echo $isActive ? 'active' : ''; ?>">
                            <img src="<?php echo trim($image); ?>" alt="Product Image" class="d-block w-100 img-fluid">
                        </div>
                        <?php $isActive = false; ?>
                    <?php endforeach; ?>
                </div>

                <!-- Controls -->
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
            <form action="./?act=addCart" method="post">
                <?php
                // Tách danh sách dung lượng, giá và số lượng
                $dungLuongList = isset($detailProducts['dungLuong']) ? explode(',', $detailProducts['dungLuong']) : [];
                $giaList = isset($detailProducts['giaBienThe']) ? explode(',', $detailProducts['giaBienThe']) : [];
                $quantityList = isset($detailProducts['soLuong']) ? explode(',', $detailProducts['soLuong']) : [];

                // Tách danh sách màu sắc
                $colorCodes = explode(',', $detailProducts['maMau']);
                $colorNames = array_map('trim', explode(',', $detailProducts['tenMau']));
                $colors = array_combine($colorCodes, $colorNames);

                // Ghép số lượng với mã màu
                $colorQuantities = array_combine(array_keys($colors), $quantityList);

                // Xác định giá trị mặc định
                $defaultDungLuong = $dungLuongList[0] ?? '';
                $defaultPrice = $giaList[0] ?? 0;
                $defaultColorCode = array_key_first($colors);
                $defaultColorName = $colors[$defaultColorCode] ?? 'Không xác định';
                $defaultQuantity = $colorQuantities[$defaultColorCode] ?? 0;
                ?>

                <!-- Hiển thị tên sản phẩm và giá mặc định -->
                <h1 id="productTitle"><?php echo $detailProducts['ten_sanPham'] . ' ' . $defaultDungLuong; ?></h1>
                <h2 id="priceProductVariant"><?php echo number_format($defaultPrice) . " VNĐ"; ?></h2>
                <p class="fw-bold mt-3">Số lượng: <span id="colorQuantityDisplay"><?php echo $defaultQuantity; ?></span></p>

                <!-- Dung lượng -->
                <p class="mt-3">Dung Lượng</p>
                <div class="d-flex">
                    <?php
                    if (count($dungLuongList) === count($giaList)) {
                        foreach ($dungLuongList as $index => $dungLuong) {
                            $price = $giaList[$index];
                            $activeClass = ($dungLuong == $defaultDungLuong) ? 'active' : '';
                            echo '<button class="btn custom-btn me-2 dung-luong-btn my-3 mt-2 ' . $activeClass . '"
                            data-price="' . $price . '"
                            data-dungLuong="' . $dungLuong . '"
                            onclick="updatePrice(this, event)">
                            ' . $dungLuong . '
                        </button>';
                        }
                    } else {
                        echo '<p class="text-danger">Dữ liệu dung lượng và giá không khớp.</p>';
                    }
                    ?>
                </div>

                <!-- Màu sắc -->
                <p class="mt-2">Chọn Màu</p>
                <div class="d-flex">
                    <?php foreach ($colors as $code => $name): ?>
                        <button
                            class="btn rounded-circle me-2"
                            style="width: 40px; height: 40px; background-color: #<?php echo $code; ?>"
                            data-quantity="<?php echo $colorQuantities[$code] ?? 0; ?>"
                            onclick="showColorInfo('<?php echo $name; ?>', '<?php echo $colorQuantities[$code] ?? 0; ?>', event)">
                        </button>
                    <?php endforeach; ?>
                </div>
                <p class="fw-bold mt-3">Màu: <span id="colorNameDisplay"><?php echo $defaultColorName; ?></span></p>

                <!-- Khuyến mãi -->
                <div class="mt-4 voucher">
                    <p class="fw-bold">Khuyến mãi</p>
                    <p>
                        <?php echo $vouchers['ten_chuongTrinh']; ?> <br>
                        Ngày bắt đầu: <?php echo $vouchers['ngayBatDau']; ?> <br>
                        Ngày kết thúc: <?php echo $vouchers['ngayKetThuc']; ?> <br>
                        Trạng thái: <?php echo $vouchers['trangThai']; ?>
                    </p>
                    <hr>
                    <p>
                        Nhập mã <strong><?php echo $vouchers['ma_giamGia']; ?></strong> để được giảm <strong><?php echo number_format($vouchers['soTienGiamGia']); ?> VNĐ</strong> <br>
                        Áp dụng cho những đơn hàng trên <strong><?php echo number_format($vouchers['soTienToiThieu']); ?> VNĐ</strong>
                    </p>
                </div>

                <!-- Mua hàng -->
                <div class="d-flex mt-3">
                    <button type="submit" name="buyNow" class="btn btn-primary rounded-1">Mua ngay</button>
                    <button type="submit" name="addToCart" class="btn btn-secondary rounded-1 ms-2">Thêm vào giỏ hàng</button>
                </div>

                <!-- Các input ẩn để gửi dữ liệu lên server -->
                <input type="hidden" name="capacity" value="<?php echo $defaultDungLuong; ?>" id="inputDungLuong">
                <input type="hidden" name="color" value="<?php echo $defaultColorName; ?>" id="inputTenMau">
                <input type="hidden" name="id_sanPham" value="<?php echo $detailProducts['id_sanPham']; ?>">
                <input type="hidden" name="price" value="<?php echo $defaultPrice; ?>" id="inputPrice">
                <input type="hidden" name="userID" value="<?php echo $_SESSION['id_khachHang']; ?>">
            </form>
        </div>

        <script>
            // Cập nhật giá và dung lượng khi người dùng chọn dung lượng
            function updatePrice(button, event) {
                event.preventDefault();

                var dungLuong = button.getAttribute('data-dungLuong');
                var price = button.getAttribute('data-price');

                document.getElementById('productTitle').textContent = "<?php echo $detailProducts['ten_sanPham']; ?>" + ' ' + dungLuong;
                document.getElementById('priceProductVariant').textContent = new Intl.NumberFormat().format(price) + " VNĐ";

                document.getElementById('inputDungLuong').value = dungLuong;
                document.getElementById('inputPrice').value = price;
            }

            // Cập nhật tên màu và số lượng khi người dùng chọn màu
            function showColorInfo(colorName, quantity, event) {
                event.preventDefault();

                document.getElementById('colorNameDisplay').textContent = colorName;
                document.getElementById('colorQuantityDisplay').textContent = quantity;

                document.getElementById('inputTenMau').value = colorName;
            }
        </script>

    </div>
</div>
<!-- thông số và bình luận -->
<div class="bg-white">
    <div class="container">
        <div class="my-4 text-center">
            <a href="./?act=detailProduct&id=<?php echo $detailProducts['id_sanPham'] ?>"><button class="mt-5 btn btn-outline-secondary rounded w-25 text-muted hover-border-primary">Thông số kỹ thuật</button></a>
            <a href="./?act=commentProduct&id_sanpham=<?php echo $detailProducts['id_sanPham'] ?>"><button class="mt-5 btn btn-outline-secondary rounded w-25 text-muted hover-border-primary ms-3">Đánh giá sản phẩm</button></a>
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