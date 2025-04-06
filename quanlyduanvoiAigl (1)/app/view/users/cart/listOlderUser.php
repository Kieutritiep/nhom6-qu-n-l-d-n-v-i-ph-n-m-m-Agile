<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/baseDuanpoly/app/views/users/layout/header.php';
?>
<style>
.nav-link.active {
    background-color: #007bff;
    color: white;
}
</style>

<!-- Start Banner -->
<div class="container my-5 p-4 bg-white rounded border shadow-sm" style="max-width: 1020px;">
    <div class="bg-light py-3 text-center rounded-top">
        <h4 class="m-0">Đơn hàng của bạn</h4>
    </div>
    <!-- Danh sách đơn hàng -->
    <div class="container my-4">
        <div class="card bg-light">
            <div class="card-body p-3">
                <ul class="nav nav-pills justify-content-center">
                    <li class="nav-item">
                        <a class="nav-link <?php echo ($_GET['act'] == 'listOrderUser') ? 'active' : ''; ?>"
                            href="./?act=listOrderUser&id=<?php echo $_SESSION['id_khachHang'] ?>">Tất cả</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo ($_GET['act'] == 'ordered') ? 'active' : ''; ?>"
                            href="./?act=ordered&id=<?php echo $_SESSION['id_khachHang'] ?>">Đã đặt hàng</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo ($_GET['act'] == 'waiting_for_delivery') ? 'active' : ''; ?>"
                            href="./?act=waiting_for_delivery&id=<?php echo $_SESSION['id_khachHang'] ?>">Chờ giao</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo ($_GET['act'] == 'are_delivering') ? 'active' : ''; ?>"
                            href="./?act=are_delivering&id=<?php echo $_SESSION['id_khachHang'] ?>">Đang giao</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo ($_GET['act'] == 'delivered') ? 'active' : ''; ?>"
                            href="./?act=delivered&id=<?php echo $_SESSION['id_khachHang'] ?>">Đã giao</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo ($_GET['act'] == 'canceled') ? 'active' : ''; ?>"
                            href="./?act=canceled&id=<?php echo $_SESSION['id_khachHang'] ?>">Đã hủy</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>


    <?php if (!empty($listOrdersUsers)) : ?>
    <table class="table table-bordered table-hover table-striped mt-4">
        <thead class="table-dark text-center">
            <tr>
                <th>STT</th>
                <th>Mã đơn hàng</th>
                <th>Ngày đặt hàng</th>
                <th>Tổng tiền</th>
                <th>Hình thức thanh toán</th>
                <th>Trạng thái</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($listOrdersUsers as $key => $listOrdersUser) : ?>
            <tr>
                <td class="text-center align-middle"><?php echo ++$key; ?></td>
                <td class="text-center align-middle"><?php echo htmlspecialchars($listOrdersUser['ma_hoa_don']); ?></td>
                <td class="text-center align-middle"><?php echo htmlspecialchars($listOrdersUser['ngayDatHang']); ?>
                </td>
                <td class="text-end align-middle"><?php echo number_format($listOrdersUser['tongTien']); ?>đ</td>
                <td class="text-center align-middle">
                    <?php echo htmlspecialchars($listOrdersUser['hinhThucThanhToan']); ?></td>
                <td class="text-center align-middle"><?php echo htmlspecialchars($listOrdersUser['trangThai']); ?></td>
                <td class="text-center align-middle">
                    <a href="./?act=detailCart&id=<?php echo htmlspecialchars($listOrdersUser['id_donhang']); ?>"
                        class="btn btn-info" style="width:70px">
                        <i class="fa-solid fa-eye"></i>
                    </a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php else : ?>
    <!-- Thông báo nếu không có đơn hàng -->
    <div class="text-center my-4">
        <p class="text-muted">Không có đơn hàng nào!</p>
    </div>
    <?php endif; ?>

    <!-- Nút quay về trang chủ -->
    <div class="text-center mt-4">
        <a href="./?act=/" class="btn btn-outline-primary" style="color: black;">
            <i class="fa-solid fa-home"></i> Về trang chủ iPhone Lux
        </a>
    </div>
</div>

<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/baseDuanpoly/app/views/users/layout/footter.php';
?>