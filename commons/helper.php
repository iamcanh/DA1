<?php

// Khai báo các hàm dùng Global
if (!function_exists('require_file')) {
    function require_file($pathFolder)
    {
        $files = array_diff(scandir($pathFolder), ['.', '..']);

        foreach ($files as $file) {
            require_once $pathFolder . $file;
        }
    }
}

if (!function_exists('debug')) {
    function debug($data)
    {
        echo "<pre>";

        print_r($data);

        die;
    }
}

if (!function_exists('e404')) {
    function e404()
    {
        echo "404 - Not found";
        die;
    }
}

function upload_file($file, $folderUpload)
{
    // Đảm bảo thư mục đích tồn tại
    if (!is_dir(PATH_ROOT . $folderUpload)) {
        mkdir(PATH_ROOT . $folderUpload, 0777, true);
    }

    // Đường dẫn lưu trữ tệp
    $pathStorage = $folderUpload . time() . '_' . basename($file['name']);

    // Đường dẫn từ và đến
    $from = $file['tmp_name'];
    $to = PATH_ROOT . $pathStorage;

    // Di chuyển tệp từ thư mục tạm thời đến thư mục đích
    if (move_uploaded_file($from, $to)) {
        return $pathStorage;
    }

    return null;
}
function deleteFile($file)
{
    $pathDelete = PATH_ROOT . $file;
    if (file_exists($pathDelete)) {
        if (unlink($pathDelete)) {
            echo "File deleted successfully.";
        } else {
            echo "Error deleting file.";
        }
    } else {
        echo "File does not exist.";
    }
}


// if (!function_exists('get_file_upload')) {
//     function get_file_upload($field, $default = null)
//     {

//         if (isset($_FILES[$field]) && $_FILES[$field]['size'] > 0) {

//             return $_FILES[$field];
//         }

//         return $default ?? null;
//     }
// }

if (!function_exists('middleware_auth_check')) {
    function middleware_auth_check($act)
    {
        if ($act == 'login') {
            if (!empty($_SESSION['user'])) {
                header('Location:' . BASE_URL_ADMIN);
                exit();
            }
        } elseif (empty($_SESSION['user'])) {
            header('Location:' . BASE_URL_ADMIN . '?act=login');
            exit();
        }
    }
}
