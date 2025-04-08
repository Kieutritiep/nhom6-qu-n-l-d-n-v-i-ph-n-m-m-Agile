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
            <table class="table table-bordered table-hover">
            <thead class="table-dark">
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
                    <?php 
                        foreach($orders as $key => $order){
                            ?>
                                <tr>
                                    <td><?php echo ++$key ?></td>
                                    <td><?php echo $order['ma_hoa_don'] ?></td>
                                    <td><?php echo $order['ngayDatHang'] ?></td>
                                    <td><?php echo number_format($order['tongTien']) ?>đ</td>
                                    <td><?php echo $order['hinhThucThanhToan'] ?></td>
                                    <td><?php echo $order['trangThai'] ?></td>
                                    <td>
                                    <a href="./?act=admin/detailOrderAdmin&id=<?php echo $order['id_donhang'] ?>"><button type="submit" class="btn btn-info"><i class="fa-solid fa-eye"></i></button></a>
                                    </td>
                                    </td>
                                </tr>
                            <?php
                        }
                    ?>
                </tbody>
        </table>
            </section>
            <!-- /.content nơi đổ dữ liệu-->
        </div>
        <!-- /.content-wrapper -->
        <?php 
    require_once $_SERVER['DOCUMENT_ROOT'] .'/baseDuanpoly/app/views/admin/layout/footter.php';
?>