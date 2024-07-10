<?php

// Require file trong commons

require_once '../commons/env.php';
require_once '../commons/helper.php';
require_once '../commons/connect-db.php';
require_once '../commons/model.php';

// Require file trong controllers và models

require_file(PATH_CONTROLLER_ADMIN);
require_file(PATH_MODEL_ADMIN);

// điều hướng

$act = $_GET['act'] ?? '/';

match($act) {
    '/' => dashboard(),

    // CRUD User
    'users' => userListAlls(),
    'user-detail' => userShowOnes($_GET['id']),
    'user-create' => userCreates(),
    'user-update' => userUpdates($_GET['id']),
    'user-delete' => userDeletes($_GET['id']),
    // CRUD Products
    'products' => productListAlls(),
    'product-detail' => productShowOnes($_GET['product_id']),
    'product-create' => productCreates(),
    'product-update' => productUpdates($_GET['product_id']),
    'product-delete' => productDeletes($_GET['product_id']),
};
// .......
require_once '../commons/disconnect-db.php';
