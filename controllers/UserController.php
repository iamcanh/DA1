<?php
function Login()
{
    $view = 'login/index';
    // $user = getUserByID($id);
    require_once PATH_VIEW . 'layouts/master.php';
}
function Register()
{
    $view = 'register/register';
    // $user = getUserByID($id);
    require_once PATH_VIEW . 'layouts/master.php';
}