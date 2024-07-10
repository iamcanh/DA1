<?php


function userListAlls() {
    $title = 'Danh sách người dùng';
    $view = 'users/index';
    $script = 'datatable';
    $script2 = 'users/script';
    $style = 'datatable';

    $users = listAll('users');

    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}
function userShowOnes($id){
    $user = showOne('users', $id);
    if(empty($user)){
        e404();
    }
    $title = 'Chi tiết người dùng:' . $user['username'];
    $view = 'users/show';
    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

function userCreates(){
    $title = 'Danh sách người dùng';
    $view = 'users/create';
    
    if(!empty($_POST)){
        // debug($_POST);
        $data = [
            'username' => $_POST['username'],
            'password' => $_POST['password'],
            'email' => $_POST['email'],
            'type' => $_POST['type'],
        ];
        insert('users', $data);
        header('Location: ' . BASE_URL_ADMIN . '?act=users');
        exit();
    }
    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}
function userUpdates($id){
    $user = showOne('users', $id);
    if(empty($user)){
        e404();
    }
    $title = 'Cập nhật người dùng:' . $user['username'];
    $view = 'users/update';
    if(!empty($_POST)){
        // debug($_POST);
        $data = [
            'username' => $_POST['username'],
            'password' => $_POST['password'],
            'email' => $_POST['email'],
            'type' => $_POST['type'],
        ];
        update('users',$id , $data);
        header('Location: ' . BASE_URL_ADMIN . '?act=user-update&id=' .$id);
        exit();
    }
    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}
function userDeletes($id){
    deleteuser('users', $id);
    header('Location: ' . BASE_URL_ADMIN . '?act=users');
    exit();
}