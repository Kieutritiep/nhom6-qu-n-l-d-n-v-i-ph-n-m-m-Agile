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
            <form class="d-flex mb-3 mx-auto" action="your_search_action.php" method="GET" style="width: 100%;">
                <input class="form-control me-2" type="search" name="query" placeholder="Tìm kiếm sản phẩm..." aria-label="Search" style="height: 38px;">
                <button class="btn btn-primary" type="submit" style="height: 38px; width:10%; margin-left: 5px;">Tìm kiếm</button>
            </form>

            <a href="./?act=admin/formAddProduct"><button type="button" class="btn btn-danger mb-4">Thêm sản phẩm</button></a>
            <table class="table table-bordered  w-100 text-center table-hover">
                <thead class="table-dark">
                    <tr>
                        <th class="align-middle">STT</th>
                        <th class="align-middle">TÊN</th>
                        <th class="align-middle">ẢNH</th>
                        <th class="align-middle">MÀU SẮC</th>
                        <th class="align-middle">DUNG LƯỢNG</th>
                        <th class="align-middle">THAO TÁC</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($products as $key => $product) { ?>
                        <tr>
                            <td class="align-middle"><?php echo ++$key ?></td>
                            <td class="align-middle"><?php echo $product['ten_sanPham'] ?></td>
                            <td class="align-middle">
                                <img style="width: 160px; height: 100;" src="<?php echo $product['file_anh'] ?>" alt="">
                            </td>
                            <td class="align-middle"><?php echo $product['mauSac'] ?></td>
                            <td class="align-middle"><?php echo $product['dungLuong'] ?></td>
                            <td class="align-middle">
                            <a href=""><button type="button" class="btn btn-warning"><i class="fa-solid fa-pen"></i></button></a>
                            <button type="submit" class="btn btn-info"><i class="fa-solid fa-eye"></i></button>
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