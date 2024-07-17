<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">
        <?= $title ?> <br>
        <br>

    </h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                Danh sách đơn hàng
            </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Mã đơn hàng</th>
                            <th>Tên người đặt</th>
                            <th>Số điện thoại</th>
                            <th>Tổng tiền</th>
                            <th>Trạng thái đơn hàng</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($orders as $order) : ?>
                            <tr>
                                <td><?= $order['id'] ?></td>
                                <td><?= $order['name_oder'] ?></td>
                                <td><?= $order['phone'] ?></td>
                                <td><?= $order['thanhtien'] ?></td>
                                <td><?= $order['trangthai']
                                        ? '<span class="badge badge-success">Xác nhận</span>'
                                        : '<span class="badge badge-warning">Chưa xác nhận</span>' ?></td>
                                <td>
                                    <a class="btn btn-success" href="<?= BASE_URL_ADMIN ?>?act=order-detail&id=<?= $order['id'] ?>">Xem chi tiết</a>
                                    <a class="btn btn-warning" href="<?= BASE_URL_ADMIN ?>?act=order-update&id=<?= $order['id'] ?>">Sửa</a>
                                    <a class="btn btn-danger" href="<?= BASE_URL_ADMIN ?>?act=order-delete&id=<?= $order['id'] ?>" onclick="return confirm('Bạn có chăc muốn xóa không?')">Xóa</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>