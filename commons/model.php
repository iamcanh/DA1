<?php

// Crud -> create/read(danh sahc/chi tiet)/update/delete

if (!function_exists('get_str_keys')) {
    function get_str_keys($data)
    {
        $keys = array_keys($data);

        $keysTenTen = array_map(function ($key) {
            return "`$key`";
        }, $keys);
        return implode(', ', $keysTenTen);
    }
}

if (!function_exists('get_virtual_params')) {
    function get_virtual_params($data)
    {
        $keys = array_keys($data);

        $tmp = [];
        foreach ($keys as $key) {
            $tmp[] = ":$key";
        }
        return implode(', ', $tmp);
    }
}
if (!function_exists('get_set_params')) {
    function get_set_params($data)
    {
        $keys = array_keys($data);

        $tmp = [];
        foreach ($keys as $key) {
            $tmp[] = "`$key` = :$key";
        }
        return implode(', ', $tmp);
    }
}
// Them
if (!function_exists('insert')) {
    function insert($tableName, $data = [])
    {
        try {

            $strKeys = get_str_keys($data);
            $virtualParams = get_virtual_params($data);
            $sql = "INSERT INTO $tableName($strKeys) VALUES ($virtualParams)";
            $stmt = $GLOBALS['conn']->prepare($sql);

            foreach ($data as $fieldName => &$value) {
                $stmt->bindParam(":$fieldName", $value);
            }
            $stmt->execute();
        } catch (\Exception $e) {
            debug($e);
        }
    }
}
// Read Users
if (!function_exists('listAll')) {
    function listAll($tableName)
    {
        try {

            $sql = "SELECT * FROM $tableName ORDER BY id DESC";

            $stmt = $GLOBALS['conn']->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll();
        } catch (\Exception $e) {
            debug($e);
        }
    }
    function listAllProduct()
    {
        try {

            // $sql = "SELECT * FROM $tableName ORDER BY product_id DESC";
            $sql = "SELECT pr.product_id, pr.product_name,pr.price, pr.so_luong , pr.image, pr.content, ct.name 
                    FROM products 
                    AS pr 
                    INNER JOIN categories AS ct ON ct.id = pr.category_id;";
                    
            $stmt = $GLOBALS['conn']->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll();
        } catch (\Exception $e) {
            debug($e);
        }
    }
}
// Read Product
if (!function_exists('showOne')) {
    function showOne($tableName, $id)
    {
        try {

            $sql = "SELECT * FROM $tableName WHERE id = :id LIMIT 1";

            $stmt = $GLOBALS['conn']->prepare($sql);

            $stmt->bindParam(":id", $id);

            $stmt->execute();

            return $stmt->fetch();
        } catch (\Exception $e) {
            debug($e);
        }
    }
    function showOneProduct($tableName, $product_id)
    {
        try {

            // $sql = "SELECT * FROM $tableName WHERE product_id = :product_id LIMIT 1";
            $sql = "SELECT pr.product_id, pr.product_name,pr.price, pr.so_luong , pr.image, ct.name 
            FROM products 
            AS pr 
            INNER JOIN categories AS ct ON ct.id = pr.category_id
            WHERE product_id = :product_id LIMIT 1";
            $stmt = $GLOBALS['conn']->prepare($sql);

            $stmt->bindParam(":product_id", $product_id);

            $stmt->execute();

            return $stmt->fetch();
        } catch (\Exception $e) {
            debug($e);
        }
    }
    
}
// Update

if (!function_exists('update')) {
    function update($tableName, $id,  $data = [])
    {
        try {

            $setParams = get_set_params($data);
            $sql = "
                UPDATE $tableName
                SET $setParams
                WHERE id = :id
            ";
            $stmt = $GLOBALS['conn']->prepare($sql);

            foreach ($data as $fieldName => &$value) {
                $stmt->bindParam(":$fieldName", $value);
            }

            $stmt->bindParam(":id", $id);

            $stmt->execute();
        } catch (\Exception $e) {
            debug($e);
        }
    }
    
    function updateproduct($tableName, $product_id, $data = []) {
        try {
            $setParams = get_set_params($data);
            $sql = "
                UPDATE $tableName
                SET $setParams
                WHERE product_id = :product_id
            ";
            $stmt = $GLOBALS['conn']->prepare($sql);
    
            foreach ($data as $fieldName => &$value) {
                $stmt->bindParam(":$fieldName", $value);
            }
    
            $stmt->bindParam(":product_id", $product_id);
    
            $stmt->execute();
        } catch (\Exception $e) {
            debug($e);
        }
    }   
    
}
// Delete
if (!function_exists('delete')) {
    function deleteuser($tableName, $id,  $data = [])
    {
        try {

            $sql = "DELETE FROM $tableName WHERE id = :id";

            $stmt = $GLOBALS['conn']->prepare($sql);

            $stmt->bindParam(":id", $id);

            $stmt->execute();
        } catch (\Exception $e) {
            debug($e);
        }
    }
    function deleteproduct($tableName, $product_id,  $data = [])
    {
        try {

            $sql = "DELETE FROM $tableName WHERE product_id = :product_id";

            $stmt = $GLOBALS['conn']->prepare($sql);

            $stmt->bindParam(":product_id", $product_id);

            $stmt->execute();
        } catch (\Exception $e) {
            debug($e);
        }
    }
    function deleteCategory($tableName, $category_id,  $data = [])
    {
        try {

            $sql = "DELETE FROM $tableName WHERE category_id = :category_id";

            $stmt = $GLOBALS['conn']->prepare($sql);

            $stmt->bindParam(":category_id", $category_id);

            $stmt->execute();
        } catch (\Exception $e) {
            debug($e);
        }
    }
}

