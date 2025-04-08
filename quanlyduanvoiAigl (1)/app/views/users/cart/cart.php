<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/baseDuanpoly/app/views/users/layout/header.php';
?>
<?php if (isset($_SESSION['id_khachHang'])) { ?>
    <?php if (!empty($cartProducts)): ?>
    <?php foreach ($cartProducts as $cartProduct) { ?>
        <div class="card container p-3 mb-3" style="max-width: 800px;">
            <div class="d-flex gap-3">
                <img src="<?php echo $cartProduct['file_anh']; ?>" alt="<?php echo $cartProduct['ten_sanPham'];?>" class="rounded" style="width: 100px; height: 100px;">
                <div class="flex-grow-1">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <span class="fw-bold"><?php echo $cartProduct['ten_sanPham']; ?> <?php echo $cartProduct['dungLuong'] ?></span>
                        <div class="d-flex align-items-center gap-2">
                            <span class="fw-bold text-primary">
                                <?php echo number_format($cartProduct['gia']); ?><u>đ</u>
                            </span>
                            <a href="./?act=deteteCart&id=<?php echo $cartProduct['id_sanPham'] ?>&idUser=<?php echo $addressUser[0]['id_khachHang']?>&capacity=<?php echo $cartProduct['dungLuong']?>&color=<?php echo $cartProduct['mauSac']?>" class="text-decoration-none">
                                <button class="btn-close" aria-label="Close"></button>
                            </a>
                        </div>
                    </div>
                    <div class="d-flex flex-column align-items-start">
                        <span class="badge bg-secondary mb-2">
                            Màu: <?php echo isset($cartProduct['mauSac']) ? $cartProduct['mauSac'] : 'Chưa chọn'; ?>
                        </span>
                        <div class="mt-2">
                            <?php
                                $currentColors = [];
                                foreach ($colors as $colorData) {
                                    if ($colorData['id_sanPham'] == $cartProduct['id_sanPham']) {
                                        $currentColors = explode(',', $colorData['ten_mauSac']);
                                        break;
                                    }
                                }
                            ?>
                            <span class="d-block mb-2">Chọn màu khác:</span>
                            <select class="form-select color-select" name="color" id="color_<?php echo $cartProduct['id_sanPham']; ?>" 
                                    data-product-id="<?php echo $cartProduct['id_sanPham']; ?>" 
                                    style="width: 150px; height: 40px;">
                                <?php if (!empty($currentColors)): ?>
                                    <?php foreach ($currentColors as $color): ?>
                                        <option value="<?php echo trim($color); ?>" 
                                                <?php echo (trim($color) == $cartProduct['mauSac']) ? 'selected' : ''; ?>>
                                            <?php echo trim($color); ?>
                                        </option>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <option value="">Không có màu</option>
                                <?php endif; ?>
                            </select>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between align-items-center mt-3">
                        <p class="mb-0">Tạm tính: <span class="text-black"><?php echo $cartProduct['tongSoLuongSanPham']; ?></span> sản phẩm</p>
                        <div class="d-flex align-items-center gap-2">
                            <button class="btn btn-light text-black square-button" onclick="updateQuantity('decrease', <?php echo $cartProduct['id_sanPham']; ?>)">-</button>
                            <div class="square-border d-flex align-items-center justify-content-center">
                                <span id="quantity-<?php echo $cartProduct['id_sanPham']; ?>">1</span>
                            </div>
                            <button class="btn btn-light text-black square-button" onclick="updateQuantity('increase', <?php echo $cartProduct['id_sanPham']; ?>)">+</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
    <div class="card container p-4 mb-3" style="max-width: 800px;">
        <div class="card-body">
            <form action="./?act=order" method="post">
                <h5><b>Thông tin khách hàng</b></h5>
                <?php 
                    if($addressUser){
                        foreach($addressUser as $address){
                        ?>
                            <div>
                                <p>Tên khách hàng : <?php echo $address['hoVaTen']?></p>
                                <p>Số điện thoại : <?php echo $address['soDienTHoai']?></p>
                                <p>Địa chỉ : <?php echo $address['diaChiChiTiet']?></p>
                                <a href=""><button type="button" class="btn btn-secondary mt-2" style="width:150px; border-radius:8px;">Thay đổi địa chỉ</button></a>
                                <hr>
                            </div>
                        <?php
                    }
                }else{
                    ?>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="male" value="Anh">
                        <label class="form-check-label" for="male">Anh</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="female" value="Chị">
                        <label class="form-check-label" for="female">Chị</label>
                    </div>

                    <div class="row mt-3">
                        <div class="col">
                            <input class="form-control" type="text" name="nameUser" placeholder="Họ và Tên" required>
                        </div>
                        <div class="col">
                            <input class="form-control" type="text" name="phone" placeholder="Số điện thoại" required>
                        </div>
                    </div>
                    <h5 class="mt-4"><b>Địa chỉ người nhận</b></h5>
                    <div class="row">
                        <div class="col">
                            <input class="form-control" name="city" type="text" placeholder="Thành phố" required>
                        </div>
                        <div class="col">
                            <input class="form-control" name="district" type="text" placeholder="Huyện" required>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col">
                            <input class="form-control" name="commune" type="text" placeholder="Xã/Phường" required>
                        </div>
                        <div class="col">
                            <input class="form-control" name="detailAddress" type="text" placeholder="Nhập địa chỉ chi tiết" required>
                        </div>
                    </div>
                    <?php
                }
                ?>
                    <div class="mt-2">
                        <span class="my-2">Chọn phương thức thanh toán</span><br>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="pay" id="pay1" value="Thanh toán khi nhận hàng" required>
                                <label class="form-check-label" for="pay1">Thanh toán khi nhận hàng</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="pay" id="pay2" value="Thanh toán online">
                                <label class="form-check-label" for="pay2">Thanh toán online</label>
                            </div>
                    </div>
                    <div class="mt-2">
                        <input class="form-control" type="text" name="voucher" placeholder="Mã giảm giá (nếu có)">
                    </div>
                    <div class="mt-4">
                        <span>
                            <strong>Tổng tiền:</strong> <b class="text-danger">
                                <?php echo number_format($cartProduct['tongTienGioHang']); ?><u>đ</u>
                            </b>
                            <input type="hidden" name="totalPrice" value="<?php echo $cartProduct['tongTienGioHang']; ?>">
                        </span>
                        <hr>
                        <p class="mb-0 mb-2 text-red">Tổng : <span class="text-black"><?php echo $cartProduct['tongSoLuongGioHang']; ?></span> sản phẩm</p>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="agree" required>
                            <label class="form-check-label" for="agree">
                                Tôi đồng ý với Chính sách xử lý dữ liệu cá nhân của iPhone Lux
                            </label>
                        </div>
                    </div>
                <?php if (!empty($cartProducts)) : ?>
                    <?php foreach ($cartProducts as $cartProduct) { ?>
                        <input type="hidden" name="idProduct[]" value="<?php echo $cartProduct['id_sanPham']; ?>">
                        <input type="hidden" name="price[]" value="<?php echo $cartProduct['gia']; ?>">
                        <input type="hidden" name="capacity[]" value="<?php echo $cartProduct['dungLuong']; ?>">
                        <input type="hidden" name="color[]" value="<?php echo $cartProduct['mauSac']; ?>">
                        <input type="hidden" name="quantity[]" value="<?php echo $cartProduct['tongSoLuongSanPham']; ?>">
                    <?php } ?>
                <?php endif; ?>
                <input type="hidden" name="id_khachHang" value="<?php echo $_SESSION['id_khachHang']; ?>">
                <a href="./?act=deleteCart&id=<?php echo $_SESSION['id_khachHang']; ?>"><button class="btn btn-primary w-100 mt-4" style="border: 2px solid blueviolet;">Đặt hàng</button></a>
            </form>
        </div>
    </div>
    <?php else: ?>
        <div class="container text-center mt-5">
            <i class="fa-solid fa-cart-shopping fs-1 text-white"></i><hr>
            <span class="text-white">Giỏ hàng của bạn chưa có sản phẩm nào!</span>
        </div>
    <?php endif; ?>
    <?php } else { ?>
        <div>Cần đăng nhập để hiển thị giỏ hàng của bạn</div>
    <?php } ?>
<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/baseDuanpoly/app/views/users/layout/footter.php';
?>

<script>
function updateQuantity(action, productId) {
    const quantityElement = document.getElementById(`quantity-${productId}`);
    let quantity = parseInt(quantityElement.innerText);

    if (action === 'increase') {
        quantity++;
    } else if (action === 'decrease' && quantity > 1) {
        quantity--;
    }
    quantityElement.innerText = quantity;
}
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(".color-select").change(function() {
    const productId = $(this).data("product-id");  
    const selectedColor = $(this).val(); 
    const userId = <?php echo isset($_SESSION['id_khachHang']) ? $_SESSION['id_khachHang'] : 0; ?>;  
    
    console.log(productId, selectedColor, userId); 

    if (productId && selectedColor && userId) {
        $.ajax({
            url: "./?act=updateColorCart",  
            type: "POST",
            data: {
                id_sanPham: productId,
                mauSac: selectedColor,
                idUser: userId
            },
            success: function(response) {
                if (response.status === 'success') {
                    $("#color_" + productId).val(selectedColor);  
                    alert("Cập nhật màu sắc thành công!");
                } else {
                    console.error("Lỗi khi cập nhật: " + response.message);
                }
            },
            error: function(xhr, status, error) {
                console.error("Có lỗi xảy ra: ", error);
            }
        });
    } else {
        console.error("Thiếu tham số quan trọng");
    }
});
</script>




