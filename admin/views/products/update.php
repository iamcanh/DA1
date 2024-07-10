<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><?= $title ?></h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                Sửa sản phẩm
            </h6>
        </div>
        <div class="card-body">
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="product_name" class="form-label">Tên sản phẩm:</label>
                            <input type="text" class="form-control" id="product_name" value="<?= $product['product_name']?>" placeholder="Nhập tên sản phẩm" name="product_name">
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Hình Ảnh:</label>
                            <?php if (!empty($product['image'])): ?>
                                <div>
                                    <img src="<?= htmlspecialchars($product['image']) ?>" alt="Product Image" style="max-width: 200px; height: auto;">
                                </div>
                            <?php endif; ?>
                            <input type="file" class="form-control" id="image" name="image">
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">Giá:</label>
                            <input type="text" class="form-control" id="price" value="<?= $product['price']?>" placeholder="Nhập giá sản phẩm" name="price">
                        </div>
                        <div class="mb-3">
                            <label for="so_luong" class="form-label">Số lượng:</label>
                            <input type="number" class="form-control" id="so_luong" value="<?= $product['so_luong']?>" placeholder="Nhập Số lượng" name="so_luong">
                        </div>
                        <div class="mb-3">
                            <label for="category_id" class="form-label">Danh mục:</label>
                            <select name="category_id" id="category_id" class="form-control">
                                <option value="1">Balo Nam</option>
                                <option value="0">Balo Nữ</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Nhập</button>
                        <a class="btn btn-info" href="<?= BASE_URL_ADMIN ?>?act=products">Quay lại</a>
                    </div>
                    <div class="col-md-3"></div>
                </div>

            </form>
        </div>
    </div>
</div>