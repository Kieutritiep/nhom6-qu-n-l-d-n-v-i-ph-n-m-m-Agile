<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/baseDuanpoly/app/views/users/layout/header.php';
?>
<body>
  <div class="container py-5 text-center">
    <!-- Icon trạng thái thành công -->
    <div class="d-inline-block">
      <div class="rounded-circle bg-success text-white d-flex justify-content-center align-items-center mx-auto" style="width: 100px; height: 100px;">
        <i class="fa-solid fa-check fa-3x"></i>
      </div>
    </div>
    <!-- Thông báo thành công -->
    <h2 class="mt-4 text-white fw-bold">Đặt hàng thành công</h2>
    <p class="text-white-50">Cảm ơn bạn đã mua hàng! Chúng tôi sẽ xử lý đơn hàng và giao hàng trong thời gian sớm nhất.</p>
    <!-- Nút quay lại trang chủ -->
    <a href="./?act=/" class="btn btn-primary mt-3" style="width:300px">Quay lại trang chủ</a>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Font Awesome -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js"></script>
</body>
</html>
<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/baseDuanpoly/app/views/users/layout/footter.php';
?>
