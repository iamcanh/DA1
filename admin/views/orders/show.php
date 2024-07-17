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
                        <th><?= ucfirst($fieldName) ?></th>
                        <th>
                            <?php
                            switch ($fieldName) {
                                case 'image':
                                    echo '<img src="' . htmlspecialchars($value) . '" alt="Product Image" style="max-width: 200px; height: auto;">';
                                    break;
                                case 'category_id':
                                    echo $value
                                        ? 'Balo Nam'
                                        : 'Balo Nu';
                                    break;
                                default:
                                    echo htmlspecialchars($value);
                                    break;
                            }
                            ?>
                        </th>
                    </tr>
                <?php endforeach; ?>
            </table>
            <a class="btn btn-info" href="<?= BASE_URL_ADMIN ?>?act=orders">Quay lại</a>
        </div>
    </div>
</div>