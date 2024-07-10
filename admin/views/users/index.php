<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">
        <?= $title ?> <br>
        <br><a class="btn btn-info" href="<?= BASE_URL_ADMIN ?>?act=user-create">Thêm người dùng</a>

    </h1>
    
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                Danh sách người dùng
            </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Họ và Tên</th>
                            <th>Mật khẩu</th>
                            <th>Email</th>
                            <th>Trạng thái</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        <?php foreach ($users as $user) : ?>
                            <tr>
                                <td><?= $user['id'] ?></td>
                                <td><?= $user['username'] ?></td>
                                <td><?= $user['password'] ?></td>
                                <td><?= $user['email'] ?></td>
                                <td><?= $user['type']
                                        ? '<span class="badge badge-success">Admin</span>'
                                        : '<span class="badge badge-warning">Member</span>' ?></td>
                                <td>
                                    <a class="btn btn-success" href="<?= BASE_URL_ADMIN ?>?act=user-detail&id=<?=$user['id']?>">Xem chi tiết</a>
                                    <a class="btn btn-warning" href="<?= BASE_URL_ADMIN ?>?act=user-update&id=<?=$user['id']?>">Sửa</a>
                                    <a class="btn btn-danger" href="<?= BASE_URL_ADMIN ?>?act=user-delete&id=<?=$user['id']?>"
                                    onclick="return confirm('Bạn có chăc muốn xóa không?')"
                                    >Xóa</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>