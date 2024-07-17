<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800"><?= htmlspecialchars($title, ENT_QUOTES, 'UTF-8') ?></h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                Chi tiết sản phẩm
            </h6>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>Trường dữ liệu</th>
                        <th>Dữ liệu</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($category as $fieldName => $value) : ?>
                        <tr>
                            <td><?= ucfirst($fieldName) ?></td>
                            <td>
                                <?php
                                switch ($fieldName) {
                                    case 'category_id':
                                        echo $value
                                            ? 'Balo Nam'
                                            : 'Balo Nu';
                                        break;
                                    default:
                                        break;
                                }
                                ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <a class="btn btn-info" href="<?= BASE_URL_ADMIN ?>?act=categories">Quay lại</a>
        </div>
    </div>
</div>