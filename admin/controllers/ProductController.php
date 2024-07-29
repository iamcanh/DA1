<?php


function productListAlls()
{
    $title = 'Danh sách sản phẩm';
    $view = 'products/index';
    $script = 'datatable';
    $script2 = 'products/script';
    $style = 'datatable';

    
    $products = listAllProduct('products');
    

    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

function productShowOnes($product_id)
{
   
    $categories = listAll('categories');
    
    $product = showOneProduct('products', $product_id);
    
    if (empty($product)) {
        e404();
    }
    $title = 'Chi tiết sản phẩm : ' . $product['product_name'];
    $view = 'products/show';
    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

function productCreates()
{
    $title = 'Danh sách sản phẩm';
    $view = 'products/create';

    $categories = listAll('categories');

    if (!empty($_POST)) {
        // Process the uploaded image
        $image = $_FILES['image'];
        $imagePath = '';

        // Check if the file was uploaded without errors
        if ($image['error'] == 0) {
            $allowed = ['jpg', 'jpeg', 'png', 'gif'];
            $fileName = $image['name'];
            $fileType = pathinfo($fileName, PATHINFO_EXTENSION);

            // Validate file extension
            if (in_array(strtolower($fileType), $allowed)) {
                // Define the target directory and ensure it exists
                $targetDir = __DIR__ . '/../uploads/products/'; // Use absolute path
                if (!is_dir($targetDir)) {
                    mkdir($targetDir, 0777, true);
                }

                // Generate a unique name for the image and move it to the target directory
                $targetFile = $targetDir . uniqid() . '.' . $fileType;

                if (move_uploaded_file($image['tmp_name'], $targetFile)) {
                    $imagePath = 'uploads/products/' . basename($targetFile); // Relative path for storing in DB
                } else {
                    echo "Error moving the uploaded file.";
                    exit();
                }
            } else {
                echo "Invalid file type. Only JPG, JPEG, PNG & GIF files are allowed.";
                exit();
            }
        }

        $data = [
            'product_name' => $_POST['product_name'],
            'image' => $imagePath,
            'price' => $_POST['price'],
            'so_luong' => $_POST['so_luong'],
            'category_id' => $_POST['category_id']
        ];
        insert('products', $data);
        header('Location: ' . BASE_URL_ADMIN . '?act=products');
        exit();
    }
    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}

function productUpdates($product_id)
{
    $categories = listAll('categories');
    $product = showOneProduct('products', $product_id);
    if (empty($product)) {
        e404();
    }
    $title = 'Sửa sản phẩm: ' . $product['product_name'];;
    $view = 'products/update';
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Include database connection or relevant code here
        $product_id = $product['product_id'];
        $data = [
            'product_name' => $_POST['product_name'],
            'price' => $_POST['price'],
            'so_luong' => $_POST['so_luong'],
            'category_id' => $_POST['category_id']
        ];

        // Handle image upload
        if (isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
            $upload_dir = './uploads/'; // Directory to save the uploaded files
            $upload_file = $upload_dir . basename($_FILES['image']['name']);
            $imageFileType = strtolower(pathinfo($upload_file, PATHINFO_EXTENSION));

            // Check if file is an actual image
            $check = getimagesize($_FILES['image']['tmp_name']);
            if ($check !== false) {
                // Check file size (5MB max)
                if ($_FILES['image']['size'] <= 5000000) {
                    // Allow certain file formats
                    if (in_array($imageFileType, ['jpg', 'png', 'jpeg', 'gif'])) {
                        if (move_uploaded_file($_FILES['image']['tmp_name'], $upload_file)) {
                            $data['image'] = $upload_file; // Add image path to data
                        } else {
                            echo "Sorry, there was an error uploading your file.";
                        }
                    } else {
                        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                    }
                } else {
                    echo "Sorry, your file is too large.";
                }
            } else {
                echo "File is not an image.";
            }
        }
        updateproduct('products', $product_id, $data);
        header('Location: ' . BASE_URL_ADMIN . '?act=product-update&product_id=' . $product_id);
        exit();

        // Update product in the database
    }
    // if(!empty($_POST)){
    //     // debug($_POST);
    //     $data = [
    //         'product_name' => $_POST['product_name'],
    //         'price' => $_POST['price'],
    //         'so_luong' => $_POST['so_luong'],
    //         'category_id' => $_POST['category_id'],
    //     ];
    //     updateproduct('users',$product_id , $data);
    //     header('Location: ' . BASE_URL_ADMIN . '?act=product-update&product_id=' .$product_id);
    //     exit();
    // }
    require_once PATH_VIEW_ADMIN . 'layouts/master.php';
}
function productDeletes($product_id)
{
    deleteproduct('products', $product_id);
    header('Location: ' . BASE_URL_ADMIN . '?act=products');
    exit();
}
