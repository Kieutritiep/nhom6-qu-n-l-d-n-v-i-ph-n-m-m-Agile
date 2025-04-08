<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/baseDuanpoly/app/views/users/layout/header.php';
?>

<!-- start Banner -->
<div class="container my-5 p-4" style="max-width: 820px; background-color: #fff; border-radius: 10px; border: 2px solid #F5F5F7;">
    <div class="lock bg-light py-3 text-center rounded-top d-flex align-items-center justify-content-center" style="height: 50px;">
        <h4>Lịch sử đơn hàng</h4>
    </div>
    <?php if (!empty($historyOrderUsers)): ?>
        <table class="table table-bordered table-hover mt-4">
            <thead>
                <tr>
                    <th>Hình ảnh</th>
                    <th>Tên sản phẩm</th>
                    <th>Số lượng</th>
                    <th>Dung lượng</th>
                    <th>Màu sắc</th>
                    <th>Giá</th>
                    <th>Tổng tiền</th>
                    <th>Trạng thái</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($historyOrderUsers as $order): ?>
                    <tr>
                        <td class="text-center">
                            <img src="<?= htmlspecialchars($order['file_anh']) ?>" alt="Ảnh sản phẩm" style="max-width: 80px; height: auto;">
                        </td>
                        <td><?= htmlspecialchars($order['ten_sanPham']) ?></td>
                        <td class="text-center"><?= htmlspecialchars($order['soLuong']) ?></td>
                        <td><?= htmlspecialchars($order['dungLuong']) ?></td>
                        <td><?= htmlspecialchars($order['mauSac']) ?></td>
                        <td><?= number_format($order['gia'], 0, ',', '.') ?> VNĐ</td>
                        <td><?= number_format($order['tongTien'], 0, ',', '.') ?> VNĐ</td>
                        <td><?= htmlspecialchars($order['trangThai']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <div class="text-center mt-4">
            <p>Không có đơn hàng nào trong lịch sử!</p>
        </div>
    <?php endif; ?>
    
    <div class="text-center mt-4">
        <a href="/baseDuanpoly/app/views/users/index.php" class="btn btn-outline-primary" style="color: black;">Về trang chủ iPhone Lux</a>
    </div>
</div>

<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/baseDuanpoly/app/views/users/layout/footter.php';
?>
