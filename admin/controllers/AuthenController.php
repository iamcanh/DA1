<?php


function authenShowFormLogin()
{
    if (!empty($_POST)) {
        authenLogin();
    }
    
    require_once PATH_VIEW_ADMIN . 'authen/login.php';
}
function authenLogin()
{
    // var_dump('abc');die;
    
    $user = getUserAdminByEmailAndPassword($_POST['email'], $_POST['password']);
    if (empty($user)) {
        // $_SESSION['user'] = $user;

        // $_SESSION['error'] = 'Email or password chưa đúng!';
        header('Location: ' . BASE_URL_ADMIN . '?act=login');
        exit();
    }
    $_SESSION['user'] = $user;
    header('Location: ' . BASE_URL_ADMIN );
    exit();
}
function authenLogout()
{

    if (!empty($_SESSION['user'])) {
        session_destroy(); 
    }
    header('Location: ' . BASE_URL );
    exit();
}
//