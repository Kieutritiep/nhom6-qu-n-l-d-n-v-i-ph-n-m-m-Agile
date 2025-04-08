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
                            <h1 class="m-0">Danh Sách Bình Luận</h1>
                        </div>
                        <div class="col-md-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Danh Sách Bình Luận</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Content -->
            <section class="content">
                <div class="comments-list container my-4">
                    <?php if (!empty($comments)): ?>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>ID</th>
                                        <th>Sản phẩm</th>
                                        <th>Khách hàng</th>
                                        <th>Nội dung</th>
                                        <th>Thời gian</th>
                                        <th>Hình ảnh</th>
                                        <th>Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($comments as $comment): ?>
                                        <tr>
                                            <td><?= htmlspecialchars($comment['id_binhLuan']) ?></td>
                                            <td><?= htmlspecialchars($comment['ten_sanPham']) ?></td>
                                            <td><?= htmlspecialchars($comment['ten_khachHang']) ?></td>
                                            <td><?= htmlspecialchars($comment['noiDung']) ?></td>
                                            <td><?= htmlspecialchars($comment['thoiGian']) ?></td>
                                            <td>
                                                <img src="<?= htmlspecialchars($comment['link_anh'] ?? 'default-avatar.png') ?>" 
                                                     class="img-thumbnail" 
                                                     alt="Hình ảnh bình luận" 
                                                     style="width: 50px; height: 50px; object-fit: cover;">
                                            </td>
                                            <td>
                                                <a href="?act=admin/deleteComment&id_binhLuan=<?= $comment['id_binhLuan'] ?>" 
                                                   class="btn btn-danger btn-sm" 
                                                   onclick="return confirm('Bạn có chắc chắn muốn xóa bình luận này?');">Xóa</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    <?php else: ?>
                        <p class="text-center text-muted">Không có bình luận nào.</p>
                    <?php endif; ?>
                </div>
            </section>
        </div>

        <!-- Footer -->
        <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/baseDuanpoly/app/views/admin/layout/footter.php'; ?>
    </div>
</body>
