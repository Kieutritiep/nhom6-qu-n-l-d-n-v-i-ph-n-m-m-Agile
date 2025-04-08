<?php 
require_once $_SERVER['DOCUMENT_ROOT'] . '/baseDuanpoly/app/views/admin/layout/header.php';
?>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
        </div>
        <!-- Navbar -->
        <?php 
        require_once $_SERVER['DOCUMENT_ROOT'] . '/baseDuanpoly/app/views/admin/layout/navbar.php';
        ?>
        <!-- /.navbar -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <a href="index3.html" class="brand-link">
                <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">AdminLTE 3</span>
            </a>

            <!-- Sidebar -->
            <?php 
            require_once $_SERVER['DOCUMENT_ROOT'] . '/baseDuanpoly/app/views/admin/layout/sidebar.php';
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

            <!-- Main content -->
            <section class="content">
                <h4 class="text-center mt-4">FORM THÊM SẢN PHẨM</h4>
                <div class="container mt-5">
                <form action="./?act=admin/addProduct" method="POST" enctype="multipart/form-data">
    <table class="table table-bordered">
        <tbody>
            <tr>
                <td><label for="nameProduct">Tên sản phẩm</label></td>
                <td><input type="text" class="form-control" name="nameProduct" placeholder="Nhập tên sản phẩm" required></td>
            </tr>
            <tr>
                <td><label for="category">Danh mục</label></td>
                <td>
                    <select class="form-select" name="category" id="category" required>
                        <option value="">Chọn danh mục</option>
                        <?php foreach ($categorys as $category) { ?>
                            <option value="<?php echo $category['id_danhMuc']; ?>">
                                <?php echo $category['ten_danhMuc']; ?>
                            </option>
                        <?php } ?>
                    </select>
                </td>
            </tr>
            <tr>
            </tr>
            <tr>
                <td><label for="display">Hiển thị</label></td>
                <td>
                    <input type="radio" name="display" value="1" checked> Hiện thị
                    <input type="radio" name="display" value="0"> Ẩn
                </td>
            </tr>
            <tr>
                <td><label for="mainImage">Ảnh chính</label></td>
                <td><input type="file" class="form-control" name="mainImage" id="mainImage"></td>
            </tr>
            <tr>
                <td><label for="subImage">Ảnh phụ</label></td>
                <td><input type="file" class="form-control" name="subImage[]" id="subImage" multiple></td>
            </tr>
            <tr>
                <td><label for="description">Mô tả</label></td>
                <td><textarea class="form-control" name="description" id="description" placeholder="Nhập mô tả sản phẩm"></textarea></td>
            </tr>
        </tbody>
    </table>

    <h5 class="mt-4">Danh sách biến thể</h5>
    <table class="table table-bordered" id="variant-table">
        <thead>
            <tr>
                <th>Màu sắc</th>
                <th>Dung lượng</th>
                <th>Giá</th>
                <th>Số lượng</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            <!-- Rows will be dynamically added -->
        </tbody>
    </table>

    <div class="form-group mt-3">
        <button type="button" id="add-variant" class="btn btn-success">Thêm biến thể</button>
    </div>

    <div class="text-center mt-4">
        <button type="submit" class="btn btn-primary">Thêm sản phẩm</button>
    </div>
</form>

                </div>
            </section>
            <!-- /.content -->
        </div>

        <!-- Footer -->
        <?php 
        require_once $_SERVER['DOCUMENT_ROOT'] . '/baseDuanpoly/app/views/admin/layout/footter.php';
        ?>
    </div>

    <!-- JavaScript -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const variantTable = document.querySelector('#variant-table tbody');
            const addVariantBtn = document.getElementById('add-variant');

            addVariantBtn.addEventListener('click', function () {
                const newRow = document.createElement('tr');

                newRow.innerHTML = `
                    <td>
                        <select name="color[]" class="form-select" required>
                            <option value="" hidden>Chọn màu</option>
                            <?php foreach ($colors as $color) { ?>
                                <option value="<?php echo $color['id_mauSac']; ?>">
                                    <?php echo $color['ten_mauSac']; ?>
                                </option>
                            <?php } ?>
                        </select>
                    </td>
                    <td>
                        <select name="capacity[]" class="form-select" required>
                            <option value="" hidden>Chọn dung lượng</option>
                            <?php foreach ($capacitys as $capacity) { ?>
                                <option value="<?php echo $capacity['id_dungLuong']; ?>">
                                    <?php echo $capacity['dungLuong']; ?>
                                </option>
                            <?php } ?>
                        </select>
                    </td>
                    <td>
                        <input type="number" name="price[]" class="form-control" placeholder="Giá" required>
                    </td>
                    <td>
                        <input type="number" name="quantity[]" class="form-control" placeholder="Số lượng" required>
                    </td>
                    <td>
                        <button type="button" class="btn btn-danger remove-variant">Xóa</button>
                    </td>
                `;

                variantTable.appendChild(newRow);
            });

            // Xóa biến thể
            document.addEventListener('click', function (e) {
                if (e.target.classList.contains('remove-variant')) {
                    e.target.closest('tr').remove();
                }
            });
        });
    </script>
</body>