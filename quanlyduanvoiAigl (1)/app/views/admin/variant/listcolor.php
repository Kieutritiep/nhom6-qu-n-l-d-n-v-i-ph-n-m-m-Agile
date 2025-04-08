<?php 
    require_once $_SERVER['DOCUMENT_ROOT'] . '/baseDuanpoly/app/views/admin/layout/header.php';
?>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">


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
                            <h1 class="m-0">Danh Sách Màu Sắc</h1>
                        </div>
                        <div class="col-md-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Danh Sách Màu Sắc</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Content -->
            <section class="content">
                <div class="container">
                    <a href="./?act=admin/color/add" class="btn btn-danger mb-4">Thêm Màu Sắc</a>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover text-center">
                            <thead class="thead-dark">
                                <tr>
                                    <th>STT</th>
                                    <th>Tên Màu Sắc</th>
                                    <th>Mã Màu</th>
                                    <th>Thao Tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                // Kiểm tra nếu mảng $colors không rỗng
                                if (!empty($colors)) {
                                    foreach ($colors as $key => $color) { ?>
                                        <tr>
                                            <td><?php echo ++$key; ?></td>
                                            <td><?php echo $color['ten_mauSac']; ?></td>
                                            <td><?php echo $color['maMau']; ?></td>
                                            <td>
                                                <a href="./?act=admin/color/edit&id=<?php echo $color['id_mauSac']; ?>" class="btn btn-warning btn-sm">Sửa</a>
                                                <a href="./?act=admin/color/delete&id=<?php echo $color['id_mauSac']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc muốn xóa màu này không?')">Xóa</a>
                                            </td>
                                        </tr>
                                <?php 
                                    }
                                } else { ?>
                                    <tr>
                                        <td colspan="4">Không có dữ liệu màu sắc.</td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        </div>

        <!-- Footer -->
        <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/baseDuanpoly/app/views/admin/layout/footter.php'; ?>
    </div>
</body>
