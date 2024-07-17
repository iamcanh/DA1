<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><?= $title ?></h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                Chi tiết sản phẩm
            </h6>
        </div>
        <div class="card-body">
            <table class="table">
                <tr>
                    <th>Trường dữ liệu</th>
                    <th>Dữ liệu</th>
                </tr>
                <?php foreach ($product as $fieldName => $value) : ?>
                    <tr>
                        <td><?= ucfirst($fieldName) ?></td>
                        <td>
                            <?php
                            switch ($fieldName) {
                                case 'image':
                                    echo '<img src="' . htmlspecialchars($value) . '" alt="Product Image" style="max-width: 200px; height: auto;">';
                                    break;
                                case 'category_id':
                                    // $i = 0;
                                    $sx_categories = array_reverse($categories);
                                    echo $sx_categories[2]["name"];
                                    // print_r($categories);
                                    break;
                                default:
                                    echo htmlspecialchars($value);
                                    break;
                            }
                            ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
            <a class="btn btn-info" href="<?= BASE_URL_ADMIN ?>?act=products">Quay lại</a>
        </div>
    </div>
</div>