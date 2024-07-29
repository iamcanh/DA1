<?php

// function insertSanPham($product_name, $price, $so_luong, $name, $image){
//     try{
//         $sql = 'INSERT INTO products (product_name, price, so_luong, name, image)
//                 VALUES(:product_name, :price, :so_luong, :name, :image)';
//         $stmt = $GLOBALS['conn']->prepare($sql);
//         $stmt->execute([
//             ':product_name' => $product_name,
//             ':price' => $price,
//             ':so_luong' => $so_luong,
//             ':name' => $name,
//             ':image' => $image,
//         ]);
//         return true;
//     }catch (\Exception $e) {
//         debug($e);
//     }
// }