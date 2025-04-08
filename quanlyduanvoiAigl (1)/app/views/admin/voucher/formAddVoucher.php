<?php 
      require_once $_SERVER['DOCUMENT_ROOT'] .'/baseDuanpoly/app/views/admin/layout/header.php';
  ?>

  <body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
        </div>
        <!-- Navbar -->
        <?php 
          require_once $_SERVER['DOCUMENT_ROOT'] .'/baseDuanpoly/app/views/admin/layout/navbar.php';
        ?>
        <!-- /.navbar -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <a href="index3.html" class="brand-link">
          <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
          <span class="brand-text font-weight-light">AdminLTE 3</span>
        </a>

        <!-- Sidebar -->
        <?php 
          require_once $_SERVER['DOCUMENT_ROOT'] .'/baseDuanpoly/app/views/admin/layout/sidebar.php';
        ?>
        <!-- /.sidebar -->
        </aside>
        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Dashboard</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Dashboard v1</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Main content nơi đổ dữ liệu -->
            <section class="content">
            <form action="./?act=admin/addVoucher" method="POST" class="p-4 border rounded shadow-sm bg-light">
                <div class="mb-3">
                    <label for="ten_chuongTrinh" class="form-label">Tên chương trình</label>
                    <input type="text" name="ten_chuongTrinh" class="form-control" id="ten_chuongTrinh" placeholder="Nhập tên chương trình">
                </div>
                <div class="mb-3">
                    <label for="moTa" class="form-label">Mô tả</label>
                    <input type="text" name="moTa" class="form-control" id="moTa" placeholder="Nhập mô tả">
                </div>
                <div class="mb-3">
                    <label for="soTienGiamGia" class="form-label">Số tiền giảm giá</label>
                    <input type="text" name="soTienGiamGia" class="form-control" id="soTienGiamGia" placeholder="Nhập số tiền giảm giá">
                </div>
                <div class="mb-3">
                    <label for="soTienToiThieu" class="form-label">Số tiền tối thiểu</label>
                    <input type="text" name="soTienToiThieu" class="form-control" id="soTienToiThieu" placeholder="Nhập số tiền tối thiểu">
                </div>
                <div class="mb-3">
                    <label for="trangThai">Trạng thái voucher:</label>
                    <select name="trangThai" id="trangThai">
                        <option value="0">Chưa sử dụng</option>
                        <option value="1">Đang sử dụng</option>
                        <option value="2">Đã hết hạn</option>
                        <option value="3">Đã được áp dụng</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="ngayBatDau" class="form-label">Ngày bắt đầu</label>
                    <input type="date" name="ngayBatDau" class="form-control" id="ngayBatDau">
                </div>
                <div class="mb-3">
                    <label for="ngayKetThuc" class="form-label">Ngày kết thúc</label>
                    <input type="date" name="ngayKetThuc" class="form-control" id="ngayKetThuc">
                </div>
                <button type="submit" class="btn btn-primary w-100">Thêm Voucher</button>
            </form>
            </section>
            <!-- /.content nơi đổ dữ liệu-->
        </div>
        <!-- /.content-wrapper -->
        <?php 
    require_once $_SERVER['DOCUMENT_ROOT'] .'/baseDuanpoly/app/views/admin/layout/footter.php';
?>