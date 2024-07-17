<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">
        <?= $title ?>
        <br><a class="btn btn-info mt-3 mb-3" href="<?= BASE_URL_ADMIN ?>?act=product-create">Thêm sản phẩm</a>
    </h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                Danh sách sản phẩm
            </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#ID</th>
                            <th>Tên sản phẩm</th>
                            <th>Hình Ảnh</th>
                            <th>Giá</th>
                            <th>Số lượng</th>
                            <th>Danh mục</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>

                    <tbody>


                        <?php foreach ($products as $key => $product ) : ?>
                            <tr>
                                <td><?= $key + 1 ?></td>
                                <td><?= $product['product_name'] ?></td>
                                <td>
                                    <img src="<?= $product['image'] ?>" alt="" width="100px">
                                </td>
                                <td><?= $product['price'] ?></td>
                                <td><?= $product['so_luong'] ?></td>
                                <td><?= $product['name'] ?></td>
                                <td>
                                    <a class="btn btn-success" href="<?= BASE_URL_ADMIN ?>?act=product-detail&product_id=<?= $product['product_id'] ?>">Xem chi tiết</a>
                                    <a class="btn btn-warning" href="<?= BASE_URL_ADMIN ?>?act=product-update&product_id=<?= $product['product_id'] ?>">Sửa</a>
                                    <a class="btn btn-danger" href="<?= BASE_URL_ADMIN ?>?act=product-delete&product_id=<?= $product['product_id'] ?>" onclick="return confirm('Bạn có chắc muốn xóa sản phẩm này?')">Xóa</a>

                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>