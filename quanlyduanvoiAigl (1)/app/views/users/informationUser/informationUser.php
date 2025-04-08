<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/baseDuanpoly/app/views/users/layout/header.php';
?>
<div class="container my-5 p-4"
    style="max-width: 820px; background-color: #fff; border-radius: 10px; border: 2px solid #F5F5F7;">
    <div class="row">
        <!-- Cột bên trái - Thông tin khách hàng -->
        <div class="col-md-6">
            <h5 class="mb-4">Thông tin khách hàng</h5>
            <form action="./?act=updateProfile" method="POST">
                <div class="info-box p-3 bg-light rounded shadow-sm">
                    <div class="mb-3">
                        <label for="ten_khachHang" class="form-label">Họ và tên</label>
                        <input type="text" class="form-control" id="ten_khachHang" name="ten_khachHang"
                            value="<?php echo $getUser['ten_khachHang']; ?>" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email"
                            value="<?php echo $getUser['email']; ?>" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="soDienThoai" class="form-label">Số điện thoại</label>
                        <input type="text" class="form-control" id="soDienThoai" name="soDienThoai"
                            value="<?php echo $getUser['soDienThoai']; ?>" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="ngayDangKi" class="form-label">Ngày tham gia</label>
                        <input type="text" class="form-control" id="ngayDangKi" name="ngayDangKi"
                            value="<?php echo $getUser['ngayDangKi']; ?>" disabled>
                    </div>
                    <!-- Không cho phép cập nhật thông tin ở đây -->
                </div>
            </form>
        </div>

        <!-- Cột bên phải - Form đổi mật khẩu -->
        <div class="col-md-6">
            <h5 class="mb-4">Đổi mật khẩu</h5>
            <form action="./?act=changePassword" method="POST">
                <div class="mb-3">
                    <label for="current_password" class="form-label">Mật khẩu hiện tại</label>
                    <input type="password" class="form-control" id="current_password" name="current_password" required>
                </div>
                <div class="mb-3">
                    <label for="new_password" class="form-label">Mật khẩu mới</label>
                    <input type="password" class="form-control" id="new_password" name="new_password" required>
                </div>
                <div class="mb-3">
                    <label for="confirm_password" class="form-label">Xác nhận mật khẩu mới</label>
                    <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
                </div>
                <button type="submit" class="btn btn-primary">Đổi mật khẩu</button>
            </form>
        </div>
    </div>
</div>
<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/baseDuanpoly/app/views/users/layout/footter.php';
?>