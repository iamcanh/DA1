<?php
function categoryAll()
{
   
    $view = 'categories/index';

    $categories = listAll('categories');

    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}