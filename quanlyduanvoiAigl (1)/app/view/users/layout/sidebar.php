<aside class="mt-5 col-12 col-md-3 p-4" style="background-color: #323232; border-radius: 10px; max-height: 500px; overflow-y: auto;">
    <div>
        <h5 class="text-white">Danh mục sản phẩm</h5>
        <?php foreach($getCategorys as $getCategory){?>
        <a href="" class="d-flex align-items-center p-2 rounded hover-block text-decoration-none">
            <input type="radio" name="product">
            <p class="text-white mb-0 ms-2"><?php echo $getCategory['ten_danhMuc'] ?></p>
        </a>
        <?php } ?>
    </div>
    <div>
        <h5 class="text-white">Xắp xếp theo</h5>
        <a href="" class="d-flex align-items-center p-2 rounded hover-block text-decoration-none">
            <input type="radio" name="loc">
            <p class="text-white mb-0 ms-2">Bán chạy</p>
        </a>
        <a href="" class="d-flex align-items-center p-2 rounded hover-block text-decoration-none">
            <input type="radio" name="loc">
            <p class="text-white mb-0 ms-2">Gía thấp đến cao</p>
        </a>
        <a href="" class="d-flex align-items-center p-2 rounded hover-block text-decoration-none">
            <input type="radio" name="loc">
            <p class="text-white mb-0 ms-2">Gía cao đến thấp</p>
        </a>
    </div>
</aside>