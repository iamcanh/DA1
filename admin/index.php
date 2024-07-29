<?php

// Require file trong commons
session_start();

require_once '../commons/env.php';
require_once '../commons/helper.php';
require_once '../commons/connect-db.php';
require_once '../commons/model.php';

// Require file trong controllers và models

require_file(PATH_CONTROLLER_ADMIN);
require_file(PATH_MODEL_ADMIN);

// điều hướng

$act = $_GET['act'] ?? '/';

// Kiểm tra xem user đã đăng nhập chưa

middleware_auth_check($act);

match($act) {
    '/' => dashboard(),

    // Authend
    'login' => authenShowFormLogin(),
    'logout' => authenLogout(),

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
    // CRUD Categories
    'categories' => categorytListAlls(),

    'category-create' => categoryCreates(),
    // 'category-detail' => categoryShowOnes($_GET['category_id']),
    'category-update' => categoryUpdates($_GET['id']),
    'category-delete' => categoryDeletes($_GET['id']),
    //orders
    'orders' => orderListAlls(),
    'order-detail' => orderShowOnes($_GET['id']),
    'order-update' => orderUpdates($_GET['id']),
    'order-delete' => orderDeletes($_GET['id']),

    // //Authors
    // 'authors' => orderListAlls(),
    // 'author-detail' => authorShowOnes($_GET['id']),
    // 'author-update' => authorUpdates($_GET['id']),
    // 'author-delete' => authorDeletes($_GET['id']),

    
    // Setttings
    'setting-form' => settingShowForm(),
    'setting-save' => settingSave(),
};
// .......
require_once '../commons/disconnect-db.php';
