<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><?= $title ?></h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                Sửa người dùng
            </h6>
        </div>
        <div class="card-body">
            <form action="" method="POST">
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="username" class="form-label">Tên người dùng:</label>
                            <input type="text" class="form-control" id="username" value="<?= $user['username']?>" placeholder="Nhập tên người dùng" name="username">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Mật khẩu:</label>
                            <input type="password" class="form-control" id="password" value="<?= $user['password']?>" placeholder="Nhập mật khẩu" name="password">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email:</label>
                            <input type="email" class="form-control" id="email" value="<?= $user['email']?>" placeholder="Nhập Email" name="email">
                        </div>
                        <div class="mb-3">
                            <label for="type" class="form-label">Trạng thái:</label>
                            <select name="type" id="type" class="form-control">
                                <option <?= $user['type'] == 1 ? 'selected' : null ?> value="1">Admin</option>
                                <option <?= $user['type'] == 0 ? 'selected' : null ?> value="0">Member</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Nhập</button>
                        <a class="btn btn-info" href="<?= BASE_URL_ADMIN ?>?act=users">Quay lại</a>
                    </div>
                    <div class="col-md-3"></div>
                </div>

            </form>
        </div>
    </div>
</div>