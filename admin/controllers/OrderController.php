<?php


function orderListAlls()
{
    $title = 'Danh sách đơn hàng';
    $view = 'orders/index';
    $script = 'datatable';
    $script2 = 'orders/script';
    $style = 'datatable';

    $orders = listAll('orders');

    require_once PATH_VIEW_ADMIN. 'layouts/master.php';
}
function orderShowOnes($id)
{
    $order = showOne('orders', $id);
    if (empty($order)) {
        e404();
    }
    $title = 'Chi tiết đơn hàng:' ;
    $view = 'orders/show';
    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}


function orderUpdates($id)
{
    $order = showOne('orders', $id);
    if (empty($order)) {
        e404();
    }
    $title = 'Cập nhật đơn hàng:' ;
    $view = 'orders/update';
    if (!empty($_POST)) {
        // debug($_POST);
        $data = [
            
            'trangthai' => $_POST['trangthai'],
            'trangthaithanhtoan' => $_POST['trangthaithanhtoan'],
            
        ];
        update('orders', $id, $data);
        header('Location: ' . BASE_URL_ADMIN . '?act=order-update&id' . $id);
        exit();
    }
    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}
function orderDeletes($id)
{
    deleteuser('orders', $id);
    header('Location: ' . BASE_URL_ADMIN . '?act=orders');
    exit();
}
