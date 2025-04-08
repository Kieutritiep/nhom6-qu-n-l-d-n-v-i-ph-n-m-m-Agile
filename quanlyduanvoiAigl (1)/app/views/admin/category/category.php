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
            <a href="./?act=admin/fromAdd_categorys"><button type="button" class="btn btn-danger mb-4">Thêm danh mục</button></a>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>TÊN DANH MỤC</th>
                            <th>HÀNH ĐỘNG</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($categorys as $key => $category) { ?>
                            <tr>
                                <td><?php echo ++$key; ?></td>
                                <td><?php echo $category['ten_danhMuc']; ?></td>
                                <td>
                                    <!-- Thêm các hành động như sửa, xóa -->
                                    <a href="./?act=admin/formUpdate_Category&id=<?php echo $category['id_danhMuc']?> "><button type="button" class="btn btn-warning"><i class="fa-solid fa-pen"></i></button></a>
                                    <a href="./?act=admin/delete_categorys&id=<?php echo $category['id_danhMuc'] ?>"><button class="btn btn-danger"><i class="fa-solid fa-trash"></i></button></a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </section>
            <!-- /.content nơi đổ dữ liệu-->
        </div>
        <!-- /.content-wrapper -->
        <?php 
    require_once $_SERVER['DOCUMENT_ROOT'] .'/baseDuanpoly/app/views/admin/layout/footter.php';
?>