<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/baseDuanpoly/app/views/users/layout/header.php';
?>

<?php 
$orderStartus = [
    'Chờ vận chuyển' => 1,
    'Đang giao' => 2,
    'Đã giao' => 3,
];

function getStatusClass($currentOrder, $order) {
    return ($currentOrder >= $order) ? 'bg-warning' : 'bg-secondary';
}

$currentStatus = $detailOrdersUsers['products'][0]['trangThai'];
$currentOrder = $orderStartus[$currentStatus] ?? 0; 
// var_dump($currentStatus); die();
?>

<!-- start Banner -->
<div class="container my-5 p-4" style="max-width: 820px; background-color: #fff; border-radius: 10px; border: 2px solid #F5F5F7;">
  <?php if($currentStatus != 'Đã hủy'){?>
    <div class="lock bg-light py-3 text-center rounded-top d-flex align-items-center justify-content-center" style="height: 50px;">
      <img src="./public/images/older.png" style="width:30px; height:auto;" alt="...">
      <strong class="ms-2">Đặt hàng thành công</strong>
    </div>
  <?php } ?>
    
    <?php if($currentStatus != 'Đã hủy'){?>
        <p class="fw-semibold mt-3 ml-3">Cảm ơn <span class="fw-bold">
        <?php
            $gender = $detailOrdersUsers['address']['gioiTinh'] === 'Nam' ? 'Anh' : 'Chị'; 
            echo $gender . ' ' . $detailOrdersUsers['address']['hoVaTen']; 
        ?></span> đã cho iPhone Lux cơ hội phục vụ</p>
    <?php }?>

    <!-- Các phần khác của trang đơn hàng -->
    <div class="container py-5">
        <div class="d-flex justify-content-between align-items-center position-relative">
            <div class="position-absolute top-50 start-0 translate-middle-y w-100" style="height: 2px; background-color: #6c757d; z-index: 0;"></div>
            <?php if($currentStatus != 'Đã hủy'){?>
                <!-- Trạng thái: Đã đặt hàng -->
                <div class="text-center position-relative bg-white px-2" style="z-index: 1;">
                    <div class="rounded-circle bg-success text-white d-flex justify-content-center align-items-center mx-auto" style="width: 60px; height: 60px;">
                        <i class="fa-solid fa-box-open"></i>
                    </div>
                    <div class="mt-2 small fw-bold">Đã đặt hàng</div>
                </div>
                <!-- Trạng thái chờ vận chuyển, đang giao và đã giao -->

                <!-- trạng thái chờ vận chuyển -->
                <div class="text-center position-relative bg-white px-2" style="z-index: 1;">
                    <div class="rounded-circle <?php echo getStatusClass($currentOrder, $orderStartus['Chờ vận chuyển']) ?> text-white d-flex justify-content-center align-items-center mx-auto" style="width: 60px; height: 60px;">
                        <i class="fa-solid fa-clock"></i>
                    </div>
                    <div class="mt-2 small fw-bold">
                        <?php echo ($currentOrder >= $orderStartus['Chờ vận chuyển']) ? 'Chờ vận chuyển' : ''; ?>
                    </div>
                </div>

                <!-- Trạng thái: Đang giao -->
                <div class="text-center position-relative bg-white px-2" style="z-index: 1;">
                    <div class="rounded-circle <?php echo getStatusClass($currentOrder, $orderStartus['Đang giao']) ?> text-white d-flex justify-content-center align-items-center mx-auto" style="width: 60px; height: 60px;">
                        <i class="fa-solid fa-truck"></i>
                    </div>
                    <div class="mt-2 small fw-bold">
                        <?php echo ($currentOrder >= $orderStartus['Đang giao']) ? 'Đang giao' : ''; ?>
                    </div>
                </div>

                <!-- Trạng thái: Đã giao -->
                <div class="text-center position-relative bg-white px-2" style="z-index: 1;">
                    <div class="rounded-circle <?php echo getStatusClass($currentOrder, $orderStartus['Đã giao']) ?> text-white d-flex justify-content-center align-items-center mx-auto" style="width: 60px; height: 60px;">
                        <i class="fa-solid fa-clipboard-check"></i>
                    </div>
                    <div class="mt-2 small fw-bold">
                        <?php echo ($currentOrder >= $orderStartus['Đã giao']) ? 'Đã giao' : ''; ?>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>

    <?php if($currentStatus != 'Đã hủy'){ ?>
    <div class="p-3 mb-3 bg-light rounded">
        <p><strong>Mã đơn hàng :</strong><span class="text-primary fw-bold"><?php echo ' '.$detailOrdersUsers['address']['ma_hoa_don'] ?></span></p>
        <p><strong>Người nhận :</strong> <?php echo ' '. $detailOrdersUsers['address']['hoVaTen']; ?></p>
        <p><strong>Giao đến :</strong><?php echo ' '.$detailOrdersUsers['address']['diaChiChiTiet']; ?></p>
        <p><strong>Tổng tiền :</strong> <?php echo ' '. number_format($detailOrdersUsers['products'][0]['tongTien'], 0, ',', '.'); ?>VNĐ</p>
        <p><strong>Phương thức thanh toán :</strong> <?php echo ' '.$detailOrdersUsers['products'][0]['hinhThucThanhToan'] ?></p>
        <?php 
        if (
            $currentOrder === $orderStartus['Chờ vận chuyển'] || 
            $currentOrder === $orderStartus['Đang giao'] || 
            $currentOrder === $orderStartus['Đã giao']
        ) {
        ?>
            <button class="btn btn-outline-danger btn-sm" disabled>Hủy</button>
        <?php
        } else {
          ?>
           <button class="btn btn-secondary btn-sm" onclick="showCancelReason()">Hủy</button>
        <?php
        }
        ?>
    </div>
    <?php } ?>

    <?php 
    if($currentStatus == 'Đã hủy'){ ?>
        <div class="alert alert-warning text-center font-weight-bold" role="alert">Đơn hàng đã bị hủy</div>
        <p class="fw-bold">Lý do bị hủy : <?php echo $detailOrdersUsers['products'][0]['lyDoHuy']; ?></p>
    <?php } else if($currentStatus == 'Đã giao'){ ?>
        <div class="alert alert-success text-center font-weight-bold" role="alert">
            Đã thanh toán khi nhận hàng
        </div>
    <?php } else { ?>
        <div class="alert alert-warning text-center font-weight-bold" role="alert">
            Đơn hàng chưa được thanh toán
        </div>
    <?php } ?>

    <p class="text-center">Khi cần hỗ trợ vui lòng gọi<strong class="text-danger">1900969642</strong> (8h00-21h30)</p>
    <hr>

    <?php if($currentStatus != 'Đã hủy' && $currentStatus != 'Đã giao' ){ ?>
        <div class="d-flex">
            <span class="fw-bold">Thời gian nhận hàng :</span>
            <p>Từ 3-5 ngày kể từ ngày đặt hàng</p>
        </div>
    <?php }?>

    <?php foreach ($detailOrdersUsers['products'] as $product) { ?>
    <div class="product-info row align-items-center p-3 mt-3 border rounded shadow-sm">
        <div class="col-12 col-md-3 text-center">
            <img src="<?php echo $product['file_anh']; ?>" alt="Product Image" class="img-fluid rounded" style="max-width: 120px; height: auto; object-fit: cover;">
        </div>
        <div class="col-12 col-md-9">
            <h5 class="fw-bold mb-2"><?php echo $product['ten_sanPham']; ?></h5>
            <p class="mb-2"><strong>Giá:</strong> <?php echo number_format($product['gia'], 0, ',', '.'); ?> VNĐ</p>
            <p class="mb-2"><strong>Màu:</strong> <?php echo $product['mauSac']; ?></p>
            <p class="mb-2"><strong>Dung lượng:</strong> <?php echo $product['dungLuong']; ?></p>
            <p class="mb-2"><strong>Số lượng:</strong> <?php echo $product['soLuong']; ?></p>
        </div>
    </div>
    <?php } ?>

    <div class="text-center mt-4">
        <a href="./?act=/"><button class="btn btn-outline-primary " style="color: black;">Về trang chủ iPhone Lux</button></a>
    </div>
</div>

<div id="cancel-reason-overlay" class="modal-overlay" style="display: none;"></div>
<div id="cancel-reason-modal" class="modal" style="display: none;">
    <div class="modal-dialog modal-lg"> 
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title">Lý do hủy đơn hàng</h5>
            </div>
            <div class="modal-body">
                <form action="./?act=submitCancel_order" method="POST">
                    <input type="hidden" name="trangThai" value="Đã hủy">
                    <input type="hidden" name="idOrder" value="<?php echo $detailOrdersUsers['products'][0]['id_donHang']; ?>">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="cancel_reason" id="reason1" value="Cần thay đổi phương thức thanh toán" required>
                        <label class="form-check-label" for="reason1">Cần thay đổi phương thức thanh toán</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="cancel_reason" id="reason2" value="Không còn nhu cầu">
                        <label class="form-check-label" for="reason2">Không còn nhu cầu</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="cancel_reason" id="reason3" value="Chi phí ngày càng cao">
                        <label class="form-check-label" for="reason3">Chi phí ngày càng cao</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="cancel_reason" id="reason4" value="Có giá tốt hơn">
                        <label class="form-check-label" for="reason4">Có giá tốt hơn</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="cancel_reason" id="reason5" value="Cần thay đổi địa chỉ này">
                        <label class="form-check-label" for="reason5">Cần thay đổi địa chỉ này</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="cancel_reason" id="reason6" value="Nhà bán hàng không trả lời thắc mắc">
                        <label class="form-check-label" for="reason6">Nhà bán hàng không trả lời thắc mắc</label>
                    </div>
                    <div class="text-center mt-4">
                        <button type="submit" class="btn btn-danger">Gửi</button>
                        <button type="button" class="btn btn-secondary" onclick="hideCancelReason()">Hủy</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
function showCancelReason() {
    document.getElementById('cancel-reason-modal').style.display = 'block';
    document.getElementById('cancel-reason-overlay').style.display = 'block'; 
}

function hideCancelReason() {
    document.getElementById('cancel-reason-modal').style.display = 'none';
    document.getElementById('cancel-reason-overlay').style.display = 'none'; 
}
</script>

<style>
    .modal-overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5); 
        z-index: 999;
    }
    .modal-lg {
        max-width: 800px; 
    }
    .modal-content {
        border-radius: 10px;
    }
</style>

<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/baseDuanpoly/app/views/users/layout/footter.php';
?> 
