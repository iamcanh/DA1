<?php

function homeIndex()
{

    $users = getAllPhongban();
    require_once PATH_VIEW .  'home.php';
}
