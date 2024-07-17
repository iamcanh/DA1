<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">
        <?= $title ?> <br>
        <br><a class="btn btn-info" href="<?= BASE_URL_ADMIN ?>?act=category-create">Thêm danh mục</a>
    </h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                Danh sách danh mục
            </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên danh mục</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($categories as $key => $category) : ?>
                            <tr>
                                <td><?= $key + 1 ?></td>
                                <td><?= $category['name'] ?></td>
                                <td>
                                    <a class="btn btn-warning" href="<?= BASE_URL_ADMIN ?>?act=category-update&id=<?= $category['id'] ?>">Sửa</a>
                                    <a class="btn btn-danger" href="<?= BASE_URL_ADMIN ?>?act=category-delete&id=<?= $category['id'] ?>" onclick="return confirm('Bạn có chăc muốn xóa không?')">Xóa</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>