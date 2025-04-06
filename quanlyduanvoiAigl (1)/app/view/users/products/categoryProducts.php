<!-- header -->
<?php require_once $_SERVER['DOCUMENT_ROOT'] .'/baseDuanpoly/app/views/users/layout/header.php';?>
<!-- header -->
    <div class="container2" style="padding:0 80px;">
        <!-- start Banner -->
        <?php require_once $_SERVER['DOCUMENT_ROOT'] .'/baseDuanpoly/app/views/users/layout/banner.php';?>
        <!-- end Banner -->
        <div class="d-flex align-items-center justify-content-center mt-5">
            <img src="./public/images/logoApplemain.png" alt="" class="img-fluid" style="width: 20px; height: 22px;">
            <p class="text-white mb-0 ms-2 fw-bold">iPhone</p>
        </div>
        <!-- start main -->
        <div class="d-flex">
            <!-- start aside -->
            <?php require_once $_SERVER['DOCUMENT_ROOT'] .'/baseDuanpoly/app/views/users/layout/sidebar.php';?>
            <!-- end aside -->
            <!-- start main -->
            <main class="p-4 mt-4" style="flex: 0 0 76%;">
    <div class="row g-4">
        <?php 
        if (!empty($products)) {
            foreach ($products as $product) { 
            $dungLuongList = explode(',', $product['dungLuong']);
            $giaList = explode(',', $product['giaBienThe']);
            $selectedDungLuong = isset($_GET['dungLuong_'.$product['id_sanPham']]) ? $_GET['dungLuong_'.$product['id_sanPham']] : $dungLuongList[0];
            $selectedPrice = $giaList[array_search($selectedDungLuong, $dungLuongList)];
        ?>
        <div class="col-12 col-md-4">
            <a href="./?act=detailProduct&id=<?php echo $product['id_sanPham']; ?>" class="text-decoration-none">
                <div class="product-card text-white rounded-3 p-3 h-100 d-flex flex-column justify-content-between shadow-sm">
                    <img src="<?php echo $product['file_anh']; ?>" alt="<?php echo $product['ten_sanPham']; ?>" class="img-fluid product-image">
                    <div class="text-center mt-4">
                        <?php foreach ($dungLuongList as $dungLuong) { ?>
                            <span style="background-color: #1C1C1D; border-radius: 5px; padding: 5px; width: 70px; display: inline-block;">
                                <?php echo $dungLuong; ?>
                            </span>
                        <?php } ?>
                    </div>
                    <p class="text-center product-text mt-4 fw-bold"><?php echo $product['ten_sanPham']; ?></p>
                    <p class="text-center mt-2"><?php echo number_format($selectedPrice) ?>đ</p> <!-- Hiển thị giá tương ứng -->
                </div>
            </a>
        </div>
        <?php } 
        } else { ?>
            <p class="text-center text-white">Không có sản phẩm nào để hiển thị.</p>
        <?php } ?>
    </div>
</main>

    </div>
    </div>
<?php 
    require_once $_SERVER['DOCUMENT_ROOT'] .'/baseDuanpoly/app/views/users/layout/footter.php';
?>
