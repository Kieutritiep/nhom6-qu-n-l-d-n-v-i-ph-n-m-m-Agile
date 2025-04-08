<?php 
    require_once $_SERVER['DOCUMENT_ROOT'] . '/baseDuanpoly/app/views/admin/layout/header.php';
?>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- Preloader -->
        <!-- <div class="preloader d-flex justify-content-center align-items-center">
            <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
        </div> -->

        <!-- Navbar -->
        <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/baseDuanpoly/app/views/admin/layout/navbar.php'; ?>

        <!-- Sidebar -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <a href="index3.html" class="brand-link">
                <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">AdminLTE 3</span>
            </a>
            <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/baseDuanpoly/app/views/admin/layout/sidebar.php'; ?>
        </aside>

        <!-- Content Wrapper -->
        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-md-6">
                            <h1 class="m-0">Thêm Màu Sắc Mới</h1>
                        </div>
                        <div class="col-md-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Thêm Màu Sắc</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Content -->
            <section class="content">
                <div class="container">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Form Thêm Màu Sắc</h3>
                        </div>
                        <!-- Form Start -->
                        <form action="" method="POST">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="ten_mauSac">Tên Màu Sắc</label>
                                    <input type="text" class="form-control" id="ten_mauSac" name="ten_mauSac" placeholder="Nhập tên màu sắc" required>
                                </div>
                                <div class="form-group">
                                    <label for="maMau">Mã Màu</label>
                                    <input type="text" class="form-control" id="maMau" name="maMau" placeholder="Nhập mã màu (ví dụ: #FFFFFF)" required>
                                </div>
                            </div>
                            <!-- Card Footer -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Thêm</button>
                                <a href="./?act=admin/color" class="btn btn-secondary">Hủy</a>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
        </div>

        <!-- Footer -->
        <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/baseDuanpoly/app/views/admin/layout/footter.php'; ?>
    </div>
</body>
