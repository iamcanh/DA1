<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><?= $title ?></h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                Chi tiết đơn hàng
            </h6>
        </div>
        <div class="card-body">
            <table class="table">
                <tr>
                    <th>Trường dữ liệu</th>
                    <th>Dữ liệu</th>

                </tr>
                <?php foreach ($order as $fieldName => $value) : ?>
                    <tr>
                        <td><?= ucfirst($fieldName) ?></td>
                        <td>
                            <?php
                            switch ($fieldName) {

                                case 'trangthai':
                                    echo $value
                                        ? '<span class="badge badge-success">Chưa xác nhận</span>'
                                        : '<span class="badge badge-warning">Đã xác nhận</span>';
                                    break;
                                case 'trangthaithanhtoan':
                                    echo $value
                                        ? '<span class="badge badge-success">Đã thanh toán</span>'
                                        : '<span class="badge badge-warning">Chưa thanh toán</span>';
                                    break;
                                default:
                                    echo $value;
                                    break;
                            }
                            ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
            <a class="btn btn-info" href="<?= BASE_URL_ADMIN ?>?act=orders">Quay lại</a>
        </div>
    </div>
</div>